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

            @include('layouts application.navbar')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <h4 class=" ms-5"> Standar Operasional Kenaikan Pangkat </h4>

            <!-- Content -->
            <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="card" >
                        <div class="card-body">
                          <h5 class="card-title">Kenaikan Pangkat Penyesuaian Ijazah</h5>
                          <p class="card-text">1. sk kenaikan pangkat <br> 2. ijin belajar/tugas beajar <br> 3. sk ahli tugas <br> 4. Uraian Tugas Lama dan Baru  <br> 5. Surat Tanda Lulus Ujian Penyesuaian</p>
                        </div>
                      </div>
                  </div>
                  <div class="col">
                    <div class="card" >
                        <div class="card-body">
                          <h5 class="card-title">Kenaikan Pangkat Penyesuaian Reguler</h5>
                          <p class="card-text">1. sk kenaikan pangkat <br> 2. ijin belajar/tugas beajar <br> 3. sk ahli tugas <br> 4. Uraian Tugas Lama dan Baru  <br> 5. Surat Tanda Lulus Ujian Penyesuaian </p>
                        </div>
                      </div>
                  </div>
                </div>


              </div>
              <div class="container mt-2">
                <div class="row">
                    <div class="col">
                      <div class="card" >
                          <div class="card-body">
                            <h5 class="card-title">Kenaikan Pangkat Penyesuaian Struktural</h5>
                            <p class="card-text">1. sk kenaikan pangkat <br> 2. ijin belajar/tugas beajar <br> 3. sk ahli tugas <br> 4. Uraian Tugas Lama dan Baru  <br> 5. Surat Tanda Lulus Ujian  </p>
                          </div>
                        </div>
                    </div>
                    <div class="col">
                      <div class="card" >
                          <div class="card-body">
                            <h5 class="card-title">Kenaikan Pangkat Penyesuaian Fungsional</h5>
                            <p class="card-text">1. sk kenaikan pangkat <br> 2. ijin belajar/tugas beajar <br> 3. sk ahli tugas <br> 4. Uraian Tugas Lama dan Baru  <br> 5. Surat Tanda Lulus Ujian Penyesuaian </p>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="container mt-2">
                    <div class="col-lg-12 col-sm-12 mt-2">
                      <div class="card" >
                          <div class="card-body">
                            <div class="card p-2 h-100 shadow-none border">
                                <div class="rounded-2 text-center mb-3">
                                    <object data="{{ asset('assets/peraturan/Peraturan-BKN-4-Tahun-2023-Periodisasi-Kenaikan-Pangkat-Pegawai-Negeri-Sipil (1).pdf') }}" type="application/pdf" width="100%" height="600px">
                                        <a href="{{ asset('assets/peraturan/Peraturan-BKN-4-Tahun-2023-Periodisasi-Kenaikan-Pangkat-Pegawai-Negeri-Sipil (1).pdf') }}" download>men-download</a>
                                        <p>Browser tidak mendukung tampilan PDF. Anda dapat  dokumen ini.</p>
                                    </object>
                                </div>

                                <div class="card-body p-3 pt-2" style="display: grid; ">
                                    <p>Peraturan BKN</p>
                                    <a class="w-100 btn btn-label-primary"
                                        href="{{ asset('assets/documentJabatans/') }}" download><i
                                            class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                </div>
                            </div>                          </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 mt-2">
                      <div class="card" >
                          <div class="card-body">
                            <div class="card p-2 h-100 shadow-none border">
                                <div class="rounded-2 text-center mb-3">
                                    <object data="{{ asset('assets/peraturan/SE-16-TAHUN-2023 (1).pdf') }}" type="application/pdf" width="100%" height="600px">
                                        <a href="{{ asset('assets/peraturan/SE-16-TAHUN-2023 (1).pdf') }}" download>men-download</a>
                                        <p>Browser tidak mendukung tampilan PDF. Anda dapat  dokumen ini.</p>
                                    </object>
                                </div>

                                <div class="card-body p-3 pt-2" style="display: grid; ">
                                    <p>SE</p>
                                    <a class="w-100 btn btn-label-primary"
                                        href="{{ asset('assets/documentJabatans/') }}" download><i
                                            class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                </div>
                            </div>                          </div>
                        </div>
                    </div>
              </div>





            <!-- / Content -->

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
