<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <img src="{{asset('')}}" alt="">
            <h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,</span> Marquez</h5>
            <p class="mb-0 fs-14 font-w400">marquezzzz@mail.com</p>
        </div>
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('users') }}">Users</a></li>
                    <li><a href="{{ route('students') }}">Students</a></li>
                    <li><a href="{{ route('academies') }}">Academies</a></li>
                    <li><a href="{{ route('cohorts') }}">Cohorts</a></li>
                </ul>
            </li>
        </ul>
        <div class="copyright">
            <p><strong>Zenix Crypto Admin Dashboard</strong> © 2021 All Rights Reserved</p>
        </div>
    </div>
</div>
