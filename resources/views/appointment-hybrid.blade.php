@extends('layouts.master')

@section('content')
    <div class="hybrid-page-wrapper">
        <div class="container hybrid-container">

            <!-- Left Column: Pet Info -->
            <div class="hybrid-left-column">
                <div class="pet-image-hybrid">
                    @if ($pet->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $pet->images->first()->image_path) }}"
                            alt="Photo of {{ $pet->name }}">
                    @else
                        <img src="{{ asset('images/default-pet.png') }}" alt="No image available">
                    @endif
                </div>
                <div class="pet-info-hybrid">
                    <p><strong>Name:</strong> {{ $pet->name }}</p>
                    <p><strong>Age:</strong> {{ $pet->age }}</p>
                    <p><strong>Breed:</strong> {{ $pet->breed }}</p>
                    <p><strong>Size:</strong> {{ $pet->weight }}</p>
                </div>
            </div>

            <!-- Right Column: Form -->
            <div class="hybrid-right-column">
                <form method="POST" action="{{ route('appointments.store') }}">
                    @csrf
                    <input type="hidden" name="pet_slug" value="{{ $pet->slug }}">
                    <!-- Phone Number -->
                    <div class="form-group-hybrid">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <!-- Date & Time of Appointment -->
                    <div class="form-group-hybrid">
                        <label for="appointment_date">Date & Time of Appointment</label>
                        <input type="datetime-local" id="appointment_date" name="appointment_date" required>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions-hybrid">
                        <a href="{{ url()->previous() }}" class="btn btn-back">Back</a>
                        <button type="submit" class="btn btn-submit">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
