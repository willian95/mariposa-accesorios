@extends("layouts.main")

@section("content")

    <div class="container mt-5">
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
            <div class="col-lg-4 offset-lg-8 col-md-4 offset-md-8">

                <h4><span class="text-dark">Total:</span> Bs. 4.200.000</h4>

                <a class="btn btn-dark" style="border-radius: 0px;" href="{{ url('/checkout') }}">
                    Pagar
                </a>
            </div>
        </div>

    </div>
    

@endsection