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

                        <tr>
                            <td>
                                <img src="img/product1.jpg" alt="" style="height: 100px;">
                            </td>
                            <td class="pt-4">
                                <p>Producto 1</p>
                            </td>
                            <td class="pt-4">
                                <p>Bs. 2.300.000</p>
                            </td>
                            <td class="pt-2">
                                <div class="add_to_cart_wrapper" style="width: 60px;">
                                    <div class="quantity">
                                        <input type="number" id="quantity_6012e97f17763" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" style="margin-top: 10px;">
                                    </div>
                        
                                </div>
                            </td>
                            <td class="pt-4">
                                <p>Bs. 4.600.000</p>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-8 offset-lg-2">

            <div class="row" v-if="step == 1">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Apellido</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Teléfono</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Dirección</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

            </div>

            <div class="row" v-if="step == 2">
                <div class="col-12">
                    <h3 class="text-center">Elige alguno de nuestros bancos</h3>
                </div>

                <div id="bank-1" class="col-12 mt-3 cardBank" style="cursor:pointer" @click="chooseBank(1)">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h4>Banco de Venezuela</h4>
                                </div>
                                <div class="col-md-6">
                                    <strong>N° Cuenta:</strong> 0102-1234-1234-1234-1234
                                </div>
                                <div class="col-md-6">
                                    <strong>C.I:</strong> V-24.345.123
                                </div>
                                <div class="col-md-6">
                                    <strong>Tel:</strong> 0412-1234523
                                </div>
                                <div class="col-md-6">
                                    <strong>Nombre:</strong> John Doe
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div id="bank-2" class="col-12 mt-3 cardBank" style="cursor:pointer" @click="chooseBank(2)">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h4>Banco Mercantil</h4>
                                </div>
                                <div class="col-md-6">
                                    <strong>N° Cuenta:</strong> 0102-1234-1234-1234-1234
                                </div>
                                <div class="col-md-6">
                                    <strong>C.I:</strong> V-24.345.123
                                </div>
                                <div class="col-md-6">
                                    <strong>Tel:</strong> 0412-1234523
                                </div>
                                <div class="col-md-6">
                                    <strong>Nombre:</strong> John Doe
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div id="bank-3" class="col-12 mt-3 cardBank" style="cursor:pointer" @click="chooseBank(3)">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h4>Banco provincial</h4>
                                </div>
                                <div class="col-md-6">
                                    <strong>N° Cuenta:</strong> 0102-1234-1234-1234-1234
                                </div>
                                <div class="col-md-6">
                                    <strong>C.I:</strong> V-24.345.123
                                </div>
                                <div class="col-md-6">
                                    <strong>Tel:</strong> 0412-1234523
                                </div>
                                <div class="col-md-6">
                                    <strong>Nombre:</strong> John Doe
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>

            <div class="row" v-if="step == 3">
                <div class="col-12">
                    <h3>Colocar este texto como descripción: X45TRE</h3>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Referencia</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <p class="text-right">
                        <button class="btn btn-dark" @click="next()">continuar</button>
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
                    step:1
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

                    let cardBank = document.getElementById("bank-"+id)
                    cardBank.style.background = "red"

                },
                next(){
                    this.step ++;
                },
                previous(){
                    this.step --;
                }

            }
        })

    </script>

@endpush