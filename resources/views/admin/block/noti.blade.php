<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <h6 class="p-3 mb-0">Thông báo</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
        @foreach($noti as $nt)    
            <div class="preview-item-content">
              <p class="preview-subject mb-1">{{$nt -> name}}</p>
              <p class="text-muted ellipsis mb-0"> {{$nt -> content}} </p>
            </div>
          </a>
        @endforeach  
          <div class="dropdown-divider"></div>
          <p class="p-3 mb-0 text-center">See all notifications</p>
        </div>