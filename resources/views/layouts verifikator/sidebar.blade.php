<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="/dashboard-pengusul" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/') }}/img/favicon/logo.png" alt="" width="40px" height="40px">
        </span>
        <span class="app-brand-text demo menu-text fw-bold">Verifikator</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item {{ Request::is('dashboard-verifikator') ? 'active' : '' }}">
        <a href="/dashboard-verifikator" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-progress"></i>
          <div data-i18n="Proses kenaikan pangkat">Proses kenaikan pangkat</div>
        </a>
            <ul class="menu-sub">
            <li class="menu-item {{ Request::is('proses-table-regular-verifikator') ? 'active' : '' }}">
                <a href="/proses-table-regular-verifikator" class="menu-link" >
                <div data-i18n="Proses Formulir usul kenaikan pangkat reguler">Formulir usul kenaikan pangkat reguler</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('proses-table-jabatan-fungsional-verifikator') ? 'active' : '' }}">
                <a href="/proses-table-jabatan-fungsional-verifikator" class="menu-link">
                <div data-i18n="Proses Formulir usul kenaikan pangkat jabatan fungsional">Proses Formulir usul kenaikan pangkat jabatan fungsional</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('proses-table-struktural-verifikator') ? 'active' : '' }}">
                <a href="/proses-table-struktural-verifikator" class="menu-link" >
                <div data-i18n="Proses Formulir usul kenaikan pangkat jabatan struktural">Proses Formulir usul kenaikan pangkat jabatan struktural</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('proses-table-ijazah-verifikator') ? 'active' : '' }}">
                <a href="/proses-table-ijazah-verifikator" class="menu-link" >
                <div data-i18n="Proses Formulir usul kenaikan pangkat penyesuaian ijazah">Proses Formulir usul kenaikan pangkat penyesuaian ijazah</div>
                </a>
            </li>
            </ul>
      </li>
      {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-files"></i>
          <div data-i18n="Form Kenaikan Pangkat">Form Kenaikan Pangkat</div>
        </a>
            <ul class="menu-sub">
            <li class="menu-item {{ Request::is('table-regular-verifikator') ? 'active' : '' }}">
                <a href="/table-regular-verifikator" class="menu-link" >
                <div data-i18n="Formulir usul kenaikan pangkat reguler">Formulir usul kenaikan pangkat reguler</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('table-jabatan-fungsional-verifikator') ? 'active' : '' }}">
                <a href="/table-jabatan-fungsional-verifikator" class="menu-link">
                <div data-i18n="Formulir usul kenaikan pangkat jabatan fungsional">Formulir usul kenaikan pangkat jabatan fungsional</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('table-jabatan-struktural-verifikator') ? 'active' : '' }}">
                <a href="/table-jabatan-struktural-verifikator" class="menu-link" >
                <div data-i18n="Formulir usul kenaikan pangkat jabatan struktural">Formulir usul kenaikan pangkat jabatan struktural</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('table-jabatan-ijazah-verifikator') ? 'active' : '' }}">
                <a href="/table-jabatan-ijazah-verifikator" class="menu-link" >
                <div data-i18n="Formulir usul kenaikan pangkat penyesuaian ijazah">Formulir usul kenaikan pangkat penyesuaian ijazah</div>
                </a>
            </li>
            </ul>
      </li> --}}

    </ul>
  </aside>
  <!-- / Menu -->
