@extends('../layout/' . $layout)

@section('head')
    <title>Login MAB</title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">

                    <span class="text-white text-lg ml-3">
                        MINI ABASTOS SA de CV
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Icewall Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/logo.png') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10 px-8 mx-6">MABKPI'S</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">INICIAR SESIÓN</h2>

                    <div class="intro-x mt-8">
                        <form id="login-form">
                            <input id="name" type="text" class="intro-x login__input form-control py-3 px-4 block" placeholder="Usuario" style="text-transform: uppercase;" >
                            <div id="error-name" class="login__input-error text-danger mt-2"></div>
                            <input id="password" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Contraseña" style="text-transform: uppercase;">
                            <div id="error-password" class="login__input-error text-danger mt-2"></div>
                        </form>
                    </div>
                    <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                        <div class="flex items-center mr-auto">
                            <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                            <label class="cursor-pointer select-none" for="remember-me">Recuerdame</label>
                        </div>
                        
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button id="btn-login" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Iniciar</button>

                    </div>
                    
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        (function () {
            async function login() {
                // Reset state
                $('#login-form').find('.login__input').removeClass('border-danger')
                $('#login-form').find('.login__input-error').html('')

                // Post form
                let name = $('#name').val()
                let password = $('#password').val()

                // Loading state
                $('#btn-login').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>')
                tailwind.svgLoader()
                await helper.delay(1500)

                axios.post(`login`, {
                    name: name,
                    password: password
                }).then(res => {
                    location.href = '/mabkpi/'
                }).catch(err => {
                    $('#btn-login').html('Login')
                    if (err.response.data.message != 'Usuario y/o contraseña incorrecta.') {
                        for (const [key, val] of Object.entries(err.response.data.errors)) {
                            $(`#${key}`).addClass('border-danger')
                            $(`#error-${key}`).html("Ingrese una contraseña y/o usuario")
                        }
                    } else {
                        $(`#password`).addClass('border-danger')
                        $(`#error-password`).html("Ingrese una contraseña")
                    }
                })
            }

            $('#login-form').on('keyup', function(e) {
                if (e.keyCode === 13) {
                    login()
                }
            })

            $('#btn-login').on('click', function() {
                login()
            })
        })()
    </script>
@endsection
