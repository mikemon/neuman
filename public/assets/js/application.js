/**
 * Activa el muestreo de la cuenta de Usuario Firmado
 */

$(document).ready(function() {
	$(".showhide-account").click(function() {
		$(".account-content").slideToggle("fast");
		$(this).toggleClass("active");
		return false;
	});
});
/**

 /**
 * Activa la imagen de carga por cada Peticion Ajax en Automatico
 */
jQuery(document).ajaxStart(function() {
	document.getElementById("spinner").style.display = "block";
});

jQuery(document).ajaxStop(function() {
	document.getElementById("spinner").style.display = "none";
});
/**Activa ComboBox de Jquery*/
/*
 (function( $ ) {
 $.widget( "custom.combobox", {
 _create: function() {
 this.wrapper = $( "<span>" )
 .addClass( "custom-combobox" )
 .insertAfter( this.element );

 this.element.hide();
 this._createAutocomplete();
 this._createShowAllButton();
 },

 _createAutocomplete: function() {
 var selected = this.element.children( ":selected" ),
 value = selected.val() ? selected.text() : "";

 this.input = $( "<input>" )
 .appendTo( this.wrapper )
 .val( value )
 .attr( "title", "" )
 .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
 .autocomplete({
 delay: 0,
 minLength: 0,
 source: $.proxy( this, "_source" )
 })
 .tooltip({
 tooltipClass: "ui-state-highlight"
 });

 this._on( this.input, {
 autocompleteselect: function( event, ui ) {
 ui.item.option.selected = true;
 this._trigger( "select", event, {
 item: ui.item.option
 });
 },

 autocompletechange: "_removeIfInvalid"
 });
 },

 _createShowAllButton: function() {
 var input = this.input,
 wasOpen = false;

 $( "<a>" )
 .attr( "tabIndex", -1 )
 .attr( "title", "Mostrar todos" )
 .tooltip()
 .appendTo( this.wrapper )
 .button({
 icons: {
 primary: "ui-icon-triangle-1-s"
 },
 text: false
 })
 .removeClass( "ui-corner-all" )
 .addClass( "custom-combobox-toggle ui-corner-right" )
 .mousedown(function() {
 wasOpen = input.autocomplete( "widget" ).is( ":visible" );
 })
 .click(function() {
 input.focus();

 // Close if already visible
 if ( wasOpen ) {
 return;
 }

 // Pass empty string as value to search for, displaying all results
 input.autocomplete( "search", "" );
 });
 },

 _source: function( request, response ) {
 var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
 response( this.element.children( "option" ).map(function() {
 var text = $( this ).text();
 if ( this.value && ( !request.term || matcher.test(text) ) )
 return {
 label: text,
 value: text,
 option: this
 };
 }) );
 },

 _removeIfInvalid: function( event, ui ) {

 // Selected an item, nothing to do
 if ( ui.item ) {
 return;
 }

 // Search for a match (case-insensitive)
 var value = this.input.val(),
 valueLowerCase = value.toLowerCase(),
 valid = false;
 this.element.children( "option" ).each(function() {
 if ( $( this ).text().toLowerCase() === valueLowerCase ) {
 this.selected = valid = true;
 return false;
 }
 });

 // Found a match, nothing to do
 if ( valid ) {
 return;
 }

 // Remove invalid value
 this.input
 .val( "" )
 .attr( "title", value + " no regreso resultados" )
 .tooltip( "open" );
 this.element.val( "" );
 this._delay(function() {
 this.input.tooltip( "close" ).attr( "title", "" );
 }, 2500 );
 this.input.data( "ui-autocomplete" ).term = "";
 },

 _destroy: function() {
 this.wrapper.remove();
 this.element.show();
 },
 _change: function() {alert('ok');}
 });
 })( jQuery );

 */

