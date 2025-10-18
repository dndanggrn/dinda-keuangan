<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Kasir')</title>

    {{-- Bootstrap & Font Awesome --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    {{-- AdminLTE 4 --}}
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">

    {{-- Custom CSS untuk sidebar --}}
    <style>
        .main-sidebar {
            width: 220px;
            min-height: 100vh;
            transition: all 0.3s ease;
            background-color: #fff;
            border-right: 1px solid #dee2e6;
        }

        .main-sidebar.d-none {
            display: none !important;
        }

        .content-wrapper {
            transition: margin-left 0.3s ease;
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="wrapper d-flex">

        {{-- Sidebar --}}
        @include('layouts.components.sidebar')

        <div class="flex-grow-1">
            {{-- Header --}}
            @include('layouts.components.header')

            {{-- Main Content --}}
            <main class="content-wrapper p-3">
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('layouts.components.footer')
        </div>
    </div>

    {{-- JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Script Toggle Sidebar --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.main-sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('d-none');
                });
            }
        });
    </script>

    {{-- Tempat untuk script halaman --}}
    @yield('scripts')
</body>

</html>
