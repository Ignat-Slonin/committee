@extends('admin.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление исполнительного комитета</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{action('PostExecutiveBodyController@update',['PostExecutiveBody'=>$executive->id])}}">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Название должности </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{$executive->name}}"">
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT"/>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <button type="submit" class="btn btn-primary">
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