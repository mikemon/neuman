<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">Carro</label>
			<div class="col-sm-6">
				<select name="carro_id" id="carro_id" class="form-control input-lg">
					
					<option value="-1" selected>Seleccionar carro...</option>
					@foreach($carros as $carro)
					<option @if(@$asignacionCarroInstance->carro->id==$carro->id)selected @endif value="{{$carro->id}}">{{$carro->id}} Marca {{$carro->marca}} Modelo: {{$carro->modelo}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="operador" class="col-sm-2 control-label">Operador</label>
			<div class="col-sm-6">
				<select name="operador_id" id="operador_id" class="form-control input-lg">
					<option value="-1" selected>Seleccionar operador...</option>
					@foreach($operadores as $operador)
					<option @if(@$asignacionCarroInstance->operador->id==$operador->id)selected @endif value="{{$operador->id}}">{{$operador->nombre}} </option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">

				{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

			</div>
		</div>