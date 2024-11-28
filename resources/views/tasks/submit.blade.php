<div class="fila">
	<div class="columna columna-1">
		<center>
		<button type="submit" class="btn-effie">
			<i class="fa fa-save"></i>&nbsp;{{ isset($task) ? 'Guardar' : 'Registrar' }}
		</button>
		<a href="{{ route('tasks.index') }}" class="btn-effie-inv">
			<i class="fa fa-reply"></i>&nbsp;Regresar
		</a>
		</center>
	</div>
</div>
<div class="fila">
	<div class="space"></div>
	<div class="columna columna-1">
		<p><i class="fa fa-info-circle fa-icon" aria-hidden="true"></i>&nbsp;<b>Importante</b>
		<ul>
			<li>(*) Campos obligatorios</li>
			<li>El DNI debe estar compuesto por 8 dígitos.</li>
			<li>El tamaño del título no puede superar los 100 caracteres.</li>
			<li>El tamaño de la descripción no puede superar los 500 caracteres.</li>
			<li>La fecha de vencimiento no puede ser anterior a la fecha actual.</li>
		</ul></p>
	</div>
</div>