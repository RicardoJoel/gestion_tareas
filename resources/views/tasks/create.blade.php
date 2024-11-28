@extends('layouts.app')
@section('content')
<div class="fila">
	<div class="columna columna-1">
		<div class="title2">
			<h6><i class='fa fa-tasks fa-menu'></i><a href="{{ route('tasks.index') }}">Gestión de tareas</a> > Nueva</h6>
		</div>
	</div>
</div>
<form method="POST" action="{{ route('tasks.store') }}" role="form">
	@csrf
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
								<input type="text" readonly>
							</div>
							<div class="columna columna-2">
								<p>DNI*</p>
								<input type="text" name="dni" id="dni" maxlength="8" value="{{ old('dni') }}" required>
							</div>
						</div>
						<div class="fila">
							<div class="columna columna-1">
								<p>Título*</p>
								<input type="text" name="title" id="title" maxlength="100" value="{{ old('title') }}" required>
							</div>
						</div>
						<div class="fila">
							<div class="columna columna-1">
								<p>Descripción</p>
								<textarea name="description" id="description" maxlength="500" rows="6" placeholder="Máximo 500 caracteres">{{ old('description') }}</textarea>
							</div>
						</div>
						<div class="fila">
							<div class="columna columna-2">
								<p>Fecha de vencimiento</p>
								<input type="date" name="expired_at" id="expired_at" value="{{ old('expired_at') }}" min="{{ Carbon\Carbon::today()->toDateString() }}">
							</div>
							<div class="columna columna-2">
								<p>Estado*</p>
								@inject('status','App\Services\Status')
								<select name="status_id" id="status_id" required>
									@foreach ($status->get() as $index => $item)
									<option value="{{ $index }}" {{ old('status_id') == $index ? 'selected' : '' }}>{{ $item }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('tasks/submit')
</form>
@endsection

