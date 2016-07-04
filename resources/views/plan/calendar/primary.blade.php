@extends('plan.calendar.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Календарные планы</div>
                <div class="panel-body">
                        <table>
                            <tr>
                                <th>Год проведения</th>
                                <th>Месяц проведения</th>
                                <th>Исполком базового уровня</th>
                                <th>Действие</th>
                                <th>Действие</th>
                                <th>Действие</th>

                            </tr>
                            @foreach ($primary as $primar)
                                <tr>
                                    <td>{{$primar->year}}</td>
                                    <td>{{ $primar->month}}</td>
                                    <td>{{$primar->executive->name}}</td>

                                    <td>
                                        <div class="form-group">
                                            <form  action="{{action('CalendarPlanController@edit',['primary'=>$primar->id])}}">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class=""></i>Изменить
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <form method="POST" action="{{action('CalendarPlanController@destroy',['primary'=>$primar->id])}}">
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
                                            <form  action="{{action('CalendarPlanController@show',['primary'=>$primar->id])}}">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class=""></i> Мероприятия<br>на текущий план
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    <div class="form-group">
                        <form  action="{{action('CalendarPlanController@create')}}">
                            <button type="submit" class="btn btn-primary">
                                <i class=""></i>Добавить календарный план
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