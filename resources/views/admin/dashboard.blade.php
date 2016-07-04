@extends('admin.main')
@section('content')
<h1>Админка</h1>

<h2>Должности</h2>
<h4>Должность исполнительного органа</h4>
<ul>
    <li><a href="/post/executive">Все должности</a></li>
    <li><a href="/post/executive/create">Добавить должность</a></li>
</ul>

<h2>Исполкомы</h2>
<ul>
    <li><a href="/executive/primary">Все исполкомы</a></li>
    <li><a href="/executive/primary/create">Добавить исполком</a></li>
</ul>



<h2>Планы</h2>
<h4>План первичного уровня</h4>
<ul>
    <li><a href="/plan/primary">Все планы</a></li>
    <li><a href="/plan/primary/create">Добавить план</a></li>
</ul>


<h4>Календарный план </h4>
<ul>
    <li><a href="/plan/calendar">Все планы</a></li>
    <li><a href="/plan/calendar/create">Добавить план</a></li>
</ul>





<h2>Представители</h2>
<h4>Представители исполнительного органа первичного уровня, базового и отдела</h4>
<ul>
    <li><a href="/agent/primary">Все представители</a></li>
    <li><a href="/agent/primary/create">Добавить представителя</a></li>
</ul>




<h2>Мероприятия</h2>
<h4>Мероприятия первичного уровня</h4>
<ul>
    <li><a href="/events/primary">Все мероприятия</a></li>
    <li><a href="/events/primary/create">Добавить мероприятие</a></li>
</ul>


<h4>Мероприятия базового уровня</h4>
<ul>
    <li><a href="/events/baseline">Все мероприятия</a></li>
    <li><a href="/events/baseline/create">Добавить мероприятие</a></li>
</ul>



@endsection




