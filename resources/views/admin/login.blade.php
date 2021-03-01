@extends('layouts.admin.login')

@section('content')
    <div class="login_admin " id="dev-login">

        <div class="row">
            <div class="login100-more mask col-md-6"
                style="background-image: url('{{ url('/') }}/img/adminLogin.jpg');">


               <!---- <p>Bienvenido a Aidacaceres CMS</p>--->
            </div>
            <div class="login100-form validate-form col-md-6">

                <p> Mariposa Accesorios </p>


                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" v-model="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                    <small v-if="errors.hasOwnProperty('email')" style="color: red">@{{ errors['email'][0] }}</small>
                </div>


                <div class="wrap-input100 validate-input" style="margin-top: 10px;">
                    <input class="input100" type="password" v-model="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                    <small v-if="errors.hasOwnProperty('password')" style="color: red">@{{ errors['password'][0] }}</small>
                </div>




                <div class="container-login100-form-btn" style="margin-top: 15px;">
                    <button class="login100-form-btn" @click="login()">
                        Entrar
                    </button>
                </div>

            </div>


        </div>

    </div>
@endsection


@push("scripts")

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

const app = new Vue({
    el: '#dev-login',
    data() {
        return {
            email: "",
            password: "",
            errors:[]
        }
    },
    methods: {

        login() {

            axios.post("{{ url('/admin/login') }}", {
                    email: this.email,
                    password: this.password
                })
                .then(res => {

                    if (res.data.success == true) {

                        swal({
                            title: "Excelente!",
                            text: res.data.msg,
                            icon: "success"
                        });
                        this.email = ""
                        this.password = ""

                        if (res.data.role_id == 1)
                            window.location.href = "{{ url('/admin/dashboard') }}"

                    } else {
                       swal({
                           text: res.data.msg,
                           icon: "error"
                       })
                    }

                })
                .catch(err => {

                    this.errors = err.response.data.errors

                })

        }

    }
});
</script>

@endpush