(function($) {
	$.widget("custom.combobox", {
		_create : function() {
			this.wrapper = $("<span>").addClass("custom-combobox").insertAfter(this.element);
			this.element.hide();
			this._createAutocomplete();
			this._createShowAllButton();
		},
		_createAutocomplete : function() {
			var selected = this.element.children(":selected"), value = selected.val() ? selected.text() : "";
			this.input = $("<input>").appendTo(this.wrapper).val(value).attr("title", "").addClass("custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left").autocomplete({
				delay : 0,
				minLength : 0,
				source : $.proxy(this, "_source"),
				select: function (event,ui) { 
					//alert(event); 
					var jsonStr = JSON.stringify(ui);
        			//alert(jsonStr);
        			//alert(ui.item.executeFunction);
        			if(ui.item.executeFunction){
        				//var funcion=ui.item.executeFunction;
        				//funcionEjecutar(""+ui.item.executeFunction+"");
        				eval(''+ui.item.executeFunction+'()');
        			}
        			
					}
			}).tooltip({
				tooltipClass : "ui-state-highlight"
			});
			
			
			this._on(this.input, {
				autocompleteselect : function(event, ui) {
					ui.item.option.selected = true;
					this._trigger("select", event, {
						item : ui.item.option
					});
				},
				autocompletechange : "_removeIfInvalid"
			});
		},
		_createShowAllButton : function() {
			var input = this.input, wasOpen = false;
			$("<a>").attr("tabIndex", -1).attr("title", "Show All Items").tooltip().appendTo(this.wrapper).button({
				icons : {
					primary : "ui-icon-triangle-1-s"
				},
				text : false
			}).removeClass("ui-corner-all").addClass("custom-combobox-toggle ui-corner-right").mousedown(function() {
				wasOpen = input.autocomplete("widget").is(":visible");
			}).click(function() {
				input.focus();
				// Close if already visible
				if (wasOpen) {
					return;
				}
				// Pass empty string as value to search for, displaying all results
				input.autocomplete("search", "");
			});
		},
		_source : function(request, response) {
			var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
			response(this.element.children("option").map(function() {
				var text = $(this).text();
				if (this.value && (!request.term || matcher.test(text) ))
					return {
						label : text,
						value : text,
						id:this.id,
						executeFunction:$(this).attr('function'),
						option : this
					};
			}));
		},
		_removeIfInvalid : function(event, ui) {
			// Selected an item, nothing to do
			if (ui.item) {
				return;
			}
			// Search for a match (case-insensitive)
			var value = this.input.val(), valueLowerCase = value.toLowerCase(), valid = false;
			this.element.children("option").each(function() {
				if ($(this).text().toLowerCase() === valueLowerCase) {
					this.selected = valid = true;
					return false;
				}
			});
			// Found a match, nothing to do
			if (valid) {
				return;
			}
			// Remove invalid value
			this.input.val("").attr("title", value + " didn't match any item").tooltip("open");
			this.element.val("");
			this._delay(function() {
				this.input.tooltip("close").attr("title", "");
			}, 2500);
			this.input.data("ui-autocomplete").term = "";
		},
		_destroy : function() {
			this.wrapper.remove();
			this.element.show();
		}
	});
})(jQuery);

var contadorGrowl = 0;
/**
 * Activa el muestreo de mensajes del lado cliente
 * @param        string:opcion      Tipo de error a mostrar 0: Notificacion , 1:Error, 2:Notificacion de Exito
 * @param        string:texto       Texto a mostrar en el mensaje
 */

function jGrowl(opcion, texto) {
	if (contadorGrowl == 0) {
		$.jGrowl("close");
	}
	contadorGrowl++;
	var time = 2000 * contadorGrowl;
	switch(opcion) {
		case 0:
			titulo = "Informaci&oacute;n";
			tipo = "info";
			break;
		case 1:
			titulo = "Error";
			tipo = "error";
			break;
		case 2:
			titulo = "Notificaci&oacute;n";
			tipo = "success";
			break;
		case 3:
			titulo = "Advertencia";
			tipo = "warning";
			break;

		//
	}
	$.jGrowl(texto, {
		header : titulo,
		sticky : true,
		theme : tipo
	});
}

/**
 * Activa el muestreo de mensajes del lado cliente Desvaneciendo
 * @param        string:opcion      Tipo de error a mostrar 0: Notificacion , 1:Error, 2:Notificacion de Exito
 * @param        string:texto       Texto a mostrar en el mensaje
 */
