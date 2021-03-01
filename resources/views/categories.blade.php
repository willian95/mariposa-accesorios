@extends("layouts.main")

@section("content")


    
    <div id="dev-categories">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <h2 class="text-center">{{ $category->name }}</h2>
                </div>
            </div>
            <ul class="products columns-4 js_animated row">

                <li v-for="product in products" class="col-lg-4 product type-product post-234 status-publish first instock product_cat-junior product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
            
                    <div class="main-container">
            
                        <div class="product_image_wrapper">
            
                        
                            <div class="product_image with_second_image second_image_loaded">
                                <a :href="'{{ url('/product-detail/') }}'+'/'+product.slug">
                                    <span class="product_second_image" :style="'background-image:url('+product.hover_image+')'"></span>
                                    <img width="330" height="413" :src="product.image" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">				
                                </a>
                            </div>
            
                        </div>
            
                        <div class="second-container">
                            <div class="product_info">
                                <a :href="'{{ url('/product-detail/') }}'+'/'+product.slug" class="title">
                                    <h2 class="woocommerce-loop-product__title">@{{ product.name }}</h2>
                                </a>
                            
                                <span class="price">
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi><span class="woocommerce-Price-currencySymbol">Bs.</span>@{{ number_format(product.product_formats[0].price * dolarToday, 0, ",", ".") }}</bdi>
                                    </span>
                                </span>
                                        
                            </div>
            
                        </div>
            
                    </div>
                    
                </li>
            
            </ul>


            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="kt_datatable_info" role="status" aria-live="polite">Mostrando página @{{ page }} de @{{ pages }}</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_full_numbers" id="kt_datatable_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="kt_datatable_previous" v-if="page > 1">
                                <a href="#" aria-controls="kt_datatable" data-dt-idx="1" tabindex="0" class="page-link">
                                    <i class="ki ki-arrow-back"></i>
                                </a>
                            </li>
                            <li class="paginate_button page-item active" v-for="index in pages">
                                <a href="#" aria-controls="kt_datatable" tabindex="0" class="page-link":key="index" @click="fetch(index)" >@{{ index }}</a>
                            </li>
                            
                            <li class="paginate_button page-item next" id="kt_datatable_next" v-if="page < pages" href="#">
                                <a href="#" aria-controls="kt_datatable" data-dt-idx="7" tabindex="0" class="page-link" @click="fetch(page + 6)">
                                    <i class="ki ki-arrow-next"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push("scripts")

    <script>
        
        const app = new Vue({
            el: '#dev-categories',
            data(){
                return{
                    categgoryId:"{{ $category->id }}",
                    products:[],
                    dolarToday:"{{ App\Models\DolarToday::first()->price }}",
                    pages:0,
                    page:1
                }
            },
            methods:{
                
                fetch(page = 1){

                    this.page = page

                    axios.get("{{ url('/categories/fetch/products/') }}"+"/"+this.categgoryId+"/"+this.page)
                    .then(res => {

                        this.products = res.data.products
                        this.pages = Math.ceil(res.data.productsCount / res.data.dataAmount)

                    })

                },
                number_format(number, decimals, dec_point, thousands_point) {

                    console.log("number", number)

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


            },
            mounted(){
                
                this.fetch()

            }

        })
    
    </script>

@endpush