@extends('event.main')
@section('content')
    <table>
        <tr>
            <td>Название</td>
            <td>Дата проведения</td>
            <td>Ответственные</td>
            <td>Действие</td>
            <td>Действие</td>
        </tr>
        @foreach ($primary as $primar)
            <tr>

                <td>{{$primar->event->Name}}</td>
                <td>{{$primar->day}} {{$primar->plan->month}} {{$primar->plan->year}}</td>
                <td>{{$primar->event->agent->FullName}}<br>
                    {{$primar->agent->FullName}}
                </td>
                <td> <a href="{{action('EventsBaslineController@edit',['EventsBasline'=>$primar->id])}}">Изменить</a></td>
                <td> <form method="POST" action="{{action('EventsBaslineController@destroy',['EventsBasline'=>$primar->id])}}">
                        <input type="hidden" name="_method" value="delete"/>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="submit" value="Удалить"/>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

@endsection