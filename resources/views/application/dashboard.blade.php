<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template">
  <head>
    <title>Dashboard Pengusul</title>
    @include('layouts application.header')
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/shepherd/shepherd.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/animate-on-scroll/animate-on-scroll.css" />
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        @include('layouts application.sidebar')

        <!-- Layout container -->
        <div class="layout-page">

            @include('layouts application.navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div  class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                  <div id="statistic" class="col-lg-12 mb-4 col-md-12">
                      <div class="card h-100">
                        <div class="card-header d-flex justify-content-between">
                          <div class="col-lg-3 col-sm-6">
                              <div class="card h-100">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <div class="card-title mb-0">
                                          <h5 class="mb-0 me-2">{{ $jumlahpengusul }}</h5>
                                          <h5>Document Fungsional</h5>
                                            <a href="/table-jabatan-fungsional" class="btn btn-outline-primary">Go to page</a>
                                      </div>
                                      <div class="card-icon">
                                          <span class="badge bg-label-primary rounded-pill p-2">
                                              <i class="ti ti-checklist ti-sm"></i>
                                          </span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <small class="text-muted">Updated {{ $Form_jabatan_fungsional ? $Form_jabatan_fungsional->updated_at->diffForHumans() : 'N/A'  }}</small>
                        </div>
                        <div class="card-body pt-2">
                          <div class="row gy-3">
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-warning me-3 p-2">
                                  <i class="ti ti-chart-pie-2 ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $pendingstatus }}</h5>
                                  <small>Pending</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                  <i class="ti ti-check ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $berhasilstatus }}</h5>
                                  <small>Pembuatan SK Berhasil</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                  <i class="ti ti-x ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $gagalstatus }}</h5>
                                  <small>Di Tolak</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                  <i class="ti ti-refresh"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $perbaikanstatus }}</h5>
                                  <small>Perbaikan</small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div id="statistic" class="col-lg-12 mb-4 col-md-12">
                      <div class="card h-100">
                        <div class="card-header d-flex justify-content-between">
                          <div class="col-lg-3 col-sm-6">
                              <div class="card h-100">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <div class="card-title mb-0">
                                          <h5 class="mb-0 me-2">{{ $jumlahpengusulregular }}</h5>
                                          <h5>Document Regular</h5>
                                          <a href="/table-regular" class="btn btn-outline-primary">Go to page</a>
                                      </div>
                                      <div class="card-icon">
                                          <span class="badge bg-label-primary rounded-pill p-2">
                                              <i class="ti ti-checklist ti-sm"></i>
                                          </span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <small class="text-muted">
                              Updated {{ $Form_regular ? $Form_regular->updated_at->diffForHumans() : 'N/A' }}
                          </small>
                        </div>
                        <div class="card-body pt-2">
                          <div class="row gy-3">
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-warning me-3 p-2">
                                  <i class="ti ti-chart-pie-2 ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $pendingstatusregular }}</h5>
                                  <small>Pending</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                  <i class="ti ti-check ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $berhasilstatusregular }}</h5>
                                  <small>Pembuatan SK Berhasil</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                  <i class="ti ti-x ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $gagalstatusregular }}</h5>
                                  <small>Di Tolak</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                  <i class="ti ti-refresh"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $perbaikanstatusregular }}</h5>
                                  <small>Perbaikan</small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div id="statistic" class="col-lg-12 mb-4 col-md-12">
                      <div class="card h-100">
                        <div class="card-header d-flex justify-content-between">
                          <div class="col-lg-3 col-sm-6">
                              <div class="card h-100">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <div class="card-title mb-0">
                                          <h5 class="mb-0 me-2">{{ $jumlahpengusulstruktural }}</h5>
                                          <h5>Document Struktural</h5>
                                            <a href="/table-jabatan-struktural" class="btn btn-outline-primary">Go to page</a>
                                      </div>
                                      <div class="card-icon">
                                          <span class="badge bg-label-primary rounded-pill p-2">
                                              <i class="ti ti-checklist ti-sm"></i>
                                          </span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <small class="text-muted">Updated {{ $Form_struktural ? $Form_struktural->updated_at->diffForHumans() : 'N/A'  }}</small>
                        </div>
                        <div class="card-body pt-2">
                          <div class="row gy-3">
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-warning me-3 p-2">
                                  <i class="ti ti-chart-pie-2 ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $pendingstatusstruktural }}</h5>
                                  <small>Pending</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                  <i class="ti ti-check ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $berhasilstatusstruktural }}</h5>
                                  <small>Pembuatan SK Berhasil</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                  <i class="ti ti-x ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $gagalstatusstruktural }}</h5>
                                  <small>Di Tolak</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                  <i class="ti ti-refresh"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $perbaikanstatusstruktural }}</h5>
                                  <small>Perbaikan</small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div id="statistic" class="col-lg-12 mb-4 col-md-12">
                      <div class="card h-100">
                        <div class="card-header d-flex justify-content-between">
                          <div class="col-lg-3 col-sm-6">
                              <div class="card h-100">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <div class="card-title mb-0">
                                          <h5 class="mb-0 me-2">{{ $jumlahpengusulijazah }}</h5>
                                          <h5>Document Ijazah</h5>
                                            <a href="/table-jabatan-ijazah" class="btn btn-outline-primary">Go to page</a>
                                        </div>
                                      <div class="card-icon">
                                          <span class="badge bg-label-primary rounded-pill p-2">
                                              <i class="ti ti-checklist ti-sm"></i>
                                          </span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <small class="text-muted">Updated {{ $Form_ijazah ? $Form_ijazah->updated_at->diffForHumans() : 'N/A'  }}</small>
                        </div>
                        <div class="card-body pt-2">
                          <div class="row gy-3">
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-warning me-3 p-2">
                                  <i class="ti ti-chart-pie-2 ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $pendingstatusijazah }}</h5>
                                  <small>Pending</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                  <i class="ti ti-check ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $berhasilstatusijazah }}</h5>
                                  <small>Pembuatan SK Berhasil</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                  <i class="ti ti-x ti-sm"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $gagalstatusijazah }}</h5>
                                  <small>Di Tolak</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                  <i class="ti ti-refresh"></i>
                                </div>
                                <div class="card-info">
                                  <h5 class="mb-0">{{ $perbaikanstatusijazah }}</h5>
                                  <small>Perbaikan</small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      <!-- Cards with few info -->
                      {{-- <div class="col-lg-3 col-sm-6 mb-4">
                          <div class="card h-100">
                          <div class="card-body d-flex justify-content-between align-items-center">
                              <div class="card-title mb-0">
                              <h5 class="mb-0 me-2">32</h5>
                              <small>Jumlah Pengusul</small>
                              </div>
                              <div class="card-icon">
                              <span class="badge bg-label-success rounded-pill p-2">
                                  <i class="ti ti-user ti-sm"></i>
                              </span>
                              </div>
                          </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-sm-6 mb-4">
                          <div class="card h-100">
                          <div class="card-body d-flex justify-content-between align-items-center">
                              <div class="card-title mb-0">
                              <h5 class="mb-0 me-2">4</h5>
                              <small>Jumlah Verifikator</small>
                              </div>
                              <div class="card-icon">
                              <span class="badge bg-label-success rounded-pill p-2">
                                  <i class="ti ti-file ti-sm"></i>
                              </span>
                              </div>
                          </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-sm-6 mb-4">
                          <div class="card h-100">
                          <div class="card-body d-flex justify-content-between align-items-center">
                              <div class="card-title mb-0">
                              <h5 class="mb-0 me-2">3</h5>
                              <small>Role</small>
                              </div>
                              <div class="card-icon">
                              <span class="badge bg-label-info rounded-pill p-2">
                                  <i class="ti ti-user-circle ti-sm"></i>
                              </span>
                              </div>
                          </div>
                          </div>
                      </div> --}}
                      <!--/ Cards with few info -->
                      {{-- <div class="col-lg-12 mb-4 col-md-12">
                          <div class="card">
                              <div class="col-md-12 d-flex justify-content-between align-items-center">
                                  <h5 class="card-header">Table Document Pengusul</h5>
                              </div>
                              <div class="col-md-12 d-flex justify-flex-start align-items-center">
                                  <div  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                      <h5 class="card-header">Search</h5>
                                      <input
                                        type="search"
                                        class="form-control"
                                        id="bs-validation-name"
                                        placeholder="Search"
                                        required />
                                    </div>
                                  <div  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                      <h5 class="card-header">Status</h5>
                                      <select id="defaultSelect" class="form-select">
                                        <option value="Complete">Complete</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Fail">Fail</option>
                                      </select>
                                    </div>
                                  <div  style="display: flex; align-items: center; height: fit-content; margin-right: 10px;">
                                      <h5 class="card-header">Type</h5>
                                      <select id="defaultSelect" class="form-select">
                                        <option value="Formulir usul kenaikan pangkat reguler">Formulir usul kenaikan pangkat reguler</option>
                                        <option value="Formulir usul kenaikan pangkat jabatan fungsional">Formulir usul kenaikan pangkat jabatan fungsional</option>
                                        <option value="Formulir usul kenaikan pangkat jabatan struktural">Formulir usul kenaikan pangkat jabatan struktural</option>
                                        <option value="Formulir usul kenaikan pangkat penyesuaian ijazah">Formulir usul kenaikan pangkat penyesuaian ijazah</option>
                                      </select>
                                    </div>
                                  <div style="margin-right: 20px" >
                                      <button type="submit" class="btn btn-primary">
                                          Cari data
                                          <i class='bx bx-search'></i>
                                      </button>
                                  </div>

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
                                      <th>Aksi</th>
                                  </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                      @foreach ( $form as $item )
                                      <tr>
                                          <td>{{ $item->nama }}</td>
                                          <td>{{ $item->nip }}</td>
                                          <td>{{ $item->jabatan }}</td>
                                          <td><span class="badge
                                      @if($item->status == 'pending') bg-label-warning
                                      @elseif($item->status == 'ditolak') bg-label-danger
                                      @elseif($item->status == 'Pembuatan_SK_Berhasil') bg-label-success
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
                                                          <a class="dropdown-item" href=""><i class="ti ti-eye me-2"></i> Detail</a>
                                                          <a class="dropdown-item" href=""><i class="ti ti-pencil me-2"></i> Edit</a>
                                                          <button type="submit" class="dropdown-item"><i
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
                      </div> --}}
                </div>
              </div>

            <!-- / Content -->

            @include('layouts application.footer')

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
    <script src="{{ asset('assets/') }}/vendor/libs/shepherd/shepherd.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('assets/') }}/js/extended-ui-tour.js"></script>
    <!-- Vendors JS -->
    <script src="{{ asset('assets/') }}/vendor/libs/animate-on-scroll/animate-on-scroll.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('assets/') }}/js/extended-ui-timeline.js"></script>
    <script src="{{ asset('assets/') }}/js/ui-modals.js"></script>
  </body>
</html>
