{{--<!DOCTYPE html>--}}
{{--<html>--}}
@extends('web.layouts.app')
@section('title')
    Календарь событий
@endsection

@section('content')

<script>
    var opo_id={{$opo_id}};
    var user_id={{ Auth::user()->id }};
    var opo_name=`{{$opo_name}}`;
    // console.log(opo_name)
</script>



<style>
    /*--- CONTENT ---*/

    .overlay { opacity: 0; visibility: hidden; position:fixed; left: 0; right: 0; top: 0; bottom: 0; z-index: 99998; background: rgba(0,0,0,0.87); }
    .dlg-modal { width: 100%; max-width: 570px; height: 380px; opacity: 0; visibility: hidden; text-align: center; position: fixed; left: 50%; z-index: 99999; padding: 35px 36px; background: #fff; border-radius: 10px; -webkit-box-shadow: 0 0 20px rgba(0,0,0,0.85); box-shadow: 0 0 20px rgba(0,0,0,0.85); }
    .dlg-modal-fade { top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%); }
    .dlg-modal-slide { top: -20px; -webkit-transform: translate(-50%, -100%); transform: translate(-50%, -100%); visibility: visible; opacity: 1; }

    .closer { width: 30px; height: 30px; display: block; position: absolute; right: 10px; top: 10px; background: url({{asset('assets/images/icons/close.svg')}}) no-repeat; cursor: pointer; }
    .closer:hover { -webkit-transform: rotate(90deg); transform: rotate(90deg); }

    /* animation */
    .fadeIn, .fadeOut, .slideInDown, .slideOutUp { -webkit-animation-duration: 0.4s; animation-duration: 0.4s; -webkit-animation-timing-function: linear; animation-timing-function: linear; }

    @keyframes fadeIn {
        from { opacity: 0; visibility: hidden; }
        to { opacity:1; visibility: visible; }
    }
    .fadeIn { -webkit-animation-name: fadeIn; animation-name: fadeIn; opacity: 1; visibility: visible; }

    @keyframes fadeOut {
        from { opacity: 1; visibility: visible; }
        to { opacity:0; visibility: hidden; }
    }
    .fadeOut { -webkit-animation-name: fadeOut; animation-name: fadeOut; opacity: 0; visibility: hidden; }

    @keyframes slideInDown {
        from { top: -20px; -webkit-transform: translate(-50%, -100%); transform: translate(-50%, -100%); }
        to { top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%); }
    }
    .slideInDown { -webkit-animation-name: slideInDown; animation-name: slideInDown; top: 50%; transform: translate(-50%, -50%); }

    @keyframes slideOutUp {
        from { top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%); }
        to { top: -20px; -webkit-transform: translate(-50%, -100%); transform: translate(-50%, -100%); }
    }
    .slideOutUp { -webkit-animation-name: slideOutUp; animation-name: slideOutUp; }

    #calendar_event_content {
        width:100%; /* ширина нашего блока */
        height:95%; /* высота нашего блока */
    }
    .textArea {
        width: 90%; /* Ширина поля в процентах */
        height: 200px; /* Высота поля в пикселах */
        resize: none; /* Запрещаем изменять размер */
    }

    #new_calendar_event_modal{
        width: 100%; max-width: 570px; height: 600px;
    }
</style>


{{--<head>--}}
{{--    <title>Календарь событий</title>--}}
{{--    <meta name="csrf-token" content="{{csrf_token()}}">--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}

{{--    <script src="{{asset('/calendarEvents/fullcalendar/main.js')}}"></script>--}}
{{--    <script src="{{asset('/calendarEvents/fullcalendar/main.min.js')}}"></script>--}}
{{--    <link rel="stylesheet" href="{{asset('/calendarEvents/fullcalendar/main.css')}}">--}}

{{--    <script src="{{asset('/calendarEvents/datetimepicker/moment-with-locales.min.js')}}"></script>--}}
{{--    <script src="{{asset('/calendarEvents/datetimepicker/bootstrap.min.js')}}"></script>--}}
{{--    <script src="{{asset('/calendarEvents/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>--}}
{{--    <link rel="stylesheet" href="{{asset('/calendarEvents/datetimepicker/bootstrap.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('/calendarEvents/datetimepicker/bootstrap-datetimepicker.min.css')}}">--}}


{{--    <script src="{{asset('/calendarEvents/calendarEvents.js')}}"></script>--}}

{{--    --}}{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />--}}
{{--    --}}{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>--}}
{{--    --}}{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>--}}

