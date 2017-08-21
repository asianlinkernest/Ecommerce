@if(count($products) > 0)
    @foreach($products->items() as $product)
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <img src="{{ $product->image->path }}" alt="">
                <div class="caption">
                    <h4 class="pull-right">{{ $product->price }}</h4>
                    <h4>
                        <a href="{{ action('User\ProductsController@show', [$product->title]) }}">{{ $product->title }}</a>
                    </h4>
                    <p>{{ $product->description }}</p>
                </div><!-- /.caption -->
                <add-cart-icon :product_id="'{{ $product->id }}'"
                                @add-to-cart="addToCart"
                               >

                </add-cart-icon>
                <div class="ratings">
                    <p class="pull-right">{{ $product->reviews()->count() }} reviews</p>
                    <review-stars :stars="'{{ round($product->reviews()->avg('stars'), PHP_ROUND_HALF_UP) }}'">

                    </review-stars>
                </div><!-- /.rating -->
            </div><!-- /.thumbnail -->
        </div><!-- /.col -->
    @endforeach
@endif
<div class="row">
    {{ $products->links() }}
</div><!-- /.row -->

