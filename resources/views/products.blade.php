@extends("templates.layout")

@section("content")
<div class="custom-product">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach($allProducts as $product)
            @if($loop->first)
            <div class="carousel-item active">
                <a href="/shop/detail/{{$product['id']}}">
                <img src="{{$product['gallery']}}" class="d-block w-100 slider-img" alt="active carousel image">
                <div class="carousel-caption w-25 mx-auto d-none d-md-block slider-text">
                    <h5>{{$product['name']}}</h5>
                    <p>{{$product['description']}}</p>
                </div>
                </a>
            </div>
            @else
            <div class="carousel-item">
                <img src="{{$product['gallery']}}" class="d-block w-100 slider-img" alt="carousel image">
                <div class="carousel-caption w-25 mx-auto d-none d-md-block slider-text">
                    <h5>{{$product['name']}}</h5>
                    <p>{{$product['description']}}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="trending-wrapper">
        <h3>Trending products</h3>
        @foreach($allProducts as $product)
        <a href="/shop/detail/{{$product['id']}}">
        <div class="trending-item">
            <img src="{{$product['gallery']}}" class="trending-img" alt="active carousel image">
            <div class="">
                <h5>{{$product['name']}}</h5>
            </div>
        </div>
        </a>
        
        @endforeach
        
    </div>
</div>
@endsection