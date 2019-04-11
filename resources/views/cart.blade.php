@extends('layouts.app')

@section('content')
   
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('landing-page') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Shoping Cart</li>
        </ol>
    </nav>
    <div class="cart clearfix">
        @if(count($cartContent) > 0)
            <p class="h3 font-weight-bold">{{ Cart::instance('cart')->count() }} item(s) in Shopping Cart</p>
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:20%" class="text-center">Subtotal</th>
                    <th style="width:12%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartContent as $product)
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-4 hidden-xs"><img src="/product_images/macbook.jpg" alt="..." width="150" height="120" class="img-responsive"/></div>
                                <div class="col-sm-8">
                                    <h4 class="nomargin">{{$product->name}}</h4>
                                    <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{$product->model->displayPrice()}}</td>
                        <td data-th="Quantity">
                            <select name="quantity" class="quantity form-control form-control-sm" data-id="{{$product->rowId}}">
                                @for($i=1; $i<=5; $i++)
                                    <option {{ $product->qty == $i? 'selected': '' }}>{{$i}}</option>
                                @endfor
                            </select>
                        </td>
                        <td data-th="Subtotal" class="text-center">{{displayAmount($product->price * $product->qty)}}</td>
                        <td class="actions" data-th="">
                            
                            {!! Form::open(['route' => ['cart.switchToSaveForLater', $product->rowId], 'method' => 'post']) !!}
                                {{ Form::submit('Safe', ['class' => 'btn btn-info btn-sm'])}}
                            {!! Form::close() !!}

                            {!! Form::open(['route' => ['cart.destroy', $product->rowId]]) !!}
                                {{ Form::hidden('_method', 'DELETE')}}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                            {!! Form::close() !!}
                            				
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="code">
            <p class="m-1">Have a code?</p>
            <form class="card p-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Apply</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row no-gutters p-3 mt-3 mb-2 bg-gray">
            <div class="col-md-8">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora perspiciatis fugit molestiae ad quidem esse sequi rem ducimus numquam blanditiis.</p>
            </div>
            <div class="col-md-3 col-sm-6 text-right">
                <p class="m-1">Subtotal</p>
                <p class="m-1">Tax</p>
                <p class="m-1 font-weight-bold">Total</p>
            </div>
            <div class="col-md-1 col-sm-6 text-right">
                <p class="m-1">{{displayAmount($cartSubtotal)}}</p>
                <p class="m-1">{{displayAmount($cartTax)}}</p>
                <p class="m-1 font-weight-bold">{{displayAmount($cartTotal)}}</p>
            </div>
        </div>

        <div class="clearfix">
            <a href="{{ route('shop.index') }}" class="btn btn-warning float-left">Continue Shopping</a>
            <a href="/checkout" class="btn btn-success float-right"><i class="fa fa-angle-left"></i> Proceead to Checkout</a>
        </div>

        @else
            <p class="h3">Your cart is empty</p>
            <a href="{{ route('shop.index') }}" class="btn btn-warning float-left">Continue Shopping</a>
        @endif
    </div>
    <div class="space"></div>
    <div class="saveForLater">
        @if(count($saveForLater) > 0)
            <p class="h3 font-weight-bold">{{count($saveForLater)}} item(s) in Save for later</p>
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:32%">Price</th>
                        <th style="width:18%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($saveForLater as $product)
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-4 hidden-xs"><img src="/product_images/macbook.jpg" alt="..." width="150" height="120" class="img-responsive"/></div>
                                    <div class="col-sm-8">
                                        <h4 class="nomargin">{{$product->name}}</h4>
                                        <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{$product->model->displayPrice()}}</td>
                            <td class="actions" data-th="">
                                {!! Form::open(['route' => ['saveForLater.switchToCart', $product->rowId], 'method' => 'post']) !!}
                                    {{ Form::submit('Add to cart', ['class' => 'btn btn-info btn-sm'])}}
                                {!! Form::close() !!}
    
                                {!! Form::open(['route' => ['saveForLater.destroy', $product->rowId]]) !!}
                                        {{ Form::hidden('_method', 'DELETE')}}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                {!! Form::close() !!}								
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @include('includes.favorites')
@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity');
            Array.from(classname).forEach(function(element){
                element.addEventListener('change', function(){
                   
                   const id = element.getAttribute('data-id');
                    
                    axios.patch('/cart/'+id, {
                    quantity: this.value
                })
                .then(function (response) {
                    console.log(response);
                    window.location.href = '{{ route('cart.index') }}';
                })
                .catch(function (error) {
                    console.log(error);
                    window.location.href = '{{ route('cart.index') }}';
                });


                });
            });
            
        })();
    </script>
@endsection