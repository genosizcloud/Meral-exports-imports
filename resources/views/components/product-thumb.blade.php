@props(['product', 'large' => false])

<div class="product-img {{ $large ? 'product-img--lg' : '' }}" style="background:linear-gradient(135deg,{{ $product->bg_from }},{{ $product->bg_to }});">
    @if(!empty($product->image))
        <img src="{{ public_image_url($product->image) }}" alt="{{ $product->name }}" class="product-img-photo" loading="lazy">
    @else
        <span class="product-img-emoji {{ $large ? 'product-img-emoji--lg' : '' }}">{{ $product->emoji }}</span>
    @endif
</div>
