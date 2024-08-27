<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir usul kenaikan pangkat jabatan fungsional</title>
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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulir usul kenaikan pangkat jabatan fungsional</h4>

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                      <h5 class="card-header">Formulir usul kenaikan pangkat jabatan fungsional</h5>
                      <h6 class="card-header">Tata Cara Pengisian Formulir : <br>
                        1. Ketik menggunakan huruf KAPITAL <br>
                        2. Ketik pada UNIT KERJA tidak boleh di singkat <br>
                        3. upload file maksimal 1 Mb dalam bentuk PDF</h6>
                      <div class="card-body">
                        <form action="{{ route('jabatan.fungsional.post') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-country">Pilih Periode</label>
                                <select class="form-select" id="bs-validation-country" name="periode" required>
                                    <option value="">Pilih Periode</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="Desember">Desember</option>
                                </select>
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan pilih periode</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-name">Nama lengkap</label>
                                <input type="text" class="form-control" id="bs-validation-name" name="nama" placeholder="masukan nama lengkap" required />
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan nama anda</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-nip">NIP</label>
                                <input type="text" class="form-control" id="bs-validation-nip" name="nip" placeholder="masukan NIP" required />
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan nomor NIP anda</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-golongan">Pangkat/Golongan Ruang</label>
                                <select class="form-select" id="bs-validation-golongan" name="golongan" required>
                                    <option value="">Pilih Pangkat/Golongan Ruang</option>
                                    <option value="Juru Muda - I/A">Juru Muda - I/A</option>
                                    <option value="Juru Muda TK.I - I/B">Juru Muda TK.I - I/B</option>
                                    <option value="Juru - I/C">Juru - I/C</option>
                                    <option value="Juru TK.I - I/D">Juru TK.I - I/D</option>
                                    <option value="Pengatur Muda - II/A">Pengatur Muda - II/A</option>
                                    <option value="Pengatur Muda TK.I - II/B">Pengatur Muda TK.I - II/B</option>
                                    <option value="Pengatur - II/C">Pengatur - II/C</option>
                                    <option value="Pengatur TK.I - II/D">Pengatur TK.I - II/D</option>
                                    <option value="Penata Muda - III/A">Penata Muda - III/A</option>
                                    <option value="Penata Muda TK.I - III/B">Penata Muda TK.I - III/B</option>
                                    <option value="Penata - III/C">Penata - III/C</option>
                                    <option value="Penata TK.I - III/D">Penata TK.I - III/D</option>
                                    <option value="Pembina - IV/A">Pembina - IV/A</option>
                                    <option value="Pembina TK.I - IV/B">Pembina TK.I - IV/B</option>
                                    <option value="Pembina Muda - IV/C">Pembina Muda - IV/C</option>
                                    <option value="Pembina Madya - IV/D">Pembina Madya - IV/D</option>
                                    <option value="Pembina Utama - IV/E">Pembina Utama - IV/E</option>
                                </select>
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan pilih pangkat/golongan ruang</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="bs-validation-jabatan" name="jabatan" placeholder="masukan jabatan" required />
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan jabatan anda</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-dob">Tanggal lahir</label>
                                <input type="text" class="form-control flatpickr-validation" id="bs-validation-dob" name="date" placeholder="YYYY-MM-DD" required />
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan tanggal lahir anda</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-dob">Unit kerja</label>
                                <input type="text" class="form-control" id="bs-validation-unit_kerja" name="unit_kerja" placeholder="masukan unit kerja" required />
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan unit kerja anda</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-wa">No WA</label>
                                <input type="text" class="form-control" id="bs-validation-wa" name="nomor_wa" placeholder="masukan no WA" required />
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan nomor whatsapp anda</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-suratPengantar">SURAT PENGANTAR (dari Kepala SKPD) file max 1MB</label>
                                <input type="file" class="form-control" id="bs-validation-upload-suratPengantar" name="doc_suratPengantar" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-skPangkat">SK PANGKAT TERAKHIR</label>
                                <input type="file" class="form-control" id="bs-validation-upload-skPangkat" name="doc_skPangkat" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-pakKonvensional">PAK KONVENSIONAL (PAK Terakhir)</label>
                                <input type="file" class="form-control" id="bs-validation-upload-pakKonvensional" name="doc_pakKonvensional" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-pakIntegrasi">PAK INTEGRASI</label>
                                <input type="file" class="form-control" id="bs-validation-upload-pakIntegrasi" name="doc_pakIntegrasi" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-pakKonversi">PAK KONVERSI</label>
                                <input type="file" class="form-control" id="bs-validation-upload-pakKonversi" name="doc_pakKonversi" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-penilaian2022">PENILAIAN KINERJA 2022</label>
                                <input type="file" class="form-control" id="bs-validation-upload-penilaian2022" name="doc_penilaian2022" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-penilaian2023">PENILAIAN KINERJA 2023</label>
                                <input type="file" class="form-control" id="bs-validation-upload-penilaian2023" name="doc_penilaian2023" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-jabatanLama">SK JABATAN ATASAN LANGSUNG</label>
                                <input type="file" class="form-control" id="bs-validation-upload-jabatanLama" name="doc_jabatanLama" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-jabatanTerakhir">SK JABATAN FUNGSIONAL LAMA</label>
                                <input type="file" class="form-control" id="bs-validation-upload-jabatanTerakhir" name="doc_jabatanTerakhir" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-pendidik">SERTIFIKAT PENDIDIK (Bagi Guru)</label>
                                <input type="file" class="form-control" id="bs-validation-upload-pendidik" name="doc_pendidik" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-uji">SERTIFIKAT UJI KOMPETENSI (Bagi yang naik jenjang)</label>
                                <input type="file" class="form-control" id="bs-validation-upload-uji" name="doc_uji" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
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
