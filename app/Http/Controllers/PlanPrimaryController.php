<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use App\AgentExecutiveCommitteePrimaryModel;

use App\ExecutiveCommitteePrimaryModel;
use Illuminate\Http\Request;
use App\PlanPrimaryModel;
use App\Http\Requests;

class PlanPrimaryController extends Controller
{
    public function create()
    {
        $name = Auth::user()->id_ExecutiveCommitteePrimary;
        return view('plan.primary.create', ['name' => $name]);
    }




    public function index()
    {
        $name = Auth::user()->id_ExecutiveCommitteePrimary;
        $executive = ExecutiveCommitteePrimaryModel::find($name);

        if ($executive->basic == 0) {
            $primary = PlanPrimaryModel::where('id_ExecutivePrimary', '=', $name)->get();
            return view('plan.primary.primary', ['primary' => $primary]);
        } else {//если пользователь из базового исполкома смотреть все планы
            $primary = PlanPrimaryModel::all();
            return view('plan.primary.primary',['primary' => $primary]);
            }


    }




    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
            PlanPrimaryModel::create($request->all());
            return (PlanPrimaryController::index());
        }
    }

    public function destroy($id)
    {

        $primary = PlanPrimaryModel::find($id);
        $primary->delete();
        return back()->with('message', 'План удален');
    }

    public function edit($id)
    {
        $primary = PlanPrimaryModel::find($id);
        return view('plan.primary.edit', ['primary' => $primary]);
    }
    
    

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
            $primary = PlanPrimaryModel::find($id);
            $primary->update($request->all());
            $primary->save();
            return back()->with('message', 'План обновлен');
        }
    }


    public function show($id)//Мероприятия в текущем году
    {
        $month=[   1   => 'Январь',
                2  => 'Февраль',
                3     => 'Март',
                4     => 'Апрель',
                5       => 'Май',
                6      => 'Июнь',
                7      => 'Июль',
                8    => 'Август',
                9 => 'Сентябрь',
                10   => 'Октябрь',
                11  => 'Ноябрь',
                12  => 'Декабрь'];
        
        $event = PlanPrimaryModel::find($id)->event;//мероприятия в тек. году
        $Countevent=$event->count();
        $plan = PlanPrimaryModel::find($id);//название плана в шапку
        $executive = PlanPrimaryModel::find($id)->executive;
        $agent=AgentExecutiveCommitteePrimaryModel::where('id_ExecutiveCommitteePrimary','=',$executive->id)->get();//ответственные представители
        if($Countevent>=1) {
            // $executive= ExecutiveCommitteePrimaryModel::find($plans);
            return view('plan.primary.event', ['month' => $month, 'event' => $event, 'plan' => $plan, 'executive' => $executive]);
        }
        else
        return view('event.primary.show',['plan'=>$plan,'agent'=>$agent,'month'=>$month]);
    }

}
