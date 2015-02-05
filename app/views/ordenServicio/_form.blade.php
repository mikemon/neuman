<script>
	var aServicios = new Array();
	var cntRowDetalle = 0;
</script>
<style>
	.oddRow {
		background-color: #f5f5f5;
		border-color: #ddd;
	}
</style>
<div class="form-group">
	<div class="col-sm-6">
		{{Form::hidden('ordenServicio_id', @$ordenServicioInstance->id,array('id'=>'ordenServicio_id'))}}
		
		{{ Form::button('Guardar orden', array('type'=>'submit','class'=>'btn btn-primary')) }}
		
		{{ Form::button('Cancelar', array('type'=>'button','class'=>'btn btn-warning')) }}
		{{ Form::button('Aplicar orden', array('id'=>'apliOrden','type'=>'button','class'=>'btn btn-success')) }}
		
	</div>
</div>
<div role="tabpanel">
	<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
		<li class="active">
			<a href="#carro" data-toggle="tab">Carro</a>
		</li>
		<li>
			<a href="#descripcion" data-toggle="tab">Descripcion orden</a>
		</li>
		<li>
			<a href="#datoRendimiento" data-toggle="tab">Dato rendimiento</a>
		</li>
		<li>
			<a href="#servPro" data-toggle="tab">Servicios y productos</a>
		</li>
	</ul>
	<div id="my-tab-content" class="tab-content">
		<div class="tab-pane active" id="carro">
			<br/>
			<div class="form-group">
				{{Form::hidden('carro_id', null,array('id'=>'carro_id'))}}
				<label class="col-sm-3 control-label">Carro</label>
				<div class="col-sm-8">
					<nav class="navbar navbar-inverse" role="navigation" style="padding-top: 6px;">
						<div class="input-group">
							<input id="findCarro" type="text" class="form-control" placeholder="Buscar carro por matricula, modelo o marca">
							<span class="input-group-btn">
								<button class="btn btn-success" type="button">
									<i class="glyphicon glyphicon-search"></i> Buscar
								</button> </span>
						</div>
					</nav>
				</div>
			</div>
			
			
			<div class="form-group">
				<label class="col-sm-2 control-label" for="descripcion">Cliente</label>
					<div class="col-sm-6">
						{{Form::text('cliente_id', @$ordenServicioInstance->carro->flotilla->cliente->nomcte,array('placeholder'=>'Cliente','list'=>'clienteList','class'=>'form-control input-sm'))}}
					</div>	
						<datalist id="clienteList">			
							@foreach($clientes as $clienteInstance)
								<option @if(@$ordenServicioInstance->carro->flotilla->cliente->id==$clienteInstance->id)selected @endif value="{{$clienteInstance->id}}" label="{{$clienteInstance->nomcte}}" />
							@endforeach
						</datalist>	
				</div>
			
			<div class="form-group">
				<div id="datosCarro" class="col-sm-8"></div>
			</div>
		</div>
		<div class="tab-pane" id="descripcion">
			<h4>Descripcion de la orden</h4>
			<p>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="descripcion">Folio</label>
					<div class="col-sm-6">
						{{Form::text('numfol', null,array('placeholder'=>'Folio','class'=>'form-control input-sm'))}}				
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label" for="descripcion">Falla reportada</label>
					<div class="col-sm-6">
						{{ Form::textarea('fallaReportada', null, array('placeholder'=>'Falla reportada','size' => '30x3','class'=>'form-control')) }}
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="descripcion">Observaciones</label>
					<div class="col-sm-6">
						{{ Form::textarea('observaciones', null, array('placeholder'=>'Observaciones','size' => '30x3','class'=>'form-control')) }}
					</div>
				</div>

			</p>
		</div>
		<div class="tab-pane" id="datoRendimiento">
			<h1>Dato rendimiento</h1>
			<p>
				Dato rendimiento
			</p>
		</div>
		<div class="tab-pane" id="servPro">
			<h4>Servicios y productos</h4>
			<p>
				<div class="btn-group">
					<button class="btn btn-primary" type="button"  id="addServicio">
						Agregar servicio
					</button>
				</div>
				<div class="btn-group">
					<a href="#" class="btn btn-info "  id="showProductos" >Agregar productos</a>
				</div>
				<div class="btn-group">
				{{ Form::button('Actualizar', array('type'=>'button','class'=>'btn btn-warning','id'=>'resfrescarDetalle')) }}
				</div>
				<br>
				<br>
				<table class="table table-striped table-bordered" id="elementosOrden">
					<thead>
						<tr>
							<th style="text-align:center; width:10%;">Opciones</th>
							<th  style="text-align:center;width:10%;">Num.</th>
							<th  style="text-align:center;width:10%;">Codigo</th>
							<th  style="text-align:left;width:40%;">Descripcion</th>
							<th  style="text-align:right;width:10%;">Cantidad</th>
							<th style="text-align:right; width:10%;">Precio</th>
							<th style="text-align:right; width:10%;">Subtotal</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</p>
		</div>

	</div>
