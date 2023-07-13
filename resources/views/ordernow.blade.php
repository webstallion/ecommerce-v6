@extends('master')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
        <table class="table table-dark">
            <tbody>
                <tr>
                    <th scope="row">Amount</th>
                    <td>${{$sum_total_products}}</td>
                </tr>
                <tr>
                    <th scope="row">Tax</th>
                    <td>$0</td>
                </tr>
                <tr>
                    <th scope="row">Delivery</th>
                    <td>$10</td>
                </tr>
                <tr>
                    <th scope="row">Total Amount</th>
                    <td>${{$sum_total_products+10}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-10">
        <form action="/orderplace" method="POST">
            @csrf;
            <div class="form-group">
                <textarea class="form-control" name="address" placeholder="Enter your address..."></textarea>
            </div>
            <div class="form-group">
                <label for="pwd">Payment Method</label><br><br>
                <input type="radio" value="cash" name="payment">&nbsp;&nbsp;<span>Online Payment</span><br><br>
                <input type="radio" value="cash" name="payment">&nbsp;&nbsp;<span>EMI Payment</span><br><br>
                <input type="radio" value="cash" name="payment">&nbsp;&nbsp;<span>Payment on Delivery</span><br><br>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>    
</div>
@endsection