<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir usul kenaikan pangkat jabatan ijazah - Pengusul</title>
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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Formulir usul kenaikan pangkat jabatan ijazah</h4>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <div class="col-md-12 d-flex justify-content-between align-items-cente">
                        <h5 class="card-header">Table Formulir usul kenaikan pangkat jabatan ijazah</h5>
                        <a href="/proses-table-ijazah" class="btn btn-outline-primary" style="height: fit-content; padding: 15px 30px 15px 30px; margin-top: 20px;">Lihat Proses</a>
                        <a href="/form-jabatan-ijazah" class="btn btn-primary" style="height: fit-content; padding: 15px 30px 15px 30px; margin-top: 20px; margin-right: 20px;">Tambah Data</a>

                    </div>
                    <form action="{{ route('jabatan.ijazah.search') }}" method="GET">
                        <div class="col-md-12 d-flex justify-flex-start justify-content-space-between align-items-center ">
                            <div class="col-lg-4" style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                <h5 class="card-header">Cari dokumen</h5>
                                <input
                                  type="search"
                                  name="nama"
                                  class="form-control"
                                  placeholder="cari dokumen berdasarkan nama"
                                  />
                            </div>

                            <div class="col-lg-3" style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                <h5 class="card-header">Status</h5>
                                <select id="status" class="form-select" name="status">
                                    <option value="" disabled selected>pilih status</option>
                                    @foreach ($status as $status)
                                    <option value="{{ $status->status }}" {{ old('status') === $status->status ? 'selected' : '' }}>
                                        {{ $status->status }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3" style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                <h5 class="card-header">Nip</h5>
                                <input
                                  type="search"
                                  name="nip"
                                  class="form-control"
                                  placeholder="cari dokumen berdasarkan nip"
                                  />
                            </div>
                            <div class="col-lg-2" style="margin-right: 20px" >
                                <button type="submit" class="btn btn-primary">
                                    Cari data
                                    <i class='bx bx-search'></i>
                                </button>
                            </div>

                        </div>
                    </form>
                    <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($form as $item)
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
                                <td>
                                    <a href="{{ route('jabatan.ijazah.show', $item->id) }}" class="btn btn-outline-primary"> Detail data</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{-- <nav aria-label="Page navigation" style="margin: 30px 30px 30px 20px;">
                        <ul class="pagination pagination-sm">
                            @if ($Form_jabatan_fungsional->currentPage() > 1)
                                <li class="page-item prev">
                                    <a class="page-link" href="{{ $Form_jabatan_fungsional->previousPageUrl() }}">
                                        <i class="tf-icon fs-6 ti ti-chevrons-left"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($Form_jabatan_fungsional->lastPage() > 1)
                                <!-- First Page Link -->
                                @if ($Form_jabatan_fungsional->currentPage() > 3)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $Form_jabatan_fungsional->url(1) }}">1</a>
                                    </li>
                                    @if ($Form_jabatan_fungsional->currentPage() > 4)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                <!-- Page Numbers -->
                                @for ($i = max(1, $Form_jabatan_fungsional->currentPage() - 2); $i <= min($Form_jabatan_fungsional->lastPage(), $Form_jabatan_fungsional->currentPage() + 2); $i++)
                                    <li class="page-item {{ $i == $Form_jabatan_fungsional->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $Form_jabatan_fungsional->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Last Page Link -->
                                @if ($Form_jabatan_fungsional->currentPage() < $Form_jabatan_fungsional->lastPage() - 2)
                                    @if ($Form_jabatan_fungsional->currentPage() < $Form_jabatan_fungsional->lastPage() - 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $Form_jabatan_fungsional->url($Form_jabatan_fungsional->lastPage()) }}">{{ $Form_jabatan_fungsional->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif

                            @if ($Form_jabatan_fungsional->hasMorePages())
                                <li class="page-item next">
                                    <a class="page-link" href="{{ $Form_jabatan_fungsional->nextPageUrl() }}">
                                        <i class="tf-icon fs-6 ti ti-chevrons-right"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav> --}}
                    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel1">Formulir usul kenaikan pangkat jabatan fungsional</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="periode" class="form-label">Periode</label>
                                  <input type="text" id="periode" class="form-control" readonly  />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nama" class="form-label">Nama</label>
                                  <input type="text" id="nama" class="form-control" readonly  />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nip" class="form-label">nip</label>
                                  <input type="text" id="nip" class="form-control" readonly  />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="golongan" class="form-label">golongan</label>
                                  <input type="text" id="golongan" class="form-control" readonly  />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="jabatan" class="form-label">jabatan</label>
                                  <input type="text" id="jabatan" class="form-control" readonly  />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="unit_kerja" class="form-label">unit kerja</label>
                                  <input type="text" id="unit_kerja" class="form-control" readonly  />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nomor_wa" class="form-label">nomor wa</label>
                                  <input type="text" id="nomor_wa" class="form-control" readonly  />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">Documents</label>
                                    <ul id="documentList" class="list-group">
                                        <!-- Links to documents will be appended here -->
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <iframe id="pdfViewer" class="list-group" style="width: 100%; height: 500px;" frameborder="0"></iframe>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <a id="downloadLink" class="btn btn-primary" href="#" download>Download PDF</a>
                                </div>
                            </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
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
    <script src="{{ asset('assets/') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('assets/') }}/js/form-layouts.js"></script>
    <script src="{{ asset('assets/') }}/js/form-validation.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>

  </body>
</html>
