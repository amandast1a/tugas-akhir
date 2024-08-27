<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir usul kenaikan pangkat jabatan ijazah</title>
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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulir usul kenaikan pangkat jabatan ijazah</h4>

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                      <h5 class="card-header">Formulir usul kenaikan pangkat jabatan ijazah</h5>
                      <h6 class="card-header">Tata Cara Pengisian Formulir : <br>
                        1. Ketik menggunakan huruf KAPITAL <br>
                        2. Ketik pada UNIT KERJA tidak boleh di singkat <br>
                        3. upload file maksimal 1 Mb dalam bentuk PDF</h6>
                      <div class="card-body">
                        <form action="{{ route('jabatan.ijazah.post') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-country">Pilih Periode</label>
                                <select class="form-select" id="bs-validation-country" name="periode" required>
                                    @foreach ($periode as $periode)
                                        @if (old('periode') === $periode)
                                            <option value="{{ $periode->periode }}" selected>{{ $periode->periode }}
                                            </option>
                                        @else
                                            <option value="{{ $periode->periode }}">{{ $periode->periode }}</option>
                                        @endif
                                    @endforeach
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
                                    @foreach ($golongan as $golongan)
                                    @if (old('golongan') === $golongan)
                                        <option value="{{ $golongan->golongan }}" selected>{{ $golongan->golongan }}
                                        </option>
                                    @else
                                        <option value="{{ $golongan->golongan }}">{{ $golongan->golongan }}</option>
                                    @endif
                                    @endforeach
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
                                <label class="form-label" for="bs-validation-upload-pangkatTerakhir">SK PANGKAT TERAKHIR</label>
                                <input type="file" class="form-control" id="bs-validation-upload-pangkatTerakhir" name="doc_pangkatTerakhir" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-jabatanAtasan">SK JABATAN ATASAN LANGSUNG</label>
                                <input type="file" class="form-control" id="bs-validation-upload-jabatanAtasan" name="doc_jabatanAtasan" accept="application/pdf" required />
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
                                <label class="form-label" for="bs-validation-upload-pakKonvensional">PAK KONVENSIONAL</label>
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
                                <label class="form-label" for="bs-validation-upload-ujiKopetensi">SERTIFIKAT UJI KOMPETENSI</label>
                                <input type="file" class="form-control" id="bs-validation-upload-ujiKopetensi" name="doc_ujiKopetensi" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-izinBelajar">IZIN BELAJAR</label>
                                <input type="file" class="form-control" id="bs-validation-upload-izinBelajar" name="doc_izinBelajar" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-uraianTugaslama">URAIAN TUGAS LAMA</label>
                                <input type="file" class="form-control" id="bs-validation-upload-uraianTugaslama" name="doc_uraianTugaslama" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-uraianTugasbaru">URAIAN TUGAS BARU</label>
                                <input type="file" class="form-control" id="bs-validation-upload-uraianTugasbaru" name="doc_uraianTugasbaru" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-suratTandakelulusan">SURAT TANDA KELULUSAN</label>
                                <input type="file" class="form-control" id="bs-validation-upload-suratTandakelulusan" name="doc_suratTandakelulusan" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-ijazah">IJAZAH</label>
                                <input type="file" class="form-control" id="bs-validation-upload-ijazah" name="doc_ijazah" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-transkripNilai">TRANSKRIP NILAI</label>
                                <input type="file" class="form-control" id="bs-validation-upload-transkripNilai" name="doc_transkripNilai" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-sertifikatAkreditasi">SERTIFIKAT AKREDITASI</label>
                                <input type="file" class="form-control" id="bs-validation-upload-sertifikatAkreditasi" name="doc_sertifikatAkreditasi" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-pangkalanData">PANGKALAN DATA PENDIDIKAN TINGGI</label>
                                <input type="file" class="form-control" id="bs-validation-upload-pangkalanData" name="doc_pangkalanData" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-skAlihtugas">SK ALIH TUGAS</label>
                                <input type="file" class="form-control" id="bs-validation-upload-skAlihtugas" name="doc_skAlihtugas" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-skJF">SK JABATAN FUNGSIONAL</label>
                                <input type="file" class="form-control" id="bs-validation-upload-skJF" name="doc_skJF" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary submit">Submit</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.submit', function(e){
            var notificationid = $(this).attr('data-id');
            e.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
            title: "Simpan form?",
            text: "form yang anda simpan bisa di edit kembali",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, kirim sekarang"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                title: "form berhasil disimpan",
                text: "Selamat menikmati hari anda",
                icon: "success"
                });
            }
            });
        });
    </script>
  </body>
</html>
