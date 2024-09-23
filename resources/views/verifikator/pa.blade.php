<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('assets/') }}/" data-template="vertical-menu-template">

<head>
    <title>Notif Pengusul - Pengusul</title>
    @include('layouts application.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet"
        href="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />

    <style>

    </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('layouts verifikator.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

            @include('layouts verifikator.navbar')
          <!-- Content wrapper -->

    <div class="container">
        <h1>Form Cetak</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="#" method="POST">
            @csrf

            <!-- Tahun -->
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select name="tahun" id="tahun" class="form-control">
                    @foreach ($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option> @endforeach
                </select>
            </div>

            <!-- Dari Bulan -->
            <div class="form-group">
    <label for="bulan_dari">Dari Bulan</label>
    <select name="bulan_dari" id="bulan_dari" class="form-control">
        @foreach ($months as $key => $month)
            <option value="{{ $key }}">{{ $month }}</option>
        @endforeach
    </select>
    </div>

    <!-- Ke Bulan -->
    <div class="form-group">
        <label for="bulan_ke">Ke Bulan</label>
        <select name="bulan_ke" id="bulan_ke" class="form-control">
            @foreach ($months as $key => $month)
                <option value="{{ $key }}">{{ $month }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Cetak</button>
    </form>
    </div>
    <!-- Footer -->
    @include('layouts verifikator.footer')
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('layouts verifikator.script')
    <!-- Vendors JS -->
    <script src="{{ asset('assets/') }}/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('assets/') }}/js/form-layouts.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/vendor/libs/select2/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#tahun').select2();
            $('#bulan_dari').select2();
            $('#bulan_ke').select2();
        });
    </script>
    <script>
        $(document).on('click', '.delete', function(e) {
            var notificationid = $(this).attr('data-id');
            e.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
                title: "Hapus notifikasi?",
                text: "Anda tidak bisa mengembalikan data",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus sekarang"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire({
                        title: "Berhasil dihapus",
                        text: "Notifiikasi anda berhasil dihapus",
                        icon: "success"
                    });
                }
            });
        });
    </script>
    </body>

</html>
