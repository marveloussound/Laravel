<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller {

    /**
     * 新しいコントローラーインスタンスの生成
     *
     * @return void
     */
    public function __construct() {
       $this->middleware('auth');
    }

    /**
     * ユーザーの全タスクをリスト表示
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request) {
        $id = $request->user()->id;
        $tasks = Task::where('user_id',$id)->get();
        return view('tasks.index',['tasks'=> $tasks] );
    }

    /**
     * 新タスク作成
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        // タスクの作成…
        
        $request->user()->tasks()->create([
            'name' => $request->name
        ]);
        
        return redirect('/tasks');
    }

}
