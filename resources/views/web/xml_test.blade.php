<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Тест сертификат</title>
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script language="javascript" src="{{asset('XMLSign/es6-promise.min.js')}}"></script>
    <script language="javascript" src="{{asset('XMLSign/ie_eventlistner_polyfill.js')}}"></script>
    <script language="javascript" src="{{asset('XMLSign/cadesplugin_api.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{asset('XMLSign/XMLSign2.js')}}"></script>
    <script src="{{asset('modal-windows/modal_windows.js')}}"></script>

    <link href="{{ asset('modal-windows/modal_windows.css') }}" rel="stylesheet">
    <link href="{{ asset('XMLSign/XMLSign.css') }}" rel="stylesheet">

</head>
<body>
<h2>Подписать XML</h2>
<div id='XMLSign'></div>
<input type="button" value="Нажми меня" id="yoyo">
<input type="button" value="Нажми меня" id="yoyo2">
<script>

    document.addEventListener('DOMContentLoaded', function (){
        var xml_test=new XMLSign();
        var dlg_content=document.getElementById('XMLSign');
        var modal=new ModalWindow('Электронно-цифровая подпись документа', dlg_content, AnimationsTypes['stickyUp']);
        document.getElementById('yoyo').addEventListener('click', function (){
            xml_test.set_url_to_send('asdasd')
            modal.show()
        });
        document.getElementById('yoyo2').addEventListener('click', function (){
            xml_test.set_url_to_send('zzzzzzzz')
            modal.show()
        });
    })
</script>
</body>
</html>
