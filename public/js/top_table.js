function sleep(sec) {
    return new Promise(resolve => setTimeout(resolve, sec*1000));
}


function clearTable(table){
    while(table.rows.length > 0) {
        table.deleteRow(table.rows.length-1);
    }
}

function addRowToTable(table, item, button=false){
    row=document.createElement("tr");

    td_date=document.createElement("td");
    td_date.className="td_date";
    date_text=document.createTextNode(item["date"]);
    td_date.appendChild(date_text);

    td_status=document.createElement("td");
    td_status.className="td_status";
    status_text=document.createTextNode(item["level"]);
    td_status.appendChild(status_text);

    td_opo=document.createElement("td");
    td_opo.className="td_opo";
    opo_text=document.createTextNode(item["descOPO"]);
    td_opo.appendChild(opo_text);

    td_element=document.createElement("td");
    td_element.className="td_element";
    element_text=document.createTextNode(item["nameObj"]+` (Элемен объекта ОПО ${item["descOPO"]})`);
    td_element.appendChild(element_text);

    td_number=document.createElement("td");
    td_number.className="td_number";
    number_text=document.createTextNode(item["status"]);
    td_number.appendChild(number_text);

    td_event=document.createElement("td");
    td_event.className="td_event";
    event_text=document.createTextNode(item["name"]);
    td_event.appendChild(event_text);



    row.appendChild(td_date);
    row.appendChild(td_status);
    row.appendChild(td_opo);
    row.appendChild(td_element);
    row.appendChild(td_number);
    row.appendChild(td_event);

    if (button){
        td_confirm=document.createElement("button")
        td_confirm.className="td_confirm_btn";
        td_confirm.id=item['id'];
        td_confirm.type="button";
        td_confirm.textContent="Квитировать"

        row.appendChild(td_confirm)
    }

    table.appendChild(row);
}

var ids_to_kv=[];



async function getDbInfo(){
    while(true){
        var GetDataReq=new XMLHttpRequest();
        var GetSumReq=new XMLHttpRequest();


        GetDataReq.onreadystatechange =function() {
            if (GetDataReq.readyState == 4 && GetDataReq.status == 200) {
                dialTabBody = document.getElementById("new_jas_1_modal").getElementsByTagName("tbody").item(0);
                clearTable(dialTabBody);
                if (typeof tablePage !== 'undefined') {
                    tabBody = document.getElementById("top_table_inside").getElementsByTagName("tbody").item(0);

                    //Удаление прошлой инфы из базы данных
                    clearTable(tabBody);

                }

                let arr=[]
                arr=JSON.parse(GetDataReq.responseText);//Принимаем данные в json
                //console.log(tablePage);
                var new_data_flag=false;
                //Перегружаем функцию и раскидываем инфу по таблице
                arr.forEach(function(item, i, arr){
                    if (typeof tablePage !== 'undefined') {
                        addRowToTable(tabBody, item);
                    }

                    if (item["check"]==false){
                        ids_to_kv.push(item['id']);
                        new_data_flag=true;
                        addRowToTable(dialTabBody, item, true);
                    }

                });
                //console.log(new_data_flag);
                if (new_data_flag){
                    ShowAlert();
                }

            }
        };

        GetSumReq.onreadystatechange=function (){
            if (GetSumReq.readyState == 4 && GetSumReq.status == 200) {
                new_sum=GetSumReq.response;//Принимаем данные в json
                old_sum=getFromLocalStorage('sum');
                //console.log(new_sum, old_sum);
                if (old_sum==null || old_sum!=new_sum) {
                    GetDataReq.open("GET", "/opo/get_db_info/15", true);
                    GetDataReq.send();
                    setToLocalStorage('sum', new_sum)
                }
            }
        }



        GetSumReq.open("GET", "/opo/get_sum/all", true);
        GetSumReq.send();





        await sleep(60);

    }
}

function getFromLocalStorage(key){
    return window.localStorage ? window.localStorage[key] : null
}

function setToLocalStorage(key, value){
    if (window.localStorage){
        window.localStorage[key]=value;
    }
}

function ShowAlert(){
    console.log('SHOWALERT')
    const mClose = document.querySelectorAll('[data-close]');
    let	mStatus = false;
    var overlay = document.querySelector('.not_click_overlay');
    var modal = document.getElementById("new_jas_1_modal");
    modalShow(modal);

    for (let el of mClose) {
        el.addEventListener('click', modalClose);
    }

    function modalShow(modal) {

        // показываем подложку всплывающего окна
        overlay.classList.remove('fadeOut');
        overlay.classList.add('fadeIn');

        modal.classList.remove('fadeOut');
        modal.classList.add('fadeIn');

        mStatus = true;
    }

    function modalClose() {
        if (mStatus) {
            modal.classList.remove('fadeIn');
            modal.classList.add('fadeOut');
            overlay.classList.remove('fadeIn');
            overlay.classList.add('fadeOut');
            // сбрасываем флаг, устанавливая его значение в 'false'
            // это значение указывает нам, что на странице нет открытых
            // всплывающих окон
            mStatus = false;
        }
    }

    // confirmBtn=document.getElementById("kvitir");
    // confirmBtn.addEventListener('click');

    var kv_buttons=document.getElementsByClassName("td_confirm_btn");
    for (let el of kv_buttons) {
        el.addEventListener('click', function (e){
            Confirm(el);
        });
    }

    function Confirm(button){
        var _id="id="+encodeURIComponent(button.id);
        var request= new XMLHttpRequest();
        request.onreadystatechange=function (){
            if ((request.readyState==4) && (request.status==200)) {
                var res=JSON.parse(request.responseText);
                console.log(request.responseText);
                if (res['result']=='true'){
                    td_confirm_res=document.createElement("td");
                    td_confirm_res.textContent="Успешно";
                    button.parentNode.replaceChild(td_confirm_res, button);
                    deleteFromArray(kv_buttons, button);
                    if (kv_buttons.length==0){
                        modalClose();
                    }
                }
            }
        }

        request.open('POST', "/opo/set_check_for_opo",true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        request.send(_id);

    }


}

function deleteFromArray(array, element){
    for (let item of array){
        if (item==element){
            array.slice(item.id,1);
            return true;
        }
    }
    return false;

}

if (getFromLocalStorage('sum')!=null){
    window.localStorage.removeItem('sum');
}

if (typeof mapPage == 'undefined') {
    getDbInfo();
}
