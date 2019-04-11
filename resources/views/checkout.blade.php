@extends('layouts.app')

@section('content')
   
<div class="row pt-5">
    <div class="col-md-5 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div class="clearfix">
                    <div class="float-left">
                        <img src="/product_images/macbook.jpg" width="80" height="70" alt="img"/>
                    </div>
                    <div class="float-left ml-3">
                        <p class="font-weight-bold mb-0">Macbook</p>
                        <p class="text-muted mb-0">15inch, 1TB SSD, 16GB RAM</p>
                        <p class="mb-0">$15000.00</p>
                    </div>
                    <div class="float-left">
                        
                    </div>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div class="clearfix">
                    <div class="float-left">
                        <img src="/product_images/macbook.jpg" width="80" height="70" alt="img"/>
                    </div>
                    <div class="float-left ml-3">
                        <p class="font-weight-bold mb-0">Macbook</p>
                        <p class="text-muted mb-0">15inch, 1TB SSD, 16GB RAM</p>
                        <p class="mb-0">$15000.00</p>
                    </div>
                    <div class="float-left">
                        
                    </div>
                </div> 
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                    <h6 class="my-0">Promo code</h6>
                    <small>EXAMPLECODE</small>
                </div>
                <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex">
                <table class="table table-borderless mb-0">
                    <tbody>
                        <tr>
                            <td class="p-1">Subtotal</td>
                            <td class="text-right p-1">1400.00</td>
                        </tr>
                        <tr>
                            <td class="p-1">Tax</td>
                            <td class="text-right p-1">195.00</td>
                        </tr>
                        <tr>
                            <th class="p-1">Total</th>
                            <th class="text-right p-1">1595.00</th>
                        </tr>
                    </tbody>
                </table>
            </li>
        </ul>

    </div>
    <div class="col-md-7 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate="">
 
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
            </div>
        </div>
        <div class="mb-3">
            <label for="email">Name</label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
            </div>
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
            <div class="invalid-feedback">
            Please enter your shipping address.
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="col-md-6 mb-3">
                <label for="province">Province</label>
                <input type="text" class="form-control" id="province" name="province">
            </div>
            <div class="col-md-6 mb-3">
                <label for="postal">Postal Code</label>
                <input type="text" class="form-control" id="postal" name="postal">
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
        </div>

        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                    Name on card is required
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                <div class="invalid-feedback">
                    Credit card number is required
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                <div class="invalid-feedback">
                    Security code required
                </div>
            </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
    </div>
</div>

@endsection