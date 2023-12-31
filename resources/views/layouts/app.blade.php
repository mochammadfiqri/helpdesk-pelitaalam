<x-layouts.base>
    @auth
        @if (Request::routeIs([
                'dashboard', 
                'users',
                'priority',
                'status',
                'types',
                'category',
                'department',
                'global_setting',
                'knowledge', 
                'main_knowledge',
                'create_knowledge',
                'edit_knowledge',
                'main_ticket', 
                'create_ticket', 
                'edit_ticket', 
                'main_dataset',
                // 'edit_dataset',
                'chatbot-setting',
            ]))
            @include('layouts.sidebars.sidebar')
            <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
                <div class="container-fluid py-1">
                    @include('layouts.navbars.auth.nav')
                    {{ $slot }}
                    @include('layouts.footer')    
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const inputs = document.querySelectorAll('.form-control');
                                    
                                            inputs.forEach(function (input) {
                                                const div = input.parentNode;
                                                const errorElement = div.querySelector('.text-danger');
                                    
                                                // Check initial input value
                                                if (input.value.trim() !== '') {
                                                    div.classList.add('is-filled');
                                                    if (input.checkValidity() && !errorElement) {
                                                        div.classList.add('is-valid');
                                                    }
                                                }
                                    
                                                // Check input on focusout
                                                input.addEventListener('focusout', function () {
                                                    if (input.value.trim() !== '') {
                                                        div.classList.add('is-filled');
                                                        if (input.checkValidity() && !errorElement) {
                                                            div.classList.add('is-valid');
                                                            div.classList.remove('is-invalid');
                                                        } else {
                                                            div.classList.remove('is-valid');
                                                            div.classList.add('is-invalid');
                                                        }
                                                    } else {
                                                        div.classList.remove('is-filled');
                                                        div.classList.remove('is-valid');
                                                        div.classList.remove('is-invalid');
                                                    }
                                                });
                                            });
                                        });
                                    
                                        function focused(input) {
                                            input.parentNode.classList.add('is-focused');
                                        }
                                    
                                        function defocused(input) {
                                            input.parentNode.classList.remove('is-focused');
                                        }
                </script>
                @stack('styleNavs')
                <style>
                    .card-label:active {
                    border-color: #03a9f4;
                    /* Change this to your desired color */
                    }
                    
                    /* Change the color when the link is hovered */
                    .card-label:hover {
                    border-color: #03a9f4;
                    /* Change to the desired color */
                    }
                    
                    /* Change the color of the link text when hovered */
                    .card-label:hover a {
                    color: #03a9f4;
                    /* Change to the desired color */
                    }
                </style>
            </main>
            @include('components.plugins.fixed-plugin')
        @elseif (in_array(request()->route()->getName(),['landing-page','knowledge-page','ticket-page','chatbot','knowledge-post']))
            <body class="index-page bg-gray-200">
                <div class="container position-sticky z-index-sticky top-0">
                    <div class="row">
                        <div class="col-12">
                            @include('layouts.navbars.guest.nav')
                        </div>
                    </div>
                </div>
                {{ $slot }}
                {{-- <script type="text/javascript" id="helplook-sdk" src="https://sdk.helplook.net/pro/hlSdk.js?id=xva2ii"></script> --}}
                {{-- <iframe width="350" height="430" allow="microphone;"
                    src="https://console.dialogflow.com/api-client/demo/embedded/3ca582aa-e105-4cba-9534-5e6bd9adcd3f"></iframe> --}}
            </body>
        @endif
    @endauth

    @guest
        @if (Request::routeIs(['landing-page','knowledge-page','ticket-page','chatbot','knowledge-post']))
        <body class="index-page bg-gray-200">
            <div class="container position-sticky z-index-sticky top-0">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.navbars.guest.nav')
                    </div>
                </div>
            </div>
            {{ $slot }}
            <style>
                .card-label:active {
                    border-color: #03a9f4;
                    /* Change this to your desired color */
                }
            
                /* Change the color when the link is hovered */
                .card-label:hover {
                    border-color: #03a9f4;
                    /* Change to the desired color */
                }
            
                /* Change the color of the link text when hovered */
                .card-label:hover a {
                    color: #03a9f4;
                    /* Change to the desired color */
                }
            </style>
            {{-- <script type="text/javascript" id="helplook-sdk" src="https://sdk.helplook.net/pro/hlSdk.js?id=xva2ii"></script> --}}
            {{-- <iframe width="350" height="430" allow="microphone;"
                src="https://console.dialogflow.com/api-client/demo/embedded/3ca582aa-e105-4cba-9534-5e6bd9adcd3f"></iframe> --}}
            {{-- <livewire:botman.chatbot-messenger> --}}
        </body>
        @elseif (in_array(request()->route()->getName(),['login','register']))
            <main class="main-content mt-0">
                {{ $slot }}
                <script>
                    const passwordInput = document.getElementById('password');
                        const showPasswordCheckbox = document.getElementById('showpassword');
                    
                        showPasswordCheckbox.addEventListener('change', function() {
                            if (this.checked) {
                                passwordInput.type = 'text';
                            } else {
                                passwordInput.type = 'password';
                            }
                        });
                </script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                            const inputs = document.querySelectorAll('.form-control');
                    
                            inputs.forEach(function (input) {
                                const div = input.parentNode;
                                const errorElement = div.querySelector('.text-danger');
                    
                                // Check initial input value
                                if (input.value.trim() !== '') {
                                    div.classList.add('is-filled');
                                    if (input.checkValidity() && !errorElement) {
                                        div.classList.add('is-valid');
                                    }
                                }
                    
                                // Check input on focusout
                                input.addEventListener('focusout', function () {
                                    if (input.value.trim() !== '') {
                                        div.classList.add('is-filled');
                                        if (input.checkValidity() && !errorElement) {
                                            div.classList.add('is-valid');
                                            div.classList.remove('is-invalid');
                                        } else {
                                            div.classList.remove('is-valid');
                                            div.classList.add('is-invalid');
                                        }
                                    } else {
                                        div.classList.remove('is-filled');
                                        div.classList.remove('is-valid');
                                        div.classList.remove('is-invalid');
                                    }
                                });
                            });
                        });
                    
                        function focused(input) {
                            input.parentNode.classList.add('is-focused');
                        }
                    
                        function defocused(input) {
                            input.parentNode.classList.remove('is-focused');
                        }
                </script>
            </main>
        @endif
    @endguest


</x-layouts.base>