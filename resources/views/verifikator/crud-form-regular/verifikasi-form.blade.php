<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir usul kenaikan pangkat jabatan regular</title>
    @include('layouts verifikator.header')
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

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulir usul kenaikan pangkat jabatan regular</h4>

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <h5 class="card-header">Formulir usul kenaikan pangkat jabatan regular</h5>
                        </div>
                      <div class="card-body">
                        <form  action="{{ route('verifikasi.jabatan.regular.post', $form->id) }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-country">Pilih status</label>
                                <select class="form-select" id="bs-validation-country" name="status" required>
                                    @foreach ($status as $status)
                                        <option value="{{ $status->status }}" {{ old('status') === $status->status ? 'selected' : '' }}>
                                            {{ $status->status }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">Terisi</div>
                                <div class="invalid-feedback">Silahkan masukan status</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Masukan Keterangan (opsional)</label>
                                <textarea
                                  id="basic-default-message"
                                  name="keterangan"
                                  class="form-control"
                                  placeholder="Masukan Keterangan"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-skPangkat">File PDF</label>
                                <input type="file" class="form-control" id="bs-validation-upload-skPangkat" name="file" accept="application/pdf" required />
                                <div class="invalid-feedback">Silahkan unggah file PDF maksimal 1MB</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-name">Periode</label>
                                <input type="text" class="form-control" id="bs-validation-name" value="{{ $form->periode }}" readonly  />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-name">Nama lengkap</label>
                                <input type="text" class="form-control" id="bs-validation-name" value="{{ $form->nama }}" readonly  />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-nip">NIP</label>
                                <input type="text" class="form-control" id="bs-validation-nip" value="{{ $form->nip }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-nip">Pangkat/Golongan Ruang</label>
                                <input type="text" class="form-control" id="bs-validation-nip" value="{{ $form->golongan }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="bs-validation-jabatan" value="{{ $form->jabatan }}" readonly />
                            </div>
                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-dob">Tanggal lahir</label>
                                <input type="text" class="form-control flatpickr-validation" id="bs-validation-dob" value="{{ $form->date }}" readonly />
                            </div>
                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-dob">Unit kerja</label>
                                <input type="text" class="form-control" id="bs-validation-unit_kerja" value="{{ $form->unit_kerja }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-wa">No WA</label>
                                <input type="text" class="form-control" id="bs-validation-wa" value="{{ $form->nomor_wa }}" readonly />
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_suratPengantar) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_suratPengantar) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SURAT PENGANTAR</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_suratPengantar) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_pangkatTerakhir) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_pangkatTerakhir) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SK PANGKAT TERAKHIR</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_pangkatTerakhir) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_jabatanAtasan) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_jabatanAtasan) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SK JABATAN ATASAN LANGSUNG</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_jabatanAtasan) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_tandaLulus) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_tandaLulus) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SERTIFIKAT TANDA LULUS</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_tandaLulus) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_skAlihtugas) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_skAlihtugas) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SK ALIH TUGAS</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_skAlihtugas) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_penilaian2022) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_penilaian2022) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">PENILAIAN KINERJA 2022</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_penilaian2022) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_penilaian2023) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_penilaian2023) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">PENILAIAN KINERJA 2023</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_penilaian2023) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_skCpns) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_skCpns) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">SK CPNS</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_skCpns) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_STTPL) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_STTPL) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">STTPL</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_STTPL) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_beritaAcarasumpah) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_beritaAcarasumpah) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">BERITA ACARA SUMPAH</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_beritaAcarasumpah) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_ijazah) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_ijazah) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">IJAZAH</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_ijazah) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <object data="{{ asset('assets/documentRegular/' . $form->doc_transkrip) }}" type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a href="{{ asset('assets/documentRegular/' . $form->doc_transkrip) }}" download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                    <div class="card-body p-3 pt-2" style="display: grid; ">
                                        <a class="h5" href="">TRANSKRIP</a>
                                        <a class="w-100 btn btn-label-primary" href="{{ asset('assets/documentRegular/' . $form->doc_transkrip) }}" download><i class="me-2 mt-n1 scaleX-n1-rtl"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary submit" data-id="{{ $form->id }}">Verifikasi sekarang</button>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>


            </div>




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
            title: "Sudah yakin dengan keputusan ini?",
            text: "Silahkan cek kembali jika masih ragu",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, verifikasi sekarang"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                title: "Berhasil verifikasi data",
                text: "Data berhasil diverifikasi",
                icon: "success"
                });
            }
            });
        });
    </script>
    <script>
        function verifyDocument(formId) {
            // Assuming formId is the ID of the form element
            const form = document.getElementById(formId);
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.open(data.whatsapp_url, '_blank');
                    // Optionally, redirect to another page or show a success message
                } else {
                    alert('Error verifying document');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>

</body>
</html>
