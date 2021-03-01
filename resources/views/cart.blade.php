@extends("layouts.main")

@section("content")

    <div class="container mt-5" id="cart">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th></th>
                                <th style="width: 150px;">Precio</th>
                                <th style="width: 150px;">Cantidad</th>
                                <th style="width: 150px;">Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(product, index) in products">
                                <td>
                                    <img :src="product.product.image" alt="" style="height: 100px;">
                                </td>
                                <td class="pt-4">
                                    <p>@{{ product.product.name }}</p>
                                </td>
                                <td class="pt-4">
                                    <p>@{{ showPrice(product.format.price) }}</p>
                                </td>
                                <td class="pt-2">
                                    <div class="add_to_cart_wrapper" style="width: 60px;">
                                        <div class="quantity">
                                            <input type="number" :id="'amount-'+product.format.id" class="input-text qty text" step="1" min="1" :max="product.format.stock" name="quantity" @change="changeAmount(product.format.id)" :value="product.amount" title="Qty" size="4" placeholder="" inputmode="numeric" style="margin-top: 10px;">
                                        </div>
                            
                                    </div>
                                </td>
                                <td class="pt-4">
                                    <p>Bs. @{{ showPrice(product.format.price * product.amount) }}</p>
                                </td>
                                <td class="pt-4">
                                    <button class="btn btn-secondary" @click="remove(product.format.id)">
                                        X
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>
            <div class="col-lg-4 offset-lg-8 col-md-4 offset-md-8">

                <h4><span class="text-dark">Total:</span> Bs. @{{ showPrice(total) }}</h4>

                <a v-if="totla == 0" class="btn btn-dark" style="border-radius: 0px;" href="{{ url('/checkout') }}">
                    Pagar
                </a>

                <a v-else class="btn btn-dark" style="border-radius: 0px;" href="#">
                    Pagar
                </a>
            </div>
        </div>

    </div>
    

@endsection

@push("scripts")

    <script>
        const app = new Vue({
            el: '#cart',
            data(){
                return{
                    rawProducts:[],
                    products:[],
                    dolarToday:"{{ App\Models\DolarToday::first()->price }}",
                    total:0
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
                getProducts(){
                    this.total = 0
                    this.rawProducts = JSON.parse(window.localStorage.getItem("mariposa_cart"));
                    axios.post("{{ url('/cart/products/fetch') }}", {rawProducts: this.rawProducts}).then(res => {
                        this.products = res.data.products

                        this.products.forEach((data)=>{
                            this.total += data.format.price * data.amount
                        })

                    })

                },
                showPrice(price){

                    return this.number_format(price * this.dolarToday, 0, ",", ".");

                },
                changeAmount(format_id){

                    let amount = $("#amount-"+format_id).val()

                    var cart = window.localStorage.getItem("mariposa_cart")
                    cart = JSON.parse(cart)
                    cart.forEach((data, index) => {

                        if(data.product_format_id == format_id){
                            cart[index].amount = amount
                        }

                    })

                    window.localStorage.setItem("mariposa_cart", JSON.stringify(cart))
                    this.getProducts()
                },
                remove(format_id){

                    var cart = window.localStorage.getItem("mariposa_cart")
                    cart = JSON.parse(cart)
                    
                    let newCart = cart.filter(cart => {
                        return parseInt(cart.product_format_id) !== parseInt(format_id)
                    })


                    window.localStorage.setItem("mariposa_cart", JSON.stringify(newCart))
                    this.getProducts()

                }



            },
            mounted(){
                
                this.getProducts()
            }
        })

    </script>

@endpush