{{-- filepath: d:\laravel\final-pet\resources\views\pet-details.blade.php --}}
@extends('layouts.master')

@section('content')
    <div class="page-background">
        <div class="container">
            <div class="pet-details-container">
                <!-- Main Details Card -->
                <div class="pet-details-card">
                    <div class="pet-image-container">
                        @if ($pet->images->isNotEmpty())
                            <div class="scroll-gallery-wrapper">
                                <button class="scroll-btn left" onclick="scrollGallery(-1)">‹</button>

                                <div class="scroll-gallery" id="imageGallery">
                                    @foreach ($pet->images as $image)
                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                            alt="Photo of {{ $pet->name }}"
                                            class="scroll-image @if ($pet->status == 'Adopted') is-adopted @endif">
                                    @endforeach
                                </div>

                                <button class="scroll-btn right" onclick="scrollGallery(1)">›</button>
                            </div>
                        @else
                            <img src="{{ asset('images/default-pet.png') }}" alt="No image available" class="scroll-image">
                        @endif

                    </div>
                    <div class="pet-info-container">
                        <div class="pet-info-list">
                            <p><strong>ID :</strong> {{ $pet->slug }}</p>
                            <p><strong>Name:</strong> {{ $pet->name }}</p>
                            <p><strong>Age:</strong> {{ $pet->age }}</p>
                            <p><strong>Type:</strong> {{ $pet->type }}</p>
                            <p><strong>Breed:</strong> {{ $pet->breed }}</p>
                            <p><strong>Weight:</strong> {{ $pet->weight }}</p>
                        </div>

                        @if ($pet->status == 'Available')
                            <a href="{{ route('appointments.create', ['slug' => $pet->slug]) }}"
                                class="btn btn-adoption">Open Adoption</a>
                        @else
                            <button class="btn btn-adopted" disabled>Adopted</button>
                        @endif
                    </div>
                </div>

                <!-- Description Section -->
                <div class="pet-description-section">
                    <h3>Description:</h3>
                    <p>{{ $pet->description }}</p>
                </div>
            </div>
        </div>
    </div>

<script>
    function scrollGallery(direction) {
        const gallery = document.getElementById('imageGallery');
        const image = gallery.querySelector('.scroll-image');
        const scrollAmount = image ? (image.offsetWidth + 16) : 300; // 16 = gap

        gallery.scrollBy({
            left: direction * scrollAmount,
            behavior: 'smooth'
        });
    }
</script>


@endsection