</div>

<input type="hidden" id="departamento_id" value="-1" />

<input type="hidden" id="servicio_id" value="-1" />
<input type="hidden" id="s_descripcion" value="-1" />
<input type="hidden" id="s_codigo" value="-1" />
<input type="hidden" id="s_precio" value="-1" />
<input type="hidden" id="aCadenaServicios" name="aCadenaServicios" value="-1" />

<div id="responsive" class="modal modal-wide fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Servicios</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="carro">Departamento</label>
					<div class="col-sm-6">
						<input class="form-control input-sm" id="findDepartamento" name="findDepartamento" type="text" size="55" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="carro">Sub Departamento</label>
					<div class="col-sm-6">
						<input class="form-control input-sm" id="findSubDepartamento" name="findSubDepartamento" type="text" size="55" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="carro">Servicio</label>
					<div class="col-sm-6">
						<input class="form-control input-sm" id="findServicio" name="findServicio" type="text" size="55" />
					</div>
				</div>
				<div class="form-group">

					<label class="col-sm-4 control-label" for="carro">Precio</label>
					<div class="col-sm-6">
						<input class="form-control input-sm decimal" style="width: 80px;" id="precioServicio" name="precioServicio" type="text" size="50" placeholder="0.00" />
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cancelar
				</button>
				<button type="button" class="btn btn-primary" id="seleccionarServicio">
					Agregar
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="divProductos"></div>

<script type="text/javascript">

@if(@$ordenServicioInstance->carro)
	var txt='';
	txt+='<div class="form-group">';
	txt+='				<label class="col-sm-4 control-label" >No. Economico</label>';
	txt+='				<div class="col-sm-6">';
	txt+='					{{$ordenServicioInstance->carro->noEconomico}}';				
	txt+='				</div>';
	txt+='</div>';
	
	txt+='<div class="form-group">';
	txt+='				<label class="col-sm-4 control-label" >Placas</label>';
	txt+='				<div class="col-sm-6">';
	txt+='					{{$ordenServicioInstance->carro->placas}}';				
	txt+='				</div>';
	txt+='</div>';
	
	txt+='<div class="form-group">';
	txt+='				<label class="col-sm-4 control-label" >Marca</label>';
	txt+='				<div class="col-sm-6">';
	txt+='					{{$ordenServicioInstance->carro->marca}}';				
	txt+='				</div>';
	txt+='</div>';
	
	txt+='<div class="form-group">';
	txt+='				<label class="col-sm-4 control-label" >Modelo</label>';
	txt+='				<div class="col-sm-6">';
	txt+='					{{$ordenServicioInstance->carro->modelo}}';				
	txt+='				</div>';
	txt+='</div>';
				
	$('#datosCarro').html(txt);
@else
	$('#carro_id').val(-1);	
@endif

jQuery(document).ready(function($) {
$('#tabs').tab();
});

function validar() {
if ($('#carro_id').val() != -1) {
if ($('.trServicio').length<=0){
alert('No existe ningun servicio en la orden')
}else{
return true
}
} else {
alert('Selecionar carro');
return false;
}
}

function enviar() {
	alert('ok');
	if (validar()) {
	var aServicios =null;
	aServicios = new Array();
	//$(".trServicio").each(function(index, elemento) {
	$(".trServicio").each(function(i){
			var aux = aServicios.length;
			aServicios[aux] = new Object();	
			var sufijo = $('#' + this.id).attr('name');
			aServicios[aux].id = $('#' + this.id).attr('rel');;
			aServicios[aux].codigo = $('#s_' + sufijo + '_codigo').html();
			aServicios[aux].cantidad = $('#s_' + sufijo + '_cantidad').html();
			aServicios[aux].descripcion = $('#s_' + sufijo + '_descripcion').html();
			aServicios[aux].precio = $('#s_' + sufijo + '_precio').html();
			aServicios[aux].subtotal = $('#s_' + sufijo + '_subtotal').html();
	});
		var strServiciosPOST = JSON.stringify(aServicios);
		$('#aCadenaServicios').val(strServiciosPOST);
	return true;
	} else {
		return false;
	}
}
//addServicio
$(document).on("click", "#addServicio", function(evt) {
	$('#responsive').modal('show');
});

