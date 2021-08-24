@extends('web.layouts.app')
@section('title')
    Просмотр
@endsection

@section('content')
    @push('app-css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @include('web.admin.inc.menu')
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Просмотр конфигурации безопасности</h2>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('edit_config_safety') }}"> Редактировать</a>
                            </div>
                        </div>
                    </div>


          <div class="table-responsive" >
              <div style="height: 75vh" class="no_tab_table open">
          <table   class="table table-hover table-bordered">
              <tbody>
              <tr>
                  <td><div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <div style="padding: 5px" class="">
                                  @foreach($config as $data)
                                  <strong class="text-muted h3">Количество символов:      {{ $data->num_znak }}</strong>
                                  @endforeach
                              </div>

                          </div>
                      </div>
                  </td>
              </tr>

              <tr>
                  <td><div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              @foreach($config as $data)
                              @if($data->up_register)
                              <div style="padding: 5px" class="">
                                  <strong class="text-muted h3">Наличие заглавных букв:     обязательно</strong>
                              </div>
                              @else
                              <div style="padding: 5px" class="">
                                  <strong class="text-muted h3">Наличие заглавных букв:     не обязательно</strong>
                              </div>
                              @endif
                              @endforeach
                          </div>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td><div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              @foreach($config as $data)
                                  @if($data->num_check)
                                      <div style="padding: 5px" class="">
                                          <strong class="text-muted h3">Наличие цифр:     обязательно</strong>
                                      </div>
                                  @else
                                      <div style="padding: 5px" class="">
                                          <strong class="text-muted h3">Наличие цифр:     не обязательно</strong>
                                      </div>
                                  @endif
                              @endforeach
                          </div>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td><div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              @foreach($config as $data)
                                  @if($data->spec_check)
                                      <div style="padding: 5px" class="">
                                          <strong class="text-muted h3">Наличие специальных символов:     обязательно</strong>
                                      </div>
                                  @else
                                      <div style="padding: 5px" class="">
                                          <strong class="text-muted h3">Наличие специальных символов:     не обязательно</strong>
                                      </div>
                                  @endif
                              @endforeach
                          </div>
                      </div>
                  </td>
              </tr>

              <tr>
                  <td><div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <div style="padding: 5px" class="">
                                  @foreach($config as $data)
                                  <strong class="text-muted h3">Количество попыток ввода:      {{ $data->num_error }}</strong>
                                  @endforeach
                              </div>

                          </div>
                      </div>
                  </td>
              </tr>

              <tr>
                  <td><div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <div style="padding: 5px" class="">
                                  @foreach($config as $data)
                                  <strong class="text-muted h3">Количество паролей в истории:      {{ $data->num_password }} </strong>
                                  @endforeach
                              </div>

                          </div>
                      </div>
                  </td>
              </tr>
              <tr>
        <td><div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <div style="padding: 5px" class="">
                    @foreach($config as $data)
                    <strong class="text-muted h3">Длительность блокировки:      {{ $data->time_ban }} сек.</strong>
                    @endforeach
                </div>

            </div>
        </div>
        </td>
              </tr>
              <tr>
                  <td><div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <div style="padding: 5px" class="">
                                  @foreach($config as $data)
                                      <strong class="text-muted h3">Длительность сессии:      {{ $data->time_session }} сек.</strong>
                                  @endforeach
                              </div>

                          </div>
                      </div>
                  </td>
              </tr>

              </tbody>
          </table>
    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
@endsection
