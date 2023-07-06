@extends('master')
@section("content")
<div class="custom-product">

    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h3>Result for Products</h3>
            @foreach($products as $item)
            <div class="row search-item cart-list-divider">
                <div class="col-sm-4">
                    <a href="details/{{$item->id}}">
                        <img class="trending-image" src="{{$item->gallary}}">
                    </a> 
                </div> 
                <div class="col-sm-4">
                    <a href="details/{{$item->id}}">
                        <div class="">
                            <h3>{{$item->name}}</h3>
                            <p>{{$item->discription}}</p>
                        </div>
                    </a> 
                </div>
                <div class="col-sm-3">
                    <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove to cart</a> 
                </div>  
            </div>
            @endforeach
        </div>
        <a class="btn btn-success" href="ordernow">Order Now</a>
        <br><br>
    </div>    
</div>
@endsection