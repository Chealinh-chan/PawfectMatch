@extends('layouts.master') {{-- Make sure this matches your project's master layout --}}

@section('content')
    <!-- Banner Section -->
    <section class="care-page-banner" id="cat-care-banner">
        <h1>Cat Care Basics</h1>
    </section>

    <!-- Main Content Section -->
    <div class="care-page-content-revamped">
        <div class="container">
            <!-- Intro Section -->
            <div class="care-intro">
                <h2>A Purrfectly Happy Cat</h2>
                <p>Welcoming a cat into your home brings endless joy and affection. While cats are known for their independence, they thrive on care and routine. Here are the essentials for ensuring your feline friend lives a long, happy, and healthy life.</p>
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
                    <img src="{{ asset('img/cat3.jpg') }}" alt="A happy cat relaxing">
                </div>
                <div class="feature-text">
                    <h4>Happiness is a Warm Kitten</h4>
                    <p>Understanding your cat's needs and providing a loving, stable environment is the foundation of a wonderful friendship.</p>
                </div>
            </section>
        </div>
    </div>
@endsection