//showProductos
$(document).on("click", "#showProductos", function(evt) {
	invocaAjax('{{URL::route('getListProductos');}}', '', 'divProductos',null,null,null,false);
	modal('#divProductos',1200);
	jQuery('#divProductos').dialog('open');
});
//addProducto
$(document).on('click', '.addProducto', function(evt) {
	var cnt=prompt("Cantidad");
	//alert(this.id);
	if(cnt!=null){
		if(cnt>0){
			var ido=this.id;
			var str=null;
			var str=$('#'+ido).attr('rel')+'|-|'+cnt;
			var datos=null;
			var datos=str.split('|-|');
			var disp=0;
			disp=parseFloat(datos[3]);
			cnt =parseFloat(cnt);
			if( cnt > disp ){
				alert('Cantidad no disponible para este producto');
				return false;
			}
			dataJson=JSON.stringify(datos);
			invocaAjax("{{ action('OrdenServicioController@addProductoInOrder', array(null) )}}" ,('jSonProducto='+dataJson+'&idO='+($('#ordenServicio_id').val())) , null,null,ejecutar,"json");
		}else{
			alert(cnt+' No es una cantidad aceptable');
		}
	}
});

function ejecutar(data){
	if(data.exito){
		refrescarDetalle();	
	}else{
		alert('No se logro agregar');
		alert(data.msg);
	}
	jQuery('#divProductos').dialog('close');
	
}

function removeTr(data){
	//alert (data);
	//jQuery('#s_' + data.id).remove();
	jQuery('#' + data.id).remove();
}

$('body').on('click', '.borraTrServicio', function() {
	if (($(".borraTrServicio").length) > 0) {
		if (!confirm('Esta seguro?')) {
			return false;
		}else{
			var idServPiv=jQuery('#s_' + this.id).attr('name');
			var idServ=jQuery('#s_' + this.id).attr('rel');
			invocaAjax('{{ action('OrdenServicioController@deleteServiciosInOrden', array(null) )}}', 'idO='+$('#ordenServicio_id').val()+'&idServPiv='+idServPiv+'&idServ='+idServ, null,null,removeTr,"json");
		}
		//calcular();
	}
});

$('body').on('click', '.borraTrProducto', function() {
	if (($(".borraTrProducto").length) > 0) {
		if (!confirm('Esta seguro?')) {
			return false;
		}else{
			var idOrdPro=jQuery('#p_' + this.id).attr('name');
			invocaAjax('{{ action('OrdenServicioController@deleteProductoInOrden', array(null) )}}', 'idOrdPro='+idOrdPro, null,null,removeTr,"json");
		}
		//calcular();
	}
});


function setDetalle(data){
	$('#elementosOrden tbody').html(data);
}
function refrescarDetalle(){
	invocaAjax('{{ action('OrdenServicioController@getServiciosAndProductosOrden', array(null) )}}', 'id='+$('#ordenServicio_id').val(), null,null,setDetalle);
}
//resfrescarDetalle
$(document).on("click", "#resfrescarDetalle", function(evt) {
	refrescarDetalle();
});
function closeModal(){	
	$('#responsive').modal('hide');
	refrescarDetalle();
}
//seleccionarServicio
$(document).on("click", "#seleccionarServicio", function(evt) {
	if ($("#servicio_id").val() > 0) {
		invocaAjax("{{ action('OrdenServicioController@addServicioInOrder', array(null) )}}" ,('precio='+$("#precioServicio").val()+'&servicio_id='+$("#servicio_id").val()+'&idO='+($('#ordenServicio_id').val())) , null,null,closeModal);
	} else {
		alert('No se ha seleccionado un servicio');
	}
});

