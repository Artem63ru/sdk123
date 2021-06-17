@push('calendar_scripts')
    <script src="{{asset('/calendarEvents/datetimepicker/moment-with-locales.min.js')}}"></script>
    <script src="{{asset('/calendarEvents/datetimepicker/bootstrap.min.js')}}"></script>
    <script src="{{asset('/calendarEvents/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/calendarEvents/datetimepicker/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/calendarEvents/datetimepicker/bootstrap-datetimepicker.css')}}">

@endpush


<div class="sidebar">
    <div class="inside_sidebar">
       @include('web.include.sidebar_top')
{{--        <div class="tech_block_search_doc">--}}
{{--            <form><input type="text" name="search" required placeholder="Поиск по разделу"></form>--}}
{{--        </div>--}}
        <div class="clearfix"></div>


        <div class="sidebar_bottom rounded doc_sidebar">

            <div class="blocks_list">


                <div>
                    <label class="accordion">
                        <input type='checkbox' name='checkbox-accordion' id="faq" onclick="SaveChecked(this)">
                        <div class="accordion__header">Справочники</div>
                        <div class="accordion__content">
                            <a href="/docs/events">Возможные опасные события</a>
                            <a href="{{route('matrix')}}">Сценарии</a>
                            <a href="/docs/koef">Коэффициенты</a>
                        </div>
                    </label>
                    <label class="accordion">
                        <input type='checkbox' name='checkbox-accordion'  id="docs" onclick="SaveChecked(this)">
                        <div class="accordion__header">Документация</div>
                        <div class="accordion__content">
                            <a href={{route('reglament')}}>Справочник технологических регламентов</a>
                            <a href={{route('upload_form')}}>Перечень нормативной документации</a>
                        </div>
                    </label>
                    <label class="accordion">
                        <input type='checkbox' name='checkbox-accordion' id="plan" onclick="SaveChecked(this)">
                        <div class="accordion__header">
                            <a href={{ url('/docs/rtn') }}> План мероприятий по обеспечению ПБ</a>
                        </div>
                        <div class="accordion__content">
                            <a href="#">Общие сведения</a>
                            <a href="#">Раздел 1.1</a>
                            <a href="#">Раздел 2.1</a>
                            <a href="#">Раздел 2.2</a>
                            <a href="#">Раздел 3.1</a>
                            <a href="#">Раздел 4.1</a>
                            <a href="#">Раздел 4.2</a>
                            <a href="#">Раздел 4.3</a>
                            <a href="#">Раздел 5.1</a>
                            <a href="#">Раздел 5.2</a>
                        </div>
                    </label>
                    <label class="accordion">
                        <input type='checkbox' name='checkbox-accordion' id="gloss" onclick="SaveChecked(this)" >
                        <div class="accordion__header">
                            <a href={{ url('/docs/glossary') }}>  Глоссарий применяемых сокращений</a>
                        </div>
{{--                        <div class="accordion__content">--}}
{{--                            <a href="#">Сокращения</a>--}}
{{--                            <a href="#">Термины и определения</a>--}}
{{--                            <a href="#">Показатели промышленной безопасности</a>--}}
{{--                            <a href="#">Классификация событий</a>--}}
{{--                        </div>--}}
                    </label>
                    <label class="accordion">
                        <input type='checkbox' name='checkbox-accordion' id="reports"  onclick="SaveChecked(this)">
                        <div class="accordion__header">
                            <a href=''>  Отчеты</a>
                        </div>
                        <div class="accordion__content">
                            <a href="{{ route('form51.create') }}">ОС о инциденте п 5.1</a>
                            <a href="#">Термины и определения</a>
                            <a href="#">Показатели промышленной безопасности</a>
{{--                            <a href="{{ route('obj_status') }}">Отчет о состоянии элементов</a>--}}
{{--                            <a href="{{ route('scena_report') }}">Отчет о зафиксированных событиях</a>--}}
{{--                            <a href="{{ route('result_pk') }}">Сведения о результатах проверок</a>--}}
{{--                            <a href="{{ route('violations_report') }}">Отчет о выяленных нарушениях</a>--}}
{{--                            <a href="{{ route('status_opo') }}">Отчет о состоянии ОПО</a>--}}
{{--                            <a href="{{ route('repiat_report') }}">Отчет "Анализ повторяемости несоответствий"</a>--}}
{{--                            <a href="{{ route('event_pk') }}">Отчет о проведенных контрольных мероприятиях</a>--}}
                            <a id="report" class="reports_tag_a" >Отчет о состоянии элементов</a>
                            <a id="report1" class="reports_tag_a" >Отчет о зафиксированных событиях</a>
                            <a id="report2" class="reports_tag_a" >Сведения о результатах проверок</a>
                            <a id="report3" class="reports_tag_a" >Отчет о выяленных нарушениях</a>
                            <a id="report4" class="reports_tag_a" >Отчет о состоянии ОПО</a>
                            <a id="report5" class="reports_tag_a" >Отчет "Анализ повторяемости несоответствий"</a>
                            <a id="report6" class="reports_tag_a" >Отчет о проведенных контрольных мероприятиях</a>

                        </div>
                    </label>
                </div>


            </div>



        </div>
    </div>
