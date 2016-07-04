@extends('admin.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Пользователи системы</div>
                    <div class="panel-body">
                        <table>
                            <tr>

                                <th>Имя</th>
                                <th>Email адрес</th>
                                <th>Первичная</th>
                                <th>Базовая</th>
                                <th>Административная</th>
                                <th>Действие</th>
                                <th>Действие</th>
                            </tr>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <form action="{{ route('admin.assign') }}" method="post">
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}  <input type="hidden" name="email" value="{{ $user->email}}"></td>
                                        <td> <input type="checkbox" {{$user->hasRole('primary') ?  'checked' : ''}} name="role_primary"></td>
                                        <td> <input type="checkbox" {{$user->hasRole('basic') ?  'checked' : ''}} name="role_basic"></td>
                                        <td> <input type="checkbox" {{$user->hasRole('admin') ?  'checked' : ''}} name="role_admin"></td>
                                            {{ csrf_field() }}
                                        <td>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn"></i>Назначить<br> роль
                                                </button>
                                            </div>
                                        </td>
                                        </form>

                                        <td>
                                            <div class="form-group">
                                                <form method="POST" action="{{route('admin.destroy',['user'=>$user->id])}}">
                                                    <input type="hidden" name="_method" value="delete"/>
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class=""></i>Удалить
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(Session::has('message'))
                            {{Session::get('message')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection