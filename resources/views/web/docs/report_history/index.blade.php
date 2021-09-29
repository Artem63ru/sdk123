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
                        @foreach ($data as $row)
                            <?php
                            if ($row['type'] == 'day')
                                $text_period = $row['date'];
                                if ($row['type'] == 'month')
                                    $text_period = date('Y-m', strtotime($row['date']));
                                if ($row['type'] == 'quarter'){
                                    if ($row['date'] == date('Y-07-01', strtotime($row['date']))){
                                        $text_period = "3 квартал".' '.date('Y', strtotime($row['date']));
                                    } elseif ($row['date'] == date('Y-01-01', strtotime($row['date']))){
                                        $text_period = "1 квартал".' '.date('Y', strtotime($row['date']));
                                    } elseif ($row['date'] == date('Y-04-01', strtotime($row['date']))){
                                        $text_period = "2 квартал".' '.date('Y', strtotime($row['date']));
                                    } elseif ($row['date'] == date('Y-10-01', strtotime($row['date']))){
                                        $text_period = "4 квартал".' '.date('Y', strtotime($row['date']));
                                    }
                                }
                            ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{$title['period'].' '.$text_period }}</td>
                <td  class="centered">
                    <a href={{$title['adress']."/".$row['date']."/".$row['type']}} style="margin-left: 50%"><img  alt="" src="{{asset('assets/images/icons/search.svg')}}" class="check_i" style="text-align:center"></a>
                </td>
            </tr>
            <?php
            $i++;
            ?>
        @endforeach
                        </tbody>
                    </table>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
