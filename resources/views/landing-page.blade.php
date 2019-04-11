@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Ecommerce example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/product_images/macbook.jpg" alt="Card image cap">
                        <div class="card-header text-center font-weight-bold">{{$product->name}}</div>
                        <div class="card-body">
                            <p class="card-text">{{$product->description}}</p>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('shop.show', $product->slug) }}" class="btn btn-outline-secondary btn-block">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
@endsection