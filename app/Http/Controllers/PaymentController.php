<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function create()
    {
        $apartments = Apartment::all();
        return view('payments.create', compact('apartments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'apartment_number' => 'required|exists:apartments,apartment_number',
            'type' => 'required|in:water,gas,electricity,elevator',
            'amount' => 'required|numeric',
            'status' => 'required|in:pending,paid',
            'invoice_image' => 'nullable|image',
        ]);

        if ($request->hasFile('invoice_image')) {
            $filename = time() . '_' . $request->file('invoice_image')->getClientOriginalName();
            $request->file('invoice_image')->storeAs('public/images/invoices', $filename);
        } else {
            $filename = null;
        }

        Payment::create([
            'apartment_number' => $request->input('apartment_number'),
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
            'status' => $request->input('status'),
            'invoice_image' => $filename,
        ]);

        return redirect()->route('payments.list')->with('success', 'Payment created successfully');
    }

    public function index()
    {
        $payments = Payment::all();
        return view('payments.list', compact('payments'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $apartments = Apartment::all();
        return view('payments.edit', compact('payment', 'apartments'));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([
            'apartment_number' => 'required|exists:apartments,apartment_number',
            'type' => 'required|in:water,gas,electricity,elevator',
            'amount' => 'nullable|numeric',
            'status' => 'required|in:pending,paid',
            'invoice_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('invoice_image')) {
            if ($payment->invoice_image && Storage::exists('public/images/invoices/' . $payment->invoice_image)) {
                Storage::delete('public/images/invoices/' . $payment->invoice_image);
            }

            $filename = time() . '_' . $request->file('invoice_image')->getClientOriginalName();
            $request->file('invoice_image')->storeAs('public/images/invoices', $filename);
            $payment->invoice_image = $filename;
        }

        $payment->update([
            'apartment_number' => $request->input('apartment_number'),
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
            'status' => $request->input('status'),
            'invoice_image' => $payment->invoice_image,
        ]);

        return redirect()->route('payments.list')->with('success', 'Payment updated successfully.');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);

        if ($payment->invoice_image) {
            Storage::delete('public/' . $payment->invoice_image);
        }

        $payment->delete();

        return redirect()->route('payments.list')->with('success', 'Payment successfully deleted.');
    }
}
