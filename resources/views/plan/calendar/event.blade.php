@extends('plan.calendar.main')
@section('content')



<h1>КАЛЕНДАРНЫЙ ПЛАН<br>
"{{$executive->name}}"<br>
    на {{$plan->month}} {{$plan->year}}
    год</h1>
<table>
    <tr>
        <th>Наименование мероприятия</th>
        <th>День  проведения</th>
        <th>Ответственные</th>
        <th>Действие</th>
    </tr>

        @foreach ($event as $events)

        <tr>
            <td>{{$events->event->Name}}</td>
            <td>{{$events->day}}</td>
            <td>{{$events->agent->FullName}}<br>
                {{$events->event->agent->FullName}}
            </td>
            <td>
                <a href="{{action('EventsBaslineController@edit',['events'=>$events->id])}}">Изменить</a>
                <form method="POST" action="{{action('PlanPrimaryController@destroy',['events'=>$events->id])}}">
                    <input type="hidden" name="_method" value="delete"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="submit" value="Удалить"/>
                </form>
            </td>

        </tr>
        @endforeach
 </table>
<form  action="{{action('EventsBaslineController@show',['plan'=>$plan->id])}}">
    <input type="submit" value="Добавить мероприятие"/>
</form>

@endsection