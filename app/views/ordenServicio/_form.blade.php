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
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">

		{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

	</div>
</div>

<script type="text/javascript">
	/*
	 $("#findCarro").autocomplete({
	 source: "{{ action('CarrosController@findCarro', array(null) )}}",
	 minLength: 1
	 });
	 */
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
			//Put Id in a hidden field
		}
	}).autocomplete("instance")._renderItem = function(ul, item) {
		return $("<li>").append("<a><b>" + item.placas + "</b><br> Marca:" + item.marca + "</a>").appendTo(ul);
	};

</script>