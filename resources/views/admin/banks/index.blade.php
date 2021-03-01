@extends("layouts.admin.main")

@section("content")

    <div class="d-flex flex-column-fluid" id="dev-bank">

        <div class="loader-cover-custom" v-if="loading == true">
			<div class="loader-custom"></div>
		</div>

        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Bancos
                    </div>
                    <div class="card-toolbar">

                        <!--begin::Button-->
                        <button href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#bankModal" @click="create()">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Nuevo banco</button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded" id="kt_datatable" style="">
                        <table class="table">
                            <thead>
                                <tr >
                                    <th class="datatable-cell datatable-cell-sort" style="width: 170px;">
                                        <span>Banco</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Cédula</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Titular</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort">
                                        <span>Tipo</span>
                                    </th>

                                    <th class="datatable-cell datatable-cell-sort" style="width: 170px;">
                                        <span>Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="bank in banks">
                                    <td class="datatable-cell">
                                        @{{ bank.bank_name }}
                                    </td>
                                    <td>
                                        @{{ bank.holder_dni }}
                                    </td>
                                    <td>
                                        @{{ bank.holder_name }}
                                    </td>
                                    <td>
                                        <span v-if="bank.type == 'cuenta'">Número de cuenta</span>
                                        <span v-else>Pago móvil</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#bankModal" @click="edit(bank)"><i class="far fa-edit"></i></button>
                                        <button class="btn btn-secondary" @click="erase(category.id)"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                    <!--end: Datatable-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->

        <!-- Modal-->
        <div class="modal fade" id="bankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@{{ modalTitle }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="type">Tipo de cuenta</label>
                            <select name="" id="type" class="form-control" v-model="type">
                                <option value="cuenta">Número de cuenta</option>
                                <option value="pago">Pago móvil</option>
                            </select>
                            <small v-if="errors.hasOwnProperty('type')">@{{ errors['type'][0] }}</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="bankName">Banco</label>
                            <input type="text" class="form-control" id="bankName" v-model="bankName">
                            <small v-if="errors.hasOwnProperty('bankName')">@{{ errors['bankName'][0] }}</small>
                        </div>

                        <div class="form-group">
                            <label for="holderDni">Cédula del titular</label>
                            <input type="text" class="form-control" id="holderDni" v-model="holderDni">
                            <small v-if="errors.hasOwnProperty('holderDni')">@{{ errors['holderDni'][0] }}</small>
                        </div>

                        <div class="form-group">
                            <label for="holderName">Nombre del titular</label>
                            <input type="text" class="form-control" id="holderName" v-model="holderName">
                            <small v-if="errors.hasOwnProperty('holderName')">@{{ errors['holderName'][0] }}</small>
                        </div>

                        <div class="form-group" v-if="type == 'cuenta'">
                            <label for="accountNumber">Número de cuenta</label>
                            <input type="text" class="form-control" id="accountNumber" v-model="accountNumber">
                            <small v-if="errors.hasOwnProperty('accountNumber')">@{{ errors['accountNumber'][0] }}</small>
                        </div>

                        <div class="form-group" v-if="type == 'pago'">
                            <label for="holderPhone">Teléfono</label>
                            <input type="text" class="form-control" id="holderPhone" v-model="holderPhone">
                            <small v-if="errors.hasOwnProperty('holderPhone')">@{{ errors['holderPhone'][0] }}</small>
                        </div>
                    
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary font-weight-bold"  @click="store()" v-if="action == 'create'">Crear</button>
                        <button type="button" class="btn btn-primary font-weight-bold"  @click="update()" v-if="action == 'edit'">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push("scripts")

    <script>
        
        const app = new Vue({
            el: '#dev-bank',
            data(){
                return{
                    modalTitle:"Nuevo banco",
                    bankName:"",
                    accountNumber:"",
                    type:"cuenta",
                    holderDni:"",
                    holderName:"",
                    holderPhone:"",
                    bankId:"",
                    action:"create",
                    banks:[],
                    errors:[],
                    pages:0,
                    page:1,
                    showMenu:false,
                    loading:false
                }
            },
            methods:{
                
                create(){
                    this.action = "create"
                    this.modalTitle = "Nuevo banco"
                    this.bankName = ""
                    this.bankId = ""
                    this.accountNumber = ""
                    this.type = "cuenta"
                    this.holderDni = ""
                    this.holderName = ""
                    this.holderPhone = ""
                },
                store(){

                    this.loading = true
                    axios.post("{{ url('admin/banks/store') }}", {bankName: this.bankName, accountNumber: this.accountNumber, type: this.type, holderDni: this.holderDni, holderName: this.holderName, holderPhone: this.holderPhone})
                    .then(res => {
                        this.loading = false
                        if(res.data.success == true){

                            swal({
                                title: "Perfecto!",
                                text: res.data.msg,
                                icon: "success"
                            });
                            this.create()
                            this.fetch()
                        }else{

                            swal({
                                title: "Lo sentimos!",
                                text: res.data.msg,
                                icon: "error"
                            });

                        }

                    })
                    .catch(err => {
                        this.loading = false
                        this.errors = err.response.data.errors
                        swal({
                            text: "Hay algunos campos que debes revisar",
                            icon: "error"
                        });
                    })

                },
                update(){

                    this.loading = true
                    axios.post("{{ url('admin/banks/update') }}", {id: this.bankId, bankName: this.bankName, accountNumber: this.accountNumber, type: this.type, holderDni: this.holderDni, holderName: this.holderName, holderPhone: this.holderPhone})
                    .then(res => {
                        this.loading = false
                        if(res.data.success == true){

                            swal({
                                title: "Excelente!",
                                text: res.data.msg,
                                icon: "success"
                            });
                            
                            
                            this.create()
                            this.fetch()
                            
                        }else{

                            swal({
                                title: "Lo sentimos!",
                                text: res.data.msg,
                                icon: "error"
                            });

                        }

                    })
                    .catch(err => {
                        this.loading = false
                        this.errors = err.response.data.errors
                        swal({
                            text: "Hay algunos campos que debes revisar",
                            icon: "error"
                        });
                    })

                },
                edit(bank){
                    this.modalTitle = "Editar banco"
                    this.action = "edit"
                    this.bankName = bank.bank_name
                    this.bankId = bank.id
                    this.accountNumber = bank.account_number
                    this.type = bank.type
                    this.holderDni = bank.holder_dni
                    this.holderName = bank.holder_name
                    this.holderPhone = bank.holder_phone

                },
                fetch(page = 1){

                    this.page = page

                    axios.get("{{ url('admin/banks/fetch') }}"+"/"+page)
                    .then(res => {

                        this.banks = res.data.banks
                        this.pages = Math.ceil(res.data.banksCount / res.data.dataAmount)

                    })

                },
                erase(id){
                    
                    swal({
                        title: "¿Estás seguro?",
                        text: "Eliminarás este banco!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            this.loading = true
                            axios.post("{{ url('admin/banks/delete/') }}", {id: id}).then(res => {
                                this.loading = false
                                if(res.data.success == true){
                                    swal({
                                        title: "Genial!",
                                        text: res.data.msg,
                                        icon: "success"
                                    });
                                    this.fetch()
                                }else{

                                    swal({
                                        title: "Lo sentimos!",
                                        text: res.data.msg,
                                        icon: "error"
                                    });

                                }

                            }).catch(err => {
                                this.loading = false
                                $.each(err.response.data.errors, function(key, value){
                                    alert(value)
                                });
                            })

                        }
                    });

                },

                toggleMenu(){

                    if(this.showMenu == false){
                        $("#menu").addClass("show")
                        this.showMenu = true
                    }else{
                        $("#menu").removeClass("show")
                        this.showMenu = false
                    }

                }


            },
            mounted(){
                
                this.fetch()

            }

        })
    
    </script>

@endpush