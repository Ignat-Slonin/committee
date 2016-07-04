<?php

namespace App\Http\Controllers;
use App\CalendarPlanModel;
use App\EventsBaslineModel;
use Auth;
use Validator;
//use App\ExecutiveCommitteeBasicModel;
use App\ExecutiveCommitteePrimaryModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class CalendarPlanController extends Controller
{
    public function create()
    {
        $month=[   1   => 'Январь',
            2  => 'Февраль',
            3     => 'Март',
            4     => 'Апрель',
            5     => 'Май',
            6     => 'Июнь',
            7     => 'Июль',
            8     => 'Август',
            9     => 'Сентябрь',
            10    => 'Октябрь',
            11    => 'Ноябрь',
            12    => 'Декабрь'];

            $name = Auth::user()->id_ExecutiveCommitteePrimary;
            $executive = ExecutiveCommitteePrimaryModel::find($name);
            if ($executive->basic == 1) {
                return view('plan.calendar.create', ['executive' => $executive,'month'=>$month]);
        }

    }


    public function index()
    {
            $name = Auth::user()->id_ExecutiveCommitteePrimary;
            $executive = ExecutiveCommitteePrimaryModel::find($name);
            if ($executive->basic == 1) {
                $primary = CalendarPlanModel::where('id_ExecutivePrimary', '=', $name)->get();;
                return view('plan.calendar.primary', ['primary' => $primary]);
            }
        return response('Доступ запрещен',401);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required|max:255',
            'month' => 'required|max:255',
            'id_ExecutivePrimary' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
            CalendarPlanModel::create($request->all());
            return back()->with('message', 'План добавлен');
        }
    }

    public function destroy($id)
    {
        $primary=CalendarPlanModel::find($id);
        $primary->delete();
        return back()->with('message','План удален');
    }

    public function edit($id)
    {
        $month=[   1   => 'Январь',
            2  => 'Февраль',
            3     => 'Март',
            4     => 'Апрель',
            5     => 'Май',
            6     => 'Июнь',
            7     => 'Июль',
            8     => 'Август',
            9     => 'Сентябрь',
            10    => 'Октябрь',
            11    => 'Ноябрь',
            12    => 'Декабрь'];
        $name = Auth::user()->id_ExecutiveCommitteePrimary;
        $executive = ExecutiveCommitteePrimaryModel::find($name);
        $primary=CalendarPlanModel::find($id);
        return view('plan.calendar.edit',['primary'=>$primary,'executive'=>$executive,'month'=>$month]);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required|max:255',
            'month' => 'required|max:255',
            'id_ExecutivePrimary' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
            $primary = CalendarPlanModel::find($id);
            $primary->update($request->all());
            $primary->save();
            return back()->with('message', 'План обновлен');
        }

    }


    public function show($id)//просмотр мероприятий на текущий план
    {

            $name = Auth::user()->id_ExecutiveCommitteePrimary;
            $executive = ExecutiveCommitteePrimaryModel::find($name);
            if($executive->basic==1) {

                $month=[   1   => 'Январь',
                    2  => 'Февраль',
                    3     => 'Март',
                    4     => 'Апрель',
                    5     => 'Май',
                    6     => 'Июнь',
                    7     => 'Июль',
                    8     => 'Август',
                    9     => 'Сентябрь',
                    10    => 'Октябрь',
                    11    => 'Ноябрь',
                    12    => 'Декабрь'];

                $event = CalendarPlanModel::find($id)->event;//мероприятия в тек. месяце
                $plan = CalendarPlanModel::find($id);//название плана в шапку

                //$name=Auth::user()->id_ExecutiveCommitteePrimary;//id исполкома в к-ом сост. пользов.
                // $executive = ExecutiveCommitteePrimaryModel::find($name);//название исполкома в к-ом сост. пользов.
                return view('plan.calendar.event', ['event' => $event,'month' => $month, 'plan' => $plan, 'executive' => $executive]);
            }



    }
}
