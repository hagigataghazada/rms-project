@extends('user.dashboard')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg w-75">
            <div class="card-header bg-primary text-white text-center">
                <h2 class="mb-0">Your Payments</h2>
            </div>
            <div class="card-body">
                @if($payments->isEmpty())
                    <div class="alert alert-warning text-center" role="alert">
                        No payments found for your apartment.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">
                            <tr class="text-center">
                                <th>Amount</th>
                                <th>Due Date</th>
                                <th>Type</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr class="text-center">
                                    <td>{{ $payment->amount }}₼</td>
                                    <td>{{ \Carbon\Carbon::parse($payment->due_date)->format('d M Y') }}</td>
                                    <td>{{ ucfirst($payment->type) }}</td>
                                    <td>
                                        @if($payment->status === 'paid')
                                            <span class="badge bg-success p-2">Paid</span>
                                        @elseif($payment->status === 'pending')
                                            <span class="badge bg-warning p-2 text-dark">Pending</span>
                                        @else
                                            <span class="badge bg-danger p-2">Overdue</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
