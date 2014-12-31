<script>
	var aServicios = new Array();
	var cntRowDetalle = 1;

</script>

<style>
	.oddRow {
		background-color: #f5f5f5;
		border-color: #ddd;
	}
</style>

<div class="form-group">
	<input type="hidden" name="carro_id" id="carro_id" value="-1" />
	<label for="clientes" class="col-sm-2 control-label">Carro</label>
	<div class="col-sm-6">
		<nav class="navbar navbar-inverse" role="navigation" style="padding-top: 6px;">
			<div class="input-group">
				<input id="findCarro" type="text" class="form-control" placeholder="Buscar por matricula, modelo o marca">
				<span class="input-group-btn">
					<button class="btn btn-success" type="button">
						<i class="glyphicon glyphicon-search"></i> Buscar
					</button> </span>
			</div>
		</nav>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="descripcion">Datos del carro</label>

	<div id="datosCarro" class="col-sm-8"></div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="descripcion">Falla reportada</label>
	<div class="col-sm-6">
		<textarea class="form-control" rows="3" cols="30" name="fallaReportada" placeholder="Falla reportada"></textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="descripcion">Observaciones</label>
	<div class="col-sm-6">
		<textarea class="form-control" rows="3" cols="30" name="observaciones" placeholder="Observaciones"></textarea>
	</div>
</div>

<br/>
<div class="btn-group">
	<button class="btn btn-primary" type="button"  id="addServicio">
		Agregar servicio
	</button>
</div>
<div class="btn-group">
	<a href="#" class="btn btn-info "  id="addProducto" >Agregar productos</a>
</div>
<div class="btn-group">
	{{ Form::button('Guardar orden', array('type'=>'submit','class'=>'btn btn-success ')) }}
</div>

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
	<tbody>

	</tbody>

</table>

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

<script type="text/javascript">
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
		
		if (validar()) {
			
			var aServicios = new Array();
			$(".trServicio").each(function(index, elemento) {
				var aux = aServicios.length;
				aServicios[aux] = new Object();

				var sufijo = $('#' + this.id).attr('name');
				aServicios[aux].id = this.id;
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

	////

	//addServicio
	$(document).on("click", "#addServicio", function(evt) {
		//alert('ok');
		//$("#dialog").dialog("open");
		$('#responsive').modal('show')
	});
	$('body').on('click', '.borraTrServicio', function() {
		if (($(".borraTrServicio").length) > 0) {
			if (!confirm('Esta seguro?')) {
				return false;
			}
			jQuery('#s_' + this.id).remove();
			//calcular();
		}
	});
	//seleccionarServicio
	$(document).on("click", "#seleccionarServicio", function(evt) {
		if ($("#servicio_id").val() > 0) {
			var aux = cntRowDetalle++;
			txt = '';
			txt += '<tr class="trServicio" name="' + aux + '"  id="s_' + aux + '"><td><span class="glyphicon glyphicon-trash borraTrServicio" aria-hidden="true"id="' + aux + '"></span></td>';
			txt += '<td style="text-align:center;" id="s_' + aux + '_cons">' + aux + '</td>';
			txt += '<td style="text-align:center;" id="s_' + aux + '_codigo">' + $("#s_codigo").val() + '</td>';
			txt += '<td style="text-align:left;" id="s_' + aux + '_descripcion">' + $("#s_descripcion").val() + '</td>';
			txt += '<td style="text-align:right;" id="s_' + aux + '_cantidad">1</td>';
			txt += '<td style="text-align:right;" id="s_' + aux + '_precio">' + $("#precioServicio").val() + '</td>';
			txt += '<td style="text-align:right;" id="s_' + aux + '_subtotal">' + $("#precioServicio").val() + '</td></tr>';
			//$('#responsive').modal('close')
			$('#elementosOrden tbody').append(txt);
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
			//alert(ui.item.placas);
			$('#findCarro').val(ui.item.placas);
			var txt = "<b>No. Economico:</b> " + ui.item.noEconomico + " <b>Placas:</b> " + ui.item.placas + "</b> <b>Marca:</b> " + ui.item.marca + "<b> Modelo:</b> " + ui.item.modelo + "";
			$('#datosCarro').html(txt);
			return false;
			//Put Id in a hidden field
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
				url : "{{ action('ServicioController@findServicio', array(null) )}}/" + $("#findServicio").val(),
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