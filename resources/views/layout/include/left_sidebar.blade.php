<input type="checkbox" id="nav-toggle">
    <div class="sidebar ">
        <div class="sidebar-brand">
        <!-- Brand Logo -->
        
        <img src="{{ asset('user/images/twitter-icon.svg') }}"
            class="brand-image mt-1 ml-4 mr-3"
            style="opacity: .8">
        <span class="las la-clinic-medical">Forum Diskusi NU</span>
        
        </div>
<hr>
        <!-- Sidebar -->
        <!-- Sidebar user (optional) -->
        <div class="sidebar-menu">
        
       
                
                
            <ul>
                @if (Auth::user()->role==='admin')
                <li>
                    <a href="/profile" class="active"><span class="las la-home"></span>
                    <span>Admin</span></a>
                </li>
                @endif
                
                <li>
                    <a href="/manager/{{Auth::user()->id}}/edit" ><span class="las la-stethoscope"></span>
                    <span>Profile</span></a>
                </li>
                
                <li>
                    <a href="/perpustakaan" ><span class="las la-user active" ></span>
                    <span>Perpustakaan</span></a>
                </li>
                <li>
                    <a href="/logout" ><span class="las la-user-injured" ></span>
                    <span>Logout</span></a>
                </li>
                
            </ul>
            <hr>
               
            </div>
            <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->


                <a href="/forum/create" type="submit" class="btn btn-light btn-block btn-lg text-dark mt-4" style="border-radius:50px" >Tanya</a>


            </div>
            </ul>
        </nav>
        </div>

        <!-- Sidebar Menu -->
        
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </div>
