@extends('plan.primary.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление представителя</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form"method="POST" action="{{action('AgentExecutiveCommitteePrimaryController@update',['AgentExecutiveCommitteePrimary'=>$primary->id])}}">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label class="col-md-4 control-label"> ФИО предстатавителя исполнительного органа</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="FullName" value="{{$primary->FullName}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Номер телефона</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="Phone" value="{{$primary->Phone}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label"> Должность исполнительного органа</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="id_PostExecutiveBody" value="{{$primary->id_PostExecutiveBody}}">
                                        {{$post=App\PostExecutiveBodyModel::all()}}
                                        @foreach($post as $posts)
                                            <option value="{{$posts->id}}">{{$posts->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="hidden"  name="id_ExecutiveCommitteePrimary" value="{{$primary->id_ExecutiveCommitteePrimary}}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">
                                        <input type="hidden" name="_method" value="PUT"/>
                                        <i class="fa fa-btn fa-sign-in"></i>Сохранить
                                    </button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                @if(Session::has('message'))
                    {{Session::get('message')}}
                @endif
            </div>
        </div>
    </div>
@endsection


