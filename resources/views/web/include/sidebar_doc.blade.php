<div class="sidebar">
    <div class="inside_sidebar">
       @include('web.include.sidebar_top')
        <div class="tech_block_search_doc">
            <form><input type="text" name="search" required placeholder="Поиск по разделу"></form>
        </div>
        <div class="clearfix"></div>


        <div class="sidebar_bottom rounded doc_sidebar">

            <div class="blocks_list">


                <div>
                    <label class="accordion">
                        <input type='checkbox' name='checkbox-accordion'>
                        <div class="accordion__header">Справочники</div>
                        <div class="accordion__content">
                            <a href="/docs/events">Возможные опасные события</a>
                            <a href="{{route('matrix')}}">Сценарии</a>
                            <a href="/docs/koef">Коэффициенты</a>
                        </div>
                    </label>
                    <label class="accordion">
                        <input type='checkbox' name='checkbox-accordion'>
                        <div class="accordion__header">Документация</div>
                        <div class="accordion__content">
                            <a href={{route('reglament')}}>Справочник технологических регламентов</a>
                            <a href={{route('upload_form')}}>Перечень нормативной документации</a>
                        </div>
                    </label>
                    <label class="accordion">
                        <input type='checkbox' name='checkbox-accordion'>
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
                        <input type='checkbox' name='checkbox-accordion' >
                        <div class="accordion__header">
                            <a href={{ url('/docs/glossary') }}>  Глоссарий применяемых сокращений</a>
                        </div>
                        <div class="accordion__content">
                            <a href="#">Сокращения</a>
                            <a href="#">Термины и определения</a>
                            <a href="#">Показатели промышленной безопасности</a>
                            <a href="#">Классификация событий</a>
                        </div>
                    </label>
                </div>


            </div>



        </div>
    </div>
</div>