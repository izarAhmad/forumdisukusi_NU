<nav class="main-header navbar navbar-expand navbar-dark navbar-grey-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-sm-inline-block">
        <a href="/forum" class="nav-link">Home</a>
      </li>
      
    </ul>

    
    <div class="ml-auto mr-3">
      
      <div class="user-panel mt-1 pb-1 mb-1 d-flex">
      
    <li class="nav-item has-treeview">
                <a href="#" class="nav-link media pl-1">
                    <div>
                        <img src="{{ Auth::user()->profile->getAvatar() }}" class=" img-circle img-size-40  mr-2  " alt="user-image">
                    </div>
                    <div class="media-body pl-1 mb-1">
                        <h3 class="dropdown-item-title font-weight-bold text-light">
                        {{ Auth::user()->name }}
                        </h3>
                        
                    </div>
                    
                </a>
                
                </li>
      
      </div>
    </div>

  </nav>