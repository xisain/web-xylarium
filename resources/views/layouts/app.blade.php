<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('heading') | {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.6/css/perfect-scrollbar.css"
        integrity="sha512-2xznCEl5y5T5huJ2hCmwhvVtIGVF1j/aNUEJwi/BzpWPKEzsZPGpwnP1JrIMmjPpQaVicWOYVu8QvAIg9hwv9w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!-- Scripts -->
    <style>
        .sidebar-wrapper {
            width: 250px
        }

        #main {
            margin-left: 250px;

        }

        .card {
            height: 100%;
            background-color: #fff !important
        }

        .sidebar-wrapper .menu {
            padding: 0 0.5rem;
        }

        table.datatable td,
        table.table-sm td {
            padding: 15px 8px !important;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>

    <div id="app" class="">

        @include('layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>@yield('heading')</h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>

        </div>
    </div>
    </div>
    @yield('scripts')
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.6/perfect-scrollbar.min.js"
        integrity="sha512-gcLXgodlQJWRXhAyvb5ULNlBAcvjuufaOBRggyLCtCqez+9jW7MxP3Is/9serId1YmNZ0Lx1ewh9z2xBwwZeKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const sidebarElement = document.querySelector('.sidebar-wrapper');
        window.confirmDelete = function(id) {
            Swal.fire({
                title: 'Yakin Mau di Hapus?',
                text: "Data Yang Dihapus tidak dapat di kembalikan",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Tidak',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
        if (sidebarElement) {
        const ps = new PerfectScrollbar(sidebarElement, {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });
        }
        @if(Session::has('success'))
        Swal.fire({
            title: "Berhasil",
            text: "{{ Session::get('success') }}".toUpperCase(),
            icon: "success"
        });
        @endif

        @if(Session::has('error'))
        Swal.fire({
            title: "Error",
            text: "{{ Session::get('error') }}".toUpperCase(),
            icon: "error"
        });
        @endif

        $("#datatable").DataTable({
           " responsive":true,
                "rowReorder":{
                    "selector":'td:nth-child(2)'
                },
            "scrollX": true,
            "lengthMenu": [
                [10, 50, 75, -1],
                [10, 50, 75, "All"]
            ],
            language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json" // Example: Indonesian localization
        },

        }).on('draw.dt', function () {
            // confirmDelete();
        })
    });
    </script>
</body>

</html>
