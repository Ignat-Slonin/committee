@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Панель</div>

                <div class="panel-body">
                    <a href="/admin">Панель администратора</a>
                    <br>
                    <a href="/plan/primary">Годовой план (Планы первичного уровня)</a>
                    <br>
                    <a href="/plan/calendar">Календарный план (План базового уровня)</a>
                    <br>


                    @yield('content')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
