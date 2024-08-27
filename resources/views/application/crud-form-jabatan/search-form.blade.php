<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir usul kenaikan pangkat fungsional - Pengusul</title>
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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Formulir usul kenaikan pangkat fungsional</h4>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <div class="col-md-12 d-flex justify-content-between align-items-cente">
                        <h5 class="card-header">Table Formulir usul kenaikan pangkat fungsional</h5>
                        <a href="/proses-table-jabatan-fungsional" class="btn btn-outline-primary" style="height: fit-content; padding: 15px 30px 15px 30px; margin-top: 20px;">Lihat Proses</a>
                        <a href="/form-jabatan-fungsional" class="btn btn-primary" style="height: fit-content; padding: 15px 30px 15px 30px; margin-top: 20px; margin-right: 20px;">Tambah Data</a>

                    </div>
                    <form action="{{ route('jabatan.fungsional.search') }}" method="GET">
                        <div class="col-md-12 d-flex justify-flex-start align-items-center">
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
                    <h5 class="card-header d-flex justify-content-center">Hasil pencarian</h5>
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
                            @forelse ($Form_fungsional as $item )
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td><span class="badge
                                        @if($item->status == 'Pending') bg-label-warning
                                           @elseif($item->status == 'Ditolak') bg-label-danger
                                           @elseif($item->status == 'Pembuatan_SK_Berhasil') bg-label-success
                                           @elseif($item->status == 'Perbaikan') bg-label-dark
                                           @endif
                                       me-1">{{ $item->status }}</span>
                                   </td>
                                    <td>{{ $item->time }}</td>
                                    <td>
                                        <a href="{{ route('jabatan.regular.show', $item->id) }}" class="btn btn-outline-primary"> Detail data</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <a href="">data tidak ditemukan</a>
                                    </td>
                                </tr>
                            @endforelse
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
    <script src="{{ asset('assets/') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('assets/') }}/js/form-layouts.js"></script>
    <script src="{{ asset('assets/') }}/js/form-validation.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
  </body>
</html>
