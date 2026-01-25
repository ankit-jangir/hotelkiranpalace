@php
$subtitle = $subtitle ?? '';
$title = $title ?? '';
$cards = $cards ?? [];
@endphp



<section class="container commoncard-section">
    <span class="commoncard-subtitle">{{ $subtitle }}</span>
    <h2 class="commoncard-title">{{ $title }}</h2>

    <div class="commoncard-grid">
        @foreach($cards as $card)
        <div class="commoncard-card">
            <div class="commoncard-img">
                <img src="{{ $card['image'] }}" class="commoncard-img-main">
                <img src="{{ $card['hover_image'] }}" class="commoncard-img-hover">
            </div>

            <div class="commoncard-content">
                <span class="commoncard-price">
                    FROM {{ $card['price'] }} / NIGHT
                </span>
                <h3 class="commoncard-room-title">
                    {{ $card['room'] }}
                </h3>
                <a href="{{ $card['link'] ?? '#' }}" class="commoncard-link">
                    Read more
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>