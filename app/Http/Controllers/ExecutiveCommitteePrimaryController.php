<?php

namespace App\Http\Controllers;
use Validator;
use App\ExecutiveCommitteePrimaryModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class ExecutiveCommitteePrimaryController extends Controller
{
    public function create()
    {
        return view('executive.primary.create');
    }


    public function index()
    {
        $basics=[1=>'Да',0=>'Нет'];
        $executive=ExecutiveCommitteePrimaryModel::all();
        return view('executive.primary.executive',['executive'=>$executive,'basics'=>$basics]);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {

            ExecutiveCommitteePrimaryModel::create($request->all());
            return (ExecutiveCommitteePrimaryController::index());
        }
    }

    public function destroy($id)
    {
        $executive=ExecutiveCommitteePrimaryModel::find($id);
        $executive->delete();
        return back()->with('message','Исполком удален');
    }


    public function edit($id)
    {
        $executive=ExecutiveCommitteePrimaryModel::find($id);
        return view('executive.primary.edit',['executive'=>$executive]);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
        $executive=ExecutiveCommitteePrimaryModel::find($id);
        $executive->update($request->all());
        $executive->save();
        return back()->with('message','Исполком обновлен');
        }
    }
}
