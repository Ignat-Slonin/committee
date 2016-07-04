@extends('plan.primary.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Планы первичного уровня</div>
                    <div class="panel-body">
                        <table>
                            <tr>
                                <th>Год</th>
                                <th>Исполком</th>
                                <th>Действие</th>
                                <th>Действие</th>
                                <th>Действие</th>
                            </tr>
                            @foreach ($primary as $primar)
                                <tr>
                                    <td>{{$primar->year}}</td>
                                    <td>{{$primar->executive->name}}</td>

                                    <td>
                                        <div class="form-group">
                                                <form  action="{{action('PlanPrimaryController@edit',['primary'=>$primar->id])}}">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class=""></i>Изменить
                                                    </button>
                                                </form>
                                        </div>
                                    </td>


                                    <td>
                                        <div class="form-group">
                                                <form method="POST" action="{{action('PlanPrimaryController@destroy',['primary'=>$primar->id])}}">
                                                    <input type="hidden" name="_method" value="delete"/>
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class=""></i>Удалить
                                                    </button>
                                                </form>
                                        </div>
                                    </td>


                                    <td>
                                        <div class="form-group">
                                            <form  action="{{action('PlanPrimaryController@show',['primary'=>$primar->id])}}">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class=""></i> Мероприятия<br>на текущий год
                                                </button>
                                            </form>
                                        </div>
                                    </td>


                                </tr>
                            @endforeach
                        </table>
                        <div class="form-group">
                            <form  action="{{action('PlanPrimaryController@create')}}">
                                <button type="submit" class="btn btn-primary">
                                    <i class=""></i>Добавить годовой план
                                </button>
                            </form>
                        </div>
                        @if(Session::has('message'))
                            {{Session::get('message')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection