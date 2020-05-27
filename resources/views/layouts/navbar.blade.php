<div>
    <nav class="nav-wrapper purple lighten-2">
        <div class="container">
            <a href="{{ route('homepage') }}" class="brand-logo">Laravest</a>
            <a href="#mobile-nav" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('homepage') }}">Home</a></li>
                @if(session('profile_id'))
                    <li>
                        <a class="row valign-wrapper" href="{{ route('profile', ['profile_id'=>session('profile_id')]) }}">
                            <img id="profile-picture-nav-img" src="{{ asset(session('profile_picture_path')) }}" alt="profile-picture" class="circle">
                            <span>{{ session('fullname') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('post_creator_page') }}">Create Post</a>
                    </li>
                    <li><a href="{{ route('logout') }}" id="logout-btn">Logout</a></li>
                @else
                    <li><a href="{{ route('login_page') }}">Login</a></li>
                    <li><a href="{{ route('registration_page') }}">Register</a></li>
                @endif
            </ul>
        </div>
    </nav>

    <ul id="mobile-nav" class="sidenav">
        <li><a href="{{ route('homepage') }}">Home</a></li>
        @if(session('profile_id'))
            <li>
                <a class="row valign-wrapper" href="{{ route('profile', ['profile_id'=>session('profile_id')]) }}">
                    <img id="profile-picture-nav-img" src="{{ asset(session('profile_picture_path')) }}" alt="profile-picture" class="circle">
                    <span>{{ session('fullname') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('post_creator_page') }}">Create Post</a>
            </li>
            <li><a href="{{ route('logout') }}" id="logout-btn">Logout</a></li>
        @else
            <li><a href="{{ route('login_page') }}">Login</a></li>
            <li><a href="{{ route('registration_page') }}">Register</a></li>
        @endif
    </ul>
</div>
