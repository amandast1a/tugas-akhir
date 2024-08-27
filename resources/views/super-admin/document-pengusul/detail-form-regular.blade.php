<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir usul kenaikan pangkat jabatan regular</title>
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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulir usul kenaikan pangkat jabatan regular</h4>

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <h5 class="card-header">Formulir usul kenaikan pangkat jabatan regular</h5>
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
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_suratPengantar) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_suratPengantar) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SURAT PENGANTAR</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_suratPengantar) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_pangkatTerakhir) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_pangkatTerakhir) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SK PANGKAT TERAKHIR</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_pangkatTerakhir) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_jabatanAtasan) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_jabatanAtasan) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SK JABATAN ATASAN LANGSUNG</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_jabatanAtasan) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_tandaLulus) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_tandaLulus) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SERTIFIKAT TANDA LULUS</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_tandaLulus) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_skAlihtugas) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_skAlihtugas) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SK ALIH TUGAS</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_skAlihtugas) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_penilaian2022) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_penilaian2022) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">PENILAIAN KINERJA 2022</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_penilaian2022) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_penilaian2023) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_penilaian2023) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">PENILAIAN KINERJA 2023</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_penilaian2023) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_skCpns) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_skCpns) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SK CPNS</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_skCpns) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_STTPL) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_STTPL) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">STTPL</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_STTPL) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_beritaAcarasumpah) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_beritaAcarasumpah) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">BERITA ACARA SUMPAH</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_beritaAcarasumpah) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_ijazah) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_ijazah) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">IJAZAH</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_ijazah) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_transkrip) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_transkrip) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">TRANSKRIP</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_transkrip) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
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
