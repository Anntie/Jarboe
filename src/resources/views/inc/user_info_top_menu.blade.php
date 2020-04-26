<!-- Top menu profile link : this shows only when top menu is active -->
<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
    <li class="">
        <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown">
            <img src="{{ admin_user()->avatar_url ?: '/vendor/jarboe/img/avatars/default.png' }}" alt="{{ admin_user()->name }}" class="online" />
        </a>
        <ul class="dropdown-menu pull-right">
            {{--
            <li>
                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
            </li>
            <li class="divider"></li>
            --}}
            <li>
                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="{{ admin_url('logout') }}" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
            </li>
        </ul>
    </li>
</ul>