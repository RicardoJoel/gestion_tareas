@extends('layouts.app')
@section('content')
<div class="fila">
    <div class="columna columna-1">
        <div class="title2">
            <h6><i class='fa fa-home fa-menu'></i>Inicio</h6>
        </div>
    </div>
</div>
<div class="fila">
    <div class="columna columna-1">
        <h6 class="title3">Mantenimientos</h6>
    </div>
</div>
<div class="fila">
    <div class="columna columna-6 mob-opc">
        <div class="scene">
            <div class="card">
                <a href="{{ route('tasks.index') }}">
                    <div class="card__face card__face--front">
                        <div class="content" title="Gestiona la lista de tareas">
                            <i class="fa fa-tasks fa-4x"></i>                            
                            <p>Gestión de tareas</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection