@include('web.include.sum_checker_tree.sumchecker_tree')

<div id="jda_attention" class="dlg-modal dlg-modal-slide" style="height: 14%; width: 20%">
    <div class="form_header">
        <span class="closer_btn" data-close="" ></span>
        <h3 id="jda_attention_text"></h3>
    </div>
</div>
<div class="overlay" data-close=""></div>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        document.getElementById('seumchecker_go_btn').addEventListener('click',function (){
            clear_tree();
            load_files_tree();
            var modal=document.getElementById('files_tree_modal');
            // console.log(modal)
            modalShow(modal)
        });
        document.getElementById('files_tree_closer').addEventListener('click', function (){
            console.log($('#choice_files_tree').removeData('uiFancytree'))
        });
    });
</script>
<div class="btn-group">
    <a href="/admin" class="btn btn-primary" aria-current="page">Журнал событий</a>
    <a href="/admin_ib" class="btn btn-primary" aria-current="page">Журнал действий администратора</a>
{{--    <a href="/admin/users" class="btn btn-primary">Список пользователей</a>--}}
{{--    <a href="/admin/roles" class="btn btn-primary">Список ролей</a>--}}
    <a href="/admin/perm" class="btn btn-primary">Список привелегий</a>
    <a class="btn btn-primary" href="{{ route('roles.index') }}">Список ролей</a>
    <a class="btn btn-primary" href="{{ route('users.index') }}">Список пользователей</a>
    <a class="btn btn-primary" id="seumchecker_go_btn">Контрольные суммы</a>
    <a class="btn btn-primary" href="{{ route('config_safety') }}">Конфигурация безопасности</a>

</div>

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