{{--</head>--}}
{{--<body>--}}
    <div id="opo_name_div">
        <h2 id="opo_name_h">
            <script>
                $('#opo_name_h').text(opo_name)
            </script>
        </h2>
    </div>
    <div id="calendar"></div>
    <div class="overlay" data-close=""></div>
    <div id="calendar_event_info_modal" class="dlg-modal dlg-modal-slide">
        <span class="closer" data-close=""></span>
        <h3 id="event_title"></h3>
        <div id="calendar_event_content">
            <input type="hidden" id="current_event_id" value="">
            <p id="event_description"></p>
            <p id="event_start_datetime"></p>
            <p id="event_end_datetime"></p>
            <p id="event_type"></p>
            <p id="event_dest_user"></p>
            <p id="event_create_user"></p>
            <p id="event_status"></p>
            <p>
                <input type="button" id="event_confirm_btn" value="">
                <input type="button" id="delete_this_event_btn" value="Удалить">
                <input type="button" id="change_this_event_btn" value="Изменить">
            </p>
        </div>

    </div>


    <div id="new_calendar_event_modal" class="dlg-modal dlg-modal-slide">
        <span class="closer" data-close=""></span>
        <h3 id="new_event_modal_title">Новое событие</h3>
        <div id="new_calendar_event_content">
            <p>
                <label for="new_event_title">Событие: </label>
                <input type="text" id="new_event_title"  value="">
            </p>
            <p>
                <label for="new_event_description">Описание события:</label>
                <textarea class="textArea" id="new_event_description"></textarea>
            </p>
            <p>
                <label for="new_event_start">Начало:</label>
                <input type="text" name="new_event_start" id="new_event_start"/>
            </p>
            <p>
                <label for="new_event_end">Конец:</label>
                <input type="text" name="new_event_end"  id="new_event_end"/>
            </p>
            <p>
                <label for="new_event_type">Тип события:</label>
                <select id="new_event_type">
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </p>
            <p>
               <label for="new_event_dest_user">Ответственный:</label>
                <select id="new_event_dest_user">
                    @foreach($users as $usr)
                        <option value="{{$usr->id}}">{{$usr->name}}</option>
                    @endforeach
                </select><br>
            </p>
            <p>
                <input type="button" id="new_event_add_button" value="Добавить событие">
                <input type="button" id="change_event_button" value="Применить">
            </p>

        </div>
    </div>
{{--</body>--}}

{{--</html>--}}
    @push('calendar_scripts')
{{--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}

        <script src="{{asset('/calendarEvents/fullcalendar/main.js')}}"></script>
        <script src="{{asset('/calendarEvents/fullcalendar/main.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('/calendarEvents/fullcalendar/main.css')}}">

        <script src="{{asset('/calendarEvents/datetimepicker/moment-with-locales.min.js')}}"></script>
        <script src="{{asset('/calendarEvents/datetimepicker/bootstrap.min.js')}}"></script>
        <script src="{{asset('/calendarEvents/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
{{--        <link rel="stylesheet" href="{{asset('/calendarEvents/datetimepicker/bootstrap.min.css')}}">--}}
        <link rel="stylesheet" href="{{asset('/calendarEvents/datetimepicker/bootstrap-datetimepicker.min.css')}}">


        <script src="{{asset('/calendarEvents/calendarEvents.js')}}"></script>
    @endpush
@endsection
