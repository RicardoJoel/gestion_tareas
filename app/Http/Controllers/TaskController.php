<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Redirect; 

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('code')->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $request->validated();

        $task = Task::create($request->all());
        
        if (!$task) 
            return Redirect::back()->with('error', trans('tasks.failed'))->withInput();

        return Redirect::route('tasks.index')->with('status', str_replace(':code', $task->code, trans('tasks.created')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        
        if (!$task) 
            return Redirect::back()->with('error', trans('tasks.not_found'));

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        
        if (!$task) 
            return Redirect::back()->with('error', trans('tasks.not_found'));

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TaskRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $request->validated();

        $task = Task::find($id);
        
        if (!$task) 
            return Redirect::back()->with('error', trans('tasks.not_found'));

        if (!$task->update($request->all())) 
            return Redirect::back()->with('error', trans('tasks.failed'))->withInput();

        return Redirect::route('tasks.index')->with('status', str_replace(':code', $task->code, trans('tasks.updated')));    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        
        if (!$task) 
            return Redirect::back()->with('error', trans('tasks.not_found'));

        if (!$task->delete())
            return Redirect::back()->with('error', trans('tasks.failed'));
        
        return Redirect::route('tasks.index')->with('status', str_replace(':code', $task->code, trans('tasks.deleted')));
    }
}