function jGrowlVanish(opcion, texto) {
	if (contadorGrowl == 0) {
		$.jGrowl("close");
	}
	contadorGrowl++;
	var time = 2000 * contadorGrowl;
	switch(opcion) {
		case 0:
			titulo = "Informaci&oacute;n";
			tipo = "msg info";
			break;
		case 1:
			titulo = "Error";
			tipo = "msg error";
			break;
		case 2:
			titulo = "Notificaci&oacute;n";
			tipo = "msg done";
			break;
		case 3:
			titulo = "Advertencia";
			tipo = "msg warning";
			break;
	}
	$.jGrowl(texto, {
		header : titulo,
		theme : tipo,
		themeState : ""
	});
}

/**
 * Pone en 0 al contado de Mensajes
 */
function resetGrowl() {
	contadorGrowl = 0;
}

var textArea = function(parametro) {
	//    	 $(parametro)
	//         .button()
	//         .css({
	//                 'font' : 'inherit',
	//                'color' : 'inherit',
	//           'text-align' : 'left',
	//              'outline' : 'none',
	//               'cursor' : 'text',
	//            	   'min-width':'165px',
	//            	   'overflow':'auto',
	//            	   'position': 'relative'
	//
	//         });
}
var textField = function() {
	//     $('input:text, input:password, input:file  ')
	//     .button()
	//     .css({
	//             'font' : 'inherit',
	//            'color' : 'inherit',
	//       'text-align' : 'left',
	//          'outline' : 'none',
	//           'cursor' : 'text',
	//           'background-color':'#fff',
	//        	   'min-width':'165px',
	//        	   'height':'20px',
	//        	   'position': 'relative'
	//
	//     });
	//     $('textarea')
	//     .button()
	//     .css({
	//             'font' : 'inherit',
	//            'color' : 'inherit',
	//       'text-align' : 'left',
	//          'outline' : 'none',
	//           'cursor' : 'text',
	//        	   'min-width':'165px',
	//        	   'overflow':'auto',
	//        	   'position': 'relative'
	//
	//     });
}
var textFieldUnitario = function(textField) {
	//         $(textField)
	//         .button()
	//         .css({
	//                 'font' : 'inherit',
	//                'color' : 'inherit',
	//           'text-align' : 'left',
	//           'background-color':'#fff',
	//              'outline' : 'none',
	//               'cursor' : 'text',
	//            	   'min-width':'165px',
	//            	   'height':'20px',
	//            	   'position': 'relative'
	//
	//         })
	//         .removeClass("ui-state-hover")

}
var invocaFormulario = function() {
	textField()
	$.jGrowl("close");
}
/**
 * Inicializa la carga de una ventana modal
 * @param        string:window      id del div que contendra la ventana
 *  @param        int:ancho      id del div que contendra la ventana
 *  @param        int:alto     id del div que contendra la ventana
 **/
var modalSmall = function(window, ancho, idVentanaEmpty) {
	ancho = (ancho == undefined) ? 600 : ancho
	jQuery(window).dialog({
		autoOpen : false,
		modal : true,
		speed : 'normal',
		hide : "explode",
		width : ancho,
		minWidth : 400,
		minHeight : 180,
		close : function(event, ui) {
			if (idVentanaEmpty != undefined) {
				jQuery(window).empty()
			}
		}
	});
}
/**
 * Inicializa la carga de una ventana modal
 * @param        string:window      id del div que contendra la ventana
 *  @param        int:ancho      id del div que contendra la ventana
 *  @param        int:alto     id del div que contendra la ventana
 **/
var modal = function(window, ancho, idVentanaEmpty) {
	ancho = (ancho == undefined) ? 600 : ancho
	jQuery(window).dialog({
		autoOpen : false,
		modal : true,
		speed : 'normal',
		hide : "explode",
		width : ancho,
		minWidth : 900,
		minHeight : 300,
		close : function(event, ui) {
			if (idVentanaEmpty != undefined) {
				jQuery(window).empty()
			}
		}
	});
}
/**
 * Inicializa la carga de una ventana modal, cuyo contenido se borra al cerrar el modal.
 *
 * @param string:window - Id del div que contendra la ventana
 * @param int:ancho - Ancho en pixeles de la ventana
 *
 **/
