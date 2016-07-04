@extends('plan.calendar.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление годового плана</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{action('CalendarPlanController@update',['CalendarPlan'=>$primary->id])}}">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Год плана</label>
                                <div class="col-md-6">
                                    <input type="number" size="4" name="year" min="1990" max="{{date('Y')+1}}" value="{{$primary->year}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"> Месяц проведения</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="month">
                                        <option value="{{$primary->month}}">{{$primary->month}}</option>
                                        @foreach($month as $months)
                                            <option value="{{$months}}">{{$months}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="hidden" name="id_ExecutivePrimary" value="{{$executive->id}}">
                                    <input type="hidden" name="_method" value="PUT"/>
                                    {{ csrf_field() }}
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