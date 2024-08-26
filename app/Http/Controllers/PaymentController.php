<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function index()
    {
        $payments = Payment::all();
        return view('payments.list', compact('payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'apartment_number' => 'required',
            'receipt_image' => 'nullable|image|max:2048',
        ]);

        $payment = new Payment();
        $payment->amount = $request->amount;
        $payment->date = $request->date;
        $payment->apartment_number = $request->apartment_number;

        if ($request->hasFile('receipt_image')) {
            $path = $request->file('receipt_image')->store('receipts', 'public');
            $payment->receipt_image = $path;
        }

        $payment->save();

        return redirect()->route('payments.list')->with('success', 'Payment successfully added.');
    }
}
