<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Proses Pengajuan jabatan ijazah - Pengusul</title>
    @include('layouts application.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/bootstrap-select/bootstrap-select.css" />
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
                <h4 class="py-3 mb-4">Proses Pengajuan Formulir usul kenaikan pangkat jabatan ijazah</h4>
                <div class="row">
                    <!-- Default Wizard -->
                    <div class="col-12 mb-4">
                      <div class="bs-stepper wizard-numbered mt-2">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#account-details">
                              <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="ti ti-chart-pie-2 ti-sm"></i></span>
                                <span class="bs-stepper-label">
                                  <span class="bs-stepper-title">Pending</span>
                                  <span class="bs-stepper-subtitle">Masih proses verifikasi</span>
                                </span>
                              </button>
                            </div>
                            <div class="step" data-target="#personal-info">
                              <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="ti ti-x ti-sm"></i></span>
                                <span class="bs-stepper-label">
                                  <span class="bs-stepper-title">Ditolak</span>
                                  <span class="bs-stepper-subtitle">Dokumen anda ditolak</span>
                                </span>
                              </button>
                            </div>
                            <div class="step" data-target="#social-links">
                              <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="ti ti-check ti-sm"></i></span>
                                <span class="bs-stepper-label">
                                  <span class="bs-stepper-title">Berhasil</span>
                                  <span class="bs-stepper-subtitle">Dokumen anda berhasil di verifikasi</span>
                                </span>
                              </button>
                            </div>
                            <div class="step" data-target="#refresh-links">
                                <button type="button" class="step-trigger">
                                  <span class="bs-stepper-circle"><i class="ti ti-refresh ti-sm"></i></span>
                                  <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Perbaikan</span>
                                    <span class="bs-stepper-subtitle">Dokumen anda perlu diperbaiki</span>
                                  </span>
                                </button>
                              </div>
                          </div>
                        <div class="bs-stepper-content">
                          <form onSubmit="return false">
                            <!-- Account Details -->
                            <div id="account-details" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Table Pending Formulir usul kenaikan pangkat jabatan ijazah</h6>
                                    <small>Dokumen yang anda ajukan masih dalam proses verifikasi oleh verifikator</small>
                                  </div>
                                <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Waktu</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($Form_ijazah->where('status', 'Pending') as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td><span class="badge
                                                @if($item->status == 'Pending') bg-label-warning
                                        @elseif($item->status == 'Ditolak') bg-label-danger
                                        @elseif($item->status == 'Berhasil') bg-label-success
                                        @elseif($item->status == 'Perbaikan') bg-label-dark
                                        @endif
                                                me-1">{{ $item->status }}</span>
                                            </td>
                                            <td>{{ $item->time }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <!-- Personal Info -->
                            <div id="personal-info" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Table Revisi Formulir usul kenaikan pangkat jabatan ijazah</h6>
                                    <small>Dokumen yang anda ajukan perlu diperbaiki lagi</small>
                                  </div>
                                <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Waktu</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($Form_ijazah->where('status', 'Ditolak') as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td><span class="badge
                                                @if($item->status == 'Pending') bg-label-warning
                                        @elseif($item->status == 'Ditolak') bg-label-danger
                                        @elseif($item->status == 'Berhasil') bg-label-success
                                        @elseif($item->status == 'Perbaikan') bg-label-dark
                                        @endif
                                                me-1">{{ $item->status }}</span>
                                            </td>
                                            <td>{{ $item->time }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <!-- Social Links -->
                            <div id="social-links" class="content">
                              <div class="content-header mb-3">
                                <h6 class="mb-0">Table Diterima Formulir usul kenaikan pangkat jabatan ijazah</h6>
                                <small>Dokumen yang anda ajukan diterima oleh verifikator</small>
                              </div>
                            <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Status</th>
                                    <th>Waktu</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($Form_ijazah->where('status', 'Berhasil') as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td><span class="badge
                                                @if($item->status == 'Pending') bg-label-warning
                                        @elseif($item->status == 'Ditolak') bg-label-danger
                                        @elseif($item->status == 'Berhasil') bg-label-success
                                        @elseif($item->status == 'Perbaikan') bg-label-dark
                                        @endif
                                                me-1">{{ $item->status }}</span>
                                            </td>
                                            <td>{{ $item->time }}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div id="refresh-links" class="content">
                                <div class="content-header mb-3">
                                  <h6 class="mb-0">Table Perbaikan Formulir Usul Kenaikan Pangkat Ijazah</h6>
                                  <small>Dokumen yang anda ajukan perlu diperbaiki</small>
                                </div>
                                  <div class="table-responsive text-nowrap">
                                      <table class="table">
                                          <thead>
                                          <tr>
                                              <th>Nama</th>
                                              <th>NIP</th>
                                              <th>Jabatan</th>
                                              <th>Status</th>
                                              <th>Waktu</th>
                                          </tr>
                                          </thead>
                                          <tbody class="table-border-bottom-0">
                                              @foreach ($Form_ijazah->where('status', 'Perbaikan') as $item)
                                              <tr>
                                                  <td>{{ $item->user->nama }}</td>
                                                  <td>{{ $item->nama }}</td>
                                                  <td>{{ $item->nip }}</td>
                                                  <td><span class="badge
                                              @if($item->status == 'Pending') bg-label-warning
                                                  @elseif($item->status == 'Ditolak') bg-label-danger
                                                  @elseif($item->status == 'Berhasil') bg-label-success
                                                  @elseif($item->status == 'Perbaikan') bg-label-dark
                                                  @endif
                                              me-1">{{ $item->status }}</span>
                                          </td>
                                                  <td>{{ $item->time }}</td>
                                                  <td>
                                                    <a href="{{ route('jabatan.ijazah.edit', $item->id) }}" class="btn btn-outline-primary">Perbaiki</a>
                                                  </td>
                                              </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- /Default Wizard -->
                  </div>

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
    <script src="{{ asset('assets/') }}/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="{{ asset('assets/') }}/js/form-wizard-numbered.js"></script>
    <script src="{{ asset('assets/') }}/js/form-wizard-validation.js"></script>
  </body>
</html>
