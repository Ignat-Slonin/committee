@extends('plan.primary.main')
@section('content')
    <table>
        <tr>
            <th>Мероприятие</th>
            <th>Ответственный за проведение</th>
            <th>Должность</th>
            <th>Дата проведения</th>
            <th>Действие</th>
            <th>Действие</th>
        </tr>
        @foreach ($event as $events)


                <tr>
                    <td>{{$events->Name}}</td>
                    <td>{{$events->agent->FullName}}</td>
                    <td>{{$events->agent->post->name}}</td>
                    <td>@if($events->monthEvent<10)
                    0{{$events->monthEvent}}.{{$events->plan->year}}
                        @else
                            {{$events->monthEvent}}.{{$events->plan->year}}
                        @endif

                    </td>
                    <td>

                        <div class="form-group">
                            <form  action="{{action('EventPrimaryController@edit',['primary'=>$events->id])}}">
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
        <form action="{{action('EventPrimaryController@create')}}">
            <button type="submit" class="btn btn-primary">
                <i class=""></i>Добавить мероприятие
            </button>
        </form>
    </div>


@endsection