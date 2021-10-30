@include('web.include.sum_checker_tree.sumchecker_tree')

{{--<div id="jda_attention" class="dlg-modal dlg-modal-slide" style="height: 14%; width: 20%">--}}
{{--    <div class="form_header">--}}
{{--        <span class="closer_btn" data-close="" ></span>--}}
{{--        <h3 id="jda_attention_text"></h3>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="overlay" data-close=""></div>--}}
<div id="jda_attention_modal_content" style="text-align: center">
    <h3 id="jda_attention_text"></h3>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        var modal_content=document.getElementById('files_tree_modal_content')
        var modal=new ModalWindow('Контрольные суммы', modal_content, AnimationsTypes['stickyUp'])
        document.getElementById('seumchecker_go_btn').addEventListener('click',function (){
            clear_tree();
            load_files_tree();
            // var modal=document.getElementById('files_tree_modal');
            // // console.log(modal)
            // modalShow(modal)
            modal.show()
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

        // //-------------ДИАЛОГ----------------//
        // const overlay = document.querySelector('.overlay'),
        //     modals = document.querySelectorAll('.dlg-modal:not(#new_jas_1_modal)'),
        //     mClose = document.querySelectorAll('[data-close]:not(.new_jas_1_modal_close_btn)');
        // let	mStatus = false;
        //
        // for (let el of mClose) {
        //     el.addEventListener('click', modalClose);
        // }
        //
        // document.addEventListener('keydown', modalClose);
        //
        // function modalShow(modal) {
        //     overlay.className='overlay fadeIn';
        //     modal.className='dlg-modal dlg-modal-slide slideInDown';
        //     mStatus = true;
        // }
        //
        // function modalClose(event) {
        //     function close(){
        //         for (let modal of modals) {
        //             if (modal.className=="dlg-modal dlg-modal-slide slideInDown"){
        //                 modal.className='dlg-modal dlg-modal-slide slideOutUp'
        //             }
        //         }
        //         overlay.className='overlay fadeOut';
        //         mStatus = false;
        //     }
        //     if (typeof event ==='undefined'){
        //         if (mStatus){
        //             close()
        //         }
        //     }
        //     else{
        //         if (mStatus && ( event.type != 'keydown' || event.keyCode === 27 ) ) {
        //             close()
        //         }
        //     }
        // }


        async function check(){
            while (true){
                $.ajax({
                    url:"/check_journal_full",
                    type:"GET",
                    success:function(data)
                    {
                        var modal_content=document.getElementById('jda_attention_modal_content')
                        var modal=new ModalWindow('Внимание', modal_content, AnimationsTypes['fadeIn'])
                        // var modal=document.getElementById('jda_attention')
                        // var form=modal.getElementsByClassName('form_header')[0]
                        var btn=document.createElement('a')

                        btn.className="btn btn-danger"
                        btn.textContent='Очистить журнал'

                        // console.log(data)
                        if (data==1){
                            if (modal_content.getElementsByClassName('btn btn-danger').length!=0){
                                modal_content.removeChild(btn)
                            }
                            $('#jda_attention_text').html('Журнал действий администратора заполнен до предупредительной отметки')
                            modal.show()
                            // modalShow(modal)
                        }
                        if (data==3){
                            if (modal_content.getElementsByClassName('btn btn-danger').length!=0){
                                modal_content.removeChild(btn)
                            }
                            $('#jda_attention_text').html('Журнал событий заполнен до предупредительной отметки')
                            modal.show()
                            // modalShow(modal)
                        }
                        if (data==2){
                            if (modal_content.getElementsByClassName('btn btn-danger').length==0){
                                btn.href="clear_logs_ib"
                                modal_content.appendChild(btn)
                            }
                            $('#jda_attention_text').html('Журнал действий администратора заполнен до критической отметки')
                            modal.show()
                            // modalShow(modal)
                        }
                        if (data==4){
                            if (modal_content.getElementsByClassName('btn btn-danger').length==0){
                                btn.href="clear_logs"
                                modal_content.appendChild(btn)
                            }
                            $('#jda_attention_text').html('Журнал событий заполнен до критической отметки')
                            modal.show()
                            // modalShow(modal)
                        }
                    }
                })
                await sleep(60);
            }
        }
        check();

    })
</script>

