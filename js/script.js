/* Author: Geekuillaume
	Streaming
*/
/*
========================================
=============== Isotope ================
========================================
*/

$('#movies').isotope({
  itemSelector : '.poster',
  layoutMode : 'fitRows'
});

/*
===============================================
=============== Inifinite Scroll ==============
===============================================
*/
$(function(){

      var $container = $('#movies');
    
      $container.isotope({
        itemSelector : '.poster'
      });
      
      $container.infinitescroll({
        navSelector  : '#page_nav',    // selector for the paged navigation 
        nextSelector : '#page_nav a',  // selector for the NEXT link (to page 2)
        itemSelector : '.poster',     // selector for all items you'll retrieve
        loading: {
            finishedMsg: 'Vous êtes arrivé au bout !',
            img: 'http://i.imgur.com/qkKy8.gif'
          }
        },
        // call Isotope as a callback
        function( newElements ) {
          $container.isotope( 'appended', $( newElements ) ); 
        }
      );
      
    
    });
/*
=============================================
=============== Ajout de film ===============
=============================================
*/
function get_titleID(title) 
{
	var url = baseurl + 'index.php/stream/titleID?title=' + title;
	var liste = false;
	var handler = $.ajax({ 
		url:url,
		async:false,
		success: function(data) {
			liste = data;
		} 
		});
	return liste;
}
function get_info(id)
{
	var url = baseurl + 'index.php/stream/get_info?id=' + id;
	var info = false;
	var handler = $.ajax({ 
		url:url,
		async:false,
		success: function(data) {
			info = data;
		} 
		});
	return info;
}
function is_video(lien)
{
	var video = null;
	var url = baseurl + 'index.php/stream/is_video?lien=' + lien;
	var handler = $.ajax({ 
		url:url,
		async:false,
		success: function(data) {
			video = data;
		} 
		});
	if (video == 'true') {video = true;}
	else {video = false}
	return video;
}
function enregistrer_video(id, lien)
{
	var resultat = null;
	var url = baseurl + 'index.php/stream/enregistrer?id=' + id + '&lien=' + lien;
	var handler = $.ajax({ 
		url:url,
		async:false,
		success: function(data) {
			resultat = data;
		} 
		});
	if (resultat == 'true') {resultat = true;}
	else {resultat = false}
	return resultat;
}
function add_movie()
{
	if ($("input[type=radio]:checked").size() == 0 && $(".add-info").size() == 0)
	{
		var title = $("#add-titre").val();
		if (!title) {
			$('#add-form-titre').addClass('error');
		}
		else
		{
			$('#add-form-titre').removeClass('error');
			var liste = get_titleID(title);
			if (!liste)
			{
				liste = '<div class="add_titleChoice"><div class="alert-message error"><p>Aucun résultat. Veuillez saisir un autre titre.</p></div></div>';
				$('#add-form-titre').addClass('error');
			}
			else
			{
				$('#add-form-titre').hide();
				liste = '<div class="add_titleChoice"><h5>Veuillez choisir un film :</h5>' + liste + '</div>';
			}
			$(".add_titleChoice").hide();
			$("#modal-plus > .modal-body").append(liste);
			$(".add_titleChoice").fadeOut("fast");
			$(".add_titleChoice").fadeIn("fast");
		}
	}
	else if ($("input[type=radio]:checked").size() == 1 && $(".add-info").size() == 0)
	{
		var id = $("input[type=radio]:checked").val();
		var info = get_info(id);
		$(".add_titleChoice").fadeOut("fast");
		$(".add_titleChoice").hide();
		$("#add-form-titre").hide();
		$("#modal-plus > .modal-body").append(info);
	}
	else if($(".add-info").size() == 1)
	{
		var lien = $("#add-lien").val();
		if (!!lien)
		{
			$('#add-form-lien').removeClass('error');
			if (is_video(lien))
			{
				var id = $(".add-info").attr('id');
				if(enregistrer_video(id, lien))
				{
					$("#modal-plus > .modal-body").fadeOut("fast");
					$("#modal-plus > .modal-body").html('<div class="alert-message success"><p>Le film a été enregistré. Merci !</p></div>');
					$("#modal-plus > .modal-body").fadeIn("fast");
					location.reload();
				}
				else
				{
					var message = '<div class="add_titleChoice"><div class="alert-message error"><p>Aucun résultat. Veuillez saisir un autre titre.</p></div></div>';
					$("#modal-plus > .modal-body").append(message);
				}
			}
			else
			{
				$('#add-form-lien').addClass('error');
				$('#add-form-lien').append('<span class="help-inline" style="display:block; margin-left:17px; margin-top:10px;">La vidéo doit être hébergée sur Megaupload et avoir l\'extension ".avi".</span>');
			}
		}
		else
		{
			$('#add-form-lien').addClass('error');
		}
	}
	return false;
}
function retour()
{
	if ($('#add-form-titre').size() == 1 && $(".add_titleChoice").size() > 0 && $(".add-info").size() == 0)
	{
		$(".add_titleChoice").fadeOut("fast");
		$(".add_titleChoice").remove();
		$('#add-form-titre').fadeIn("fast");
	}
	else if($('#add-form-titre').size() == 1 && $(".add_titleChoice").size() > 0 && $(".add-info").size() == 1)
	{
		$(".add-info").fadeOut("fast", function(){$(".add-info").remove();});
		$(".add_titleChoice").fadeIn("fast");
	}
	else if ($('#add-form-titre').size() == 1 && $(".add_titleChoice").size() == 0 && $(".add-info").size() == 0)
	{
		$("#modal-plus").modal('toggle');
	}
}
/*
==================================================
=============== Télécharger / Lire ===============
==================================================
*/
function add_vu(id) {
	var url = baseurl +'index.php/stream/vu/' + id + '/';
	var handler = $.ajax({ 
		url:url,
		async:false,
		});
}

function return_lien(id)
{
	var resultat = null;
	var url = baseurl +'index.php/stream/lien/' + id + '/';
	var handler = $.ajax({ 
		url:url,
		async:false,
		success: function(data) {
			resultat = data;
		} 
		});
	return resultat;
}
function telecharger(id)
{
	var loader = $("#modal-movie-" + id + " > .modal-body > .download > .loader");
	var lien = return_lien(id);
	loader.show();
	window.location.href = lien;
	add_vu(id);
}
function lire(id)
{
	var lien = return_lien(id);
	window.location.href = baseurl + 'index.php/stream/lecteur?lien=' + lien;
	add_vu(id);
}

/*
==================================================
=============== Options ==========================
==================================================
*/
function toggle_options() {
	$("#options").slideToggle("slow");
	$("#options_btn").button('toggle');
}
function order_by(order) {
	if (order <= 7 && order >= 0) {
		$("#page_nav").empty();
		$("#page_nav").append('<a href="'+baseurl+'index.php/stream/page/'+order+'/1/"></a>');
		$("#movies").empty();
		var url = baseurl + 'index.php/stream/page/' + order + '/1/';
		var handler = $.ajax({ 
			url:url,
			async:false,
			success: function(data) {
				$("#movies").append(data);
				$('#movies').isotope( 'destroy' );
				$('#movies').isotope({
 					itemSelector : '.poster',
 					layoutMode : 'fitRows'
				});
			} 
			});
	}
}