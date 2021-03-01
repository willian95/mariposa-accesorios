@extends("layouts.main")

@section("content")

<div class="container mt-5" id="product-detail">
    <div class="row">
        <div class="col-lg-6 mt-4">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ $product->image }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ $product->hover_image }}" class="d-block w-100" alt="...">
                    </div>
                    @foreach($product->secondaryImages as $image)
                        <div class="carousel-item">
                            <img src="{{ $image->image }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <div class="col-lg-6 pt-5">
            
            <h4 class="text-dark mt-4" style="font-weight: bold;">{{ $product->name }}</h4>

            <h4 class="text-dark mt-4" style="font-weight: bold;">$ @{{ number_format(dolarPrice, 0, ",", ".") }}</h4>
            <h4 class="text-dark mt-4" style="font-weight: bold;">Bs. @{{ number_format(price, 0, ",", ".") }}</h4>

            {!! $product->description !!}

            <div class="form-control">
                <label for="">Colores</label>
                <select class="form-select" aria-label="Default select example" v-model="selectedColor" @change="colorChange">
                    <option :value="color.id" v-for="color in colors">@{{ color.color.name }}</option>
                </select>
            </div>

            <div class="add_to_cart_wrapper d-flex">
                <div class="quantity">
                    <label class="screen-reader-text" for="quantity_6012e97f17763">High Waist Denim Shorts quantity</label>
                    <input v-model="amount" type="number" id="quantity_6012e97f17763" class="input-text qty text" step="1" min="1" :max="stock" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" >
                </div>
        
                <button type="button" @click="addToCart()" name="add-to-cart" value="248" class="single_add_to_cart_button button alt" style="height: 3rem; width: 100%;">Añadir al carrito</button>
    
            </div>

        </div>
    </div>

</div>

@endsection

@push("scripts")

    <script>
        const app = new Vue({
            el: '#product-detail',
            data(){
                return{
                    dolarPrice:"",
                    price:"",
                    colors:"",
                    stock:"",
                    amount:1,
                    selectedColor:"{{ $product->productFormats[0]->id }}",
                    dolarToday:"{{ App\Models\DolarToday::first()->price }}"
                }
            },
            methods:{

                number_format(number, decimals, dec_point, thousands_point) {

                    if (number == null || !isFinite(number)) {
                        throw new TypeError("number is not valid");
                    }

                    if (!decimals) {
                        var len = number.toString().split('.').length;
                        decimals = len > 1 ? len : 0;
                    }

                    if (!dec_point) {
                        dec_point = '.';
                    }

                    if (!thousands_point) {
                        thousands_point = ',';
                    }

                    if(this.selectedCurrency == "COP"){
                    decimals = 0
                    }

                    number = parseFloat(number).toFixed(decimals);

                    number = number.replace(".", dec_point);

                    var splitNum = number.split(dec_point);
                    splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
                    number = splitNum.join(dec_point);

                    return number;
                },
                colorChange(){

                    this.colors.forEach((data) => {

                        if(data.id == this.selectedColor){

                            this.setPrice(data.price)
                            this.setStock(data.stock)

                        }

                    })

                },
                setPrice(price){
                    this.dolarPrice = price
                    this.price = price * this.dolarToday
                },
                setStock(stock){
                    this.amount = 1
                    this.stock = stock
                },
                addToCart(){

                    var cart = window.localStorage.getItem("mariposa_cart")

                    if(cart == null){

                        cart = [{"product_format_id": this.selectedColor, "amount": this.amount}]
                        window.localStorage.setItem("mariposa_cart", JSON.stringify(cart))
                    }else{

                        var exists = false
                        var belowStock = true

                        cart = JSON.parse(cart)
                        cart.forEach((data, index) => {

                            if(data.product_format_id == this.selectedColor){
                                exists = true

                                if((parseInt(cart[index].amount) + this.amount) <= this.stock){
                                    cart[index].amount = parseInt(cart[index].amount) + parseInt(this.amount) 
                                }else{
                                    belowStock = false
                                    swal({
                                        text:"Disculpe, el añadir esta cantidad superaría nuestro stock",
                                        icon:"warning"
                                    })


                                }
                                
                            }

                        })

                        if(belowStock == true){
                            if(exists == false){
                                cart.push({"product_format_id": this.selectedColor, "amount": this.amount})
                            }

                            window.localStorage.setItem("mariposa_cart", JSON.stringify(cart))

                            swal({
                                text:"Producto añadido al carrito",
                                icon:"success"
                            })
                        }

                    }

                }

            },
            mounted(){

                this.price = "{{ $product->productFormats[0]->price }}" * this.dolarToday
                this.colors = JSON.parse('{!! $product->productFormats !!}')
                this.stock = "{{ $product->productFormats[0]->stock }}"

            }
        })

    </script>

@endpush