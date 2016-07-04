@extends('admin.main')
@section('content')
    <div class="container" >
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                        <div class="panel-heading">Исполнительные комитеты</div>
                        <div class="panel-body">
                            <table>
                                <tr>
                                    <th>Название</th>
                                    <th>Адрес</th>
                                    <th>Исполком базового уровня</th>
                                    <th>Действие</th>
                                    <th>Действие</th>
                                </tr>
                                 @foreach ($executive as $executiv)
                                <tr>
                                    <td>{{$executiv->name}}</td>
                                    <td>{{$executiv->address}}</td>
                                    <td>{{$basics[$executiv->basic]}}</td>

                                    <td>
                                        <div class="form-group">
                                            <form  action="{{action('ExecutiveCommitteePrimaryController@edit',['executive'=>$executiv->id])}}">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class=""></i>Изменить
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                             <form method="POST" action="{{action('ExecutiveCommitteePrimaryController@destroy',['executive'=>$executiv->id])}}">
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
                                    <form  action="{{action('ExecutiveCommitteePrimaryController@create')}}">
                                        <button type="submit" class="btn btn-primary">
                                            <i class=""></i>Добавить исполнительный комитет
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