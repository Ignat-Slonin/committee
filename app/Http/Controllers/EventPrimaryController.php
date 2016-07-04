<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use App\ExecutiveCommitteePrimaryModel;
use App\EventPrimaryModel;
use App\PlanPrimaryModel;
use App\AgentExecutiveCommitteePrimaryModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventPrimaryController extends Controller
{
    public function create()//добавление мероприятияч
    {
            $month=[   1   => 'Январь',
                2  => 'Февраль',
                3  => 'Март',
                4  => 'Апрель',
                5  => 'Май',
                6  => 'Июнь',
                7  => 'Июль',
                8  => 'Август',
                9  => 'Сентябрь',
                10 => 'Октябрь',
                11 => 'Ноябрь',
                12 => 'Декабрь'];
            $name = Auth::user()->id_ExecutiveCommitteePrimary; //id исполкома в к-ом сост. пользов.
            $executive = ExecutiveCommitteePrimaryModel::find($name);//исполком в к-ом сост. пользов.
            $plan=PlanPrimaryModel::where('id_ExecutivePrimary','=',$name)->get();//план текушего исполкома
            $agent=AgentExecutiveCommitteePrimaryModel::where('id_ExecutiveCommitteePrimary','=',$executive->id)->get();//ответственные представители
            return view('event.primary.create',['plan'=>$plan,'agent'=>$agent,'month'=>$month]);
    }


    public function index()
    {
            $primary = EventPrimaryModel::all();
            return view('event.primary.primary', ['primary' => $primary]);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
            EventPrimaryModel::create($request->all());
            return back()->with('message', 'Мероприятие добавлено');
        }
    }

    public function destroy($id)
    {
        $primary = EventPrimaryModel::find($id);
        $primary->delete();
        return back()->with('message', 'Мероприятие удалено');
    }

    public function edit($id)
    {
        $month=[   1   => 'Январь',
            2  => 'Февраль',
            3  => 'Март',
            4  => 'Апрель',
            5  => 'Май',
            6  => 'Июнь',
            7  => 'Июль',
            8  => 'Август',
            9  => 'Сентябрь',
            10 => 'Октябрь',
            11 => 'Ноябрь',
            12 => 'Декабрь'];


        $primary = EventPrimaryModel::find($id);
        $name = Auth::user()->id_ExecutiveCommitteePrimary; //id исполкома в к-ом сост. пользов.
        $executive = ExecutiveCommitteePrimaryModel::find($name);//исполком в к-ом сост. пользов.
        $agent=AgentExecutiveCommitteePrimaryModel::where('id_ExecutiveCommitteePrimary','=',$executive->id)->get();//ответственные представители
        return view('event.primary.edit',['primary'=>$primary,'agent'=>$agent,'month'=>$month]);


    }

   

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
            $primary = EventPrimaryModel::find($id);
            $primary->update($request->all());
            $primary->save();
            return back()->with('message', 'Мероприятие обновлено');
        }
    }


    public function show($id)// Добавление мероприятия в текущем году
    {
        $month=[   1   => 'Январь',
            2  => 'Февраль',
            3  => 'Март',
            4  => 'Апрель',
            5  => 'Май',
            6  => 'Июнь',
            7  => 'Июль',
            8  => 'Август',
            9  => 'Сентябрь',
            10 => 'Октябрь',
            11 => 'Ноябрь',
            12 => 'Декабрь'];

        $plan=PlanPrimaryModel::find($id);//план текушего исполкома

        $name = Auth::user()->id_ExecutiveCommitteePrimary; //id исполкома в к-ом сост. пользов.
        $executive = ExecutiveCommitteePrimaryModel::find($name);//исполком в к-ом сост. пользов.
        $agent=AgentExecutiveCommitteePrimaryModel::where('id_ExecutiveCommitteePrimary','=',$executive->id)->get();//ответственные представители
        return view('event.primary.show',['plan'=>$plan,'agent'=>$agent,'month'=>$month]);
        }
        

}
