@extends('admin.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                        <div class="panel-heading">Должности исполнительных комитетов</div>
                        <div class="panel-body">
                            <table>
                                <tr>
                                    <th>Название должности</th>
                                    <th>Действие</th>
                                    <th>Действие</th>
                                </tr>
                                    @foreach ($executive as $executives)
                                        <tr>

                                            <td>{{$executives->name}}</td>

                                            <td>
                                                <div class="form-group">
                                                    <form  action="{{action('PostExecutiveBodyController@edit',['executive'=>$executives->id])}}">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class=""></i>Изменить
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                     <form method="POST" action="{{action('PostExecutiveBodyController@destroy',['executive'=>$executives->id])}}">
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
                                    <form  action="{{action('PostExecutiveBodyController@create')}}">
                                        <button type="submit" class="btn btn-primary">
                                            <i class=""></i>Добавить должность
                                        </button>
                                    </form>
                                </div>

                        </div>
                            @if(Session::has('message'))
                                {{Session::get('message')}}
                            @endif
                </div>
            </div>
        </div>
    </div>


@endsection