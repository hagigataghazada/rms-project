@extends('admin.layouts.app')

@section('title', 'Add Service')

@section('content')
    <div class="container my-5 d-flex justify-content-center align-items-center" style="height: 70vh;">
        <div class="card shadow-lg">
            <div class="card-body d-flex flex-column">
                <h2 class="card-title text-center mb-4" style="color: #333;">Add Service</h2>
                <form action="{{ route('services.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="font-weight-bold">Service Name:</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="type" class="font-weight-bold">Service Type:</label>
                        <input type="text" id="type" name="type" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="contact_number" class="font-weight-bold">Contact Number:</label>
                        <input type="text" id="contact_number" name="contact_number" required class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
