<div class="favorites">
    <p class="h1 pt-3 pb-3">You might also like...</p>
    <div class="row">
        @foreach($maybeYouAlsoLike as $product)
            <div class="col-md-3">
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