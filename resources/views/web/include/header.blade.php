<div class="header_inside">
    <div class="user_profile">
        <img alt="Пользователь" src="{{ asset('assets/images/user.jpg') }}" class="user_avatar">
        <div class="user_info">
            <p class="white_text user_name">{{ Auth::user()->name }}</p>
            <a class="logout" href="{{ route('logout') }}">
                {{ __('Logout') }}
            </a>

        </div>
    </div>
</div>
