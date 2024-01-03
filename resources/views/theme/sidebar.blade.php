 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
         <div class="sidebar-brand-icon rotate-n-15">
             <!-- <i class="fas fa-laugh-wink"></i> -->
             <img src="{!! asset(auth()->user()->logo) !!}" style="width:60px;height:60px;">
         </div>
         @if (auth()->user()->role == 'user')
             <div class="sidebar-brand-text mx-3">{{ auth()->user()->name }} </sup></div>
         @else
             <div class="sidebar-brand-text mx-3">Annewatt Admin </sup></div>
         @endif

     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ route('home') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->


     <!-- Heading -->
     @if (auth()->user()->role == 'user')
         <hr class="sidebar-divider">
         <div class="sidebar-heading">
             Riders Management
         </div>

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                 aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-sm fa-fw mr-2 text-gray-400 fa-cog"></i>
                 <span>Rider</span>
             </a>
             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" href={{ route('viewriders') }}>View All Riders</a>
                     <a class="collapse-item" href={{ route('createRider') }}> @csrf Add New Rider</a>

                 </div>
             </div>
         </li>
     @endif

     <!-- Divider -->

     <!-- Nav Item - Utilities Collapse Menu -->

     @if (auth()->user()->role == 'user')
         <hr class="sidebar-divider">
         <div class="sidebar-heading">
             Tickets Management
         </div>

         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                 aria-expanded="true" aria-controls="collapseUtilities">
                 <i class="fas fa-sm fa-fw mr-2 text-gray-400 fa-wrench"></i>
                 <span>Ticket</span>
             </a>
             <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" href={{ route('createTicket') }}>@csrf New Ticket Entry</a>
                     <a class="collapse-item" href={{ route('viewtickets') }}>View All Tickets</a>
                 </div>
             </div>
         </li>
     @endif
     <!-- Heading -->

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Utilities
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     @if (auth()->user()->role == 'user')
         <li class="nav-item">
             <a class="nav-link" href={{ route('viewmessages') }}>
                 <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                 <span>Messages</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href={{ route('composemsg') }}>
                 <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                 <span>Compose Message</span></a>
         </li>
     @endif
     <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#changePassModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Change Password
        </a>
    </li>
     <li class="nav-item">
         <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
             Logout
         </a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
