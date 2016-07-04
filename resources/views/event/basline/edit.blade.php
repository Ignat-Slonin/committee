@extends('plan.calendar.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление мероприятия </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{action('EventsBaslineController@update',['primary'=>$primary->id])}}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">День мереприятия</label>
                                <div class="col-md-6">
                                    <input type="number" size="2" min="1" max="31" name="day" value="{{$primary->day}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">  Мероприятие первичного уровня</label>
                                <div class="col-md-6">
                                     @foreach($event as $events)
                                        <input type="radio" name="id_EventPrimary" value="{{$events->id}}">{{$events->Name}}<br>
                                    @endforeach
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label"> Представители</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="id_AgentCommitteePrimary">
                                        <option value="{{$primary->id_AgentCommitteePrimary}}">{{$primary->agent->FullName}}</option>
                                        @foreach($agent as $agents)
                                            <option value="{{$agents->id}}">{{$agents->FullName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="hidden" name="id_CalendarPlan" value="{{$primary->id_CalendarPlan}}"/>
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