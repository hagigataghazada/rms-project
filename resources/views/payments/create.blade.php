@extends('admin.layouts.app')

@section('title', 'Add Payment')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 600px; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
            <h2 class="text-center mb-4" style="color: #333;">Add Payment</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="apartment_number" class="font-weight-bold">Apartment Number</label>
                    <select name="apartment_number" class="form-control" required>
                        @foreach($apartments as $apartment)
                            <option value="{{ $apartment->apartment_number }}">{{ $apartment->apartment_number }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="type" class="font-weight-bold">Payment Type</label>
                    <select name="type" class="form-control" required>
                        <option value="water">Water</option>
                        <option value="gas">Gas</option>
                        <option value="electricity">Electricity</option>
                        <option value="elevator">Elevator</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="amount" class="font-weight-bold">Amount</label>
                    <input type="number" name="amount" class="form-control" placeholder="Amount" step="0.01" required>
                </div>

                <div class="form-group mb-3">
                    <label for="invoice_image" class="font-weight-bold">Invoice Image</label>
                    <input type="file" name="invoice_image" class="form-control" accept="image/*">
                </div>
                <div class="form-group mb-3">
                    <label for="status" class="font-weight-bold">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary w-100">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
