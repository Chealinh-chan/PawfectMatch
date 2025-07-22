@extends('layouts.master')

@section('content')
    <!-- Banner -->
    <br>
    <div class="appointments-banner">
        <h1>Your Appointments</h1>
    </div>

    <div class="appointments-container">
        <div class="appointments-table-wrapper">
            <table class="appointments-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pet Name</th>
                        <th>Date & Time</th>
                        <th>Breed</th>
                        <th>Age</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $index => $appointment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $appointment->pet?->name ?? 'No Pet' }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->booking_date)->format('M d, Y - g:i A') }}</td>
                            <td>{{ $appointment->pet?->breed ?? 'N/A' }}</td>
                            <td>{{ $appointment->pet?->age ?? 'N/A' }}</td>
                            <td class="status">{{ ucfirst($appointment->status) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="no-appointments">No appointments found.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
