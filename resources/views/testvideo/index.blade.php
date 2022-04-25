<head>
    <title>СКВ 1109</title>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cashe">
    <META HTTP-EQUIV="content-type" content="text/html;charset=windows-1251">
</head>
<style>

</style>

<script>

    function vhod_to_is() {
        f1.check_user.value=1;
        f1.login.value=f1.txt_login.value;
        f1.pass.value=f1.txt_pass.value;
    }
    function btnclick(name){
        if(name == "usv002")	return;

        if(document.getElementById(name).style.color == "red"){
            document.getElementById("img_" + name).style.visibility = "hidden";
            document.getElementById(name).style.color = "green";
        }
        else{
            document.getElementById("img_" + name).style.visibility = "visible";
            document.getElementById(name).style.color = "red";
        }
    }
</script>

<body background="{{asset('storage/test/1.png')}}">

{!! Form::model($data, ['method' => 'PATCH','route' => ['testvideo.update', $data->id]]) !!}
<input type="button" id="usv002"   value="Start Test" style="background-color:white; color: green; position: absolute; left: 1130; top:135;" onclick=btnclick(this.id) >
<input type="button" id="usv004"  value="Start Test" style="background-color:white; color: green; position: absolute; left: 1130; top:165;" onclick=btnclick(this.id) >
@if($data->aah001_xp03)
<input type="submit" name="aah001_xp03" id="aah001"   value="Start Test" style="background-color:white; color: red; position: absolute; left: 1130; top:195;" >
<img id="img_aah001" src="{{asset('storage/test/aah001.png')}}" style="position: absolute; left: 344; top: 142;" >
@else
    <input type="submit" name="aah001_xp03" id="aah001"   value="Start Test" style="background-color:white; color: green; position: absolute; left: 1130; top:195;" >
@endif
@if($data->eal003_xh01)
<input type="submit" name="eal003_xh01" id="eal003" value="Start Test" style="background-color:white; color: red; position: absolute; left: 1130; top:225;" onclick=btnclick(this.id)>
<img id="img_eal003" src="{{asset('storage/test/eal003.png')}}" style="position: absolute; left: 1233; top: 223;" >
@else
    <input type="submit" name="eal003_xh01" id="eal003" value="Start Test" style="background-color:white; color: green; position: absolute; left: 1130; top:225;" onclick=btnclick(this.id)>
@endif
@if($data->pal012_xp01)
    <input type="submit"  name="pal012_xp01" id="pal012" value="Start Test" style="background-color:white; color: red; position: absolute; left: 382; top:715;" onclick=btnclick(this.id)>
    <img id="img_pal012" src="{{asset('storage/test/pal012.png')}}" style="position: absolute; left: 240; top: 80";>
@else
    <input type="submit" name="pal012_xp01" id="pal012" value="Start Test" style="background-color:white; color: green; position: absolute; left: 382; top:715;" onclick=btnclick(this.id)>
@endif
@if($data->fal001_xp01)
    <input type="submit"  name="fal001_xp01" id="fal001" value="Start Test" style="background-color:white; color: red; position: absolute; left: 382; top:745;" onclick=btnclick(this.id)>
    <img id="img_fal001" src="{{asset('storage/test/fal001.png')}}" style="position: absolute; left: 802; top: 723;" >
@else
    <input type="submit" id="fal001" name="fal001_xp01" value="Start Test" style="background-color:white; color: green; position: absolute; left: 382; top:745;" onclick=btnclick(this.id)>
@endif
@if($data->pal035_xh01)
    <input type="submit"  name="pal035_xh01" id="pal035" value="Start Test" style="background-color:white; color: red; position: absolute; left: 382; top:775;" onclick=btnclick(this.id)>
    <img id="img_pal035" src="{{asset('storage/test/pal035.png')}}" style="position: absolute; left: 404; top: 116;" >
@else
    <input type="submit" id="pal035" name="pal035_xh01" value="Start Test" style="background-color:white; color: green; position: absolute; left: 382; top:775;" onclick=btnclick(this.id)>
@endif
@if($data->pal003_xh01)
    <input type="submit"  name="pal003_xh01"  id="pal003" value="Start Test" style="background-color:white; color: red; position: absolute; left: 382; top:805;" onclick=btnclick(this.id)>
    <img id="img_pal003" src="{{asset('storage/test/pal003.png')}}" style="position: absolute; left: 457; top: 116;" >
@else
    <input type="submit"  name="pal003_xh01"  id="pal003" value="Start Test" style="background-color:white; color: green; position: absolute; left: 382; top:805;" onclick=btnclick(this.id)>
@endif
@if($data->tah009_xk03)
    <input type="submit"  name="tah009_xk03"  id="tahh009" value="Start Test" style="background-color:white; color: red; position: absolute; left: 382; top:835;" onclick=btnclick(this.id)>
    <img id="img_tahh009" src="{{asset('storage/test/tahh009.png')}}" style="position: absolute; left: 35; top: 65;" >
@else
    <input type="submit"  name="tah009_xk03"  id="tahh009" value="Start Test" style="background-color:white; color: green; position: absolute; left: 382; top:835;" onclick=btnclick(this.id)>
@endif

{!! Form::close() !!}
<img id="img_usv004" src="{{asset('storage/test/usv004.png')}}" style="position: absolute; left: 345; top: 70; visibility: hidden" >







</body>
