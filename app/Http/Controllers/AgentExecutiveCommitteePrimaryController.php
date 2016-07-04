<?php

namespace App\Http\Controllers;
use App\AgentExecutiveCommitteePrimaryModel;
use App\PostExecutiveBodyModel;
use App\ExecutiveCommitteePrimaryModel;
use Illuminate\Http\Request;
use Validator;

use Auth;

use App\Http\Requests;

class AgentExecutiveCommitteePrimaryController extends Controller
{
    


    public function create()
    {
        $post=PostExecutiveBodyModel::all();
        $name = Auth::user()->id_ExecutiveCommitteePrimary;
        return view('agent.primary.create',['post'=>$post,'name'=>$name]);
    }


    public function index()
    {
        $name = Auth::user()->id_ExecutiveCommitteePrimary;
        $executive = ExecutiveCommitteePrimaryModel::find($name);

        if ($executive->basic == 0)
        {
            $primary = AgentExecutiveCommitteePrimaryModel::where('id_ExecutiveCommitteePrimary', '=', $name)->get();
            return view('agent.primary.primary', ['primary' => $primary]);
        }
        else
        {//если пользователь из базового исполкома смотреть все планы
            $primary=AgentExecutiveCommitteePrimaryModel::all();
            return view('agent.primary.primary',['primary'=>$primary]);
        }
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'FullName' => 'required|max:255',
            'Phone' => 'required|max:19',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
            AgentExecutiveCommitteePrimaryModel::create($request->all());
            return (AgentExecutiveCommitteePrimaryController::index());
        }
    }

    public function destroy($id)
    {
        $primary=AgentExecutiveCommitteePrimaryModel::find($id);
        $primary->delete();
        $root=$_SERVER['DOCUMENT_ROOT'];
        if(!empty($primary->preview))
            {
                unlink($root.$primary->preview); //удаляем превьюшку
            }
        return back()->with('message','Представитель удален');
    }

    public function edit($id)
    {
        $primary=AgentExecutiveCommitteePrimaryModel::find($id);
        $post=PostExecutiveBodyModel::all();
        $executive=ExecutiveCommitteePrimaryModel::all();
        return view('agent.primary.edit',['primary'=>$primary,'post'=>$post,'executive'=>$executive]);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'FullName' => 'required|max:255',
            'Phone' => 'required|max:19',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
            $primary = AgentExecutiveCommitteePrimaryModel::find($id);
            $primary->update($request->all());
            $primary->save();
            return back()->with('message', 'Представитель обновлен');
        }

    }

    public function show($id)
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

        $event = AgentExecutiveCommitteePrimaryModel::find($id)->event;//мероприятия в тек. году
        
        return view('agent.primary.event', ['month'=>$month,'event' => $event]);

    }
}
