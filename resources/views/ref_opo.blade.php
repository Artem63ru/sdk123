<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <link rel="stylesheet" href="/css/app.css">--}}

    <link rel="stylesheet" href="/css/styles.css"/>
    <link rel="stylesheet" href="/css/font-awesome.css" />
    <link rel="stylesheet" href="/css/datatable.min.css"/>
    <link rel="stylesheet" href="/css/iconfont/material-icons.css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="/js/jquery.min.js"></script>
    <title>СДК ПБ - @yield('title')</title>
</head>

            <table class="table table-bordered">
                <colgroup class="column colspan-2"></colgroup>
                <colgroup class="column colspan-4"></colgroup>
                <tbody>
                <thead  class="table-primary">

                <th> Дата </th>
                <th> Статус </th>
                <th> Сообщение </th>
                <th> Опо </th>

                </thead>

                    @foreach($jas11 as $jas)
                    <tr class="table-info">
                         <td>   {{$jas->data}} </td>
                        <td>   {{$jas->status}} </td>
                        <td>   {{$jas->danger}} </td>
                        <td>   {{$jas->jas_to_elem->nameObj}} </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

