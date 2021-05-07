<div class="inside_content">

    <div class="doc_header">
        <table>
            <tbody>
            <tr>
                <td class="doc_header_title">Глоссарий применяемых сокращений</td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="tabs gloss_col_tab">
        <div class="tab">
            <input type="radio" id="safety" name="tab_group">
            <label for="safety" class="tab_title razd_col_tab">Показатели пром. безопасности</label>
            <section class="tab_content">
                <div class="inside_tab_padding">
                    <div class="row_block">
                    </div>
                </div>
            </section>
        </div>

        <div class="tab">
            <input type="radio" id="term" name="tab_group">
            <label for="term" class="tab_title razd_col_tab">Термины и определения</label>
            <section class="tab_content">
                <div class="inside_tab_padding">
                    <div class="row_block">
                    </div>
                </div>
            </section>
        </div>

        <div class="tab">
            <input type="radio" id="ev" name="tab_group" checked>
            <label for="ev" class="tab_title razd_col_tab">Классификация событий</label>
        @include('web.glossary.tabs.events')
        </div>


        <div class="tab">
            <input type="radio" id="sokr" name="tab_group">
            <label for="sokr" class="tab_title razd_col_tab">Сокращения</label>
            <section class="tab_content">
                <div class="inside_tab_padding">
                    <div class="row_block">
                    </div>
                </div>
            </section>
        </div>






    </div>



</div>