@extends('plan.primary.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактирование годового плана</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{action('PlanPrimaryController@update',['PlanPrimaryLevel'=>$primary->id])}}">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Год плана</label>
                                <div class="col-md-6">
                                    <input type="number" size="4" name="year" min="1990" max="{{date('Y')+1}}" value="{{$primary->year}}">
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="hidden"  name="id_ExecutivePrimary" value="{{$primary->id_ExecutivePrimary}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT"/>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn"></i>Сохранить
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