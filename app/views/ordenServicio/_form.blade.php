<style>
.oddRow {
    background-color: #f5f5f5;
    border-color: #ddd;
}
</style>
<div class="form-group">
	<input type="hidden" name="carro_id" id="carro_id" />
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
<div class="btn-group">
	<label >Datos del carro</label>
	<div id="datosCarro"></div>
</div>

<br/>
<div class="btn-group">
	<a href="{{ action('CarrosController@show', array(0) )}}" class="btn btn-info "  >Agregar servicio</a>
	{{ Form::button('Guardar orden', array('type'=>'submit','class'=>'btn btn-primary')) }}

	
</div>


<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th style="text-align: center; width:10%;">Opciones</th>
				<th  style="text-align: center;width:10%;">id</th>
				<th  style="text-align: center;width:40%;">Descripcion</th>
				<th style="text-align: center; width:20%;">Precio</th>
				<th style="text-align: center; width:20%;">Subtotal</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
				
	</table>


<script type="text/javascript">
	/*
	 $("#findCarro").autocomplete({
	 source: "{{ action('CarrosController@findCarro', array(null) )}}",
	 minLength: 1
	 });
	 */
	var icont=0;
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
		 focus: function( event, ui ) {
		 	$( "#findCarro" ).val( ui.item.placas );
		 	return false;
		 },
		select : function(event, ui) {
			$("#carro_id").val(ui.item.id);
			//alert(ui.item.placas);
			$('#findCarro').val(ui.item.placas);
			var txt="<b>No. Economico:</b> " + ui.item.noEconomico +" <b>Placas:</b> " + ui.item.placas + "</b><br> <b>Marca:</b> " + ui.item.marca+"<b> Modelo:</b> " + ui.item.modelo + "";
			$('#datosCarro').html(txt);
			return false;
			//Put Id in a hidden field
		}
	}).autocomplete("instance")._renderItem = function(ul, item) {
		var v=icont++;//JSON.stringify(ul);
		var css= (((v%2)==0)?"oddRow":"evenRow");
		return $("<li class='"+css+"'>").append("<a><b>No. Economico:</b> " + item.noEconomico + " <a><b>Placas:</b> " + item.placas + "</b><br> <b>Marca:</b> " + item.marca+"<b> Modelo:</b> " + item.modelo + "</a>").appendTo(ul);
	};
	

</script>