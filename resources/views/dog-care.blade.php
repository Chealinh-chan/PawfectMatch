@extends('layouts.master') {{-- Make sure this matches your project's master layout --}}

@section('content')
    <!-- Banner Section -->
    <section class="care-page-banner" id="dog-care-banner-2">
        <h1>Dog Care Basics</h1>
    </section>

    <!-- Main Content Section -->
    <div class="care-page-content-revamped">
        <div class="container">
            <!-- Intro Section -->
            <div class="care-intro">
                <h2>A Happy Dog is a Healthy Dog</h2>
                <p>Bringing a dog into your life is a rewarding journey filled with joy and companionship. To help you get started on the right paw, we've gathered the essential basics for keeping your new friend healthy, happy, and well-behaved.</p>
            </div>

            <!-- Care Points Grid -->
            <div class="care-points-wrapper">
                @foreach($carePoints as $point)
                <div class="care-point-item">
                    <h3>{{ $point['title'] }}</h3>
                    <ul>
                        @foreach($point['points'] as $listItem)
                            <li>{{ $listItem }}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>

            <!-- Feature Section -->
            <section class="care-feature-section">
                <div class="feature-image">
                    <img src="{{ asset('img/dog3.jpg') }}" alt="A happy dog resting">
                </div>
                <div class="feature-text">
                    <h4>Love is a Four-Legged Word</h4>
                    <p>Remember, patience and consistency are key. Building a strong bond with your dog creates a lifetime of happiness for you both.</p>
                </div>
            </section>
        </div>
    </div>
@endsection