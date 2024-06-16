<header style="z-index: 8;" class="app-header">
  <!-- Sidebar toggle button-->
  <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <!-- Navbar Right Menu-->
  <ul class="app-nav">


    <!-- User Menu-->
    <div ng-show="currentUser" class="user hstack gap-3 me-4">
      <div style="width: 30px;height: 30px;">
        <img class="w-100" src="../../upload/user/{{Auth::user()->image}}" style="border-radius: 50%;border: 1px solid black;" alt="">
      </div>
      <div class="name text-light fw-bold">
        {{Auth::user()->name}}
      </div>
    </div>
    <li><a class="app-nav__item" href="{{route('logout')}}"><i class='bx bx-log-out bx-rotate-180'></i> </a>

    </li>
  </ul>
</header>