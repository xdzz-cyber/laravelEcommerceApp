@extends("templates.layout")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{$foundProduct['gallery']}}" class="detail-img img-fluid">
        </div>
        <div class="col-sm-6">
            <a href="/shop">Go back</a>
            <h2>{{$foundProduct['name']}}</h2>
            <h3>Price: {{$foundProduct['price']}}</h3>
            <h4>Description: {{$foundProduct['description']}}</h4>
            <h4>Category: {{$foundProduct['category']}}</h4>
            <!-- <button class="my-3 mx-1 btn btn-info">Add to cart</button> -->
            <form method="post" action="/shop/addToCart">
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="product_id" value="{{$foundProduct['id']}}" class="form-control" id="product_id" aria-describedby="product_id">
                </div>
                <button type="submit" class="btn btn-primary">Add to cart</button>
            </form>
            <button class="my-3 btn btn-success">Buy now</button>
        </div>
    </div>
</div>
@endsection