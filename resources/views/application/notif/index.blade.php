<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Notif Pengusul - Pengusul</title>
    @include('layouts application.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />

    <style>

    </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('layouts application.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('layouts application.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4">Notifikasi Pengusul</h4>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <h5 class="card-header"></h5>
                        <form action="{{ route('notifications.readAll') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary justify-content-between" style="gap: 10px; height: fit-content; padding: 15px 35px 15px 35px; margin-top: 20px; margin-right: 20px;"><i class="ti ti-mail-opened fs-4"></i> Tandai dibaca semua
                            </button>
                        </form>
                    </div>
                    <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tipe Form</th>
                            <th></th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($notifications as $item)
                                    {{-- <tr onclick="window.location.href=''" style="cursor: pointer;" id="row-notification"> --}}
                                    <tr>
                                        <td>{{ $item->user->nama }}</td>
                                        <td><span class="badge
                                        @if($item->status == 'Pending') bg-label-warning
                                        @elseif($item->status == 'Ditolak') bg-label-danger
                                        @elseif($item->status == 'Pembuatan_SK_Berhasil') bg-label-success
                                        @elseif($item->status == 'Perbaikan') bg-label-dark
                                        @endif
                                        me-1">{{ $item->status }}</span>
                                    </td>
                                        <td>
                                            {{ $item->type }}
                                        </td>
                                        <td>
                                            @if(!$item->read)
                                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                                <a class="dropdown-notifications-read btn btn-link p-0">
                                                    <span class="badge bg-primary">NEW</span>
                                                </a>
                                            </div>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route('notif.detail', $item->id) }}" class="dropdown-item"><i class="ti ti-file-description me-2"></i>Detail data</a>
                                                    <form action="{{ route('notifications.read', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item" href=""><i class="ti ti-mail-opened me-2"></i>Tandai sudah dibaca</button>
                                                    </form>
                                                    <form action="{{ route('notifications.archive', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item delete"  data-id="{{ $item->id }}"><i
                                                            class="ti ti-trash me-2"></i> Hapus notifikasi
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <!--/ Basic Bootstrap Table -->

            </div>




            <!-- / Content -->

            <!-- Footer -->
            @include('layouts application.footer')
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

    @include('layouts application.script')
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
    <script>
        $(document).on('click', '.delete', function(e){
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
