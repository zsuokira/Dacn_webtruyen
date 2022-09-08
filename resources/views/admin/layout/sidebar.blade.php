<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="admin"><img src="admin_asset/assets/images/logo.svg" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="admin"><img src="admin_asset/assets/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <ul class="nav">
    <!-- Profile -->
    <li class="nav-item profile"> 
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="{{Auth::user()->avatar}}" alt="">
            <span class="count bg-success"></span>
          </div>
          
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal"><p>{{Auth::user()->name}}</p></h5>
            <span> 
              <?php
              $name = Auth::user()->role()->orderBy('id','DESC')->first();
              if($name){
                $na=$name->name;
                if($na=="USER") echo "";
                if($na=="AUTHOR") echo "Tác giả";
                if($na=="SMOD") echo "Kiểm duyệt";
                if($na=="ADMIN") echo "Quản trị viên tối cao";
              }
              ?>
              </span>
          </div>
        </div>
      </div>
    </li>
    <!-- End-Profile -->
    
    <li class="nav-item nav-category">
      <span class="nav-link">For User</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="favorite-story">
        <span class="menu-icon">
          <i class="mdi mdi-book-variant"></i>
        </span>
        <span class="menu-title">Tủ Sách Yêu Thích</span>
      </a>
    </li>
    @hasRole('author')
    
    <li class="nav-item nav-category">
      <span class="nav-link">For Author</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="add-story">
        <span class="menu-icon">
          <i class="mdi mdi-book-plus"></i>
        </span>
        <span class="menu-title">Đăng Truyện Mới</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="list-story/{{Auth::user()->id}}">
        <span class="menu-icon">
          <i class="mdi mdi-format-list-checkbox"></i>
        </span>
        <span class="menu-title">Danh Sách</span>
      </a>
    </li>
    @endhasRole
    @hasRole('ADMIN')
    <li class="nav-item nav-category">
      <span class="nav-link">For Admin</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <span class="menu-icon">
          <i class="mdi mdi-account-multiple"></i>
        </span>
        <span class="menu-title">Danh Sách Người Dùng</span>
      </a>
    </li>
    <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Thể Loại Chính</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-category"> Thêm Thể Loại </a></li>
                <li class="nav-item"> <a class="nav-link" href="list-category"> Danh Sách </a></li>
              </ul>
            </div>
    </li>
    <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#info" aria-expanded="false" aria-controls="info">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Giới thiệu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="info">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="get-info"> Thêm Mới </a></li>
                <li class="nav-item"> <a class="nav-link" href="#"> Danh Sách </a></li>
              </ul>
            </div>
    </li>
    <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Người Dùng</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="list-user"> Danh Sách </a></li>
              </ul>
            </div>
    </li>
    @endhasRole
    @hasRole('SMOD')
    <li class="nav-item nav-category">
      <span class="nav-link">For Smod</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="list-author-application">
        <span class="menu-icon">
          <i class="mdi mdi-email"></i>
        </span>
        <span class="menu-title">Yêu Cầu Làm Tác Giả</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="list-report">
        <span class="menu-icon">
          <i class="fas fa-exclamation-triangle"></i>
        </span>
        <span class="menu-title">Đơn Báo Xấu</span>
      </a>
    </li>
    <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#thongke" aria-expanded="false" aria-controls="thongke">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Thống Kê</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="thongke">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="list-author-mod">Danh sách tác giả</a></li>
                <li class="nav-item"> <a class="nav-link" href="list-story-mod">Danh sách tác phẩm</a></li>
              </ul>
            </div>
    </li>
  
    @endhasRole
    <?php if($name->name=="USER") {?>
    <li class="nav-item menu-items" >
      <a class="nav-link" href="get-author">
        <span class="menu-icon">
          <i class="mdi mdi-library-books"></i>
        </span>
        <span class="menu-title">Gửi đơn xin làm tác giả</span>
      </a>
    </li>
    <?php }?>
  </ul>
</nav>