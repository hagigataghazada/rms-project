@extends('user.dashboard')

@section('content')
    <div class="container">
        <h2 class="d-flex justify-content-start my-4">Available Services</h2>
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->name }}</h5>
                            <p class="card-text"><strong>Type:</strong> {{ $service->type }}</p>
                            <p><strong>Contact:</strong> {{ $service->contact_number }}</p>
                            <a href="tel:{{ $service->contact }}" class="btn btn-primary">Call Service</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
