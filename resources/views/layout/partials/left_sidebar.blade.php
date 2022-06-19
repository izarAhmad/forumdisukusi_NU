    
    <aside class="main-sidebar sidebar-dark-primary elevation-4"  >
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
        <img src="{{ asset('user/images/twitter-icon.svg') }}"
            class="brand-image mt-1 ml-4 mr-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold text-light">Forum Diskusi NU</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-1 pb-1 mb-1 d-flex">

            <div class="info nav nav-pills nav-sidebar flex-column"  data-widget="treeview" role="menu" data-accordion="false">
                
                
                 @if (Auth::user()->role==='admin')
                    <li class="nav-item">
                        <a href="/profile" class="nav-link font-weight-bold text-light" onclick="">
                           <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/96/ffffff/external-admin-web-hosting-flatart-icons-outline-flatarticons.png"/>
                            Admin
                        </a>
                    </li>
                    @endif
                     <li class="nav-item">
                        <a href="/manager/{{Auth::user()->id}}/edit" class="nav-link font-weight-bold text-light">
                            <img src="https://img.icons8.com/small/96/ffffff/admin-settings-male.png"/>
                            Your profile
                        </a>
                    </li> 
                   
                    <li class="nav-item">
                        <a href="/perpustakaan" class="nav-link font-weight-bold text-light" onclick="">
                            <img src="https://img.icons8.com/small/96/ffffff/opened-folder--v1.png"/>
                            Perpustakaan
                        </a>
                    </li>
                    
                    <li class="nav-item">
                    <a href="/logout" class="nav-link font-weight-bold text-light">
                            <img src="https://img.icons8.com/small/96/ffffff/logout-rounded.png"/>
                            Log out
                        </a>
                    </li>
            
              
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->


                <a href="/forum/create" type="submit" class="btn btn-light btn-block btn-lg text-dark mt-4" style="border-radius:50px" >Tanya</a>


            </div>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
