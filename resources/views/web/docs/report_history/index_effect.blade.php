@extends('web.layouts.app')
@section('title')
    История отчетов
@endsection

@section('content')

    <style>
        label {
            display: block;
            margin-bottom: 0.5rem;
        }

    </style>

@include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >{{$title['main']}}</h2>
                    </div>
                    <div class="inside_tab_padding form51" style="height: 45rem">
                        <div style="background: #FFFFFF; border-radius: 6px" class="row_block form51">
                    <table>
                        <thead>
                        <tr>
                            <th style="width: 2rem">№ п/п </th>
                            <th style="width: 40vh">Дата отчета</th>
                            <th style="width: 10vh" class="centered"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @for($id_year=0; $id_year<count($data_in_index['num_year']); $id_year++)
                            @for($id_quarter=0; $id_quarter<count($data_in_index['num_quarter'][$id_year]); $id_quarter++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{$title['period'].' '.$data_in_index['num_quarter'][$id_year][$id_quarter].' квартал '.$data_in_index['num_year'][$id_year].' года'}}</td>
                                    <td  class="centered">
                                        <a href={{$title['adress']."/".$data_in_index['num_quarter'][$id_year][$id_quarter]."/".$data_in_index['num_year'][$id_year]}} style="margin-left: 50%"><img  alt="" src="{{asset('assets/images/icons/search.svg')}}" class="check_i" style="text-align:center"></a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                ?>
                            @endfor
                        @endfor
                        </tbody>
                    </table>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
