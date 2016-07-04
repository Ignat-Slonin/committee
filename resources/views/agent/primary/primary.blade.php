@extends('plan.primary.main')
@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Представители исполкома</div>
                <div class="panel-body">
                    <table>
                            <tr>
                                <th>Название исполнительного комитета</th>
                                <th>ФИО представителя</th>
                                <th>Номер телефона</th>
                                <th>Должность</th>
                                <th>Действие</th>
                                <th>Действие</th>
                                <th>Действие</th>
                            </tr>
                            @foreach ($primary as $primar)
                                <tr>
                                    <td>{{$primar->executive->name}}</td>
                                    <td>{{$primar->FullName}}</td>
                                    <td>{{$primar->Phone}}</td>
                                    <td>{{$primar->post->name}}</td>
                                    <td>
                                        <div class="form-group">
                                            <form  action="{{action('AgentExecutiveCommitteePrimaryController@edit',['AgentExecutiveCommitteePrimary'=>$primar->id])}}">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class=""></i>Изменить
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <form  action="{{action('AgentExecutiveCommitteePrimaryController@show',['AgentExecutiveCommitteePrimary'=>$primar->id])}}">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class=""></i>Меропрития
                                                </button>
                                            </form>
                                        </div>
                                    <td>
                                        <div class="form-group">
                                            <form method="POST" action="{{action('AgentExecutiveCommitteePrimaryController@destroy',['AgentExecutiveCommitteePrimary'=>$primar->id])}}">
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
                        <form  action="{{action('AgentExecutiveCommitteePrimaryController@create')}}">
                            <button type="submit" class="btn btn-primary">
                                <i class=""></i>Добавить представителя
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