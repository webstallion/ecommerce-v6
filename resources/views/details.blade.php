@extends('master')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$product_details['gallary']}}">
        </div>    
        <div class="col-sm-6">
            <a href="/">Go Back</a>   
            <h2>{{$product_details['name']}}</h2>
            <h3>Price: {{$product_details['price']}}</h3>
            <h3>Details: {{$product_details['discription']}}</h3>
            <h3>Category: {{$product_details['category']}}</h3>
            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product_details['id']}}">
                <button type="submit" class="btn btn-primary" style="float:left;">Add to cart</button>
            </form>
            <button class="btn btn-success" style="margin-left:20px;">Buy now</button>
        </div>
    </div>
</div>
@endsection