<!DOCTYPE html>

<html
lang="en"
class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
dir="ltr"
data-theme="theme-default"
data-assets-path="{{ asset('assets/') }}/"
data-template="vertical-menu-template">
<head>
    <title>Formulir usul kenaikan pangkat struktural</title>
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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulir usul kenaikan pangkat struktural</h4>

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                        <h5 class="card-header">Formulir usul kenaikan pangkat struktural</h5>
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('jabatan.struktural.update', $form->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Keterangan yang harus diperbaiki</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly
                                    style="padding: 0.375rem 0.75rem 0.375rem 0.5rem; resize: none;">{{ $form->keterangan ?? 'Tidak ada catatan' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="periode">Pilih Periode</label>
                                    <select class="form-select" id="periode" name="periode" required>
                                        @foreach ($periode as $periodeOption)
                                            <option value="{{ $periodeOption->periode }}" {{ old('periode', $form->periode) === $periodeOption->periode ? 'selected' : '' }}>
                                                {{ $periodeOption->periode }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Terisi</div>
                                    <div class="invalid-feedback">Silahkan pilih periode</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama lengkap" value="{{ old('nama', $form->nama) }}" required />
                                    <div class="valid-feedback">Terisi</div>
                                    <div class="invalid-feedback">Silahkan masukan nama anda</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="nip">NIP</label>
                                    <input type="number" class="form-control" id="nip" name="nip" placeholder="masukan NIP" value="{{ old('nip', $form->nip) }}" required />
                                    <div class="valid-feedback">Terisi</div>
                                    <div class="invalid-feedback">Silahkan masukan nomor NIP anda</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="golongan">Pangkat/Golongan Ruang</label>
                                    <select class="form-select" id="golongan" name="golongan" required>
                                        @foreach ($golongan as $golonganOption)
                                            <option value="{{ $golonganOption->golongan }}" {{ old('golongan', $form->golongan) === $golonganOption->golongan ? 'selected' : '' }}>
                                                {{ $golonganOption->golongan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Terisi</div>
                                    <div class="invalid-feedback">Silahkan pilih pangkat/golongan ruang</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="masukan jabatan" value="{{ old('jabatan', $form->jabatan) }}" required />
                                    <div class="valid-feedback">Terisi</div>
                                    <div class="invalid-feedback">Silahkan masukan jabatan anda</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="date">Tanggal lahir</label>
                                    <input type="text" class="form-control flatpickr-validation" id="date" name="date" placeholder="YYYY-MM-DD" value="{{ old('date', $form->date) }}" required />
                                    <div class="valid-feedback">Terisi</div>
                                    <div class="invalid-feedback">Silahkan masukan tanggal lahir anda</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="unit_kerja">Unit kerja</label>
                                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" placeholder="masukan unit kerja" value="{{ old('unit_kerja', $form->unit_kerja) }}" required />
                                    <div class="valid-feedback">Terisi</div>
                                    <div class="invalid-feedback">Silahkan masukan unit kerja anda</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="nomor_wa">No WA</label>
                                    <input type="number" class="form-control" id="nomor_wa" name="nomor_wa" placeholder="masukan no WA" value="{{ old('nomor_wa', $form->nomor_wa) }}" required />
                                    <div class="valid-feedback">Terisi</div>
                                    <div class="invalid-feedback">Silahkan masukan nomor whatsapp anda</div>
                                </div>
                                @foreach ([
                                    'doc_suratPengantar' => 'SURAT PENGANTAR (dari Kepala SKPD)',
                                    'doc_pangkatTerakhir' => 'SK PANGKAT TERAKHIR',
                                    'doc_jabatanAtasan' => 'SK JABATAN ATASAN LANGSUNG',
                                    'doc_penilaian2022' => 'PENILAIAN KINERJA 2022',
                                    'doc_penilaian2023' => 'PENILAIAN KINERJA 2023',
                                    'doc_jabatanLama' => 'DOKUMEN JABATAN LAMA',
                                    'doc_jabatanBaru' => 'DOKUMEN JABATAN BARU',
                                    'doc_beritaAcarasumpahlama' => 'BERITA ACARA SUMPAH LAMA',
                                    'doc_beritaAcarasumpahbaru' => 'BERITA ACARA SUMPAH BARU',
                                    'doc_pernyataanPelantikanlama' => 'PERNYATAAN PELANTIKAN LAMA',
                                    'doc_pernyataanPelantikanbaru' => 'PERNYATAAN PELANTIKAN BARU',
                                    'doc_riwayatAtasan' => 'RIWAYAT ATASAN',
                                    'doc_ujianDinas' => 'UJIAN DINAS',
                                    'doc_skAlihtugas' => 'SK ALIH TUGAS (Jika Ada)',
                                ] as $field => $label)
                                    <div class="mb-3">
                                        <label class="form-label" for="{{ $field }}">{{ $label }}</label>
                                        <input type="file" class="form-control" id="{{ $field }}" name="{{ $field }}" accept="application/pdf" />
                                        @if ($form->$field)
                                            <small>Current file: <a href="{{ asset('assets/documentStruktural/' . $form->$field) }}" target="_blank">View current file</a></small>
                                        @endif
                                    </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary submit">Perbaiki</button>
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
        $(document).on('click', '.submit', function(e){
            var notificationid = $(this).attr('data-id');
            e.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
            title: "Simpan form?",
            text: "form yang anda simpan tidak di edit kembali",
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
