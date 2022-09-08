<header class="truyen-header">
<nav class="navbar navbar-truyen">
 <div class="container">
                <div class="navbar-header">
                        <a href="#" class="navbar-logo hidden-sm hidden-xs"> <img
                                class="img-fluid" src="#" alt="">
                        </a>
                        <a href="tieuthuyetviet.com" class="navbar-logo hidden-sm hidden-xs"> 
                            <!-- <img class="img-fluid" src="public_asset/static/images/logo.png" alt=""> -->
                        </a>
                    <a href="#" class="navbar-search-btn js-open-search-box-mobile d-md-block d-lg-none">
                        <i class="truyen-icon icon-search"></i>
                    </a>
                    <div class="navbar-category">
                        <button class="navbar-category-btn js-open-sidebar">
                                        <span class="lines">
                                            <span class="line"></span>
                                            <span class="line"></span>
                                            <span class="line"></span>
                                        </span>
                            <span class="hidden-xs hidden-sm">Danh Mục</span>
                        </button>
                        <ul class="navbar-category-list">
                            <li class="col-4 float-left">
                                <a href="final-story" title="Truyện Hoàn Thành">Truyện Hoàn Thành</a>
                            </li>
                            <li class="col-4 float-left">
                                <a href="new-story" title="Truyện Mới">Truyện Mới</a>
                            </li>
                            <li class="col-4 float-left">
                                <a href="#" title="Truyện Vip">Truyện Vip</a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-category">
                        <button class="navbar-category-btn js-open-sidebar">
                                <span class="lines">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </span>
                            <span class="hidden-xs hidden-sm">Thể loại</span>
                        </button>
                        <ul class="navbar-category-list">
                            @foreach($cate as $ct)
                            <li class="col-4 float-left">
                                <a href="{{$ct->id}}/the-loai-{{$ct->metaTitle}}">{{$ct->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="custom navbar-custom">
                    <ul class="nav navbar-nav navbar-right" style="flex-direction: row;">
                        <li>
                            <div class="search-block">
                                <div class="actions">
                                    <button type="submit" title="Tìm kiếm"
                                            class="search-toggle-btn" id="js-search-toggle">
                                        <i class="truyen-icon icon-search"></i>
                                    </button>
                                </div>
                                <form id="js-search-panel" class="search-panel" action="#" method="POST">
                                    <div class="txtDiv">
                                        <input type="text" name="txtKeyword" id="txtKeyword" value=""
                                               placeholder="Tên truyện" class="form-control"
                                               autocomplete="off" required
                                               oninvalid="this.setCustomValidity('Bạn chưa nhập gì để tìm kiếm!')">
                                        <button class="btn btn-search mt-0" type="submit">
                                            <i class="truyen-icon icon-search-primary"></i>
                                        </button>
                                        <ul id="ulNoMatch"
                                            class="ui-autocomplete ui-menu ui-widget1 ui-widget1-content ui-corner-all"
                                            role="listbox" aria-activedescendant="ui-active-menuitem" style="z-index: 16;display: none; width:  150px;">
                                            <li class="ui-menu-item" role="menuitem">
                                                <a class="ui-corner-all" tabindex="-1">Không Có Truyện Phù Hợp </a>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <?php 
                                if(Auth::check()==FALSE)
                                {
                        ?>
                        <li >
                            <div class="user-block h-100">
                                <i class="truyen-icon icon-user"></i>
                                <a href="login"> Đăng nhập </a>
                                <a class="diver disabled">|</a>
                                <a href="register"> Đăng ký </a>
                            </div>
                        </li>
                        <?php } else {?>
                            <li >
                            <div class="user-block h-100">
                                <i class="truyen-icon icon-user"></i>
                                <a href="index"> <?php 
                                $name = Auth::user()->name;
                                if($name) echo $name;
                                else echo "Người dùng"
                                ?> </a>
                                <a class="diver disabled">|</a>
                                <a href="logout"> Đăng Xuất </a>
                            </div>
                        </li>  
                        <?php }?>
                    </ul>
                </div>
            </div>
        </nav>
</header>
    <aside class="truyen-sidebar">
        <a href="#" class="sidebar-close js-close-sidebar"></a>
        <div class="sidebar-container">
            <div class="sidebar-header" >
                <div class="user-icon">
                    <i class="truyen-icon icon-user"></i>
                </div>
                <!-- <div class="card-menu">
                    <div class="list-group" style="margin-bottom: 20px;">
                        <div class="list-group-item list-group-item-sidebar">
                            <a class="truyen-sidebar-user-title" role="button"
                               data-toggle="collapse" href="#truyen-user-login-custom"
                               aria-expanded="false"
                               aria-controls="truyen-user-login-custom">Đăng nhập /
                                Đăng ký <span class="truyen-icon icon-white-next"></span>
                            </a>
                        </div>
                        <div class="list-group collapse"
                                 id="truyen-user-login-custom">
                            <div
                                    class="list-group-item list-group-item-sidebar list-group-item-diver"></div>
                            <div class="list-group-item list-group-item-sidebar">
                                <a href="dn" class="login-btn">Đăng nhập</a>
                            </div>
                            <div class="list-group-item list-group-item-sidebar">
                                <a href="dk" class="login-btn">Đăng ký</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="sidebar-header" sec:authorize="isAuthenticated()">
                <div class="user-icon">
                    <i class="truyen-icon icon-user"></i>
                </div>
    
                <a if="${#request.userPrincipal != null}" href="@{/logout}" class="user-logout">Thoát</a>
                <div class="card-menu">
                    <div class="list-group" style="margin-bottom: 20px;">
                        <div class="list-group-item list-group-item-sidebar">
                            <a class="truyen-sidebar-user-title collapsed"
                               role="button" data-toggle="collapse"
                               href="#truyen-user-menu-collapse" aria-expanded="false"
                               aria-controls="truyen-user-menu-collapse" sec:authentication="name"> <span
                                    class="truyen-icon icon-white-next"></span>
                            </a>
                        </div>
                        <!-- <div class="list-group collapse"
                                 id="truyen-user-menu-collapse">
                            <div class="list-group-item list-group-item-sidebar list-group-item-diver"></div>
                            <div class="list-group-item list-group-item-sidebar">
                                <a href="/tai-khoan/datruyen/">Đăng truyện<span
                                        class="truyen-icon icon-white-next"></span>
                                </a>
                            </div>
                            <div class="list-group-item list-group-item-sidebar">
                                <a href="/tai-khoan/theo_doi/">Truyện Theo Dõi<span
                                        class="truyen-icon icon-white-next"></span>
                                </a>
                            </div>
                            <div class="list-group-item list-group-item-sidebar">
                                <a href="/account/list_story/">Quản lý truyện<span
                                        class="truyen-icon icon-white-next"></span></a>
                            </div>
                            <div
                                    class="list-group-item list-group-item-sidebar list-group-item-diver"></div>
                            <div class="list-group-item list-group-item-sidebar">
                                <a href="/tai-khoan/tu-truyen/">Tủ truyện<span
                                        class="truyen-icon icon-white-next"></span></a>
                            </div>
                            <div
                                    class="list-group-item list-group-item-sidebar list-group-item-diver"></div>
                            <div class="list-group-item list-group-item-sidebar">
                                <a href="/tai-khoan/">Hồ sơ <span
                                        class="truyen-icon icon-white-next"></span></a>
                            </div>
                            <div
                                    class="list-group-item list-group-item-sidebar list-group-item-diver"></div>
                            <div class="list-group-item list-group-item-sidebar">
                                <a href="/tai-khoan/nap-dau">Nạp Đậu<span
                                        class="truyen-icon icon-white-next"></span></a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <div class="list-group" style="margin-bottom: 20px;">
                    <div class="list-group-item list-group-item-action list-group-item-sidebar">
                        <a href="@{/}"><i class="fas fa-home"></i>Trang chủ
                            <span class="truyen-icon icon-next"></span>
                        </a>
                    </div>
                </div>
                <div class="list-group" style="margin-bottom: 20px;">
                    <div class="list-group-item list-group-item-action list-group-item-sidebar">
                        <a href="@{/danh-muc/moi-cap-nhat}" target="_blank"
                           title="Truyện Mới"> Truyện Mới <span
                                class="truyen-icon icon-next"></span>
                        </a>
                    </div>
                    <div class="list-group-item list-group-item-action list-group-item-sidebar">
                        <a href="@{/danh-muc/truyen-hoan-thanh}" target="_blank"
                           title="Truyện Hoàn Thành"> Truyện Hoàn Thành <span
                                class="truyen-icon icon-next"></span>
                        </a>
                    </div>
                    <div class="list-group-item list-group-item-action list-group-item-sidebar">
                        <a href="@{/danh-muc/truyen-vip}" target="_blank"
                           title="Truyện Vip"> Truyện Vip <span
                                class="truyen-icon icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="list-group" style="margin-bottom: 20px;">
                <div class="list-group-item list-group-item-action list-group-item-sidebar"
                         if="${categorylist != null && not #lists.isEmpty(categorylist)}"
                         each="category,iterStat : ${categorylist}">
                    <a href="@{'/the-loai/'+${category.id}+'/'+${category.metatitle}}"
                       title="'Truyện'+${category.name}"
                    ><span text="${iterStat.index+1}+' - '+${category.name}"></span> <span
                            class="truyen-icon icon-next"></span></a>
                </div>
            </div>
        </div>
    </aside>
    <a href="#" class="truyen-sidebar-overlay js-close-sidebar"></a>
    <div class="truyen-search-box">
        <div class="container">
            <form class="search-box-mobile" method="post" action="@{/search}">
                <input type="text" id="txtKeywordMobi" name="txtKeyword"
                       class="form-control" placeholder="Tên truyện hoặc tác giả không dấu" value=""
                       autocomplete="off" required oninvalid="this.setCustomValidity('Bạn chưa nhập gì để tìm kiếm!')">
                <button type="submit" class="search-box-mobile-btn"
                        id="js-search-box-mobile-btn">
                    <i class="truyen-icon icon-search-primary"></i>
                </button>
            </form>
        </div>
    </div>
    <a href="#" class="truyen-search-box-overlay js-close-search-box"></a>