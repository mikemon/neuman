<div id="side-a" style="float: left; width:65%; ">
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">No. Serie</label>
		<div class="col-sm-6">
			{{Form::text('noSerie', null,array('placeholder'=>'No. Serie','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Placas</label>
		<div class="col-sm-6">
			{{Form::text('placas', null,array('placeholder'=>'Placas','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">noEconomico</label>
		<div class="col-sm-6">
			{{Form::text('noEconomico', null,array('placeholder'=>'noEconomico','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Marca</label>
		<div class="col-sm-6">

			{{Form::text('marca', null,array('placeholder'=>'Marca','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Modelo</label>
		<div class="col-sm-6">
			{{Form::text('modelo', null,array('placeholder'=>'Modelo','class'=>'form-control input-sm'))}}
		</div>
	</div>

	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Tipo</label>
		<div class="col-sm-6">		
			<select name="tipoCarro_id" id="tipoCarro_id" class="form-control input-lg" onchange="getEsquema()">
				<option value="-1" >Seleccionar carro...</option>
				@foreach($tipoCarroList as $tipoCarroInstance)
					<option  @if(@$carro->tipoCarro->id == $tipoCarroInstance->id ) {{'selected'}}  @endif   value="{{$tipoCarroInstance->id}}">{{$tipoCarroInstance->descripcion}} </option>
				@endforeach
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Capacidad/Ton</label>
		<div class="col-sm-6">
			{{Form::text('capacidadTon', null,array('placeholder'=>'capacidadTon','class'=>'form-control input-sm'))}}
		</div>
	</div>

	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">No. Motor</label>
		<div class="col-sm-6">
			{{Form::text('noMotor', null,array('placeholder'=>'No. Motor','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Tipo de motor</label>
		<div class="col-sm-6">
			{{Form::text('tipoMotor', null,array('placeholder'=>'Tipo de motor','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Poliza seguro</label>
		<div class="col-sm-6">
			{{Form::text('polizaSeguros', null,array('placeholder'=>'polizaSeguros','class'=>'form-control input-sm'))}}
		</div>
	</div>

	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Inciso</label>
		<div class="col-sm-6">
			{{Form::text('inciso', null,array('placeholder'=>'Inciso','class'=>'form-control input-sm'))}}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">

			{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

		</div>
	</div>

</div>

<div id="side-b" style="margin: 0;padding-top:40px; float: left;width: 35%;height: 70%; box-shadow: 2px 2px 1px 2px rgba(50, 50, 50, 0.75); " align="center">
@if(isset($carro) && ($carro->tipoCarro))
@include('carros.esquemaChasis.'.$carro->tipoCarro->layoutChasis)
@endif
</div>

<script>
	function getEsquema(){
    		var myselect = document.getElementById("tipoCarro_id")
  			myselect.options[myselect.selectedIndex].value;
  			  $.ajax({
        		type:"GET",
				url:"{{asset('tipoCarro/getEsquemaForId/')}}/"+myselect.options[myselect.selectedIndex].value, //tipoCarro/getEsquemaForId/

        		success: function(data){
       				$('#side-b').html(data);			
      			}
			});
   }
</script>
