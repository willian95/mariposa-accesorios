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

    
    <div class="container">
        <ul class="products columns-3 js_animated row">

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product1.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product2.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product3.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product4.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product1.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product2.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

        
        </ul>
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

            <div class="col-lg-6" style="padding: 0;">
                <div class="category-container">

                    <img src="{{ url('img/category1.jpg') }}" alt="" style="width: 100%;">
                    <h3 class="category-center-text text-light">Categoría 1</h3>

                </div>
            </div>

            <div class="col-lg-6" style="padding: 0;">
                <div class="category-container">

                    <img src="{{ url('img/category2.jpg') }}" alt="" style="width: 100%;">
                    <h3 class="category-center-text text-light">Categoría 2</h3>

                </div>
            </div>

            <div class="col-lg-6" style="padding: 0;">
                <div class="category-container">

                    <img src="{{ url('img/category2.jpg') }}" alt="" style="width: 100%;">
                    <h3 class="category-center-text text-light">Categoría 3</h3>

                </div>
            </div>

            <div class="col-lg-6" style="padding: 0;">
                <div class="category-container">

                    <img src="{{ url('img/category1.jpg') }}" alt="" style="width: 100%;">
                    <h3 class="category-center-text text-light">Categoría 4</h3>

                </div>
            </div>
            
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

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="img/product1.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product2.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product3.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product4.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product1.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product2.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product2.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product2.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product2.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product2.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product2.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

            <li class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
        
                <div class="main-container">
        
                    <div class="product_image_wrapper">
        
                        <div class="product_badges_wrapper black-badge">
                            <span class="getbowtied_new_product">New!</span>			
                        </div>
        
                    
                        <div class="product_image with_second_image second_image_loaded">
                            <a href="{{ url('/product-detail') }}">
                                <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/7134332040_2_1_1-330x413.jpg)"></span>
                                <img width="330" height="413" src="{{ url('img/product2.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                            </a>
                        </div>
        
                    </div>
        
                    <div class="second-container">
                        <div class="product_info">
                            <a href="{{ url('/product-detail') }}" class="title">
                                <h2 class="woocommerce-loop-product__title">Black Sneakers</h2>
                            </a>
                        
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><span class="woocommerce-Price-currencySymbol">$</span>139</bdi>
                                </span>
                            </span>
                                    
                        </div>
        
        
                    </div>
        
                </div>
                
            </li>

        
        </ul>
    </div>

@endsection