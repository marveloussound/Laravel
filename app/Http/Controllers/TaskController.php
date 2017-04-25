<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller {

    /**
     * タスクリポジトリーインスタンス
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * 新しいコントローラーインスタンスの生成
     *
     * @return void
     */
    public function __construct(TaskRepository $tasks) {

        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**
     * ユーザーの全タスクをリスト表示
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request) {


        $id = $request->user()->id;

//        $tasks = Task::where('user_id', $id)->get();
        $tasks = $this->tasks->forUser($request->user());

        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * 新タスク作成
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {

        //バリデーション定義
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        // タスクの作成…

        $request->user()->tasks()->create([
            'name' => $request->name
        ]);

        return redirect('/tasks');
    }

    /**
     * 指定タスクの削除
     *
     * @param  Request  $request
     * @param  string  $taskId
     * @return Response
     */
    public function destroy(Request $request, Task $task) {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }

}
