@extends('plan.primary.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление мероприятия на {{$plan->year}} год</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{action('EventPrimaryController@store')}}">
                            {!! csrf_field() !!}


                            <div class="form-group">
                                <label class="col-md-4 control-label"> Название мероприятия</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="Name" value="{{ old('Name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"> Месяц проведения</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="monthEvent" value="{{ old('monthEvent') }}">
                                        @foreach($month as $months)
                                            <option value="{{$months}}">{{$months}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-4 control-label"> Ответственный</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="id_AgentCommitteePrimary" value="{{ old('id_AgentCommitteePrimary') }}">
                                        @foreach($agent as $agents)
                                            <option value="{{$agents->id}}">{{$agents->FullName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="hidden"  name="id_PlanPrimaryLevel"  value="{{$plan->id}}">
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



