@extends('plan.primary.main')
@section('content')



<h1>ПЛАН   РАБОТЫ <br>
    "{{$executive->name}}"<br>
    на {{$plan->year}} год
</h1>
    <table>


            @foreach ($event as $events)
            <tr>

                    <th colspan="5">Месяц проведения</th>
            </tr>
            <tr>
                <td colspan="5" >{{$events->monthEvent}}</td>
            </tr>
            <tr>
                <th>Мероприятие</th>
                <th>Ответственный за проведение</th>
                <th>Должность</th>
                <th>Действие</th>
                <th>Действие</th>
            </tr>
                <tr>
                    <td>{{$events->Name}}</td>
                    <td>{{$events->agent->FullName}}</td>
                    <td>{{$events->agent->post->name}}</td>
                    <td>

                        <div class="form-group">
                            <form  action="{{action('EventPrimaryController@edit',['event'=>$events->id])}}">
                                <button type="submit" class="btn btn-primary">
                                    <i class=""></i>Изменить
                                </button>
                            </form>
                        </div>

                    </td>
                    <td>
                        <div class="form-group">
                    <form method="POST" action="{{action('EventPrimaryController@destroy',['event'=>$events->id])}}">
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
     </table>



    <div class="form-group">
        <form action="{{action('EventPrimaryController@show',['plan'=>$plan->id])}}">
            <button type="submit" class="btn btn-primary">
                <i class=""></i>Добавить мероприятие
            </button>
        </form>
    </div>

@if(Session::has('message'))
    {{Session::get('message')}}
@endif
@endsection