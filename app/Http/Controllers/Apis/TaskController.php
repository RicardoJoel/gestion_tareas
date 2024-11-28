<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return response()->json([
            'tasks' => $tasks
        ]);
    }

    public function show($id)
    {
        $task = Task::find($id);
        
        if (!$task) 
            return response()->json([
                'success' => 'false',
                'message' => trans('tasks.not_found')
            ], 400);

        return response()->json([
            'task' => $task
        ]);
    }

    public function store(TaskRequest $request)
    {
        $request->validated();

        $task = Task::create($request->all());

        if (!$task) 
            return response()->json([
                'success' => 'false',
                'message' => trans('tasks.failed')
            ], 500);

        return response()->json([
            'message' => str_replace(':code', $task->code, trans('tasks.created')),
            'task' => $task
        ]);
    }

    public function update(TaskRequest $request, $id)
    {
        $request->validated();

        $task = Task::find($id);
        
        if (!$task) 
            return response()->json([
                'success' => 'false',
                'message' => trans('tasks.not_found')
            ], 400);

        if (!$task->update($request->all())) 
            return response()->json([
                'success' => 'false',
                'message' => trans('tasks.failed')
            ], 500);

        return response()->json([
            'message' => str_replace(':code', $task->code, trans('tasks.updated')),
            'task' => $task
        ]);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        
        if (!$task) 
            return response()->json([
                'success' => 'false',
                'message' => trans('tasks.not_found')
            ], 400);

        if (!$task->delete())
            return response()->json([
                'success' => 'false',
                'message' => trans('tasks.failed')
            ], 500);

        return response()->json([
            'message' => str_replace(':code', $task->code, trans('tasks.deleted'))
        ]);
    }
}
