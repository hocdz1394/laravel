<header>
    <nav class="navbar navbar-expand-lg csheader zdex">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand ms-md-3 ms-lg-0" href="#"><img src="{{ asset('asset/img/logo.png') }}"
                    alt=""></a>
            <div class="collapse navbar-collapse order-3 order-lg-2 text-bg-light" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item p-2">
                        <a id="nav-link" class="nav-link" aria-current="page" href="{{ url('/') }}">Trang
                            chủ</a>
                    </li>
                    <li class="nav-item p-2">
                        <a id="nav-link" class="nav-link  position-relative" href="{{ url('/about') }}">Về chúng
                            tôi</a>
                    </li>
                    <li class="nav-item p-2 dropdown">
                        <a id="nav-link" class="nav-link dropdown-toggle  position-relative " href="#!products"
                            role="" data-bs-toggle="dropdown" aria-expanded="true">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/product') }}">Tất cả sản phẩm</a></li>
                            @foreach ($get_category as $item)
                                <li><a class="dropdown-item">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item p-2">
                        <a id="nav-link" class="nav-link  position-relative" href="{{ url('/sale') }}">Sale</a>
                    </li>
                    <li class="nav-item p-2 dropdown">
                        <a id="nav-link" class="nav-link dropdown-toggle  position-relative " href="#!news"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tin tức
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/news') }}">Bắt kịp xu hướng</a></li>
                            <li><a class="dropdown-item" href="#">Xây dựng phong cách</a></li>
                        </ul>
                    </li>
                    <li class="nav-item p-2">
                        <a id="nav-link" class="nav-link position-relative" href="{{ url('/contact') }}">Liên hệ</a>
                    </li>
                </ul>
                <form action="{{ route('products.search') }}" method="GET" class="d-flex me-auto" role="search">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Tìm kiếm"
                        aria-label="Search">
                    <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
                </form>

            </div>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 order-2 order-lg-3">
                <li class=" nav-item p-2 d-flex align-items-center">
                  @if (Auth::check())
                    <a href="javascript:void(0)" ng-click="get_message({{Auth::user()->id}})" data-bs-toggle="dropdown" data-bs-display="static"
                        aria-expanded="false" class="text-decoration-none">
                            <i class="bi bi-chat-dots-fill me-4 position-relative">
                              <span
                                  class="position-absolute top-0 start-90 translate-middle badge rounded-pill bg-primary fs-7">
                                  9
                                  <span class="visually-hidden">unread messages</span>
                              </span>
                            </i>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <div class="page-content page-container" id="page-content">
                                  <div class="">
                                      <div class=" container d-flex justify-content-center me-0">
                                          <div class="col-md-12 pe-0">
                                              <div class="card card-bordered">
                                                  <div class="card-header">
                                                      <h4 class="card-title"><strong>Chat</strong></h4>
                                                      <a class="btn btn-xs text-light btn-primary" href="#"
                                                          data-abc="true">Đóng đoạn chat</a>
                                                  </div>


                                                  <div class="ps-container ps-theme-default ps-active-y"
                                                      id="chat-content"
                                                      style="overflow-y: scroll !important; height:400px !important;">
                                                    

                                                      <div  ng-repeat="message in messages" 
                                                      ng-class="{'media media-chat': message.sender.role === 'admin', 'media media-chat media-chat-reverse': message.sender.role !== 'admin'}">
                                                          <div  class="media-body">
                                                            <p><strong>@{{ message.sender.name }}</strong></p>
                                                              <p>@{{ message.message }}</p>
                                                              <p class="meta"><time class="text-black" datetime="@{{ message.created_at }}">@{{ message.created_at | date:'short' }}</time>
                                                              </p>
                                                          </div>
                                                      </div>


                                                      
                                                      <div class="ps-scrollbar-x-rail"
                                                          style="left: 0px; bottom: 0px;">
                                                          <div class="ps-scrollbar-x" tabindex="0"
                                                              style="left: 0px; width: 0px;"></div>
                                                      </div>
                                                      <div class="ps-scrollbar-y-rail"
                                                          style="top: 0px; height: 0px; right: 2px;">
                                                          <div class="ps-scrollbar-y" tabindex="0"
                                                              style="top: 0px; height: 2px;"></div>
                                                      </div>
                                                  </div>

                                                  <div class="publisher bt-1 border-light">
                                                      <img class="avatar avatar-xs"
                                                          src="https://img.icons8.com/color/36/000000/administrator-male.png"
                                                          alt="...">
                                                      <input class="publisher-input" ng-model="newMessage" type="text" ng-keyup="$event.keyCode === 13 && handel_message()"
                                                          placeholder="Write something">

                                                      
                                                      
                                                      <div ng-click="handel_message(newMessage, {{ Auth::user()->id }})" class="publisher-btn text-info"
                                                          data-abc="true"><i class="fa fa-paper-plane"></i></div>
                                                  </div>

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </ul>
                        </a>
                    @endif
                        <a class="text-decoration-none" href="#offcanvasRight" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                            class="bi bi-bag me-2  position-relative">
                            <span ng-if="cart.length>0"
                                class="position-absolute top-0 start-90 translate-middle badge rounded-pill bg-primary fs-7">@{{ totalCartQuantity() }}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <span ng-if="cart.length==0"
                                class="position-absolute top-0 start-90 translate-middle badge rounded-pill bg-primary fs-7">0
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </i></a>

                    @if (Auth::check())
                        <span class="dropdown dropstart">
                            <div data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"
                                style="width: 28px;height: 28px;">
                                <img style="border-radius: 50%; border: 1px solid;"
                                    src="upload/user/{{ Auth::user()->image }}" class="w-100" alt="">
                            </div>
                            <ul class="dropdown-menu dropdown-menu-start">
                                <li class="dropdown-item">Xin chào: {{ Auth::user()->name }}<strong
                                        class="text-primary"></strong></li>
                                <li><a class="dropdown-item" href="{{ route('inforUser') }}">Xem thông tin</a></li>
                                <a href="{{ route('logout') }}">
                                    <li><span class="dropdown-item ">Đăng xuất</span></li>
                                </a>
                            </ul>
                        </span>
                    @else
                        <span ng-hide="currentUser" class="dropdown dropstart">
                            <i class="bi bi-person-circle" data-bs-toggle="dropdown" data-bs-display="static"
                                aria-expanded="false"></i>
                            <ul class="dropdown-menu dropdown-menu-start">
                                <li><a class="dropdown-item" href="{{ route('registerr') }}">Đăng ký</a></li>
                                <li><a class="dropdown-item" href="{{ route('loginn') }}">Đăng nhập</a></li>
                            </ul>
                        </span>
                    @endif
                </li>
            </ul>


        </div>

    </nav>
</header>
