<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('assets/') }}/" data-template="vertical-menu-template">

<head>
    <title>Formulir usul kenaikan pangkat struktural</title>
    @include('layouts application.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet"
        href="{{ asset('assets/') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />

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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulir usul kenaikan pangkat struktural</h4>

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                        <h5 class="card-header">Formulir usul kenaikan pangkat struktural</h5>
                        <h6 class="card-header">Tata Cara Pengisian Formulir : <br>
                            1. Ketik menggunakan huruf KAPITAL <br>
                            2. Ketik pada UNIT KERJA tidak boleh di singkat <br>
                            3. upload file maksimal 1 Mb dalam bentuk PDF</h6>
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('jabatan.struktural.post') }}" id="formStruktural" method="POST" enctype="multipart/form-data" novalidate>
                                @if (session('error'))
                                            <div>
                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script>
                                                    Swal.fire({
                                                        title: "Error",
                                                        text: "{{ session('error') }}",
                                                        icon: "error"
                                                    });
                                                </script>
                                            </div>
                                        @endif
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="periode">Pilih Periode</label>
                                    <select class="form-select" id="periode" name="periode" required>
                                        @foreach ($periode as $periode)
                                        @if (old('periode') === $periode)
                                            <option value="{{ $periode->periode }}" selected>{{ $periode->periode }}
                                            </option>
                                        @else
                                            <option value="{{ $periode->periode }}">{{ $periode->periode }}</option>
                                        @endif @endforeach
                                    </select>
                                    <div class="valid-feedback">
    Terisi</div>
    <div class="invalid-feedback">Silahkan pilih periode</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="nama">Nama lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama lengkap"
            required />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan nama anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="nip">NIP</label>
        <input type="number" class="form-control" id="nip" name="nip" placeholder="masukan NIP" required />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan nomor NIP anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="golongan">Pangkat/Golongan Ruang</label>
        <select class="form-select" id="golongan" name="golongan" required>
            {{-- <option value="">Pilih Pangkat/Golongan Ruang</option>
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
                                        <option value="Pembina Utama - IV/E">Pembina Utama - IV/E</option> --}}
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
        <label class="form-label" for="jabatan">Jabatan</label>
        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="masukan jabatan"
            required />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan jabatan anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="date">Tanggal lahir</label>
        <input type="text" class="form-control flatpickr-validation" id="date" name="date"
            placeholder="YYYY-MM-DD" required />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan tanggal lahir anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="bs-validation-dob">Unit kerja</label>
        <input type="text" class="form-control" id="bs-validation-unit_kerja" name="unit_kerja"
            placeholder="masukan unit kerja" required />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan unit kerja anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="nomor_wa">No WA</label>
        <input type="number" class="form-control" id="nomor_wa" name="nomor_wa" placeholder="masukan no WA"
            required />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan nomor whatsapp anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_suratPengantar">SURAT PENGANTAR (dari Kepala SKPD) file max 1MB</label>
        <input type="file" class="form-control" id="doc_suratPengantar" name="doc_suratPengantar" required />
        @error('doc_suratPengantar')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_pangkatTerakhir">SK PANGKAT TERAKHIR</label>
        <input type="file" class="form-control" id="doc_pangkatTerakhir" name="doc_pangkatTerakhir" required />
        @error('doc_pangkatTerakhir')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_jabatanAtasan">SK JABATAN ATASAN LANGSUNG</label>
        <input type="file" class="form-control" id="doc_jabatanAtasan" name="doc_jabatanAtasan" required />
        @error('doc_jabatanAtasan')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_penilaian2022">PENILAIAN KINERJA 2022</label>
        <input type="file" class="form-control" id="doc_penilaian2022" name="doc_penilaian2022" required />
        @error('doc_penilaian2022')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_penilaian2023">PENILAIAN KINERJA 2023</label>
        <input type="file" class="form-control" id="doc_penilaian2023" name="doc_penilaian2023" required />
        @error('doc_penilaian2023')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_jabatanLama">DOKUMEN JABATAN LAMA</label>
        <input type="file" class="form-control" id="doc_jabatanLama" name="doc_jabatanLama" required />
        @error('doc_jabatanLama')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_jabatanBaru">DOKUMEN JABATAN BARU</label>
        <input type="file" class="form-control" id="doc_jabatanBaru" name="doc_jabatanBaru" required />
        @error('doc_jabatanBaru')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_beritaAcarasumpahlama">BERITA ACARA SUMPAH LAMA</label>
        <input type="file" class="form-control" id="doc_beritaAcarasumpahlama" name="doc_beritaAcarasumpahlama"
            required />
        @error('doc_beritaAcarasumpahlama')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_beritaAcarasumpahbaru">BERITA ACARA SUMPAH BARU</label>
        <input type="file" class="form-control" id="doc_beritaAcarasumpahbaru" name="doc_beritaAcarasumpahbaru"
            required />
        @error('doc_beritaAcarasumpahbaru')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_pernyataanPelantikanlama">PERNYATAAN PELANTIKAN LAMA</label>
        <input type="file" class="form-control" id="doc_pernyataanPelantikanlama"
            name="doc_pernyataanPelantikanlama" required />
        @error('doc_pernyataanPelantikanlama')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_pernyataanPelantikanbaru">PERNYATAAN PELANTIKAN BARU</label>
        <input type="file" class="form-control" id="doc_pernyataanPelantikanbaru"
            name="doc_pernyataanPelantikanbaru" required />
        @error('doc_pernyataanPelantikanbaru')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_riwayatAtasan">RIWAYAT ATASAN</label>
        <input type="file" class="form-control" id="doc_riwayatAtasan" name="doc_riwayatAtasan" required />
        @error('doc_riwayatAtasan')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_ujianDinas">UJIAN DINAS</label>
        <input type="file" class="form-control" id="doc_ujianDinas" name="doc_ujianDinas" required />
        @error('doc_ujianDinas')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_skAlihtugas">SK ALIH TUGAS (Jika Ada)</label>
        <input type="file" class="form-control" id="doc_skAlihtugas" name="doc_skAlihtugas" required />
        @error('doc_skAlihtugas')
            {{ $message }}
        @enderror
    </div>


    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary submit">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="clearForm()">Reset</button>
        </div>
    </div>

    </form>
    </div>
    </div>
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
        $(document).on('click', '.submit', function(e) {
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

        document.addEventListener("DOMContentLoaded", function() {
            const formName = document.querySelector('form').getAttribute('id') || 'formStruktural';
            const formFields = [
                "periode", "nama", "nip", "golongan", "jabatan", "date",
                "unit_kerja", "nomor_wa", "doc_suratPengantar", "doc_PangkatTerakhir",
                "doc_jabatanAtasan", "doc_penilaian2022", "doc_penilaian2023",
                "doc_jabatanLama", "doc_jabatanBaru", "doc_beritaAcarasumpahlama",
                "doc_beritaAcarasumpahbaru", "doc_pernyataanPelantikanlama",
                "doc_pernyataanPelantikanbaru", "doc_riwayatAtasan", "doc_ujianDinas",
                "doc_skAlihtugas",

            ];

            formFields.forEach(field => {
                const input = document.querySelector(`[name="${field}"]`);

                if (input) {
                    input.value = localStorage.getItem(`${formName}_${field}`) || input.value;

                    input.addEventListener("input", () => {
                        localStorage.setItem(`${formName}_${field}`, input.value);
                    });
                }
            });
        });

        function clearForm() {
            const formName = document.querySelector('form').getAttribute('id') || 'formStruktural';
            const formFields = [
                "periode", "nama", "nip", "golongan", "jabatan", "date",
                "unit_kerja", "nomor_wa", "doc_suratPengantar", "doc_PangkatTerakhir",
                "doc_jabatanAtasan", "doc_penilaian2022", "doc_penilaian2023",
                "doc_jabatanLama", "doc_jabatanBaru", "doc_beritaAcarasumpahlama",
                "doc_beritaAcarasumpahbaru", "doc_pernyataanPelantikanlama",
                "doc_pernyataanPelantikanbaru", "doc_riwayatAtasan", "doc_ujianDinas",
                "doc_skAlihtugas",

            ];
            formFields.forEach(field => {
                localStorage.removeItem(`${formName}_${field}`);
                const input = document.querySelector(`[name="${field}"]`);
                if (input) {
                    input.value = "";
                }
            });
        }
    </script>
    </body>

</html>
