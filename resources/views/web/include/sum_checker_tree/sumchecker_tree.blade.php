{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">--}}
{{--    <title>Fancytree - Example</title>--}}
{{--    <script src="{{asset('/js/jquery.min.js')}}"></script>--}}

    <link href="{{asset('/sumchecker_tree/src/skin-win8/ui.fancytree.css')}}" rel="stylesheet">
    <script src="{{asset('/sumchecker_tree/src/jquery-ui-dependencies/jquery.fancytree.ui-deps.js')}}"></script>
    <script src="{{asset('/sumchecker_tree/src/jquery.fancytree.js')}}"></script>

    <style>
        #tree_footer{
            position: fixed; /* Фиксированное положение */
            left: 0; bottom: 0; /* Левый нижний угол */
            float: bottom;
            padding: 10px; /* Поля вокруг текста */
            width: 100%;
        }
        ul.fancytree-container {
            border: none;
            background-color: whitesmoke;
        }
        #files_tree_footer_btns{
            margin-left: auto;
            margin-right: auto;
            width: 300px;
            left: 50%;
            display: flex;
            justify-content: center
        }
        #files_tree_footer_btns{
            margin-left: auto;
            margin-right: auto;
            width: 300px;
            left: 50%;
            display: flex;
            justify-content: center;
        }
        #files_tree_footer_btns +.files_tree_btns{
            margin-left: 10px;
        }
        .files_tree_btns{
            margin-top: 15px;
            background-color: #3490dc;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            margin-left: 7px;
            margin-right: 7px;
        }
        .files_tree_btns.focus {
            color: #fff;
            background-color: #286090;
            border-color: #122b40;
        }
        .files_tree_btns:hover {
            color: #fff;
            background-color: #286090;
            border-color: #204d74;
        }
        #files_tree_modal{
            height: 800px;
            width: 80%;
            text-align: left;
        }
        #files_tree_callback_message{
            position: fixed; /* Фиксированное положение */
            right: 0; bottom: 0; /* Левый нижний угол */
            background-color: #f44336;
            color: white;
            float:right;
            width: 300px;
            display: flex;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            line-height: 1.6;
            border-radius: 0.25rem;
            height: 50px;
            margin: 10px;
         }
        .files_tree_div{
            border: 1px solid rgba(0, 0, 0, 0.125);
            overflow-y: scroll;
            height: 600px;
            width: 45%;
            margin: 5px;
        }
        #files_trees{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
        }
    </style>
    <!-- (Irrelevant source removed.) -->
{{--</head>--}}

