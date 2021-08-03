<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>

    <meta property="og:title" content="" />
    <meta property="og:image" content="assets/preview.jpg" />
    <meta property="og:description" content=""/>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--    <script src="{{asset('/js/charts/highcharts.js')}}"></script>--}}
{{--    <script src="{{asset('/js/charts/highcharts-more.js')}}"></script>--}}

    <script src="{{asset('/js/jquery.min.js')}}"></script>
    @stack('am4-script-lib')
    @stack('highcharts-script-lib')
    @stack('datapicker')
    @stack('calendar_scripts')

{{--    <script src="/js/hchart/highcharts.src.js"></script>--}}
{{--    <script src="/js/hchart/highcharts-more.js"></script>--}}
{{--    <script src="/js/hchart/solid-gauge.js"></script>--}}


    <!-- Fonts -->
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">--}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">
    <link href="{{ asset('assets/favicon/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">

    @stack('app-css')

{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

</head>
<body>
@include('web.include.modal.modal')

<div class="side_menu">
    @include('web.include.side_menu')
</div>

<div class="header">
    @include('web.include.header')
</div>

<div class="content">



    @yield('content')



</div>

@livewireScripts
@stack('scripts')

</body>


<div id="jda_attention" class="dlg-modal dlg-modal-slide" style="height: 14%; width: 20%">
    <div class="form_header">
        <span class="closer_btn" data-close="" ></span>
        <h3 id="jda_attention_text"></h3>
    </div>
</div>
<div class="overlay" data-close=""></div>

<script>
    document.addEventListener('DOMContentLoaded', function test() {

        //-------------ДИАЛОГ----------------//
        const overlay = document.querySelector('.overlay'),
            modals = document.querySelectorAll('.dlg-modal:not(#new_jas_1_modal)'),
            mClose = document.querySelectorAll('[data-close]:not(.new_jas_1_modal_close_btn)');
        let	mStatus = false;

        for (let el of mClose) {
            el.addEventListener('click', modalClose);
        }

        document.addEventListener('keydown', modalClose);

        function modalShow(modal) {
            overlay.className='overlay fadeIn';
            modal.className='dlg-modal dlg-modal-slide slideInDown';
            mStatus = true;
        }

        function modalClose(event) {
            function close(){
                for (let modal of modals) {
                    modal.className='dlg-modal dlg-modal-slide slideOutUp'

                }
                overlay.className='overlay fadeOut';
                mStatus = false;
            }
            if (typeof event ==='undefined'){
                if (mStatus){
                    close()
                }
            }
            else{
                if (mStatus && ( event.type != 'keydown' || event.keyCode === 27 ) ) {
                    close()
                }
            }
        }


        async function check(){
            while (true){
                $.ajax({
                    url:"/check_journal_full",
                    type:"GET",
                    success:function(data)
                    {
                        var modal=document.getElementById('jda_attention')
                        var form=modal.getElementsByClassName('form_header')[0]
                        var btn=document.createElement('a')

                        btn.className="btn btn-danger"
                        btn.textContent='Очистить журнал'
                        if (data==1){
                            if (form.getElementsByClassName('btn btn-danger').length!=0){
                                modal.getElementsByClassName('form_header')[0].removeChild(btn)
                            }
                            $('#jda_attention_text').html('Внимание!<br> Журнал действий администратора заполнен до предупредительной отметки')
                            modalShow(modal)
                        }
                        if (data==3){
                            if (form.getElementsByClassName('btn btn-danger').length!=0){
                                modal.getElementsByClassName('form_header')[0].removeChild(btn)
                            }
                            $('#jda_attention_text').html('Внимание!<br> Журнал событий заполнен до предупредительной отметки')
                            modalShow(modal)
                        }
                        if (data==2){
                            if (form.getElementsByClassName('btn btn-danger').length==0){
                                btn.href="clear_logs_ib"
                                form.appendChild(btn)
                            }
                            $('#jda_attention_text').html('Внимание!<br> Журнал действий администратора заполнен до критической отметки')
                            modalShow(modal)
                        }
                        if (data==4){
                            if (form.getElementsByClassName('btn btn-danger').length==0){
                                btn.href="clear_logs"
                                form.appendChild(btn)
                            }
                            $('#jda_attention_text').html('Внимание!<br> Журнал событий заполнен до критической отметки')
                            modalShow(modal)
                        }
                    }
                })
                await sleep(60);
            }
        }
        check();

    })
</script>
{{--<script type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('/js/top_table.js')}}"></script>
</html>
