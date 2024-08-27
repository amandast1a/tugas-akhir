<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir usul kenaikan pangkat jabatan Ijazah</title>
    @include('layouts admin.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('layouts admin.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('layouts admin.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulir usul kenaikan pangkat jabatan Ijazah</h4>

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <h5 class="card-header">Formulir usul kenaikan pangkat jabatan Ijazah</h5>
                        </div>
                      <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-name">Periode</label>
                                <input type="text" class="form-control" id="bs-validation-name" value="{{ $form->periode }}" readonly  />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-name">Nama lengkap</label>
                                <input type="text" class="form-control" id="bs-validation-name" value="{{ $form->nama }}" readonly  />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-nip">NIP</label>
                                <input type="text" class="form-control" id="bs-validation-nip" value="{{ $form->nip }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-nip">Pangkat/Golongan Ruang</label>
                                <input type="text" class="form-control" id="bs-validation-nip" value="{{ $form->golongan }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="bs-validation-jabatan" value="{{ $form->jabatan }}" readonly />
                            </div>
                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-dob">Tanggal lahir</label>
                                <input type="text" class="form-control flatpickr-validation" id="bs-validation-dob" value="{{ $form->date }}" readonly />
                            </div>
                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-dob">Unit kerja</label>
                                <input type="text" class="form-control" id="bs-validation-unit_kerja" value="{{ $form->unit_kerja }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-wa">No WA</label>
                                <input type="text" class="form-control" id="bs-validation-wa" value="{{ $form->nomor_wa }}" readonly />
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Bootstrap Validation -->
                  <div class="card mb-4 mt-4">
                    <div class="card-body">
                        <div class="row gy-4 mb-4">
                            @foreach ([
                                        'doc_suratPengantar' => 'SURAT PENGANTAR (dari Kepala SKPD)',
                                        'doc_pangkatTerakhir' => 'PANGKAT TERAKHIR',
                                        'doc_jabatanAtasan' => 'JABATAN ATASAN',
                                        'doc_penilaian2022' => 'PENILAIAN 2022',
                                        'doc_penilaian2023' => 'PENILAIAN 2023',
                                        'doc_pakKonvensional' => 'PAK KONVENSIONAL',
                                        'doc_pakIntegrasi' => 'PAK INTEGRASI',
                                        'doc_pakKonversi' => 'PAK KONVERSI',
                                        'doc_ujiKopetensi' => 'UJI KOMPETENSI',
                                        'doc_izinBelajar' => 'IZIN BELAJAR',
                                        'doc_uraianTugaslama' => 'URAIAN TUGAS LAMA',
                                        'doc_uraianTugasbaru' => 'URAIAN TUGAS BARU',
                                        'doc_suratTandakelulusan' => 'SURAT TANDA KELULUSAN',
                                        'doc_ijazah' => 'IJAZAH',
                                        'doc_transkripNilai' => 'TRANSKRIP NILAI',
                                        'doc_sertifikatAkreditasi' => 'SERTIFIKAT AKREDITASI',
                                        'doc_pangkalanData' => 'PANGKALAN DATA',
                                        'doc_skAlihtugas' => 'SK ALIH TUGAS',
                                        'doc_skJF' => 'SK JF',
                                    ] as $field => $title)
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="card p-2 h-100 shadow-none border">
                                                <div class="rounded-2 text-center mb-3">
                                                    <object data="{{ asset('assets/documentijazah/' . $form->$field) }}"
                                                        type="application/pdf" width="100%" height="600px">
                                                        <p>Browser tidak mendukung tampilan PDF. Anda dapat
                                                                href="{{ asset('assets/documentijazah/' . $form->$field) }}"
                                                                download>men-download</a> dokumen ini.</p>
                                                    </object>
                                                </div>
                                                <div class="card-body p-3 pt-2" style="display: grid; ">
                                                    <a class="h5" href="">{{ $title }}</a>
                                                    <a class="w-100 btn btn-label-primary"
                                                        href="{{ asset('assets/documentijazah/' . $form->$field) }}" download><i
                                                            class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                        </div>
                    </div>

                </div>

            </div>




            <!-- / Content -->

            <!-- Footer -->
            @include('layouts admin.footer')
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

    @include('layouts admin.script')
    <!-- Vendors JS -->
    <script src="{{ asset('assets/') }}/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('assets/') }}/js/form-layouts.js"></script>
    <script src="{{ asset('assets/') }}/js/form-validation.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
  </body>
</html>
