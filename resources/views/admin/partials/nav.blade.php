<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset('asset/img/logo-ft.png')}}" width="50px"
      alt="User Image">
    <div>
      <p class="app-sidebar__user-name"><b>Denny-Shop</b></p>
      <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
    </div>
  </div>
  <hr>
  <ul class="app-menu">
    <li><a class="app-menu__item text-decoration-none  active" href="{{url('/admin')}}"><i
          class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Bảng điều
          khiển</span></a></li>

    <li>
      <a class="app-menu__item text-decoration-none " href="{{route('manager-category')}}">
        <i class='app-menu__icon bx bx-category'></i>
        <span class=" app-menu__label">Quản lý danh mục</span>
      </a>
    </li>
    <li><a class="app-menu__item text-decoration-none" href="{{route('manager-product')}}"><i
          class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý
          sản phẩm</span></a>
    </li>
    <li><a class="app-menu__item text-decoration-none" href="{{route('manager-order')}}"><i
          class='app-menu__icon bx bx-task'></i><span class=" app-menu__label">Quản lý đơn
          hàng</span></a></li>

    <li><a class="app-menu__item text-decoration-none" href="#"><i class='app-menu__icon bx bx-qr-scan'></i><span
          class="app-menu__label">Quản lý mã khuyến mãi</span></a></li>
    <li><a class="app-menu__item text-decoration-none" href="{{route('manager-user')}}"><i
          class='app-menu__icon bx bx-user-voice'></i><span class="app-menu__label">Quản lý người dùng</span></a></li>
    <li><a class="app-menu__item text-decoration-none" href="{{route('manager-message')}}"><i class='app-menu__icon bx bx-conversation'></i><span
          class=" app-menu__label">Quản lý tin nhắn</span></a></li>
    <li><a class="app-menu__item text-decoration-none" href="{{route('manager-news')}}"><i
          class='app-menu__icon bx bx-book-bookmark'></i><span class="app-menu__label">Quản lý bài viết</span></a></li>
    <li><a class="app-menu__item text-decoration-none" href="#"><i class='app-menu__icon bx bx-cog'></i><span
          class="app-menu__label">Cài
          đặt hệ thống</span></a></li>
  </ul>
</aside>