var modalCustom = function(window, ancho) {
	ancho = (ancho == undefined) ? 600 : ancho
	jQuery(window).dialog({
		autoOpen : false,
		modal : true,
		speed : 'normal',
		hide : "explode",
		width : ancho,
		minWidth : 300,
		minHeight : 180,
		close : function(event, ui) {
			if (window != undefined) {
				jQuery(window).empty();
			}
		}
	});
}
/**
 * Activa llamadas a Ajax con Jquery
 * @param        string:url      ruta del controlador a llamar
 * @param        string:pars     Parametros a enviar a el controlador
 * @param        string:target   Lugar dentro del HTML  a actualizar
 * @param        string:formulario     Formulario donde se tomaran los valors; si el pars esta vacio se toman los datos del formulario como tal.
 * @param        string:extendScript   true:false funcion a llamar despues de ejecutar la actualizacion del elemento HTML extiende las capacidades del llamado Ajax para completar la ejecucion con javascript
 */
function invocaAjax(url, pars, target, formulario, extendScript,dataType,async) {
	formulario = (formulario == undefined) ? '' : formulario;
	dataType=(dataType == undefined) ? 'html' : dataType;
	async=(async == undefined) ? true : async;
	pars = (pars == undefined) ? '' : pars;
	var parametros;
	if (formulario != '' && pars != '') {
		parametros = jQuery(formulario).serialize() + '&' + pars;
	} else if (formulario == '' && pars != '') {
		parametros = pars;
	} else {
		parametros = jQuery(formulario).serialize();
	}

	jQuery.ajax({
		type : 'POST',
		url : url,
		data : parametros,
		dataType : dataType,
		async :async,
		success : function(html) {
			var s = typeof html;
			if (s == 'object') {
				if (html.error) {
					formValidation(html, target, 'vanish');
				} else {
					//extendJSON(html);
					extendScript(html);
				}

			} else {
				jQuery('#' + target).html(html);
				if (extendScript) {
					//extendJavaScript()
					extendScript(html);
				}
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			jGrowl(1, "Error procesando su peticion");
		},
		complete : function(XMLHttpRequest, textStatus) {
			if (cargaStatus(XMLHttpRequest.status) == false) {
				return false;
			}

		}
	});
	return false;
}

/**
 * Validacion y muestreo de los errores  de procesamiento de un formulario
 * @param        string:data      valores en formato JSON o HTML
 * @param        string:update  	ubicacion donde se realizara la actualizacion
 * @param        string:typeMessagge  	fixed:vanish el primero muestra los mensajes de error fijos , el segundo los desvanece cada segundo
 **/

var formValidation = function(data, update, typeMessagge) {
	resetGrowl();

	if (!data.error) {
		//sino hay error lo muestra
		jQuery('#' + update).html(data)

	} else if (data.error[0].errors) {
		//error en una sola instancia

		for (var i in data.error[0].errors) {

			switch(typeMessagge) {
				case 'vanish':
					jGrowlVanish(1, data.error[0].errors[i].message);
					break;
				case 'fixed':
					jGrowl(1, data.error[0].errors[i].message);
					break;
			}
		}

	} else if (data.error instanceof Array) {
		//error en multiples Instancias
		var mensaje = "";
		for (var i in data.error) {
			for (var e in data.error[i]) {
				mensaje = data.error[i][e];
				var nuevo = mensaje[0];
				for (var m in nuevo.errors)
				switch(typeMessagge) {
					case 'vanish':
						jGrowlVanish(1, e + nuevo.errors[m].message);
						break;
					case 'fixed':
						jGrowl(1, e + nuevo.errors[m].message);
						break;
				}
			}

		}
	} else if (data.error) {
		//error simple

		switch(typeMessagge) {
			case 'vanish':
				jGrowlVanish(1, data.error);
				break;
			case 'fixed':
				jGrowl(1, data.error);
				break;
		}

	}
}
var cargaStatus = function(xhr) {
	if (xhr == 401) {
		showLogin();
		return false
	}
	if (xhr == 404) {
		jGrowlVanish(1, "Error procesando su peticion: La aplicacion no encontro la URI dada");
		return false
	}
	if (xhr == 500) {
		jGrowlVanish(1, "Error procesando su peticion: La aplicacion causo un error Interno");
		return false
	}
	if (xhr == 403) {
		jGrowlVanish(1, "Error procesando su peticion: La aplicacion a la cual intento accesar esta Prohibida");
		return false

	}
	return true

}
/**
 * Inicializa una tabla con su filtro de busqueda mediante un Input
 * @param        string:tabla      id de la tabla que contiene la informacion
 * @param        string:filtro  	 id del filtro que buscara la informacion
 * @param        string:reset  	 id del boton que borrara los elementos de la busqueda y restaurara los valores originales
 **/

var tableFilter = function(tabla, filtro, reset) {
	$(tabla).tablesorter({
		widgets : ['zebra']
	}).tablesorterFilter({
		filterContainer : filtro,
		filterClearContainer : reset
	});
}
var tableFilterScroll = function(tabla, filtro, reset, scroll) {

	$(tabla).tablesorter({
		scrollHeight : scroll,
		widgets : ['zebra', 'scroller']
	}).tablesorterFilter({
		filterContainer : filtro,
		filterClearContainer : reset
	});
}
var date = function(campo) {
	jQuery(campo).datepicker({
		//dateFormat: 'dd-mm-yy' ,
		dateFormat : 'yy-mm-dd',
		showOn : "button",
		changeMonth : true,
		changeYear : true,
		yearRange : 'c-30:c+30',
		//	buttonImage: "dir:'css/proserti/images/forms/',file:'icon_calendar.jpg')}",
		buttonImageOnly : true,
		buttonImage : rutaBase + 'public/images/calendar.png',
		showOn : "both",
		constrainInput : true
	});
	jQuery(".ui-datepicker-trigger").removeAttr('title')
	jQuery(".ui-datepicker-trigger").removeAttr('alt')
	jQuery(".ui-datepicker-trigger").addClass('ui-icon ui-corner-all ui-datepicker-trigger-form').css("display", "inline-block")
}
var dateMaxToday = function(campo) {
	jQuery(campo).datepicker({
		dateFormat : 'dd-mm-yy',
		showOn : "button",
		changeMonth : true,
		changeYear : true,
		yearRange : 'c-30:c+30',
		//	buttonImage: "dir:'css/proserti/images/forms/',file:'icon_calendar.jpg')}",
		buttonImageOnly : true,
		maxDate : '+0D',
		showOn : "both"
	});
	jQuery(".ui-datepicker-trigger").removeAttr('title')
	jQuery(".ui-datepicker-trigger").removeAttr('alt')
	jQuery(".ui-datepicker-trigger").addClass('ui-icon ui-corner-all ui-datepicker-trigger-form').css("display", "inline-block")
}
var dateNoIcon = function(campo) {
	jQuery(campo).datepicker({
		dateFormat : 'dd-mm-yy',
		changeMonth : true,
		changeYear : true,
		yearRange : 'c-30:c+30'
	});

}
var dateCaducidad = function(campo) {
	jQuery(campo).datepicker({
		dateFormat : 'dd-mm-yy',
		minDate : 0,
		changeMonth : true,
		changeYear : true,
		yearRange : 'c-30:c+30'
	});

}
var dateCaduco = function(campo) {
	jQuery(campo).datepicker({
		dateFormat : 'dd-mm-yy',
		minDate : 0,
		showOn : "button",
		buttonImageOnly : true,
		changeMonth : true,
		changeYear : true,
		yearRange : 'c-30:c+30',
		showOn : "both"
	});
	jQuery(".ui-datepicker-trigger").removeAttr('title')
	jQuery(".ui-datepicker-trigger").removeAttr('alt')
	jQuery(".ui-datepicker-trigger").addClass('ui-icon ui-corner-all ui-datepicker-trigger-form').css("display", "inline-block")

}
var remueveDisablePicker = function() {

	jQuery(".ui-datepicker-trigger").removeAttr('title')
	jQuery(".ui-datepicker-trigger").removeAttr('alt')
	jQuery(".ui-datepicker-trigger").addClass('ui-icon ui-corner-all ui-datepicker-trigger-form').css("display", "inline-block")

}
var dateRange = function(from, to) {
	$("#" + from).datepicker({
		defaultDate : "-1m",
		changeMonth : true,
		changeYear : true,
		yearRange : 'c-30:c+30',
		showOn : "button",
		buttonImageOnly : true,
		showOn : "both",
		dateFormat : 'dd-mm-yy',
		numberOfMonths : 3,
		onClose : function(selectedDate) {
			$("#" + to).datepicker("option", "minDate", selectedDate);
			remueveDisablePicker()
		}
	});

	$("#" + to).datepicker({
		defaultDate : "-1m",
		changeMonth : true,
		changeYear : true,
		yearRange : 'c-30:c+30',
		showOn : "button",
		buttonImageOnly : true,
		showOn : "both",
		dateFormat : 'dd-mm-yy',
		numberOfMonths : 3,
		onClose : function(selectedDate) {
			$("#" + from).datepicker("option", "maxDate", selectedDate);
			remueveDisablePicker()
		}
	});
	remueveDisablePicker()
}
/**
 * Valida que en el input lo que se teclea sean solo datos en formato numerico
 * @param        obj:evt      objeto del evento a evaluar
 * @return       true:false
 **/

var nav4 = window.Event ? true : false;
var numeric = function(evt) {
	// Backspace = 8, Enter = 13, '0' = 48, '9' = 57, '.' = 46
	var key = nav4 ? evt.which : evt.keyCode;
	return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
}
/**
 * Valida que en el input lo que se teclea sean solo datos en formato numero
 * @param        obj:evt      objeto del evento a evaluar
 * @return       true:false
 **/
var number = function(evt) {
	// Backspace = 8, Enter = 13, '0' = 48, '9' = 57
	var key = nav4 ? evt.which : evt.keyCode;
	return (key <= 13 || (key >= 48 && key <= 57) );
}

$.maxZIndex = $.fn.maxZIndex = function(opt) {

	var def = {
		inc : 10,
		group : "*"
	};
	$.extend(def, opt);
	var zmax = 0;
	$(def.group).each(function() {
		var cur = parseInt($(this).css('z-index'));
		zmax = cur > zmax ? cur : zmax;
	});
	if (!this.jquery)
		return zmax;

	return this.each(function() {
		zmax += def.inc;
		$(this).css("z-index", zmax);
	});
}
function getSelectedText(elementId) {
	var elt = document.getElementById(elementId);

	if (elt.selectedIndex == -1)
		return null;

	return elt.options[elt.selectedIndex].text;
}

/**
 * Redondea un numero double segun: 1.50 baja a 1.0; 1.51 sube a 2.0
 * @param n: double - Numero a redondear.
 *
 * @return double: Numero redondeado.
 * */
var redondear = function(n) {
	n = Math.abs(n);
	var decimales = (n.toFixed(2) - Math.floor(n)) * 100

	if (decimales > 50) {
		return Math.ceil(n)
	} else {
		return Math.floor(n)
	}
}
//Traducción al español
//$(function($){

$.datepicker.regional['es'] = {
	closeText : 'Cerrar',
	prevText : '<Ant',
	nextText : 'Sig>',
	currentText : 'Hoy',
	monthNames : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	monthNamesShort : ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
	dayNames : ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	dayNamesShort : ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
	dayNamesMin : ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
	weekHeader : 'Sm',
	dateFormat : 'dd/mm/yy',
	firstDay : 1,
	isRTL : false,
	showMonthAfterYear : false,
	yearSuffix : ''
};

$.datepicker.setDefaults($.datepicker.regional['es']);
//});

var tableMac = function(tabla) {
	jQuery(tabla).dataTable({
		"bJQueryUI" : true,
		"sPaginationType" : "full_numbers",

		"oLanguage" : {
			"oPaginate" : {
				"sPrevious" : "Anterior",
				"sFirst" : "Primero",
				"sNext" : "Siguiente",
				"sLast" : "Ultimo"
			},
			"sInfo" : "Mostrando del _START_ al _END_ de _TOTAL_ registros",
			"sInfoEmpty" : "Mostrando 0 registros",
			"sEmptyTable" : "No hay datos disponibles en la tabla.",
			"sLengthMenu" : "Mostrar _MENU_ registros",
			"sSearch" : "Buscar:",
			"sZeroRecords" : "No hay registros coincidentes encontrados",
			"sInfoFiltered" : "(Filtrado apartir de _MAX_ regristros en total)"

		}
	});
};

$('.isNumeric').keydown(function(e) {    
  if ((e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.keyCode != 8 && e.keyCode != 9)  
      e.preventDefault();  
});

function muestraErrores(cadena){
	$aError=cadena.split("|");
	for(i = 0; i < $aError.length; i++) {
		jGrowlVanish(1, $aError[i]);
	}
}