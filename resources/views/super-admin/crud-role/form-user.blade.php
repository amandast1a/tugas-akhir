<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir Pengguna - super admin</title>
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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulir Pengguna</h4>

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                      <h5 class="card-header">Formulir Pengguna</h5>
                      <div class="card-body">
                        <form class="needs-validation" action="{{ route('register.store') }}" method="POST" novalidate>
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-name">Nama lengkap</label>
                                <input type="text" class="form-control" id="bs-validation-name" name="nama" placeholder="masukan nama lengkap" required />
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan nama lengkap</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-level">Pilih Role</label>
                                <select class="form-select" id="bs-validation-level" name="level" required>
                                    <option value="pengusul">Pengusul</option>
                                    <option value="verifikator">Verifikator</option>
                                    <option value="superadmin">Superadmin</option>
                                </select>
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan pilih level</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-kecamatan">Pilih SKPD</label>
                                <select class="form-select" id="bs-validation-kecamatan" name="kecamatan" required>
                                    <option value="">Pilih SKPD</option>
                                    @foreach ($kecamatan as $kecamatan)
                                        @if (old('kecamatan') === $kecamatan)
                                            <option value="{{ $kecamatan->kecamatan }}" selected>{{ $kecamatan->kecamatan }}
                                            </option>
                                        @else
                                            <option value="{{ $kecamatan->kecamatan }}">{{ $kecamatan->kecamatan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan Pilih SKPD</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="bs-validation-jabatan" name="jabatan" placeholder="masukan jabatan" required />
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan jabatan anda</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-nip">NIP</label>
                                <input type="text" class="form-control" id="bs-validation-nip" name="nip" placeholder="masukan NIP" required />
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan nomor NIP anda</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-dob">Tanggal lahir</label>
                                <input type="text" class="form-control flatpickr-validation" id="bs-validation-dob" name="tanggal_lahir" placeholder="YYYY-MM-DD" required />
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan tanggal lahir anda</div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="bs-validation-password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="bs-validation-password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                    <span class="input-group-text cursor-pointer" id="basic-default-password4"><i class="ti ti-eye-off"></i></span>
                                </div>
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan password</div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- /Bootstrap Validation -->
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
