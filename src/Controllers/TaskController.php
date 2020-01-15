<?php

namespace ElephantsGroup\ToDo\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ElephantsGroup\ToDo\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // var_dump(trans('todo::all.task'));
        $show = config('todo.defaultListMode', 'undone');
        if (!in_array($show, ['done', 'undone', 'all']))
            $show = 'undone';
        $showQuery = $request->query('show');
        if ($showQuery && (in_array($showQuery, ['done', 'undone', 'all'])))
            $show = $showQuery;
        if ('all' === $show)
            $tasks = Task::all();
        else if ('undone' === $show)
            $tasks = Task::all()->where('done', false);
        else
            $tasks = Task::all()->where('done', true);
        return view('todo::task.list', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo::task.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->done = false;
        $message = $task->save() ? 'Success!' : 'Failed!';
        return redirect()->back()->withInput($request->all())->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('todo::task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $task = Task::findOrFail($id);
        return view('todo::task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $message = $task->save() ? 'Success!' : 'Failed!';
        return redirect()->back()->withInput($request->all())->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $task = Task::findOrFail($id);
        $message = "Deleting task #$id" . ($task->delete() ? ' Succeed!' : ' Failed!');
        return redirect()->to('/todo/task')->withInput($request->all())->with('message', $message);
        // return redirect()->back()->withInput($request->all())->with('message', $message);
    }

    public function done($id)
    {
        $task = Task::findOrFail($id);
        $task->done();
        $task->save();
        return redirect()->back()->with('message', 'Success!');
    }

    public function undone($id)
    {
        $task = Task::findOrFail($id);
        $task->undone();
        $task->save();
        return redirect()->back()->with('message', 'Success!');
    }
}