</div>

<style>
    .overlay { opacity: 0; visibility: hidden; position:fixed; left: 0; right: 0; top: 0; bottom: 0; z-index: 99997; background: rgba(0,0,0,0.87); }
    .report-dlg-modal { width: 100%; max-width: 570px; height: 380px; opacity: 0; visibility: hidden; text-align: center; position: fixed; left: 50%; z-index: 99998; padding: 35px 36px; background: #fff; border-radius: 10px; -webkit-box-shadow: 0 0 20px rgba(0,0,0,0.85); box-shadow: 0 0 20px rgba(0,0,0,0.85); }
    .report-dlg-modal-slide { top: -20px; -webkit-transform: translate(-50%, -100%); transform: translate(-50%, -100%); visibility: visible; opacity: 1; }
    .report-dlg-modal-fade { top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%); }


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

    #choice-date-for-report-modal{
        width: 100%; max-width: 300px; height: 150px;
    }
</style>


    <div class="overlay" report-date-close=""></div>

    <div id="choice-date-for-report-modal" class="report-dlg-modal report-dlg-modal-slide">
        <h3>Выберите дату</h3>
        <div id="choice-date-for-report-content">
            <input type="hidden" id="report_type_name" value="">
            <p>
                <label for="report_date">Дата: </label>
                <input type="text" name="report_date" id="report_date" autocomplete="off"/>
            </p>
            <p>
                <input type="button" id="choice_date_btn" value="Применить">
            </p>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        //-------------ДИАЛОГ----------------//
        const overlay = document.querySelector('.overlay'),
            modals = document.querySelectorAll('.report-dlg-modal'),
            mClose = document.querySelectorAll('[report-date-close]');
        let	mStatus = false;

        for (let el of mClose) {
            el.addEventListener('click', modalClose);
        }

        document.addEventListener('keydown', modalClose);

        function modalShow(modal) {
            // показываем подложку всплывающего окна
            overlay.classList.remove('fadeOut');
            overlay.classList.add('fadeIn');

            modal.classList.remove('slideOutUp');
            modal.classList.add('slideInDown');

            mStatus = true;
        }

        function modalClose(event) {
            function close(){
                for (let modal of modals) {
                    modal.classList.remove('slideInDown');
                    modal.classList.add('slideOutUp');
                }

                // закрываем overlay
                overlay.classList.remove('fadeIn');
                overlay.classList.add('fadeOut');
                // сбрасываем флаг, устанавливая его значение в 'false'
                // это значение указывает нам, что на странице нет открытых
                // всплывающих окон
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

        var dateOptions={day:'numeric', month:'numeric',year:'numeric'};
        var timeOptions={hour:"numeric", minute: "numeric"}

        var today=new Date();
        var report_date=$('#report_date')
        report_date.val(today.toLocaleDateString('ru-RU',dateOptions) +' '+today.toLocaleTimeString('ru-RU',timeOptions));
        report_date.datetimepicker({
            locale: 'ru',
            sideBySide:true,
            format: 'L',
            maxDate:new Date()
        });

        var reports=document.getElementsByClassName('reports_tag_a')
        for (let r of reports) {
            r.addEventListener('click', ()=>{
                $("#report_type_name").val(r.id);
                var modal=document.getElementById('choice-date-for-report-modal');
                modalShow(modal)
            });
        }

        // document.getElementById('obj_status_a_tag').addEventListener('click', ()=>{
        //     $("#report_type_name").val('report')
        //
        //     var modal=document.getElementById('choice-date-for-report-modal');
        //     modalShow(modal)
        // })



        document.getElementById('choice_date_btn').addEventListener('click', ()=>{
            // console.log($("#report_type_name").val())
            console.log($("#report_type_name").val())
            $.ajax({
                url:$("#report_type_name").val(),
                type:"POST",
                data:{
                    date:report_date.val()
                },
                success:function(data)
                {
                    // console.log(data)
                }

            });
        });
        //var route=$("#report_type_name").val()

    });



    let checkboxes = document.getElementsByName('checkbox-accordion');
    //console.log(checkboxes)
    function pageStart() {
        for (let ch of checkboxes) {
            if (window.localStorage[ch.id]){
                ch.checked=true;
            }
        }
    }

    function SaveChecked(element){
        //console.log(window.localStorage[element.id])
        if (window.localStorage[element.id]!=null){
            element.checked=false;
            window.localStorage.removeItem(element.id);

        }
        else {
            for (let ch of checkboxes){
                if (window.localStorage[ch.id]){
                    ch.checked=false;
                    window.localStorage.removeItem(ch.id);
                }
            }
            window.localStorage[element.id]=true;
        }

    }

    pageStart();
</script>