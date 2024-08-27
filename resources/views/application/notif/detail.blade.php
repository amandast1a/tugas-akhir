<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Detail notifikasi</title>
    @include('layouts application.header')
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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Notification/</span> Detail</h4>

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                        <div class="col-md-12 d-flex justify-content-between align-items-cente">
                            <h5 class="card-header">Notifikasi {{ $notification->type }}</h5>
                            <h6 style="margin-top: 20px; margin-right: 20px;">{{ $notification->updated_at->diffForHumans() }}</h6>
                        </div>
                      <div class="card-body">
                        @if($notification->formFungsional)
                            <div class="row col-lg-12 mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-name">Nama</label>
                                    <input type="text" class="form-control" id="bs-validation-name" value="{{ $notification->formFungsional->user->nama }}" readonly />
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-status">Status</label>
                                    <input type="text" class="form-control
                                    @if($notification->status == 'Pending') bg-warning text-white
                                    @elseif($notification->status == 'Pembuatan_SK_Berhasil') bg-success text-white
                                    @elseif($notification->status == 'Ditolak') bg-danger text-white
                                    @elseif($notification->status == 'Perbaikan') bg-dark text-white
                                    @endif"
                                    id="bs-validation-status"
                                    value="{{ $notification->status }}"
                                    readonly />
                                </div>
                            </div>
                            <div class="row col-lg-12 mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-type">Tipe Form</label>
                                    <input type="text" class="form-control" id="bs-validation-type" value="{{ $notification->type }}" readonly />
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-data">Data</label>
                                    <input type="text" class="form-control" id="bs-validation-data" value="{{ $notification->data }}" readonly />
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Catatan dari verifikator</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly
                                style="padding: 0.375rem 0.75rem 0.375rem 0.5rem; resize: none;">{{ $notification->formFungsional->keterangan ?? 'Tidak ada catatan' }}</textarea>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentFile/' . $notification->formFungsional->file) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentFile/' . $notification->formFungsional->file) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">File dari verifikator</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentFile/' . $notification->formFungsional->file) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($notification->formRegular)
                            <div class="row col-lg-12 mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-name">Nama</label>
                                    <input type="text" class="form-control" id="bs-validation-name" value="{{ $notification->formRegular->user->nama }}" readonly />
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-status">Status</label>
                                    <input type="text" class="form-control
                                    @if($notification->status == 'Pending') bg-warning text-white
                                    @elseif($notification->status == 'Pembuatan_SK_Berhasil') bg-success text-white
                                    @elseif($notification->status == 'Ditolak') bg-danger text-white
                                    @endif"
                                    id="bs-validation-status"
                                    value="{{ $notification->status }}"
                                    readonly />
                                </div>
                            </div>
                            <div class="row col-lg-12 mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-type">Tipe Form</label>
                                    <input type="text" class="form-control" id="bs-validation-type" value="{{ $notification->type }}" readonly />
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-data">Data</label>
                                    <input type="text" class="form-control" id="bs-validation-data" value="{{ $notification->data }}" readonly />
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Catatan dari verifikator</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly
                                style="padding: 0.375rem 0.75rem 0.375rem 0.5rem; resize: none;">{{ $notification->formRegular->keterangan ?? 'Tidak ada catatan' }}</textarea>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentFile/' . $notification->formRegular->file) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentFile/' . $notification->formRegular->file) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">File dari verifikator</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentFile/' . $notification->formRegular->file) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($notification->formStruktural)
                            <div class="row col-lg-12 mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-name">Nama</label>
                                    <input type="text" class="form-control" id="bs-validation-name" value="{{ $notification->formStruktural->user->nama }}" readonly />
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-status">Status</label>
                                    <input type="text" class="form-control
                                    @if($notification->status == 'Pending') bg-warning text-white
                                    @elseif($notification->status == 'Pembuatan_SK_Berhasil') bg-success text-white
                                    @elseif($notification->status == 'Ditolak') bg-danger text-white
                                    @endif"
                                    id="bs-validation-status"
                                    value="{{ $notification->status }}"
                                    readonly />
                                </div>
                            </div>
                            <div class="row col-lg-12 mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-type">Tipe Form</label>
                                    <input type="text" class="form-control" id="bs-validation-type" value="{{ $notification->type }}" readonly />
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-data">Data</label>
                                    <input type="text" class="form-control" id="bs-validation-data" value="{{ $notification->data }}" readonly />
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Catatan dari verifikator</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly
                                style="padding: 0.375rem 0.75rem 0.375rem 0.5rem; resize: none;">{{ $notification->formStruktural->keterangan ?? 'Tidak ada catatan' }}</textarea>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentFile/' . $notification->formStruktural->file) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentFile/' . $notification->formStruktural->file) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">File dari verifikator</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentFile/' . $notification->formStruktural->file) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($notification->formIjazah)
                            <div class="row col-lg-12 mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-name">Nama</label>
                                    <input type="text" class="form-control" id="bs-validation-name" value="{{ $notification->formIjazah->user->nama }}" readonly />
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-status">Status</label>
                                    <input type="text" class="form-control
                                    @if($notification->status == 'Pending') bg-warning text-white
                                    @elseif($notification->status == 'Pembuatan_SK_Berhasil') bg-success text-white
                                    @elseif($notification->status == 'Ditolak') bg-danger text-white
                                    @endif"
                                    id="bs-validation-status"
                                    value="{{ $notification->status }}"
                                    readonly />
                                </div>
                            </div>
                            <div class="row col-lg-12 mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-type">Tipe Form</label>
                                    <input type="text" class="form-control" id="bs-validation-type" value="{{ $notification->type }}" readonly />
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="bs-validation-data">Data</label>
                                    <input type="text" class="form-control" id="bs-validation-data" value="{{ $notification->data }}" readonly />
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Catatan dari verifikator</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly
                                style="padding: 0.375rem 0.75rem 0.375rem 0.5rem; resize: none;">{{ $notification->formIjazah->keterangan ?? 'Tidak ada catatan' }}</textarea>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentFile/' . $notification->formIjazah->file) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentFile/' . $notification->formIjazah->file) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">File dari verifikator</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentFile/' . $notification->formIjazah->file) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                      </div>
                    </div>
                  </div>
                  <!-- /Bootstrap Validation -->

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
    <script src="{{ asset('assets/') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('assets/') }}/js/form-layouts.js"></script>
    <script src="{{ asset('assets/') }}/js/form-validation.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="{{ asset('assets/') }}/js/form-basic-inputs.js"></script>
  </body>
</html>
