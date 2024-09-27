<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Hasil Pencarian - Super Admin</title>
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

                <!-- Basic Bootstrap Table -->
                @if ($searchType == 'jabatan_fungsional')
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Document Pengusul/ Hasil Pencarian Form Fungsional</h4>
                    <div class="card mb-3">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <h5 class="card-header">Hasil pencarian kenaikan pangkat fungsional</h5>
                        </div>
                        <form action="{{ route('document.pengusul.search') }}" method="GET">
                            @csrf
                            <input type="hidden" name="search_type" value="jabatan_fungsional">
                            <div class="col-md-12 d-flex justify-flex-start align-items-center">
                                <div class="col-lg-4"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                    <h5 class="card-header">Cari</h5>
                                    <input
                                    type="search"
                                    class="form-control"
                                    id="bs-validation-name"
                                    name="nama"
                                    placeholder="Cari berdasarkan nama"/>
                                </div>
                                <div class="col-lg-3"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
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
                                <div class="col-lg-3"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                    <h5 class="card-header">SKPD</h5>
                                    <select id="kecamatan" class="form-select" name="kecamatan">
                                        <option value="" disabled selected>Pilih SKPD</option>
                                        @foreach ($kecamatan as $kecamatan)
                                        <option value="{{ $kecamatan->kecamatan }}" {{ old('kecamatan') === $kecamatan->kecamatan ? 'selected' : '' }}>
                                            {{ $kecamatan->kecamatan }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-2" style="margin-right: 20px" >
                                    <button type="submit" class="btn btn-primary">
                                        Cari data
                                        <i class='bx bx-search'></i>
                                    </button>
                                </div>

                            </div>
                        </form>
                        <div class="table-responsive text-nowrap mb-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Kecamatan</th>
                                <th>Status</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ( $results as $item )
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->user->kecamatan }}</td>
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
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{ route('form-jabatan-fungsional.delete', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="dropdown-item" href="{{ route('document.pengusul-fungsional.show', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                    <a class="dropdown-item" href=""><i class="ti ti-pencil me-2"></i> Edit</a>
                                                    <button type="submit" class="dropdown-item delete" data-id="{{ $item->id }}"><i
                                                            class="ti ti-trash me-2"></i> Delete</button>
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
                @endif
                @if ($searchType == 'regular')
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Document Pengusul/ Hasil Pencarian Form Regular</h4>
                <div class="card mb-3">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <h5 class="card-header">Hasil pencarian kenaikan pangkat regular</h5>
                    </div>

                    <form action="{{ route('document.pengusul.search') }}" method="GET">
                        @csrf
                        <input type="hidden" name="search_type" value="regular">
                        <div class="col-md-12 d-flex justify-flex-start align-items-center">
                            <div class="col-lg-4"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                <h5 class="card-header">Cari</h5>
                                <input
                                  type="search"
                                  class="form-control"
                                  id="bs-validation-name"
                                  name="nama"
                                  placeholder="Cari berdasarkan nama"/>
                              </div>
                            <div class="col-lg-3"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
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
                            <div class="col-lg-3"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                <h5 class="card-header">SKPD</h5>
                                <select id="kecamatan" class="form-select" name="kecamatan">
                                    <option value="" disabled selected>Pilih SKPD</option>
                                    @foreach ($kecamatan as $kecamatan)
                                    <option value="{{ $kecamatan->kecamatan }}" {{ old('kecamatan') === $kecamatan->kecamatan ? 'selected' : '' }}>
                                        {{ $kecamatan->kecamatan }}
                                    </option>
                                    @endforeach
                                </select>
                              </div>

                            <div class="col-lg-2" style="margin-right: 20px" >
                                <button type="submit" class="btn btn-primary">
                                    Cari data
                                    <i class='bx bx-search'></i>
                                </button>
                            </div>

                        </div>
                    </form>
                    <div class="table-responsive text-nowrap mb-2">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Kecamatan</th>
                            <th>Status</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ( $results as $item )
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->user->kecamatan }}</td>
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
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('form-jabatan-fungsional.delete', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dropdown-item" href="{{ route('document.pengusul-regular.show', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                <a class="dropdown-item" href=""><i class="ti ti-pencil me-2"></i> Edit</a>
                                                <button type="submit" class="dropdown-item delete" data-id="{{ $item->id }}"><i
                                                        class="ti ti-trash me-2"></i> Delete</button>
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
                @endif
                @if ($searchType == 'ijazah')
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Document Pengusul/ Hasil Pencarian Form Ijazah</h4>
                    <div class="card mb-3">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <h5 class="card-header">Hasil pencarian kenaikan pangkat ijazah</h5>
                        </div>
                        <form action="{{ route('document.pengusul.search') }}" method="GET">
                            @csrf
                            <input type="hidden" name="search_type" value="ijazah">
                            <div class="col-md-12 d-flex justify-flex-start align-items-center">
                                <div class="col-lg-4"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                        <h5 class="card-header">Cari</h5>
                                        <input
                                        type="search"
                                        class="form-control"
                                        id="bs-validation-name"
                                        name="nama"
                                        placeholder="Cari berdasarkan nama"/>
                                    </div>
                                    <div class="col-lg-3"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
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
                                    <div class="col-lg-3"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                        <h5 class="card-header">SKPD</h5>
                                        <select id="kecamatan" class="form-select" name="kecamatan">
                                            <option value="" disabled selected>Pilih SKPD</option>
                                            @foreach ($kecamatan as $kecamatan)
                                            <option value="{{ $kecamatan->kecamatan }}" {{ old('kecamatan') === $kecamatan->kecamatan ? 'selected' : '' }}>
                                                {{ $kecamatan->kecamatan }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-2" style="margin-right: 20px" >
                                        <button type="submit" class="btn btn-primary">
                                            Cari data
                                            <i class='bx bx-search'></i>
                                        </button>
                                    </div>

                            </div>
                        </form>
                        <div class="table-responsive text-nowrap mb-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Kecamatan</th>
                                <th>Status</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ( $results as $item )
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->user->kecamatan }}</td>
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
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{ route('form-jabatan-fungsional.delete', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="dropdown-item" href="{{ route('document.pengusul-ijazah.show', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                    <a class="dropdown-item" href=""><i class="ti ti-pencil me-2"></i> Edit</a>
                                                    <button type="submit" class="dropdown-item delete" data-id="{{ $item->id }}"><i
                                                            class="ti ti-trash me-2"></i> Delete</button>
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
                @endif
                @if ($searchType == 'struktural')
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Document Pengusul/ Hasil Pencarian Form Struktural</h4>
                    <div class="card mb-3">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <h5 class="card-header">Hasil pencarian kenaikan pangkat struktural</h5>
                        </div>
                        <form action="{{ route('document.pengusul.search') }}" method="GET">
                            @csrf
                            <input type="hidden" name="search_type" value="struktural">
                            <div class="col-md-12 d-flex justify-flex-start align-items-center">
                                <div class="col-lg-4"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                        <h5 class="card-header">Cari</h5>
                                        <input
                                        type="search"
                                        class="form-control"
                                        id="bs-validation-name"
                                        name="nama"
                                        placeholder="Cari berdasarkan nama"/>
                                    </div>
                                    <div class="col-lg-3"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
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
                                    <div class="col-lg-3"  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                        <h5 class="card-header">SKPD</h5>
                                        <select id="kecamatan" class="form-select" name="kecamatan">
                                            <option value="" disabled selected>Pilih SKPD</option>
                                            @foreach ($kecamatan as $kecamatan)
                                            <option value="{{ $kecamatan->kecamatan }}" {{ old('kecamatan') === $kecamatan->kecamatan ? 'selected' : '' }}>
                                                {{ $kecamatan->kecamatan }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-2" style="margin-right: 20px" >
                                        <button type="submit" class="btn btn-primary">
                                            Cari data
                                            <i class='bx bx-search'></i>
                                        </button>
                                    </div>

                            </div>
                        </form>
                        <div class="table-responsive text-nowrap mb-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Kecamatan</th>
                                <th>Status</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ( $results as $item )
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->user->kecamatan }}</td>
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
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{ route('form-jabatan-fungsional.delete', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="dropdown-item" href="{{ route('document.pengusul-struktural.show', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                    <a class="dropdown-item" href=""><i class="ti ti-pencil me-2"></i> Edit</a>
                                                    <button type="submit" class="dropdown-item delete" data-id="{{ $item->id }}"><i
                                                            class="ti ti-trash me-2"></i> Delete</button>
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
                @endif

                <!--/ Basic Bootstrap Table -->

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
            title: "Hapus data?",
            text: "Anda tidak bisa mengembalikan data jika dihapus",
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
                text: "Data anda berhasil dihapus",
                icon: "success"
                });
            }
            });
        });
    </script>
  </body>
</html>
