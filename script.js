//! CFG 
let response;

$(document).ready(function(){
	$('#BoutonBurgermenuTab').click(function(){
        $('.menuTab').toggleClass('isOpen');
		$('#BoutonBurgermenuTab .barre1').toggleClass('isClick');
        $('#BoutonBurgermenuTab .barre2').toggleClass('isClick');  
	});
});

function doGetJson(url, isSelected) {
	$.getJSON(url, function(data) {
		response = data;
		
		console.log(data);

		$("tbody").empty();

		$.each(data, function(cle, valeur) {
			if (isSelected) {
				console.log('is selected');
			}
			$('<tr>').append(
				$('<td>')).html(valeur.titre),
				$('<td>').html(valeur.auteur),
				$('<td>').html(valeur.date),
				$('<td>').html(valeur.commentaires).appendTo($('tbody')
			);
		});
	});
}


// Afficher le formulaire d'ajout ou de modification, selon le bouton - Destination
$('div button').click(function(e) {
	let id = e.target.id;
	var displayForm = $("#form"+id);
	console.log("#form"+id);

	if(displayForm.css("display")==="none") {
		displayForm.attr("style","display:block");
		console.log("coucou");
	} else if(displayForm.css("display","block")) {
		displayForm.css("display","none");
	}
});

//dynamiser l'affichage des destinations 

$('<area />').click(function(e){
	console.log(e);
	console.log('coucou');
});

// #areas > area:nth-child(11)
// var area= document.querySelector("#areas > area:nth-child(11)")
