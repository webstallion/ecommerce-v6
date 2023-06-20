@extends('master')
@section("content")
<div class="custom-product">
    <div class="trending-wrapper">
        <h3>Trending Products</h3>
        <div class="trending-item">
            <img class="trending-image" src="{{$product_details['gallary']}}">
            <div class="">
                <h3>{{$product_details['name']}}</h3>
                <p>{{$product_details['discription']}}</p>
            </div>
        </div>
    </div>
</div>
@endsection