@extends('layouts.app')
@section('content')
<div class="fila">
    <div class="columna columna-1">
        <div class="title2">
            <h6><i class='fa fa-tasks fa-menu'></i>Gestión de tareas</h6>
        </div>
    </div>
</div>
<div class="fila fila-index">
    <div class="columna columna-1">
        <table class="tablealumno index">
            <thead>
                <th width="10%">Código</th>
                <th width="10%">DNI</th>
                <th width="20%">Título</th>
                <th width="25%">Descripción</th>
                <th width="8%">Vencimiento</th>
                <th width="8%">Estado</th>
                <th width="5%">Revisar</th>
                <th width="5%">Editar</th>
                <th width="5%">Borrar</th>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td><center>{{ $task->code }}</center></td>
                    <td>{{ $task->dni }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->expired_at ? Carbon\Carbon::parse($task->expired_at)->format('d/m/Y') : '' }}</td>
                    <td>{{ $task->status->name ?? '' }}</td>
                    <td>
                        <center><a class="btn btn-primary btn-xs" href="{{ route('tasks.show', $task->id) }}" ><i class="glyphicon glyphicon-eye-open"></i></a></center>
                    </td>
                    <td>
                        <center><a class="btn btn-secondary btn-xs" href="{{ route('tasks.edit', $task->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a></center>
                    </td>
                    <td>
                        <center>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('¿Realmente deseas eliminar la tarea seleccionada?')"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                        </center>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="fila">
    <div class="columna columna-1">
        <center><a href="{{ route('tasks.create') }}" class="btn-effie"><i class="fa fa-plus"></i>&nbsp;Nueva</a></center>
    </div>
</div>
@endsection