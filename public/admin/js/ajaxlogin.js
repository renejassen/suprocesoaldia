$(document).ready(function(){

	var form = $('#ajaxform').submit(function(){

		$.ajax({

			type: 'post',
			cache: false,
			dataType: 'json',
			url: form.attr('action'),
			data: $('#ajaxform').serialize(),
			
			beforeSend: function(){
				$('.load').show();
			},
			
			success: function(data){
				$('.load').hide();
				$('.errors').html("");
				if(data.success == false){

					var errores ="";
					for(datos in data.errors){
						errores += "<div class='alert alert-danger'>" + data.errors[datos] + "</div>";
					}
					$(form)[0].reset();
					$('.errors').html(errores);

				}
				else
				{
					$('.errors').show().html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button><strong>Ups!</strong>' + data.message + '</div>');

					window.location='inicio';

				}
			},

			error: function(errors){
				$(".load").hide();
				$('.errors').html("");
				$('.errors').html(errors);
			}

		});

		return false;

	});

});