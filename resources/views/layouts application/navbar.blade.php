 <!-- Navbar -->

 <nav
 class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
 id="layout-navbar">
 <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
   <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
     <i class="ti ti-menu-2 ti-sm"></i>
   </a>
 </div>

 <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
   <!-- Search -->
   <div class="navbar-nav align-items-center">
     <div class="nav-item navbar-search-wrapper mb-0">
       <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
       </a>
     </div>
   </div>
   <!-- /Search -->

   <ul class="navbar-nav flex-row align-items-center ms-auto">

     <!-- Notification -->
     <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
            <i class="ti ti-bell ti-md"></i>
            <span class="badge bg-danger rounded-pill badge-notifications">{{ $unreadCount }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end py-0">
            <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                    <h5 class="text-body mb-0 me-auto">Notification</h5>
                    <form action="{{ route('notifications.readAll') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-notifications-all text-body btn btn-link p-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read">
                            <i class="ti ti-mail-opened fs-4"></i>
                        </button>
                    </form>
                </div>
            </li>
            <li class="dropdown-notifications-list scrollable-container">
                <ul class="list-group list-group-flush">
                    @foreach ($notifications as $item)
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $item->type}}</h6>
                                    <p class="mb-0">{{ $item->data }}</p>
                                    <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    @if(!$item->read)
                                        <form action="{{ route('notifications.read', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-notifications-read btn btn-link p-0">
                                                <span class="badge badge-dot"></span>
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('notifications.archive', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-notifications-archive btn btn-link p-0">
                                            <span class="ti ti-x"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="dropdown-menu-footer border-top">
                <a href="/notifikasi-pengusul" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                    View all notifications
                </a>
            </li>
        </ul>
    </li>


     <!--/ Notification -->

     <!-- User -->
     <li class="nav-item navbar-dropdown dropdown-user dropdown">
       <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
         <div class="avatar avatar-online">
            {{-- <i class="ti ti-user-circle"></i> --}}
           <img src="{{ asset('assets/photoprofile/' . $user->photo) }}" alt class="h-auto rounded-circle" />
         </div>
       </a>
       <ul class="dropdown-menu dropdown-menu-end">
         <li>
           <a class="dropdown-item" href="/profile-pengusul">
             <div class="d-flex">
               <div class="flex-shrink-0 me-3">
                 <div class="avatar avatar-online">
                   <img src="{{ asset('assets/photoprofile/' . $user->photo) }}" alt class="h-auto rounded-circle" />
                 </div>
               </div>
               <div class="flex-grow-1">
                 <span class="fw-medium d-block">{{ $user->nama }}</span>
                 <small class="text-muted">{{ $user->level }}</small>
               </div>
             </div>
           </a>
         </li>
         <li>
           <div class="dropdown-divider"></div>
         </li>
         <!-- <li>
           <a class="dropdown-item" href="/profile">
             <i class="ti ti-user-check me-2 ti-sm"></i>
             <span class="align-middle">My Profile</span>
           </a>
         </li> -->
         <li>
           <div class="dropdown-divider"></div>
         </li>
         <li>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="ti ti-logout me-2 ti-sm"></i>
                    <span class="align-middle">Log Out</span>
                </button>
            </form>
         </li>
       </ul>
     </li>
     <!--/ User -->
   </ul>
 </div>

 <!-- Search Small Screens -->
 <div class="navbar-search-wrapper search-input-wrapper d-none">
   <input
     type="text"
     class="form-control search-input container-xxl border-0"
     placeholder="Search..."
     aria-label="Search..." />
   <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
 </div>
</nav>

<!-- / Navbar -->
