@extends("templates.layout")

@section("content")
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Result for products</h4>
                <a class="btn btn-success my-3" href="/shop/makeOrder">Make order</a>
                @if($products)
                @foreach($products as $product)
                    <div class="row searched-item cart-list-divider">
                        <div class="col-sm-4">
                        <a href="/shop/detail/{{$product->id}}">
                            <img class="trending-img" src="{{$product->gallery}}">
                        </a>
                        </div>

                        <div class="col-sm-4">
                            <div>
                                <h2>{{$product->name}}</h2>
                                <h5>{{$product->description}}</h5>
                            </div>
                        </div>

                        <div class="col-sm-4">
                        <a href="/shop/removeCartListItem/{{$product->cart_id}}" class="btn btn-danger">Remove from cart</a>
                        </div>

                    </div>
                @endforeach
                @endif
            </div>
            <!-- <a class="btn btn-success my-3" href="/shop/makeOrder">Make order</a> -->
        </div>
    </div>
@endsection