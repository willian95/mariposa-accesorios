@extends("layouts.main")

@section("content")

<div class="container mt-5">
            <div class="row">
                <div class="col-lg-6 mt-4">
                    <img src="img/product1.jpg" alt="" style="width: 100%">
    
                </div>
                <div class="col-lg-6 pt-5">
                    
                    <h4 class="text-dark mt-4" style="font-weight: bold;">High Waist Denim Shorts</h4>

                    <h4 class="text-dark mt-4" style="font-weight: bold;">Bs. 2.300.000</h4>

                    <p>Constructed in cotton sweat fabric, this lovely piece, lacus eu mattis auctor, dolor lectus venenatis nulla, at tristique eros sem vel ante. Sed leo enim, iaculis ornare tristique non, vulputate sit amet ante.</p>

                    <p>Class aptent taciti sociosqu ad litora torquent per conubia. Purchase this product on bershka.com.</p>

                    <div class="add_to_cart_wrapper d-flex">
                        <div class="quantity">
                            <label class="screen-reader-text" for="quantity_6012e97f17763">High Waist Denim Shorts quantity</label>
                            <input type="number" id="quantity_6012e97f17763" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" >
                        </div>
                
                        <button type="submit" name="add-to-cart" value="248" class="single_add_to_cart_button button alt" style="height: 3rem;">Añadir al carrito</button>
            
                    </div>
    
                </div>
            </div>

        </div>

@endsection