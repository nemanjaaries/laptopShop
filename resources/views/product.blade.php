@extends('layouts.app')

@section('content')
   
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('landing-page') }}">Home</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('shop.index') }}">Shop</a>
                </li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
        </ol>
    </nav>
        <div class="row mt-5 mb-5">
            <div class="col-md-6">
                <div class="product-img">
                    <img class="card-img-top" src="/product_images/macbook.jpg" alt="Card image cap">
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-info">
                    <h1 class="font-weight-bold">{{$product->name}}</h1>
                    <p class="text-muted">{{$product->details}}</p>
                    <p class="h1 font-weight-bold">{{$product->displayPrice()}}</p>
                    <p>{{$product->description}}</p>
                    {!! Form::open(['route' => 'cart.store']) !!}
                        {{ Form::hidden('id', $product->id) }}
                        {{ Form::hidden('name', $product->name) }}
                        {{ Form::hidden('price', $product->price) }}
                        {{ Form::submit('Add to Cart', ['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @include('includes.favorites')
@endsection