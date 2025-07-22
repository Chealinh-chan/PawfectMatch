@extends('layouts.master')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>Find Your Furry Friend</h1>
            <p>Explore pets available for adoption and learn how to care for them.</p>
            <div class="hero-buttons">
                <a href="{{route('about')}}" class="btn btn-light">Learn More</a>
                <a href="{{route('register')}}" class="btn btn-dark">Get Started</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('img/pic1.png') }}" alt="Two puppies and a kitten">
        </div>
    </div>
</section>

<!-- Pet Available for Adoption Section -->
<section class="adoption-section">
    <div class="container">
        <h2 class="section-title">Pet Available for Adoption</h2>
        <div class="pet-cards">
            @foreach($availablePets as $pet)
            <div class="pet-card">
                <img src="{{ asset($pet['image']) }}" alt="{{ $pet['label'] }}">
                <p>{{ $pet['label'] }}</p>
            </div>
            @endforeach
        </div>
        <div class="action-button">
            <a href="{{ route('pets') }}" class="btn btn-beige">Learn More</a>
        </div>
    </div>
</section>

<!-- We looking for helping hand Section -->
<section class="help-section">
    <div class="container">
        <h2>We looking for helping hand</h2>
        <p>Learn the benefits of adopting a pet and how to choose the right one for you.</p>
        <a href="{{route('donate')}}" class="btn btn-dark">Read More</a>
    </div>
</section>

<!-- Pet Care Knowledge Section (NEW CODE) -->
<section class="pet-care-section">
    <div class="container">
        <h2 class="section-title">Pet care knowledge</h2>
        <div class="care-grid">
            <!-- Dog Care Card -->
            <div class="care-card">
                <img src="{{ asset($dogCareArticle['image']) }}" alt="{{ $dogCareArticle['title'] }}">
                <div class="care-card-content">
                    <h3>{{ $dogCareArticle['title'] }}</h3>
                    <p>{{ $dogCareArticle['description'] }}</p>
                    <a href="{{route('care.dog')}}" class="btn btn-learn">Learn More</a>
                </div>
            </div>

            <!-- Cat Care Card -->
            <div class="care-card">
                <img src="{{ asset($catCareArticle['image']) }}" alt="{{ $catCareArticle['title'] }}">
                <div class="care-card-content">
                    <h3>{{ $catCareArticle['title'] }}</h3>
                    <p>{{ $catCareArticle['description'] }}</p>
                    <a href="{{route('care.cat')}}" class="btn btn-learn">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection