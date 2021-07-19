@extends("templates.layout")

@section("content")
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Result for my orders</h4>
                @if($clientOrderItems)
                @foreach($clientOrderItems as $orderItem)
                    <div class="row searched-item cart-list-divider">
                        <div class="col-sm-4">
                        <a href="/shop/detail/{{$orderItem->id}}">
                            <img class="trending-img" src="{{$orderItem->gallery}}">
                        </a>
                        </div>

                        <div class="col-sm-4">
                            <div>
                                <h2>Name: {{$orderItem->name}}</h2>
                                <h5>Delivery status: {{$orderItem->status}}</h5>
                                <h5>Address: {{$orderItem->address}}</h5>
                                <h5>Payment status: {{$orderItem->payment_status}}</h5>
                                <h5>Payment method: {{$orderItem->payment_method}}</h5>
                            </div>
                        </div>

                        

                    </div>
                @endforeach
                @endif
            </div>
            <!-- <a class="btn btn-success my-3" href="/shop/makeOrder">Make order</a> -->
        </div>
    </div>
@endsection