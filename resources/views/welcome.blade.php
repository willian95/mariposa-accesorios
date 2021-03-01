@extends("layouts.main")

@section("content")

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('img/slider1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ url('img/slider2.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    <div class="container">
        <div class="row py-5">

            <div class="col-12">

                <h3 class="text-center text-dark" style="font-weight: bolder;">Productos destacados</h3>
                <h5 class="text-center">Add our new arrivals to your weekly lineup</h5>

            </div>

        </div>

    </div>

    
    <div>
        <div class="container">
            <ul class="products columns-3 js_animated row">

                @foreach(App\Models\Product::with("productFormats")->where("is_highlighted", "1")->get() as $product)

                    @php
                        
                        $price = $product->productFormats[0]->price * App\Models\DolarToday::first()->price;

                    @endphp

                    <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
                
                        <div class="main-container">
                
                            <div class="product_image_wrapper">
                
                            
                                <div class="product_image with_second_image second_image_loaded">
                                    <a href="{{ url('/product-detail/'.$product->slug) }}">
                                        <span class="product_second_image" style="background-image:url({{$product->hover_image}})"></span>
                                        <img width="330" height="413" src="{{ $product->image }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                                    </a>
                                </div>
                
                            </div>
                
                            <div class="second-container">
                                <div class="product_info">
                                    <a href="{{ url('/product-detail/'.$product->slug) }}" class="title">
                                        <h2 class="woocommerce-loop-product__title">{{ $product->name }}</h2>
                                    </a>
                                
                                    <span class="price">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">Bs.</span>{{ number_format($price, 0, ",", ".") }}</bdi>
                                        </span>
                                    </span>
                                            
                                </div>
                
                            </div>
                
                        </div>
                        
                    </li>

                @endforeach

            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row py-5">

            <div class="col-12">

                <h3 class="text-center text-dark" style="font-weight: bolder;">Categorías</h3>

            </div>

        </div>

    </div>

    <div class="container">
        <div class="row">

            @foreach(App\Models\Category::all() as $category)

                <div class="col-lg-6" style="padding: 0;">
                    <a href="{{ url('/categories/products/'.$category->slug) }}">
                    
                        <div class="category-container">

                            <img src="{{ $category->image }}" alt="" style="width: 100%;">
                            <h3 class="category-center-text text-light">{{ $category->name }}</h3>

                        </div>
                    </a>
                </div>

            @endforeach
            
        </div>
    </div>

    <div class="container">
        <div class="row py-5">

            <div class="col-12">

                <h3 class="text-center text-dark" style="font-weight: bolder;">Nuestro productos</h3>

            </div>

        </div>

    </div>

    <div class="container">
        <ul class="products columns-4 js_animated row">


            @foreach(App\Models\Product::with("productFormats")->take(16)->inRandomOrder()->get() as $product)

                @php
                    
                    $price = $product->productFormats[0]->price * App\Models\DolarToday::first()->price;

                @endphp

                <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">

                    <div class="main-container">

                        <div class="product_image_wrapper">

                        
                            <div class="product_image with_second_image second_image_loaded">
                                <a href="{{ url('/product-detail/'.$product->slug) }}">
                                    <span class="product_second_image" style="background-image:url({{$product->hover_image}})"></span>
                                    <img width="330" height="413" src="{{ $product->image }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                                </a>
                            </div>

                        </div>

                        <div class="second-container">
                            <div class="product_info">
                                <a href="{{ url('/product-detail/'.$product->slug) }}" class="title">
                                    <h2 class="woocommerce-loop-product__title">{{ $product->name }}</h2>
                                </a>
                            
                                <span class="price">
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi><span class="woocommerce-Price-currencySymbol">Bs.</span>{{ number_format($price, 0, ",", ".") }}</bdi>
                                    </span>
                                </span>
                                        
                            </div>

                        </div>

                    </div>
                    
                </li>

                @endforeach

        </ul>
    </div>

@endsection

