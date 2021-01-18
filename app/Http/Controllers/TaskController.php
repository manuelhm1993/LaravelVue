<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->paginate(2);

        //Un array que contiene los registros y los datos de la paginación
        return [
            'paginate' => [
                'total'       => $tasks->total(),//Número de páginas
                'currentPage' => $tasks->currentPage(),//Página actual
                'perPage'     => $tasks->perPage(),//Por página
                'lastPage'    => $tasks->lastPage(),//Última página
                'from'        => $tasks->firstItem(),//Desde
                'to'          => $tasks->lastPage()//Hasta
            ],
            'tasks' => $tasks
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'keep' => 'required'
        ]);

        $task = Task::create($request->all());

        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'keep' => 'required'
        ]);

        $task->update($request->all());

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
    }
}
