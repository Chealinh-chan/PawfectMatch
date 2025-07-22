@extends('layouts.master')

@section('title', 'PawfectMatch - Dashboard')

@section('content')

<!-- Hero Section -->
<div class="hero d-flex align-items-center justify-content-center text-center flex-wrap">
    <div class="p-3">
        <h2>Find Your Furry Friend</h2>
        <p>Explore pets available for adoption and learn how to care for them.</p>
        <button type="button" class="btn btn-outline-dark">Learn More</button>
        <button type="button" class="btn btn-dark">Get Started</button>
    </div>
    <div class="p-3">
        <img src="{{ asset('img/pic1.png') }}" alt="Pets" class="w-50">
    </div>
</div>

<!-- Pet Available for Adoption -->
<div class="adoption-section">
    <h4>Pet Available for Adoption</h4>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
        <div class="col">
            <div class="card text-center">
                <img src="{{ asset('img/dog.png') }}" class="card-img-top" style="height: 320px; object-fit: cover;" alt="Dog">
                <div class="card-body">
                    <p class="card-text">Dogs</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <img src="{{ asset('img/cat.png') }}" class="card-img-top" style="height: 320px; object-fit: cover;" alt="Cat">
                <div class="card-body">
                    <p class="card-text">Cats</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <img src="{{ asset('img/fish.webp') }}" class="card-img-top" style="height: 320px; object-fit: cover;" alt="Other animals">
                <div class="card-body">
                    <p class="card-text">Other animals123</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <button class="btn btn-outline-dark">Learn More</button>
    </div>
</div>

<!-- Helping Hand Section -->
<div class="helping-hand">
    <h4>We looking for helping hand</h4>
    <p>Learn the benefits of adopting a pet and how to choose the right one for you.</p>
    <button class="btn btn-dark">Read More</button>
</div>

<!-- Pet Care Knowledge -->
<div class="knowledge-section">
    <h5 class="mb-4">Pet care knowledge</h5>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card shadow-card text-center">
                <img src="{{ asset('img/pic2.jpg') }}" class="card-img-top" style="height: 320px; object-fit: cover;" alt="Dog Care">
                <div class="card-body">
                    <h6>Dog Care Basics</h6>
                    <p>Everything to know about your dog.</p>
                    <button class="btn btn-outline-dark">Learn More</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-card text-center">
                <img src="{{ asset('img/pic3.jpg') }}" class="card-img-top" style="height: 320px; object-fit: cover;" alt="Cat Care">
                <div class="card-body">
                    <h6>Cat Care Basics</h6>
                    <p>Everything to know about your cat.</p>
                    <button class="btn btn-outline-dark">Learn More</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection