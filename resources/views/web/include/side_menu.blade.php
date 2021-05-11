
<div class="logo_block">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img alt="Логотип" src="{{ asset('assets/images/logo.svg') }}" class="side_menu_logo">
    </a>
</div>
<div class="links_block">
    <ul>
        <li class=""><a href="index.html#"><img alt="Главная" src="{{asset('assets/images/icons/home.svg')}}" class="links_block_icon"></a></li>
        <li class="active"><a href="{{asset('/opo/1')}}"><img alt="Настройки" src="{{asset('assets/images/icons/settings.svg')}}" class="links_block_icon"></a></li>
        <li class=""><a href="index.html#"><img alt="Документация" src="{{asset('assets/images/icons/docs.svg')}}" class="links_block_icon"></a></li>
    </ul>
</div>
<div class="info_block">
    <ul>
        <li class=""><a href="{{ url('/glossary') }}"><img alt="Справка" src="{{asset('assets/images/icons/info.svg')}}" class="side_menu_faq"></a></li>
    </ul>
</div>

