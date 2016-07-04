<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\PostExecutiveBodyModel;
use App\Http\Requests;

class PostExecutiveBodyController extends Controller
{
    public function create()
    {
        return view('post.executive.create');
    }


    public function index()
    {
        $executive=PostExecutiveBodyModel::all();
        return view('post.executive.executive',['executive'=>$executive]);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',

        ]);
        if ($validator->fails()) {
            return back()->with('message','Ошибка ввода.');
        }
        else {
            PostExecutiveBodyModel::create($request->all());
            return back()->with('message', 'Должность добавлена');
        }
    }

    public function destroy($id)
    {
        $executive=PostExecutiveBodyModel::find($id);
        $executive->delete();
        $root=$_SERVER['DOCUMENT_ROOT'];
        if(!empty($executive->preview))
        {
            unlink($root.$executive->preview); //удаляем превьюшку
        }
        return back()->with('message','Должность удалена');
    }


    public function edit($id)
    {
        $executive=PostExecutiveBodyModel::find($id);
        return view('post.executive.edit',['executive'=>$executive]);
    }

    public function update(Request $request,$id)
    {
        $executive=PostExecutiveBodyModel::find($id);
        $executive->update($request->all());
        $executive->save();
        return back()->with('message','Должность обновлена');

    }
}
