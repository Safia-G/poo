var data = [
	{
		time: '2017-05-02',
		header: 'Année 2017',
		body: [{
			tag: 'h1',
			content: "Formation développement d'applications web et mobile"
		},
		{
			tag: 'p',
			content: 'Formation actuelle d\'une durée de cinq mois. '
		}],
		footer: 'It-Akademy, Villeurbanne'
	},
	{
		time: '2016-01-27',
		header: 'Années 2016/2017',
		body: [{
			tag: 'h1',
			content: "Formation Développement Web"
		},
		{
			tag: 'p',
			content: 'Formation intensive développement d\'applications web sur une durée de 7 mois .'
		}],
		footer: 'Simplon.co, Villeurbanne'
	},
	{
		time: '2015-07-03',
		header: 'Années 2014/2015',
		body: [{
			tag: 'h1',
			content: "Licence 1"
		},
		{
			tag: 'p',
			content: 'Première année de licence Sciences de l\'éducation.'
		}],
		footer: 'Université Lumière Lyon II, Bron'
	},
	{
		time: '2014-07-04',
		header: 'Année 2014',
		body: [{
			tag: 'h1',
			content: "Bac STMG"
		},
		{
			tag: 'p',
			content: 'Obtention de mon  baccalauréat STMG option SIG.'
		}],
		footer: 'Lycée Claude Bernard, Villefranche Sur Saône'
	},
	{
		time: '2015-12-31',
		header: 'Décembre 2015',
		body: [{
			tag: 'h1',
			content: "Caissière/Assistante"
		},
		{
			tag: 'p',
			content: 'À Picard Surgelés.'
		}],
		footer: 'Villefranche Sur Saône'
	},
	{
		time: '2016-02-28',
		header: 'Février 2016',
		body: [{
			tag: 'h1',
			content: "Préparatrice de commandes"
		},
		{
			tag: 'p',
			content: 'Préparation des commandes et remise des commandes aux clients, durant le mois de Février.'
		}],
		footer: 'Leclerc Drive, Limas'
	}
];

$(document).ready(function () {

	$("#myTimeline").albeTimeline(data);
	$("#list_parent li").on("click", function() {
		var cible = $(this).find('a').attr("href");
	$("html, body").animate({scrollTop: $(cible).offset().top}, 1850);
		return false;
	})

});

//Fonction pour redimensionner la page par rapport à la taille de l'écran
function setSizes() {
	/* General
	$('.logo-content').css({'margin-top': '-'+($('.logo-content').height()/2)+'px'});
	*/
	//Profile
	$('#profile').css({'height':($(window).height()) + 'px'});
	$('#first_screen').css({'margin-top': '-'+($('#first_screen').height()/10)+'px'});
	//Portfolio
	//$('#timeline').css({'margin-top': '-'+($('#timeline').height()/10)+'px'});
	//contact
	$('#contact, .contact-content').css({'min-height':($(window).height()) + 'px'});
}

setSizes();
$(window).resize(function() {
	setSizes();
});
