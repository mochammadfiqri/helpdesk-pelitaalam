<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logo-smkpelita-100x100px.ico">

    <title>HELPDESK - PELITA ALAM | Reset Password</title>

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" s
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/f78f9c4cfa.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />

    {{-- Sweet Alert 2 --}}
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <style>
        .colored-toast.swal2-icon-success {
            background-color: #4caf50 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f44335 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #fb8c00 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #03a9f4 !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }
    </style>

    @livewireStyles
</head>

<body class="g-sidenav-show bg-gray-200">
    <main class="main-content mt-0">
        <livewire:auth.index-reset-password>
    </main>

    <!--   JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    @livewireScripts
    <script>
        document.addEventListener('livewire:load', function () {
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
</body>

</html>