<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Hasil Pencarian - Verifikator</title>
    @include('layouts verifikator.header')
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

        @include('layouts verifikator.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('layouts verifikator.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @if ($searchType == 'fungsional')
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="py-3 mb-4">Hasil pencarian dokumen kenaikan pangkat fungsional</h4>
                    <div class="row">
                        <!-- Default Wizard -->
                        <div class="col-12 mb-4">
                        <div class="bs-stepper wizard-numbered mt-2">
                            <form action="{{ route('form.search') }}" method="GET" class="pt-4 pb-2 pl-2" style="padding-left: 30px">
                                @csrf
                                <input type="hidden" name="search_type" value="fungsional">
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
                                        <h6 class="mb-0">Table Pending Formulir Usul Kenaikan Pangkat Regular</h6>
                                        <small>Dokumen yang anda ajukan masih dalam proses verifikasi oleh verifikator</small>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nama pengusul</th>
                                            <th>Nama yang diusul</th>
                                            <th>NIP</th>
                                            <th>Status</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($results->where('status', 'Pending') as $item)
                                            <tr>
                                                <td>{{ $item->user->nama }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nip }}</td>
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
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <form >
                                                                <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
                                                                <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ $item->nomor_wa }}" target="_blank">
                                                                    <i class="ti ti-send me-2"></i> Kirim Notifikasi
                                                                </a>
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
                                <!-- Personal Info -->
                                <div id="personal-info" class="content">
                                    <div class="content-header mb-3">
                                        <h6 class="mb-0">Table Ditolak Formulir Usul Kenaikan Pangkat Regular</h6>
                                        <small>Dokumen yang anda ajukan ditolak oleh verifikator</small>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nama pengusul</th>
                                            <th>Nama yang diusul</th>
                                            <th>NIP</th>
                                            <th>Status</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($results->where('status', 'Ditolak') as $item)
                                            <tr>
                                                <td>{{ $item->user->nama }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nip }}</td>
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
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <form >
                                                                <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
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
                                <!-- Social Links -->
                                <div id="social-links" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Table Diterima Formulir Usul Kenaikan Pangkat Regular</h6>
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
                                        @foreach ($results->where('status', 'Pembuatan_SK_Berhasil') as $item)
                                        <tr>
                                            <td>{{ $item->user->nama }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nip }}</td>
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
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <form >
                                                            <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                            <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
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
                                <div id="refresh-links" class="content">
                                    <div class="content-header mb-3">
                                    <h6 class="mb-0">Table Perbaikan Formulir Usul Kenaikan Pangkat Regular</h6>
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
                                                @foreach ($results->where('status', 'Perbaikan') as $item)
                                                <tr>
                                                    <td>{{ $item->user->nama }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->nip }}</td>
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
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <form >
                                                                    <a class="dropdown-item" href="{{ route('jabatan.struktural.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                    <a class="dropdown-item" href="{{ route('verifikasi.jabatan.struktural.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
                                                                    <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ $item->user->monor_wa }}" target="blank"><i class="ti ti-pencil me-2"></i> kirim notifikasi</a>
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
                            </form>
                            </div>
                        </div>
                        </div>
                        <!-- /Default Wizard -->
                    </div>

                </div>
            @endif
            @if ($searchType == 'regular')
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="py-3 mb-4">Hasil pencarian dokumen kenaikan pangkat regular</h4>
                    <div class="row">
                        <!-- Default Wizard -->
                        <div class="col-12 mb-4">
                        <div class="bs-stepper wizard-numbered mt-2">
                            <form action="{{ route('form.search') }}" method="GET" class="pt-4 pb-2 pl-2" style="padding-left: 30px">
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
                                        <h6 class="mb-0">Table Pending Formulir Usul Kenaikan Pangkat Regular</h6>
                                        <small>Dokumen yang anda ajukan masih dalam proses verifikasi oleh verifikator</small>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nama pengusul</th>
                                            <th>Nama yang diusul</th>
                                            <th>NIP</th>
                                            <th>Status</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($results->where('status', 'Pending') as $item)
                                            <tr>
                                                <td>{{ $item->user->nama }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nip }}</td>
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
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <form >
                                                                <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
                                                                <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ $item->nomor_wa }}" target="_blank">
                                                                    <i class="ti ti-send me-2"></i> Kirim Notifikasi
                                                                </a>
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
                                <!-- Personal Info -->
                                <div id="personal-info" class="content">
                                    <div class="content-header mb-3">
                                        <h6 class="mb-0">Table Ditolak Formulir Usul Kenaikan Pangkat Regular</h6>
                                        <small>Dokumen yang anda ajukan ditolak oleh verifikator</small>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nama pengusul</th>
                                            <th>Nama yang diusul</th>
                                            <th>NIP</th>
                                            <th>Status</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($results->where('status', 'Ditolak') as $item)
                                            <tr>
                                                <td>{{ $item->user->nama }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nip }}</td>
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
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <form >
                                                                <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
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
                                <!-- Social Links -->
                                <div id="social-links" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Table Diterima Formulir Usul Kenaikan Pangkat Regular</h6>
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
                                        @foreach ($results->where('status', 'Pembuatan_SK_Berhasil') as $item)
                                        <tr>
                                            <td>{{ $item->user->nama }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nip }}</td>
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
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <form >
                                                            <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                            <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
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
                                <div id="refresh-links" class="content">
                                    <div class="content-header mb-3">
                                    <h6 class="mb-0">Table Perbaikan Formulir Usul Kenaikan Pangkat Regular</h6>
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
                                                @foreach ($results->where('status', 'Perbaikan') as $item)
                                                <tr>
                                                    <td>{{ $item->user->nama }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->nip }}</td>
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
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <form >
                                                                    <a class="dropdown-item" href="{{ route('jabatan.struktural.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                    <a class="dropdown-item" href="{{ route('verifikasi.jabatan.struktural.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
                                                                    <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ $item->user->monor_wa }}" target="blank"><i class="ti ti-pencil me-2"></i> kirim notifikasi</a>
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
                            </form>
                            </div>
                        </div>
                        </div>
                        <!-- /Default Wizard -->
                    </div>

                </div>
            @endif
            @if ($searchType == 'struktural')
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="py-3 mb-4">Hasil pencarian dokumen kenaikan pangkat struktural</h4>
                    <div class="row">
                        <!-- Default Wizard -->
                        <div class="col-12 mb-4">
                        <div class="bs-stepper wizard-numbered mt-2">
                            <form action="{{ route('form.search') }}" method="GET" class="pt-4 pb-2 pl-2" style="padding-left: 30px">
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
                                        <h6 class="mb-0">Table Pending Formulir Usul Kenaikan Pangkat Regular</h6>
                                        <small>Dokumen yang anda ajukan masih dalam proses verifikasi oleh verifikator</small>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nama pengusul</th>
                                            <th>Nama yang diusul</th>
                                            <th>NIP</th>
                                            <th>Status</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($results->where('status', 'Pending') as $item)
                                            <tr>
                                                <td>{{ $item->user->nama }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nip }}</td>
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
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <form >
                                                                <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
                                                                <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ $item->nomor_wa }}" target="_blank">
                                                                    <i class="ti ti-send me-2"></i> Kirim Notifikasi
                                                                </a>
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
                                <!-- Personal Info -->
                                <div id="personal-info" class="content">
                                    <div class="content-header mb-3">
                                        <h6 class="mb-0">Table Ditolak Formulir Usul Kenaikan Pangkat Regular</h6>
                                        <small>Dokumen yang anda ajukan ditolak oleh verifikator</small>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nama pengusul</th>
                                            <th>Nama yang diusul</th>
                                            <th>NIP</th>
                                            <th>Status</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($results->where('status', 'Ditolak') as $item)
                                            <tr>
                                                <td>{{ $item->user->nama }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nip }}</td>
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
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <form >
                                                                <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
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
                                <!-- Social Links -->
                                <div id="social-links" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Table Diterima Formulir Usul Kenaikan Pangkat Regular</h6>
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
                                        @foreach ($results->where('status', 'Pembuatan_SK_Berhasil') as $item)
                                        <tr>
                                            <td>{{ $item->user->nama }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nip }}</td>
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
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <form >
                                                            <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                            <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
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
                                <div id="refresh-links" class="content">
                                    <div class="content-header mb-3">
                                    <h6 class="mb-0">Table Perbaikan Formulir Usul Kenaikan Pangkat Regular</h6>
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
                                                @foreach ($results->where('status', 'Perbaikan') as $item)
                                                <tr>
                                                    <td>{{ $item->user->nama }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->nip }}</td>
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
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <form >
                                                                    <a class="dropdown-item" href="{{ route('jabatan.struktural.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                    <a class="dropdown-item" href="{{ route('verifikasi.jabatan.struktural.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
                                                                    <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ $item->user->monor_wa }}" target="blank"><i class="ti ti-pencil me-2"></i> kirim notifikasi</a>
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
                            </form>
                            </div>
                        </div>
                        </div>
                        <!-- /Default Wizard -->
                    </div>

                </div>
            @endif
            @if ($searchType == 'ijazah')
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="py-3 mb-4">Hasil pencarian dokumen kenaikan pangkat ijazah</h4>
                    <div class="row">
                        <!-- Default Wizard -->
                        <div class="col-12 mb-4">
                        <div class="bs-stepper wizard-numbered mt-2">
                            <form action="{{ route('form.search') }}" method="GET" class="pt-4 pb-2 pl-2" style="padding-left: 30px">
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
                                        <h6 class="mb-0">Table Pending Formulir Usul Kenaikan Pangkat Regular</h6>
                                        <small>Dokumen yang anda ajukan masih dalam proses verifikasi oleh verifikator</small>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nama pengusul</th>
                                            <th>Nama yang diusul</th>
                                            <th>NIP</th>
                                            <th>Status</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($results->where('status', 'Pending') as $item)
                                            <tr>
                                                <td>{{ $item->user->nama }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nip }}</td>
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
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <form >
                                                                <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
                                                                <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ $item->nomor_wa }}" target="_blank">
                                                                    <i class="ti ti-send me-2"></i> Kirim Notifikasi
                                                                </a>
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
                                <!-- Personal Info -->
                                <div id="personal-info" class="content">
                                    <div class="content-header mb-3">
                                        <h6 class="mb-0">Table Ditolak Formulir Usul Kenaikan Pangkat Regular</h6>
                                        <small>Dokumen yang anda ajukan ditolak oleh verifikator</small>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nama pengusul</th>
                                            <th>Nama yang diusul</th>
                                            <th>NIP</th>
                                            <th>Status</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($results->where('status', 'Ditolak') as $item)
                                            <tr>
                                                <td>{{ $item->user->nama }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nip }}</td>
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
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <form >
                                                                <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
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
                                <!-- Social Links -->
                                <div id="social-links" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Table Diterima Formulir Usul Kenaikan Pangkat Regular</h6>
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
                                        @foreach ($results->where('status', 'Pembuatan_SK_Berhasil') as $item)
                                        <tr>
                                            <td>{{ $item->user->nama }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nip }}</td>
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
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <form >
                                                            <a class="dropdown-item" href="{{ route('jabatan.regular.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                            <a class="dropdown-item" href="{{ route('verifikasi.jabatan.regular.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
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
                                <div id="refresh-links" class="content">
                                    <div class="content-header mb-3">
                                    <h6 class="mb-0">Table Perbaikan Formulir Usul Kenaikan Pangkat Regular</h6>
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
                                                @foreach ($results->where('status', 'Perbaikan') as $item)
                                                <tr>
                                                    <td>{{ $item->user->nama }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->nip }}</td>
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
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <form >
                                                                    <a class="dropdown-item" href="{{ route('jabatan.struktural.show.verifikator', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                                    <a class="dropdown-item" href="{{ route('verifikasi.jabatan.struktural.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Verifikasi</a>
                                                                    <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ $item->user->monor_wa }}" target="blank"><i class="ti ti-pencil me-2"></i> kirim notifikasi</a>
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
                            </form>
                            </div>
                        </div>
                        </div>
                        <!-- /Default Wizard -->
                    </div>

                </div>
            @endif




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

    @include('layouts verifikator.script')
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
