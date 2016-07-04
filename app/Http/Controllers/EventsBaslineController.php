<?php

namespace App\Http\Controllers;
use App\EventPrimaryModel;
use App\EventsBaslineModel;
use App\ExecutiveCommitteePrimaryModel;
use App\AgentExecutiveCommitteePrimaryModel;
use App\CalendarPlanModel;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Http\Requests;

class EventsBaslineController extends Controller
{
    public function create()
    {
            $name = Auth::user()->id_ExecutiveCommitteePrimary;
            $executive = ExecutiveCommitteePrimaryModel::find($name);
            if ($executive->basic == 1) {
                $plan = CalendarPlanModel::all();//планы
                $agent = AgentExecutiveCommitteePrimaryModel::all();//ответственные
                $event = EventPrimaryModel::all();
                return view('event.basline.create', ['plan' => $plan, 'agent' => $agent, 'event' => $event]);
            }
    }


    public function index()
    {
        $primary = EventsBaslineModel::all();
        return view('event.basline.primary', ['primary' => $primary]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'day' => 'required',
            'id_CalendarPlan' => 'required',
            'id_EventPrimary' => 'required',
            'id_AgentCommitteePrimary' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
            EventsBaslineModel::create($request->all());
            return back()->with('message', 'Мероприятие добавлено');
        }
    }

    public function destroy($id)
    {
        $primary = EventsBaslineModel::find($id);
        $primary->delete();
        return back()->with('message', 'Мероприятие удалено');
    }

    public function edit($id)
    {
        $name = Auth::user()->id_ExecutiveCommitteePrimary;
        $primary = EventsBaslineModel::find($id);
        $plan = CalendarPlanModel::where('id','=',$primary->id_CalendarPlan)->first();;
        $event = EventPrimaryModel::where('monthEvent','=',$plan->month)->get();
        $agent = AgentExecutiveCommitteePrimaryModel::where('id_ExecutiveCommitteePrimary','=',$name)->get();
            return view('event.basline.edit', ['primary' => $primary, 'event' => $event,'agent'=>$agent,'plan'=>$plan]);

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'day' => 'required',
            'id_CalendarPlan' => 'required',
            'id_EventPrimary' => 'required',
            'id_AgentCommitteePrimary' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
            $primary = EventsBaslineModel::find($id);
            $primary->update($request->all());
            $primary->save();
            return back()->with('message', 'Мероприятие обновлено');
        }

    }


    public function show($id)//Добавление мероприятия на текущий план
    {
            $name = Auth::user()->id_ExecutiveCommitteePrimary;
            $executive = ExecutiveCommitteePrimaryModel::find($name);
            if ($executive->basic == 1) {
                $plan = CalendarPlanModel::find($id);
                $event = EventPrimaryModel::where('monthEvent','=',$plan->month)->get();
                $agent = AgentExecutiveCommitteePrimaryModel::where('id_ExecutiveCommitteePrimary','=',$name)->get();
                return view('event.basline.createEvent', ['plan' => $plan,'event'=>$event,'agent'=>$agent]);
            }
        }
}
