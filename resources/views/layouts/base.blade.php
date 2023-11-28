<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link rel="preconnect" href="https://9T5VNL71TX.algolia.net" crossorigin />
    <title>
        HELPDESK - PELITA ALAM
    </title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
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

    {{-- ckeditor5 --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    {{-- <script src="../assets/ckeditor5/ckeditor.js"></script>
    <script src="../assets/ckeditor5/translations/id.js"></script> --}}

    {{-- docseacrh --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    {{-- instantsearch.js --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@8.1.0/themes/reset-min.css"
      integrity="sha256-2AeJLzExpZvqLUxMfcs+4DWcMwNfpnjUeAAvEtPr0wU=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@8.1.0/themes/satellite-min.css"
      integrity="sha256-p/rGN4RGy6EDumyxF9t7LKxWGg6/MZfGhJM/asKkqvA=" crossorigin="anonymous"> --}}

    {{-- autocomplete.js --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-theme-classic" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docs-searchbar.js@latest/dist/cdn/docs-searchbar.min.css" />
    @livewireStyles
</head>

<body class="g-sidenav-show bg-gray-200">
    {{ $slot }}
    @livewireScripts

    <!--   Core JS Files   -->
    {{-- <script src="../assets/js/plugins/chartjs.min.js"></script> --}}
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script> 
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
          var options = {
            damping: '0.5'
          }
          Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    @stack('scriptDashboard')
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>

    {{-- Sweet Alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script>
      // Menyiapkan SweetAlert2 Toast sesuai dengan definisi Anda
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3500,
              timerProgressBar: true,
              showCloseButton: true,
              heightAuto: true,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
            })
    
            // Menampilkan SweetAlert2 Toast berdasarkan jenis pesan
            document.addEventListener("DOMContentLoaded", function() {
                @if (session('toast_type'))
                    Toast.fire({
                        icon: '{{ session('toast_type') }}',
                        title: '{{ session('toast_message') }}'
                    });
                @endif
            });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3"></script>

    {{-- instantsearch.js --}}
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.20.0/dist/algoliasearch-lite.umd.js"
      integrity="sha256-DABVk+hYj0mdUzo+7ViJC6cwLahQIejFvC+my2M/wfM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.60.0/dist/instantsearch.production.min.js"
      integrity="sha256-9242vN47QUX50UG5Gf5XDO1YREWCEJRyXHofh5fsl24=" crossorigin="anonymous"></script>

    {{-- autocomplete.js --}}
    <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js"></script>
    <script>
      const { autocomplete } = window['@algolia/autocomplete-js'];
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-plugin-query-suggestions"></script>
    <script>
      const { createQuerySuggestionsPlugin } = window[
        '@algolia/autocomplete-plugin-query-suggestions'
      ];
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-plugin-recent-searches"></script>
    <script>
      const { createRecentSearchesPlugin } = window[
        '@algolia/autocomplete-plugin-recent-searches'
      ];
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/docs-searchbar.js@latest/dist/cdn/docs-searchbar.min.js"></script> --}}
</body>

</html>