{{--<body class="example">--}}


    <div class="overlay" data-close=""></div>
    <div id="files_tree_modal"  class="dlg-modal dlg-modal-slide">
        <div class="modal_header">
            <span class="closer_btn" data-close="" id="files_tree_closer"></span>
            <h1 >Контрольные суммы</h1>
        </div>
        <div id="files_tree_modal_content">
            <div id="files_trees">
                <div id="all_files_tree" class="files_tree_div" data-type="json">
                </div>

                <div id="choice_files_tree" class="files_tree_div">
                    <h2 id="choiced_div_text"></h2>
                </div>
            </div>
            <div id="tree_footer">
                <div id="files_tree_footer_btns">
                    <input type="button" id="set_paths_btn" class="files_tree_btns" value="Сохранить">
                    <input type="button" id="clear_choice_files_tree" class="files_tree_btns" value="Очистить список">
                </div>
                <div id="files_tree_callback_message">
                    <a id="files_tree_message_strong"></a>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

    $(document).ready(function (){
        $.getScript("{{asset('/js/modals_function.js')}}", function() {
            console.log("Script loaded but not necessarily executed.");
        });
        $('#files_tree_callback_message').hide();
    })
    function load_files_tree() {

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        function InitChoiceFilesTree(data){
            $("#choice_files_tree").fancytree({
                checkbox:false,
                source:data,
                loadChildren:function (event, data){
                    var cmp=function(a, b) {
                        var x = (a.isFolder() ? "0" : "1") + a.title.toLowerCase(),
                            y = (b.isFolder() ? "0" : "1") + b.title.toLowerCase();
                        return x === y ? 0 : x > y ? 1 : -1;
                    }
                    var rootNode=data.tree.getRootNode();
                    rootNode.sortChildren(cmp, true);
                    if (data.tree.getRootNode().children!=null){
                        $('#choiced_div_text').text('Выбранные файлы');
                    }
                    else{
                        $('#choiced_div_text').text('Файлы не выбраны');
                    }
                },
                init:function (event, data){
                    if (data.tree.getRootNode().children!=null){
                        $('#choiced_div_text').text('Выбранные файлы');
                    }
                    else{
                        $('#choiced_div_text').text('Файлы не выбраны');
                    }
                }

            })
        }
        // var selected_files=[];
        var FT = $.ui.fancytree;
        $(function(){
            // attach to instance 1 and 3
            $("#all_files_tree").fancytree({
                checkbox: true,
                loadChildren: function(event, data) {
                    var cmp=function(a, b) {
                        var x = (a.isFolder() ? "0" : "1") + a.title.toLowerCase(),
                            y = (b.isFolder() ? "0" : "1") + b.title.toLowerCase();
                        return x === y ? 0 : x > y ? 1 : -1;
                    }
                    var rootNode=data.tree.getRootNode();
                    rootNode.sortChildren(cmp, true);
                    // for(child in rootNode.children){
                    //     rootNode.children[child].setSelected(rootNode.children[child].data.choiced);
                    // }
                    if (data.node.isSelected()){
                        data.node.children.forEach(function(node){
                            node.setSelected();
                        })
                    }

                },
                checkboxAutoHide: true, // Display check boxes on hover only
                selectMode: 3,
                source:{
                    url: '/sumcontroller/test',
                    data:{
                        key:'.'
                    },
                    cache:false
                },
                lazyLoad: function(event, data) {
                    var node = data.node;
                    // Issue an Ajax request to load child nodes
                    data.result = {
                        url: "/sumcontroller/test",
                        data: {key: node.key}
                    }

                },
                select: function(event, data) {
                    if (data.node.key!='_1'){
                        function nodeSelect(node){
                            var choice_files_tree=FT.getTree("#choice_files_tree");
                            if (choice_files_tree==null){
                                if (!node.isFolder()){
                                    InitChoiceFilesTree([{
                                        title:node.title+ ' ('+node.key+')',
                                        folder: false,
                                        key: node.key,
                                        selected: true,
                                    }]);
                                }
                            }
                            else{
                                if (node.isFolder()){
                                    if (node.children!=null){
                                        node.children.forEach(function (nd){
                                            nd.setSelected(node.isSelected());
                                            nodeSelect(nd);
                                        })
                                    }
                                }
                                else{
                                    if (node.isSelected()){
                                        try{
                                            choice_files_tree.getRootNode().addChildren({
                                                title:node.title+ ' ('+node.key+')',
                                                folder: false,
                                                key: node.key,
                                                selected: true,
                                            });
                                        }
                                        catch (e){
                                            console.log(e)
                                        }
                                    }
                                    else{
                                        choice_files_tree.getRootNode().children.forEach(function (nd){
                                            if (nd.key==node.key){
                                                nd.remove();
                                            }
                                        })
                                    }
                                }
                                if (choice_files_tree.getRootNode().children!=null){
                                    $('#choiced_div_text').text('Выбранные файлы');
                                }
                                else{
                                    $('#choiced_div_text').text('Файлы не выбраны');
                                }
                            }
                        }

                        if (data.node.isFolder()){
                            data.node.setActive();
                            data.node.setExpanded(true);
                            nodeSelect(data.node);
                        }
                        else{
                            nodeSelect(data.node);
                        }
                    }

                }
            });
            $.ajax({
                url:'/sumcontroller/get_choiced',
                type: 'GET',
                success: function(data) {
                    if (data!=''){
                        InitChoiceFilesTree(data);
                    }
                    else{
                        $('#choiced_div_text').text('Файлы не выбраны');
                    }
                }
            });


        });


        document.getElementById('set_paths_btn').addEventListener('click', ()=>{
            var array=[];
            var paths_tree=FT.getTree("#choice_files_tree");
            if (paths_tree==null){
                $('#files_tree_callback_message').css("background-color", '#ea6a6a');
                $('#files_tree_callback_message').show();
                $('#files_tree_message_strong').text('Ошибка!');
                $('#files_tree_callback_message').fadeOut(3000);
                return;
            }
            if (paths_tree.getRootNode().children!=null){
                paths_tree.getRootNode().children.forEach(function (node){
                    if (node.key!='_2'){
                        array.push(node.key);
                    }
                })
            }
            else{
                array='none';
            }

            $.ajax({
                url:'/sumcontroller/set_paths',
                type:"POST",
                data:{
                    paths:array
                },
                success:function(data)
                {
                    console.log(data);
                    if (data==1){
                        $('#files_tree_callback_message').css("background-color", '#38c172');
                        $('#files_tree_callback_message').show();
                        $('#files_tree_message_strong').text('Сохранено!');
                        $('#files_tree_callback_message').fadeOut(2000);
                    }
                    else{
                        $('#files_tree_callback_message').css("background-color", '#ea6a6a');
                        $('#files_tree_callback_message').show();
                        $('#files_tree_message_strong').text('Ошибка!');
                        $('#files_tree_callback_message').fadeOut(3000);
                    }
                }
            })
        });


        document.getElementById('clear_choice_files_tree').addEventListener('click', ()=>{
            clear_tree();
        });

    }
    function clear_tree(){

        var FT = $.ui.fancytree;
        var paths_tree=FT.getTree("#choice_files_tree");
        if (paths_tree!=null){
            paths_tree.getRootNode().removeChildren();
            $('#choiced_div_text').text('Файлы не выбраны');

            FT.getTree('#all_files_tree').getSelectedNodes().forEach(function (nd){
                try{
                    nd.setSelected(false);
                }
                catch (e){
                    console.log(e);
                }
            });
        }
    }
</script>
<!-- (Irrelevant source removed.) -->
{{--</body>--}}
{{--</html>--}}



