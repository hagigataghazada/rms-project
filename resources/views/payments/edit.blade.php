@extends('admin.layouts.app')

@section('title', 'Edit Payment')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 600px; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
            <h2 class="text-center mb-4" style="color: #333;">Edit Payment</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('payments.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="apartment_number" class="font-weight-bold">Apartment Number</label>
                    <select name="apartment_number" class="form-control" required>
                        @foreach($apartments as $apartment)
                            <option value="{{ $apartment->apartment_number }}" {{ $payment->apartment_number == $apartment->apartment_number ? 'selected' : '' }}>
                                {{ $apartment->apartment_number }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="type" class="font-weight-bold">Payment Type</label>
                    <select name="type" class="form-control" required>
                        <option value="water" {{ $payment->type == 'water' ? 'selected' : '' }}>Water</option>
                        <option value="gas" {{ $payment->type == 'gas' ? 'selected' : '' }}>Gas</option>
                        <option value="electricity" {{ $payment->type == 'electricity' ? 'selected' : '' }}>Electricity</option>
                        <option value="elevator" {{ $payment->type == 'elevator' ? 'selected' : '' }}>Elevator</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="amount" class="font-weight-bold">Amount</label>
                    <input type="number" name="amount" class="form-control" value="{{ $payment->amount }}" step="0.01" required>
                </div>

                <div class="form-group mb-3">
                    <label for="status" class="font-weight-bold">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="invoice_image" class="font-weight-bold">Invoice Image</label>
                    <input type="file" name="invoice_image" class="form-control" accept="image/*">
                    @if($payment->invoice_image)
                        <img src="{{ asset('storage/images/invoices/' . $payment->invoice_image) }}" alt="Invoice Image" style="max-width: 100px;">
                    @else
                        <span>No Invoice</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
@endsection
