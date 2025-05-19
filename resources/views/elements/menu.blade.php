<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{url('')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img width="30" viewBox="0 0 25 42" src="{{ asset('assets/img/icons/sms-logo.png') }}">
                </img>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2 text-capitalize capitalize-first">SMS</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="{{url('/')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{(Request::is('students') || Request::is('students/*')) ? 'active' : '' }}">
            <a href="{{url('/students')}}" class="menu-link">
                <i class="menu-icon tf-icons fa-regular fa-pen-to-square"></i>
                <div data-i18n="Tables">Students</div>
            </a>
        </li>
</aside>