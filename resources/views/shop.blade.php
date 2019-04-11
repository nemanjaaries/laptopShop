@extends('layouts.app')

@section('content')
   
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('landing-page') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
    </nav>
    
    <div class="album py-5 bg-light clearfix">
        <div class="side-bar float-left">
            <ul class="category-list">
                <li class="list-group-item category-item"><p class="h5 font-weight-bold">Categories</p></li>
                @foreach($categories as $category)
                    <li class="list-group-item category-item">
                        <a class="item-link {{ setCategoryActive($category->slug) }}" href="{{ route('shop.index', ['category' => $category->slug]) }}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="row">
            <div class="col-12 clearfix">
                <p class="h3 font-weight-bold float-left">{{$categoryName}}</p>
                <p class="float-right">
                    <strong>Price:</strong>
                    <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'high_low'])}}">Hight to Low</a>|
                    <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'low_high'])}}">Low to Hight</a>
                </p>
            </div>       
            @forelse($products as $product)
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/product_images/macbook.jpg" alt="Card image cap">
                        <div class="card-header text-center font-weight-bold">{{$product->name}}</div>
                        <div class="card-header text-center font-weight-bold">{{$product->displayPrice()}}</div>
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
            @empty
                <div class="col-12">No items found</div>
            @endforelse
            <div class="col-12">{{$products->appends(request()->input())->links()}}</div>
        </div>
        
    </div>
@endsection