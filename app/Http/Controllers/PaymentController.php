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
        $apartments = Apartment::all(); // Apartmanları çekiyoruz
        return view('payments.create', compact('apartments'));
    }

    public function store(Request $request)
    {
        // Verilerin doğrulanması
        $request->validate([
            'apartment_number' => 'required|exists:apartments,apartment_number',
            'type' => 'required|in:water,gas,electricity,elevator',
            'amount' => 'required|numeric',
            'status' => 'required|in:pending,paid',
            'invoice_image' => 'nullable|image|max:2048',
        ]);

        // Resim yükleme işlemi (varsa)
        if ($request->hasFile('invoice_image')) {
            // Dosyayı images/invoices dizinine taşı
            $filePath = $request->file('invoice_image')->store('images/invoices', 'public');
        } else {
            $filePath = null;
        }

        // Verilerin kaydedilmesi
        Payment::create([
            'apartment_number' => $request->input('apartment_number'),
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
            'status' => $request->input('status'),
            'invoice_image' => $filePath,
        ]);

        return redirect()->route('payments.list')->with('success', 'Fatura başarıyla oluşturuldu.');
    }

    public function index()
    {
        $payments = Payment::all(); // Tüm faturaları listeliyoruz
        return view('payments.list', compact('payments'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $apartments = Apartment::all(); // Apartmanları listeliyoruz
        return view('payments.edit', compact('payment', 'apartments'));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        // Verilerin doğrulanması
        $request->validate([
            'apartment_number' => 'required|exists:apartments,apartment_number',
            'type' => 'required|in:water,gas,electricity,elevator',
            'amount' => 'nullable|numeric',
            'status' => 'required|in:pending,paid',
            'invoice_image' => 'nullable|image',
        ]);

        // Resim yükleme işlemi (varsa)
        if ($request->hasFile('invoice_image')) {
            $filePath = $request->file('invoice_image')->store('invoices', 'public');
            $payment->invoice_image = $filePath;
        }

        // Verilerin güncellenmesi
        $payment->update($request->except('invoice_image'));

        return redirect()->route('payments.list')->with('success', 'Fatura başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);

        // Resmi de sil
        if ($payment->invoice_image) {
            Storage::delete('public/' . $payment->invoice_image);
        }

        $payment->delete();
        return redirect()->route('payments.list')->with('success', 'Fatura başarıyla silindi.');
    }
}
