@extends('layouts.master')

@section('content')
    <div class="page-background">
        <div class="container-flex pets-page-container">

            <!-- Filter Form wraps both sidebar and submit -->
            <form method="GET" action="{{ route('pets') }}">
                <div class="flex-container">
                    <!-- Sidebar -->
                    <aside class="pets-sidebar">
                        <div class="filter-group">
                            <!-- Pet Category Filter -->
                            <div class="filter-block">
                                <div class="filter-header"><span>Pet Category</span><span class="arrow">▼</span></div>
                                <div class="filter-options">
                                    <div class="option-item">
                                        <input type="checkbox" name="type[]" value="Dog" id="cat-dog"
                                            {{ in_array('Dog', request()->get('type', [])) ? 'checked' : '' }}>
                                        <label for="cat-dog">Dog</label>
                                    </div>
                                    <div class="option-item">
                                        <input type="checkbox" name="type[]" value="Cat" id="cat-cat"
                                            {{ in_array('Cat', request()->get('type', [])) ? 'checked' : '' }}>
                                        <label for="cat-cat">Cat</label>
                                    </div>
                                    <div class="option-item">
                                        <input type="checkbox" name="type[]" value="Others" id="cat-others"
                                            {{ in_array('Others', request()->get('type', [])) ? 'checked' : '' }}>
                                        <label for="cat-others">Others</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Breed Filter -->
                            <div class="filter-block">
                                <div class="filter-header"><span>Breed</span><span class="arrow">▼</span></div>
                                <div class="filter-options">
                                    @foreach ($allBreeds as $breed)
                                        <div class="option-item">
                                            <input type="checkbox" name="breed[]" value="{{ $breed->name }}"
                                                id="breed-{{ $loop->index }}"
                                                {{ in_array($breed->name, request()->get('breed', [])) ? 'checked' : '' }}>
                                            <label for="breed-{{ $loop->index }}">{{ $breed->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Age Slider -->
                            <div class="filter-block">
                                <div class="filter-header">
                                    <span>Max Age (years)</span><span class="arrow">▼</span>
                                </div>
                                <div class="filter-options">
                                    <input type="range" name="max_age" id="age-range" min="1" max="20"
                                        value="{{ request()->has('max_age') ? request('max_age') : 20 }}">
                                    <span id="age-display">{{ request()->has('max_age') ? request('max_age') : 1 }}
                                        years</span>
                                </div>
                            </div>


                            <!-- Pet Size Filter -->
                            <div class="filter-block">
                                <div class="filter-header"><span>Pet Size</span><span class="arrow">▼</span></div>
                                <div class="filter-options">
                                    @php $sizes = request()->get('size', []); @endphp
                                    <div class="option-item">
                                        <input type="checkbox" name="size[]" value="Small" id="size-small"
                                            {{ in_array('Small', $sizes) ? 'checked' : '' }}>
                                        <label for="size-small">Small (0–10 kg)</label>
                                    </div>
                                    <div class="option-item">
                                        <input type="checkbox" name="size[]" value="Medium" id="size-medium"
                                            {{ in_array('Medium', $sizes) ? 'checked' : '' }}>
                                        <label for="size-medium">Medium (11–25 kg)</label>
                                    </div>
                                    <div class="option-item">
                                        <input type="checkbox" name="size[]" value="Large" id="size-large"
                                            {{ in_array('Large', $sizes) ? 'checked' : '' }}>
                                        <label for="size-large">Large (25+ kg)</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Apply & Save Buttons -->
                            <div class="filter-block" style="display: flex; gap: 0.5rem;">
                                <button type="submit" class="btn-filter btn-filter-apply">
                                    Apply Filters
                                </button>
                                <a href="{{ route('pets') }}" class="btn-filter btn-filter-clear">
                                    Clear
                                </a>
                            </div>
                    </aside>
                </div>
            </form>

            <!-- Main Content -->
            <div class="pets-main-content">
                <!-- Banner -->
                <section class="pets-banner">
                    <h2>Available Pets</h2>
                    <p>Choose your new furry friend.</p>
                    <a href="{{ route('pets.all') }}" class="btn btn-details">View Details</a>
                </section>

                <!-- Pets Grid -->
                <section class="available-pets-grid">
                    @forelse($pets as $pet)
                        <a href="{{ route('pets.show', ['slug' => $pet->slug]) }}" class="pet-card-link">
                            <div class="available-pet-card">
                                @if ($pet->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $pet->images->first()->image_path) }}"
                                        alt="{{ $pet->name }}">
                                @else
                                    <img src="{{ asset('images/default-pet.png') }}" alt="{{ $pet->name }}">
                                @endif

                                <div class="pet-info">
                                    <h3>{{ $pet->name }}</h3>

                                    <p>Breed: {{ $pet->breed ?? 'Unknown' }}</p>
                                    <p>Age: {{ $pet->age }}</p>
                                    <p>Weight: {{ $pet->weight }}</p>
                                    <p>Type: {{ $pet->type }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p>No pets match your filters.</p>
                    @endforelse
                </section>

                <!-- Testimonials Section -->
                <section class="testimonials-section">
                    <h2>What Our Adopters Say</h2>
                    <div class="testimonials-grid">
                        @foreach ($testimonials as $testimonial)
                            <div class="testimonial-card">
                                <div class="testimonial-header">
                                    <strong>{{ $testimonial['name'] }}</strong>
                                    <span class="stars">
                                        @for ($i = 0; $i < $testimonial['rating']; $i++)
                                            ★
                                        @endfor
                                    </span>
                                </div>
                                <p>"{{ $testimonial['quote'] }}"</p>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- JS for toggle and slider -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterHeaders = document.querySelectorAll('.filter-header');
            filterHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    header.parentElement.classList.toggle('active');
                });
            });

            const ageSlider = document.getElementById("age-range");
            const ageDisplay = document.getElementById("age-display");

            ageSlider.addEventListener("input", function() {
                ageDisplay.innerText = ageSlider.value + " years";
            });
        });
    </script>
@endsection
