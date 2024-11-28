@extends('layouts.app')
@section('content')
<div class="fila">
	<div class="columna columna-1">
		<div class="title2">
			<h6><i class='fa fa-tasks fa-menu'></i><a href="{{ route('tasks.index') }}">Gestión de tareas</a> > Revisar</h6>
		</div>
	</div>
</div>
<div class="fila">
	<div class="columna columna-1">
		<div class="form-section">
			<a onclick="showForm('gen')">
				<h6 id="gen_subt" class="title3">General</h6>
			</a>
			<div class="fila">
				<div class="columna columna-4"><br></div>
				<div class="columna columna-2">
					<div class="fila">
						<div class="columna columna-2">
							<p>Código</p>
							<input type="text" value="{{ $task->code }}" readonly>
						</div>
						<div class="columna columna-2">
							<p>DNI</p>
							<input type="text" value="{{ $task->dni }}" readonly>
						</div>
					</div>
					<div class="fila">
						<div class="columna columna-1">
							<p>Título</p>
							<input type="text" value="{{ $task->title }}" readonly>
						</div>
					</div>
					<div class="fila">
						<div class="columna columna-1">
							<p>Descripción</p>
							<textarea rows="6" disabled>{{ $task->description }}</textarea>
						</div>
					</div>
					<div class="fila">
						<div class="columna columna-2">
							<p>Fecha de vencimiento</p>
							<input type="text" value="{{ $task->expired_at ? Carbon\Carbon::parse($task->expired_at)->format('d/m/Y') : '' }}" readonly>
						</div>
						<div class="columna columna-2">
							<p>Estado</p>
							<input type="text" value="{{ $task->status->name ?? '' }}" readonly>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="fila">
	<div class="columna columna-1">
		<center>
		<a href="{{ route('tasks.index') }}" class="btn-effie">
			<i class="fa fa-reply"></i>&nbsp;Regresar
		</a>
		</center>
	</div>
</div>
@endsection

