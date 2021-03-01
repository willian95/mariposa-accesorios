@extends("layouts.main")

@section("content")

<div class="container mt-5" id="checkout">
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
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="product in products">
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
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-8 offset-lg-2">

            <div class="row" v-show="step == 1">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" v-model="buyerName">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Apellido</label>
                        <input type="text" class="form-control" v-model="buyerLastname">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Teléfono</label>
                        <input type="text" class="form-control" v-model="buyerPhone">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" v-model="buyerEmail"> 
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Dirección</label>
                        <input type="text" class="form-control" v-model="buyerAddress">
                    </div>
                </div>

            </div>

            <div class="row" v-show="step == 2">
                <div class="col-12">
                    <h3 class="text-center">Elige alguno de nuestros bancos</h3>
                </div>


                <div :id="'bank-'+bank.id" class="col-12 mt-3 cardBank" style="cursor:pointer" @click="chooseBank(bank.id)" v-for="(bank, index) in banks">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h4>@{{ bank.bank_name }}</h4>
                                    <p style="margin-top: -22px;" v-if="bank.type == 'cuenta'">Transferencia</p>
                                    <p style="margin-top: -22px;" v-if="bank.type == 'pago'">Pago móvil</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Nombre:</strong> @{{ bank.holder_name }}
                                </div>
                                <div class="col-md-6" v-if="bank.type == 'pago'">
                                    <strong>Tel:</strong> @{{ bank.holder_phone }}
                                </div>
                                <div class="col-md-6" v-if="bank.type == 'cuenta'">
                                    <strong>N° Cuenta:</strong> @{{ bank.account_number }}
                                </div>
                                <div class="col-md-6">
                                    <strong>C.I:</strong> @{{ bank.holder_dni }}
                                </div>
                                
                                
                            </div>
                            
                        </div>
                    </div>
                </div>


            </div>

            <div class="row" v-show="step == 3">

                <div class="col-lg-12">
                    <h3>Relice una transferencia o pago móvil, luego ingrese la referencia bancaria emitida por su banco</h3>
                    <div class="form-group">
                        <label for="name">Referencia bancaria</label>
                        <input type="text" class="form-control" v-model="bankReference">
                    </div>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-6" >
                    <p class="text-left">
                        <button v-show="step > 1" class="btn btn-dark" @click="previous()" style="width: 120px;">atrás</button>
                    </p>
                </div>
                <div class="col-6">
                    <p class="text-right">
                        <button class="btn btn-dark" @click="next()" style="width: 120px;">continuar</button>
                    </p>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection

@push("scripts")

    <script>
        const app = new Vue({
            el: '#checkout',
            data(){
                return{
                    step:1,
                    rawProducts:[],
                    products:[],
                    dolarToday:"{{ App\Models\DolarToday::first()->price }}",
                    banks:[],
                    total:0,

                    buyerName:"",
                    buyerLastname:"",
                    buyerPhone:"",
                    buyerEmail:"",
                    buyerAddress:"",

                    selectedBank:"",

                    bankReference:""

                }
            },
            methods:{

                deselectBanks(){
                    let cardBanks = document.getElementsByClassName("cardBank")
                    
                    
                    
                    for (var i = 0; i < cardBanks.length; i++) {

                        let card = cardBanks[i]
                        card.style.background = "white"

                    }
                },
                chooseBank(id){
                
                    this.deselectBanks()
                    this.selectedBank = id
                    let cardBank = document.getElementById("bank-"+id)
                    cardBank.style.background = "red"

                },
                next(){

                    if(this.step == 1 && this.checkPersonalInfo()){
                        this.step ++;
                    }

                    else if(this.step == 2){
                        if(this.checkBank())
                            this.step ++;
                    }

                    else if(this.step == 3){
                        if(this.checkReference())
                            this.checkout()

                    }


                    
                },
                previous(){
                    this.step --;
                },
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
                getBanks(){

                    axios.get("{{ url('/bank/all') }}").then(res => {

                        this.banks = res.data.banks

                    })

                },
                checkPersonalInfo(){

                    if(this.buyerName == ""){

                        swal({
                            text:"Nombre es requerido",
                            icon: "warning"
                        })

                        return false

                    }else if(this.buyerLastname == ""){

                        swal({
                            text:"Apellido es requerido",
                            icon: "warning"
                        })

                        return false

                    }else if(this.buyerPhone == ""){

                        swal({
                            text:"Teléfono es requerido",
                            icon: "warning"
                        })

                        return false

                    }else if(this.buyerEmail == ""){

                        swal({
                            text:"Email es requerido",
                            icon: "warning"
                        })

                        return false

                    }else if(this.buyerAddress == ""){

                        swal({
                            text:"Dirección es requerida",
                            icon: "warning"
                        })

                        return false

                    }

                    return true

                },
                checkBank(){

                    if(this.selectedBank == ""){

                        swal({
                            text:"Debes seleccionar un banco",
                            icon: "warning"
                        })

                        return false

                    }

                    return true

                },
                checkReference(){
               
                    if(this.bankReference == ""){
                        swal({
                            text:"Debes agregar la referencia bancaria",
                            icon: "warning"
                        })

                        return false
                    }

                    return true

                },
                checkout(){
                    alert("hey2")
                    axios.post("{{ url('/purchase') }}", {total: this.total, bank_id: this.selectedBank, buyerName: this.buyerName, buyerLastname: this.buyerLastname, buyerPhone: this.buyerPhone, buyerEmail: this.buyerEmail, buyerAddress: this.buyerAddress, bankReference: this.bankReference, products: this.products}).then(res => {

                        if(res.data.success == true){

                            swal({
                                text:res.data.msg,
                                icon: "success"
                            }).then((action) => {

                                window.location.href="{{ url('/') }}"

                            })

                        }else{

                            swal({
                                text:res.data.msg,
                                icon: "error"
                            })

                        }

                    })

                }

            },
            mounted(){
                this.getProducts()
                this.getBanks()
            }
        })

    </script>

@endpush