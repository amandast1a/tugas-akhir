<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('assets/') }}/" data-template="vertical-menu-template">

<head>
    <title>Formulir usul kenaikan pangkat regular</title>
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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulir usul kenaikan
                            pangkat regular</h4>

                        <!-- Bootstrap Validation -->
                        <div class="col-md">
                            <div class="card">
                                <h5 class="card-header">Formulir usul kenaikan pangkat regular</h5>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{ route('jabatan.regular.post') }}" id="formReguler" method="POST" enctype="multipart/form-data" novalidate>
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
                                            <select class="form-select" id="periode" name="periode" >
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
        <input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama lengkap" />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan nama anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="nip">NIP</label>
        <input type="number" class="form-control" id="nip" name="nip" placeholder="masukan NIP" />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan nomor NIP anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="golongan">Pangkat/Golongan Ruang</label>
        <select class="form-select" id="golongan" name="golongan">
            @foreach ($golongan as $golongan)
                @if (old('golongan') === $golongan)
                    <option value="{{ $golongan->golongan }}" selected>{{ $golongan->golongan }}</option>
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
        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="masukan jabatan" />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan jabatan anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="date">Tanggal lahir</label>
        <input type="text" class="form-control flatpickr-validation" id="date" name="date"
            placeholder="YYYY-MM-DD" />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan tanggal lahir anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="bs-validation-dob">Unit kerja</label>
        <input type="text" class="form-control" id="bs-validation-unit_kerja" name="unit_kerja"
            placeholder="masukan unit kerja" />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan unit kerja anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="nomor_wa">No WA</label>
        <input type="number" class="form-control" id="nomor_wa" name="nomor_wa" placeholder="masukan no WA" />
        <div class="valid-feedback">Terisi</div>
        <div class="invalid-feedback">Silahkan masukan nomor whatsapp anda</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_suratPengantar">SURAT PENGANTAR (dari Kepala SKPD) file max 1MB</label>
        <input type="file" class="form-control" id="doc_suratPengantar" name="doc_suratPengantar" />
        @error('doc_suratPengantar')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_pangkatTerakhir">SK PANGKAT TERAKHIR</label>
        <input type="file" class="form-control" id="doc_pangkatTerakhir" name="doc_pangkatTerakhir" />
        @error('doc_pangkatTerakhir')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_jabatanAtasan">SK JABATAN ATASAN LANGSUNG</label>
        <input type="file" class="form-control" id="doc_jabatanAtasan" name="doc_jabatanAtasan" />
        @error('doc_jabatanAtasan')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_tandaLulus">SURAT TANDA LULUS UJIAN DINAS (Jika Ada)</label>
        <input type="file" class="form-control" id="doc_tandaLulus" name="doc_tandaLulus" />
        @error('doc_tandaLulus')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_skAlihtugas">SK ALIH TUGAS (Jika Ada)</label>
        <input type="file" class="form-control" id="doc_skAlihtugas" name="doc_skAlihtugas" />
        @error('doc_skAlihtugas')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_penilaian2022">PENILAIAN KINERJA 2022</label>
        <input type="file" class="form-control" id="doc_penilaian2022" name="doc_penilaian2022" />
        @error('doc_penilaian2022')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_penilaian2023">PENILAIAN KINERJA 2023</label>
        <input type="file" class="form-control" id="doc_penilaian2023" name="doc_penilaian2023" />
        @error('doc_penilaian2023')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_skCpns">SK CPNS (KP PERTAMA)</label>
        <input type="file" class="form-control" id="doc_skCpns" name="doc_skCpns" />
        @error('doc_skCpns')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_skPns">SK PNS (KP PERTAMA)</label>
        <input type="file" class="form-control" id="doc_skPns" name="doc_skPns" />
        @error('doc_skPns')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_STTPL">STTPL (KP PERTAMA)</label>
        <input type="file" class="form-control" id="doc_STTPL" name="doc_STTPL" />
        @error('doc_STTPL')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_beritaAcarasumpah">BERITA ACARA SUMPAH (KP PERTAMA)</label>
        <input type="file" class="form-control" id="doc_beritaAcarasumpah" name="doc_beritaAcarasumpah" />
        @error('doc_beritaAcarasumpah')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_ijazah">IJAZAH *ketika diangkat (KP PERTAMA)</label>
        <input type="file" class="form-control" id="doc_ijazah" name="doc_ijazah" />
        @error('doc_ijazah')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="doc_transkrip">TRANSKRIP *ketika diangkat (KP PERTAMA)</label>
        <input type="file" class="form-control" id="doc_transkrip" name="doc_transkrip" />
        @error('doc_transkrip')
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
            const formName = document.querySelector('form').getAttribute('id') || 'formReguler';
            const formFields = [
                "periode", "nama", "nip", "golongan", "jabatan", "date",
                "unit_kerja", "nomor_wa", "doc_suratPengantar", "doc_PangkatTerakhir",
                "doc_jabatanAtasan", "doc_tandaLulus", "doc_skAhlitugas", "doc_penilaian2022",
                "doc_penilaian2023", "doc_skCpns", "doc_skPns", "doc_STTPL",
                "doc_beritaAcarasumpah", "doc_ijazah", "doc_transkrip",

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
            const formFields = [
                "periode", "nama", "nip", "golongan", "jabatan", "date",
                "unit_kerja", "nomor_wa", "doc_suratPengantar", "doc_PangkatTerakhir",
                "doc_jabatanAtasan", "doc_tandaLulus", "doc_skAhlitugas", "doc_penilaian2022",
                "doc_penilaian2023", "doc_skCpns", "doc_skPns", "doc_STTPL",
                "doc_beritaAcarasumpah", "doc_ijazah", "doc_transkrip",
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