var icont = 0;
		$("#findCarro").autocomplete({
			source : function(request, response) {
				$.ajax({
					type : "GET",
					url : "{{ action('CarrosController@findCarro', array(null) )}}/" + $("#findCarro").val(),
					contentType : "application/json; charset=utf-8",
					dataType : "json",
					success : function(data) {
						/*
						response($.map(data, function(item) {
						return {
						id : item.id,
						value : item.placas
						}
						}))
						*/
						//return data;
						response(data);
					}
				});
			},
			focus : function(event, ui) {
				$("#findCarro").val(ui.item.placas);
				return false;
			},
			select : function(event, ui) {
				$("#carro_id").val(ui.item.id);
				$('#findCarro').val(ui.item.placas);
				var txt='';
				txt+='<div class="form-group">';
				txt+='				<label class="col-sm-4 control-label" >No. Economico</label>';
				txt+='				<div class="col-sm-6">';
				txt+=ui.item.noEconomico;				
				txt+='				</div>';
				txt+='</div>';
					
				txt+='<div class="form-group">';
				txt+='				<label class="col-sm-4 control-label" >Placas</label>';
				txt+='				<div class="col-sm-6">';
				txt+=ui.item.placas;				
				txt+='				</div>';
				txt+='</div>';
				
				txt+='<div class="form-group">';
				txt+='				<label class="col-sm-4 control-label" >Marca</label>';
				txt+='				<div class="col-sm-6">';
				txt+=ui.item.marca;				
				txt+='				</div>';
				txt+='</div>';
			
				txt+='<div class="form-group">';
				txt+='				<label class="col-sm-4 control-label" >Modelo</label>';
				txt+='				<div class="col-sm-6">';
				txt+=ui.item.modelo;				
				txt+='				</div>';
				txt+='</div>';

				$('#datosCarro').html(txt);
				return false;
			}
		}).autocomplete("instance")._renderItem = function(ul, item) {
			var v = icont++;
			//JSON.stringify(ul);
			var css = (((v % 2) == 0) ? "oddRow" : "evenRow");
			return $("<li class='" + css + "'>").append("<a><b>No. Economico:</b> " + item.noEconomico + " <a><b>Placas:</b> " + item.placas + "</b><br> <b>Marca:</b> " + item.marca + "<b> Modelo:</b> " + item.modelo + "</a>").appendTo(ul);
		};

$("#findDepartamento").autocomplete({
source : function(request, response) {
$.ajax({
type : "GET",
url : "{{ action('ServicioController@findDepartamento', array(null) )}}/" + $("#findDepartamento").val(),
contentType : "application/json; charset=utf-8",
dataType : "json",
success : function(data) {
response(data);
}
});
},
focus : function(event, ui) {
$("#findDepartamento").val(ui.item.descripcion);
return false;
},
select : function(event, ui) {
$("#departamento_id").val(ui.item.id);
$('#findDepartamento').val(ui.item.descripcion);
return false;
},
change : function(event, ui) {
try {
if (event.originalEvent.type != "menuselected") {
// Unset ID
$("#findSubDepartamento").val("");
}
} catch(err) {
// unset ID
$("#findSubDepartamento").val("");
}
}
}).autocomplete("instance")._renderItem = function(ul, item) {
var v = icont++;
var css = (((v % 2) == 0) ? "oddRow" : "evenRow");
return $("<li class='" + css + "'>").append("<a><b>Id:</b> " + item.id + " <a><b>Descripcion:</b> " + item.descripcion + "</a>").appendTo(ul);
};

$("#findSubDepartamento").autocomplete({
source : function(request, response) {
$.ajax({
type : "GET",
url : "{{ action('ServicioController@findSubDepartamento', array(null) )}}/" + $("#departamento_id").val() + "/" + $("#findSubDepartamento").val(),
contentType : "application/json; charset=utf-8",
dataType : "json",
success : function(data) {
response(data);
}
});
},
focus : function(event, ui) {
$("#findSubDepartamento").val(ui.item.descripcion);
return false;
},
select : function(event, ui) {
$("#departamento_id").val(ui.item.id);
$('#findSubDepartamento').val(ui.item.descripcion);
return false;
}
}).autocomplete("instance")._renderItem = function(ul, item) {
var v = icont++;
var css = (((v % 2) == 0) ? "oddRow" : "evenRow");
return $("<li class='" + css + "'>").append("<a><b>Id:</b> " + item.id + " <a><b>Descripcion:</b> " + item.descripcion + "</a>").appendTo(ul);
};

$("#findServicio").autocomplete({
source : function(request, response) {
$.ajax({
type : "GET",
url : "{{ action('ServicioController@findServicio', array(null) )}}/"+$("#departamento_id").val()+"/" + $("#findServicio").val(),
contentType : "application/json; charset=utf-8",
dataType : "json",
success : function(data) {
response(data);
}
});
},
focus : function(event, ui) {
$("#findServicio").val(ui.item.descripcion);
return false;
},
select : function(event, ui) {
$("#servicio_id").val(ui.item.id);
$("#s_descripcion").val(ui.item.descripcion);
$("#s_codigo").val(ui.item.codigo);
$("#precioServicio").val(ui.item.precio);
$('#findServicio').val(ui.item.descripcion);
return false;
},
change : function(event, ui) {
}
}).autocomplete("instance")._renderItem = function(ul, item) {
var v = icont++;
var css = (((v % 2) == 0) ? "oddRow" : "evenRow");
return $("<li class='" + css + "'>").append("<a><b>Codigo:</b> " + item.codigo + "<a><b>Descripcion:</b> " + item.descripcion + " <a><b>Precio:</b> " + item.precio + "</a>").appendTo(ul);
};
</script>

