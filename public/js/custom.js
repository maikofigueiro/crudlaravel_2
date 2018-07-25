jQuery(document).ready(function(){
	jQuery.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	jQuery(document).on("submit", ".form", function(e){
		e.preventDefault();
		var action = jQuery(this).attr("data-action");
		var form = "#"+jQuery(this).attr("id");


		if(formValidate(form)){
			jQuery.ajax({
				url: action,
				type: "POST",
				data: new FormData(this),
				processData: false,
				contentType: false,
				success: function(resposta){
					if(resposta){
						alert(resposta.sucesso);
						window.location.replace(resposta.callback);
					}else{
						alert('Houve um erro na operação. Solicite suporte!');
					}
				}
			});
		}
	});

	jQuery('.excluir_usuario').on('click', function(e){
		e.preventDefault();
		var id = jQuery(this).attr("id");
		var action = jQuery(this).attr("data-action");

		jQuery.ajax({
			url: action,
			type: "POST",
			data: {id: id},
			success: function(resposta){
				if(resposta){
					alert(resposta.sucesso);
					window.location.replace(resposta.callback);
				}else{
					alert('Houve um erro na operação. Solicite suporte!');
				}
			}
		});
	});
	jQuery('.excluir_perfil').on('click', function(e){
		e.preventDefault();
		var id = jQuery(this).attr("id");
		var action = jQuery(this).attr("data-action");
		
		jQuery.ajax({
			url: action,
			type: "POST",
			data: {id: id},
			success: function(resposta){
				if(resposta){
					alert(resposta.sucesso);
					window.location.replace(resposta.callback);
				}else{
					alert('Houve um erro na operação. Solicite suporte!');
				}
			}
		});
	});
});

function formValidate(form, showmsg){
	showmsg = showmsg || false;
	var erro = false;
	jQuery(form+" .btn, "+form+" iframe, "+form+" input[type='text'], "+form+" input[type='checkbox'], "+form+" input[type='password'], "+form+" input[type='radio'], "+form+" input[type='radio'], "+form+" textarea, "+form+" input[type='hidden'], "+form+" select, "+form+" div, "+form+" input[type='file']").removeClass("error");
	
	jQuery(form+" .btn, "+form+" iframe, "+form+" input[type='text'], "+form+" input[type='checkbox'], "+form+" input[type='password'], "+form+" input[type='radio'], "+form+" input[type='radio'], "+form+" textarea, "+form+" input[type='hidden'], "+form+" select, "+form+" .selected-images, "+form+" input[type='file']").each(function(){
		var $esse = jQuery(this);
		if($esse.hasClass("validate")){
			if($esse.val() == "" || $esse.val() == undefined){
				if(!$esse.hasClass("val-img")){
					$esse.addClass("error");
					erro = true;
				}
			}
			if($esse.hasClass("val-mail")){
				if(!$esse.val().ismail()){
					$esse.addClass("error");
					erro = true;
				}
			}
			if($esse.hasClass("val-ck-pass")){
				if($esse.val() != jQuery(".val-pass").val()){
					$esse.addClass("error");
					erro = true;
				}
			}

			if($esse.hasClass("val-tube")){
				if($esse.val().indexOf("youtube") > 0){
					if($esse.val().indexOf("v=") > 0){

					}else{
						$esse.addClass("error");
						$esse.val("");
						erro = true;
					}
				}else{
					$esse.addClass("error");
					$esse.val("");
					erro = true;
				}
			}

			if($esse.hasClass("error") && !$esse.is(":visible")){
				$esse.parent().find("iframe").addClass("error");
				erro = true;
			}

			if($esse.hasClass("val-file")){
				if($esse.attr("multiple") == "multiple"){
				}else{
					var name = $esse.val();
					ext = name.split(".");
					ext = ext[(ext.length-1)];
					var arr = ['jpg', 'jpeg', 'png', 'gif'];
					if(jQuery.inArray(ext, arr) < 0){
						$esse.addClass("error");
						erro = true;
					}
				}
			}
		}

	});
	if(!erro){
		return true;
	}else{
		jQuery(form+" .error").first().focus();
		return false;
	}
}