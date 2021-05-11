@extends('web.layouts.app_admin')
@section('title')
    Админ панель
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }} новой роли пользователей</div>

                    <div class="card-body">

                        <form method="POST"
                              @if ($update)
                              action="{{ route('update_role') }}">
                            @else
                              action="{{ route('add_role') }}">
                            @endif
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} роли</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                           @if ($update)
                                           value="{{ $roles->name }}"
                                           @endif
                                           required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Дополнительное имя') }}</label>

                                <div class="col-md-6">
                                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                                           @if ($update)
                                           value="{{ $roles->slug }}"
                                           @endif
                                          required autocomplete="slug" autofocus>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">

                                            @foreach ($perms as $perm)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="{{$perm->name}}" value="{{$perm->id}}" id="{{$perm->id}}" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    {{$perm->name}}
                                                </label>
                                            </div>
                                            @endforeach



                                    <button type="submit" class="btn btn-primary">
                                        @if ($update)
                                            Сохранить
                                         @else
                                            Добавить
                                        @endif

                                    </button>
                                </div>
                                </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
