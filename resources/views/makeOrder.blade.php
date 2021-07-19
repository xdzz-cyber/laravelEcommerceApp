@extends("templates.layout")

@section("content")
<div class="custom-product">
    <div class="col-sm-10">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Amount</th>
                    <td>${{$sumOfCartProducts}}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>some tax</td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>some delivery</td>
                </tr>
                <tr>
                    <td>Final price</td>
                    <td>${{$sumOfCartProducts + 10}}</td>
                </tr>
            </tbody>
        </table>

        <div>
            <form method="post" action="/shop/makeOrderResult">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="address" placeholder="enter your address" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <div class="form-check my-3 mx-2">
                        <input class="form-check-input" value="online" type="radio" name="paymentMethod">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Online
                        </label>
                    </div>
                    <div class="form-check my-3 mx-2">
                        <input class="form-check-input" value="onDelivery" type="radio" name="paymentMethod" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            On delivery
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mx-2">Order now</button>
            </form>
        </div>
    </div>
</div>
@endsection