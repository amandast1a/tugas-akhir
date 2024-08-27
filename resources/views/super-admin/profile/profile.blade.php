<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template">
  <head>
    <title>Profile - Super Admin</title>
    @include('layouts admin.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/css/pages/page-profile.css" />
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
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Super Admin Profile /</span> Profile</h4>

              <!-- Header -->
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="user-profile-header-banner" >
                      <img src="../../assets/img/pages/bg.jpg" alt="Banner image" class="rounded-top" width="1272px" height="100%" />
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <form id="uploadForm" action="{{ route('upload.profile.superadmin') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input class="form-control" name="photo" type="file" id="formFile" style="display: none;" onchange="submitForm()"/>
                        </form>
                      <div onclick="document.getElementById('formFile').click();" class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto" style="cursor: pointer;">
                        <img
                          src="{{ asset('assets/photoprofile/' . $user->photo) }}"
                          alt="user image"
                          class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" width="120px" height="120px"/>
                      </div>
                      <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                          class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                          <div class="user-profile-info">
                            <h4>{{ $user->nama }}</h4>
                            <ul
                              class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                              <li class="list-inline-item d-flex gap-1">
                                <i class="ti ti-color-swatch"></i> {{ $user->jabatan }}
                              </li>
                              {{-- <li class="list-inline-item d-flex gap-1"><i class="ti ti-map-pin"></i> Vatican City</li> --}}
                              <li class="list-inline-item d-flex gap-1">
                                <i class="ti ti-calendar"></i> Birdday {{ $user->tanggal_lahir }}
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Header -->

              <!-- User Profile Content -->
              <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-5">
                  <!-- About User -->
                  <div class="card mb-4">
                    <div class="card-body">
                      <small class="card-text text-uppercase">About</small>
                      <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3">
                          <i class="ti ti-user text-heading"></i
                          ><span class="fw-medium mx-2 text-heading">Full Name:</span> <span>{{ $user->nama }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                          <i class="ti ti-check text-heading"></i
                          ><span class="fw-medium mx-2 text-heading">Status:</span> <span>Active</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                          <i class="ti ti-crown text-heading"></i
                          ><span class="fw-medium mx-2 text-heading">Role:</span> <span>{{ $user->level }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                          <i class="ti ti-flag text-heading"></i
                          ><span class="fw-medium mx-2 text-heading">Country:</span> <span>Indonesia</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!--/ About User -->
                </div>
              </div>
              <!--/ User Profile Content -->
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
    <script src="{{ asset('assets/') }}/js/pages-profile.js"></script>

    <script>
        function submitForm() {
          document.getElementById('uploadForm').submit();
        }
    </script>
  </body>
</html>
