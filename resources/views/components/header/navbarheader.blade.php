@php
    $user = Auth::guard('admin')->user();
@endphp

<nav class="header-nav">

    <div class="brand">
        <img src="{{ url('public') }}/assets/image/dark-logo.png" alt="">
        PR<span>0F4</span>N
    </div>
    <button class="nav-header-toggle">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <ul class="header-nav-menu dropdown">
        {{-- <li>
            <a href="#" class="btn-set-fullscreen">
                <i class="fa fa-th-large"></i>
            </a>
        </li>
       
        <li>
            <a href="#" >
                <i class="fa fa-bell"></i>
            </a>
        </li> --}}
        <li>
            <a href="#" class="btn-set-theme">
                <i class="fa fa-moon"></i>
            </a>
        </li>
        <li class="dropdown-user-nav">
            <a href="#" class="user-btns" data-bs-toggle="dropdown">
                <img src="{{ url('public') }}/assets/image/user.png" alt="">
            </a>
            <ul class="dropdown-menu">
                <li class="headers">
                    <img src="{{ url('public') }}/assets/image/user.png" alt="">
                    <div class="header-container">
                        <span class="name">{{ $user->nama }}</span>
                        <span class="email">{{ $user->email }}</span>
                    </div>
                </li>
                <li class="bodys">
                    <a class="dropdown-item" href="{{ url('admin/profile') }}">
                        <i class="fa fa-user"></i>
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item" href="{{ url('admin/profile/logout') }}"
                        onclick="return confirm('Yakin ingin keluar dari system ini ?!');">
                        <i class="fa fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</nav>
