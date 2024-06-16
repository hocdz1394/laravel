@extends('layout')
@section('title', 'Đăng ký')
@section('content')
    <div class="loginregit top-90">
        <nav>
            <div class="nav nav-tabs justify-content-center border-0" id="nav-tab  btlogin" role="tablist">
                <a href="{{ route('loginn') }}">
                    <button class="nav-link " id="" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
                        role="tab" aria-controls="nav-home" aria-selected="false">Đăng nhập</button>
                </a>
                <a href="{{ route('registerr') }}">
                    <button class="nav-link active" id="" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Đăng ký</button>
                </a>
            </div>
        </nav>
        <div class="tab-content mb-6" id="nav-tabContent">
            <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 col-xl-4 offset-xl-4 offset-lg-4 offset-md-3 offset-xl-3 ">
                    <h1 class="text-uppercase fs-5 bd py-3 text-center ">Đăng nhập</h1>
                    <form class="text-center ">
                        <input type="email" class="form-control mb-3" placeholder="Email" name="" id="">
                        <input type="password" class="form-control mb-3" placeholder="Mật khẩu" name=""
                            id="">
                        <input class="btn btn-primary text-light hvbg col-12" type="submit" value="Đăng nhập">
                        <a class="hv text-center" data-bs-toggle="collapse" href="#collapseOne">Quên mật khẩu</a>
                        <!-- toggle -->
                        <div id="collapseOne" class="accordion-collapse collapse pt-4" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="email" class="form-control mb-3" placeholder="Email" name=""
                                    id="">
                                <input class="btn btn-primary text-light hvbg col-12" type="submit"
                                    value="Lấy lại mật khẩu">
                            </div>
                        </div>
                        <!-- end toggle -->
                        <p>Hoặc đăng nhập bằng</p>
                        <div class="socal">
                            <a href="#" class="btn btn-primary text-light"><i
                                    class="fa-brands fa-facebook-f text-light fs-5_5 p-2"></i></i>Facebook</a>
                            <a href="#" class="btn btn-danger text-light"><i
                                    class="fa-brands fa-google text-light fs-5_5 p-2"></i></i>Google</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                tabindex="0">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 col-xl-4 offset-xl-4 offset-lg-4 offset-md-3 offset-xl-3 ">
                    <h1 class="text-uppercase fs-5 bd py-3 text-center ">Đăng ký</h1>
                    <form class="text-center" action="{{ route('registerr') }}" novalidate method="POST">
                        @if (Session::has('message'))
                            <div class="alert alert-danger">{{ Session::get('message') }}</div>
                            @php
                                Session::forget('message');
                            @endphp
                        @endif
                        @csrf
                        <input type="text" class="form-control mb-3" placeholder="Họ tên" name="name" id="">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <input type="email" class="form-control mb-3" placeholder="Email" name="email" id="">
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <input type="password" class="form-control mb-3" placeholder="Mật khẩu" name="password" id="">
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <input type="password" class="form-control mb-2" placeholder="Nhập lại mật khẩu" name="confirm_pw"
                            id="">
                        <input class="btn btn-primary text-light hvbg col-12" type="submit" value="Đăng Ký">
                        <p>Hoặc đăng nhập bằng</p>
                        <div class="socal">
                            <a href="#" class="btn btn-primary text-light"><i
                                    class="fa-brands fa-facebook-f text-light fs-5_5 p-2"></i></i>Facebook</a>
                            <a href="#" class="btn btn-danger text-light"><i
                                    class="fa-brands fa-google text-light fs-5_5 p-2"></i></i>Google</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
