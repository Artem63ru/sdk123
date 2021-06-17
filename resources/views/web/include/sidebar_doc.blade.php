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
                        <input type='checkbox' name='checkbox-accordion' id="report"  onclick="SaveChecked(this)" >
                        <div class="accordion__header">
                            <a href=''>  Отчеты</a>
                        </div>
                        <div class="accordion__content">
                            <a href="{{ route('form51.create') }}">ОС о инциденте п 5.1</a>
                            <a href="#">Термины и определения</a>
                            <a href="#">Показатели промышленной безопасности</a>
                            <a href="{{ route('obj_status') }}">Отчет о состоянии элементов</a>
                            <a href="{{ route('scena_report') }}">Отчет о зафиксированных событиях</a>
                            <a href="{{ route('result_pk') }}">Сведения о результатах проверок</a>
                            <a href="{{ route('violations_report') }}">Отчет о выяленных нарушениях</a>
                            <a href="{{ route('status_opo') }}">Отчет о состоянии ОПО</a>
                            <a href="{{ route('repiat_report') }}">Отчет "Анализ повторяемости несоответствий"</a>
                            <a href="{{ route('event_pk') }}">Отчет о проведенных контрольных мероприятиях</a>
                        </div>
                    </label>
                </div>


            </div>



        </div>
    </div>
</div>

<script>
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