@extends('plan.primary.main')
@section('content')

    <table>
        <tr>
            <th>Название исполнительного комитета</th>
            <th>Название</th>
            <th>Месяц проведения</th>
            <th>Год мероприятия</th>
            <th>Представитель исполкома</th>
            <th>Должность представителя</th>
            <th>Действие</th>

        </tr>

        @foreach ($primary as $primar)
            <tr>
                <td>{{$primar->plan->executive->name}}</td>
                <td>{{$primar->Name}}</td>
                <td>{{ $primar->monthEvent}}</td>
                <td>{{$primar->plan->year}}</td>
                <td>{{$primar->agent->FullName}}</td>
                <td>{{$primar->agent->post->name}}</td>

                <td>
                    <div class="form-group">
                        <form  action="{{action('EventPrimaryController@edit',['primary'=>$primar->id])}}">
                            <button type="submit" class="btn btn-primary">
                                <i class=""></i>Изменить
                            </button>
                        </form>
                    </div>

                    <div class="form-group">
                        <form method="POST" action="{{action('EventPrimaryController@destroy',['primary'=>$primar->id])}}">
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
    <form  action="{{action('EventPrimaryController@create')}}">
        <input type="submit" value="Добавить мероприятие"/>
    </form>

@endsection