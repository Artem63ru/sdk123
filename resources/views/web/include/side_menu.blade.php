
<div class="logo_block">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img alt="Логотип" src="{{ asset('assets/images/logo.svg') }}" class="side_menu_logo">
    </a>
</div>
<div class="links_block">
    <ul>
        <li ><a href="/"><img alt="Главная" src="{{asset('assets/images/icons/home.svg')}}" class="links_block_icon"></a></li>
        <li ><a href="{{asset('/opo/1')}}"><img alt="Настройки" src="{{asset('assets/images/icons/settings.svg')}}" class="links_block_icon"></a></li>
        <li ><a href="{{ url('/docs/rtn') }}"><img alt="Документация" src="{{asset('assets/images/icons/docs.svg')}}" class="links_block_icon"></a></li>
    </ul>
</div>
<div class="info_block">
    <ul>
        <li class=""><a href="{{ url('/docs/glossary') }}"><img alt="Справка" src="{{asset('assets/images/icons/info.svg')}}" class="side_menu_faq"></a></li>
    </ul>
</div>

<script>
    $(document).ready(function() {

        $('.links_block ul a').each(function () {

            //console.log(this.href.split('/'), location.href.split('/'))

            if (this.href.split('/')[3] == location.href.split('/')[3]) $(this).parent().addClass('active');
        });

        $( '.links_block ul a' ).on( 'click', function () {
            $( '.links_block ul' ).find( 'li.active' ).removeClass( 'active' );
            $( this ).parent( 'li' ).addClass( 'active' );
        });
    });
</script>
