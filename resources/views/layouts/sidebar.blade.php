<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="index.html">
            <img src="{{asset('assets/images/brand/xeamlogo.png')}}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{asset('assets/images/brand/xeamlogo.png')}}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{asset('assets/images/brand/xeamlogo.png')}}" class="header-brand-img light-logo" alt="logo">
            <img src="{{asset('assets/images/brand/xeamlogo.png')}}" class="header-brand-img light-logo1" alt="logo">
        </a><!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li>
            <h3>Main</h3>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="{{asset('dashboard')}}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
        </li>

        <!-- submenus  -->
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                <i class="side-menu__icon fe fe-sliders"></i>
                <span class="side-menu__label">Manage Staff</span><i class="angle fa fa-angle-right"></i></a>
            <!-- company manage -->
            <ul class="slide-menu">
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="<?php Request::url(); ?>"><i class="fa fa-institution"></i><span class="sub-side-menu__label">Company</span><i class="sub-angle fa fa-angle-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{ route('company.create') }}">Create</a></li>
                        <li><a class="sub-slide-item" href="{{ route('company.list') }}">List</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end company manage -->
            <!-- manage incentive -->
            <ul class="slide-menu">
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="<?php Request::url(); ?>"><i class="side-menu__icon icon icon-credit-card"></i><span class="sub-side-menu__label">Incentive</span><i class="sub-angle fa fa-angle-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{ route('incentive.create') }}">Create</a></li>
                        <li><a class="sub-slide-item" href="{{ route('incentive.list') }}">List</a></li>
                    </ul>
                </li>
            </ul>
            <!-- manage client -->
            <ul class="slide-menu">
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="<?php Request::url(); ?>"><i class="side-menu__icon ion-person"></i><span class="sub-side-menu__label">Client</span><i class="sub-angle fa fa-angle-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{ route('client.create') }}">Create</a></li>
                        <li><a class="sub-slide-item" href="{{ route('client.list') }}">List</a></li>
                    </ul>
                </li>
            </ul>
            <!-- manage agent -->
            <ul class="slide-menu">
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="<?php Request::url(); ?>"><i class="side-menu__icon fe fe-globe"></i><span class="sub-side-menu__label">Agent</span><i class="sub-angle fa fa-angle-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{ route('agent.create') }}">Create</a></li>
                        <li><a class="sub-slide-item" href="{{ route('agent.list') }}">List</a></li>
                    </ul>
                </li>
            </ul>
            <!-- manage recruitment -->
            <ul class="slide-menu">
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="<?php Request::url(); ?>"><i class="side-menu__icon fe fe-briefcase"></i><span class="sub-side-menu__label">Recruitment</span><i class="sub-angle fa fa-angle-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{ route('recruitment.create') }}">Create</a></li>
                        <li><a class="sub-slide-item" href="{{ route('recruitment.list') }}">List</a></li>
                    </ul>
                </li>
            </ul>
            <!-- manage consultant -->
            <ul class="slide-menu">
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="<?php Request::url(); ?>"><i class="side-menu__icon fe fe-briefcase"></i><span class="sub-side-menu__label">Consultant</span><i class="sub-angle fa fa-angle-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{ route('consultant.create') }}">Create</a></li>
                        <li><a class="sub-slide-item" href="{{ route('consultant.list') }}">List</a></li>
                    </ul>
                </li>
            </ul>
            <!-- manage Document -->
            <ul class="slide-menu">
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="<?php Request::url(); ?>"><i class="side-menu__icon fa fa-files-o"></i><span class="sub-side-menu__label">Document</span><i class="sub-angle fa fa-angle-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{ route('document.create') }}">Create</a></li>
                        <li><a class="sub-slide-item" href="{{ route('document.list') }}">List</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end manage document -->
        </li>
        <!-- end sub menus -->

    </ul>
</aside>