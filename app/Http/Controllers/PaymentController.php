<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function show(Payment $payment)
    {
        return view('payments', compact('payment'));
    }

public function index()
{
$payments = Payment::with(['user', 'apartment'])->get();
return view('payments.list', compact('payments'));
}

public function create()
{
$users = User::all();
$apartments = Apartment::all();
return view('payments.create', compact('users', 'apartments'));
}

public function store(Request $request)
{
$request->validate([
'user_id' => 'required|exists:users,id',
'apartment_id' => 'required|exists:apartments,id',
'type' => 'required|string|in:water,gas,electricity,elevator',
'amount' => 'required|numeric',
'status' => 'required|in:pending,paid',
'invoice_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
]);

$payment = new Payment();
$payment->user_id = $request->user_id;
$payment->apartment_id = $request->apartment_id;
$payment->type = $request->type;
$payment->amount = $request->amount;
$payment->status = $request->status;

if ($request->hasFile('invoice_image')) {
$imageName = time().'.'.$request->invoice_image->extension();
$request->invoice_image->move(public_path('images'), $imageName);
$payment->invoice_image = $imageName;
}

$payment->save();

return redirect()->route('payments.index')->with('success', 'Fatura başarıyla kaydedildi.');
}

public function edit(Payment $payment)
{
$users = User::all();
$apartments = Apartment::all();
return view('payments.edit', compact('payment', 'users', 'apartments'));
}

public function update(Request $request, Payment $payment)
{
$request->validate([
'user_id' => 'required|exists:users,id',
'apartment_id' => 'required|exists:apartments,id',
'type' => 'required|string|in:water,gas,electricity,elevator',
'amount' => 'required|numeric',
'status' => 'required|in:pending,paid',
'invoice_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
]);

$payment->user_id = $request->user_id;
$payment->apartment_id = $request->apartment_id;
$payment->type = $request->type;
$payment->amount = $request->amount;
$payment->status = $request->status;

if ($request->hasFile('invoice_image')) {
$imageName = time().'.'.$request->invoice_image->extension();
$request->invoice_image->move(public_path('images'), $imageName);
$payment->invoice_image = $imageName;
}

$payment->save();

return redirect()->route('payments.index')->with('success', 'Fatura başarıyla güncellendi.');
}

    public function destroy(Payment $payment)
    {
        // Dosya yolunu belirleyelim
        $invoiceImagePath = public_path('images').'/'.$payment->invoice_image;

        // Eğer dosya mevcutsa sil
        if ($payment->invoice_image && file_exists($invoiceImagePath)) {
            unlink($invoiceImagePath);
        }

        // Faturayı veritabanından sil
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Fatura başarıyla silindi.');
    }
}
