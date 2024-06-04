const VERBAL_MODE = true;

const BREAKPOINT_TABLET = 1024;
const BREAKPOINT_MOBILE = 768;
const BREAKPOINT_TINY_MOBILE_SMALL = 430;

const IS_INPUT = 0;
const IS_VALUE = 1;
const IS_CHECKBOX = 2;
const IS_CKEDITOR = 3;
const IS_PATH_FILE = 4;
const IS_LIST_OF_CHECKBOX = 5;
const IS_SELECT = 6;
const CKEDITOR5 = Array;

const DISPLAY_CARD = 0;
const DISPLAY_RESUME = 1;
const DISPLAY_EDITABLE = 2;
const DISPLAY_FULL = 3;
const FORMAT_BRUT = 0;
const FORMAT_VIEW = 1;
const FORMAT_EDITABLE = 2;
const FORMAT_ICON = 3;
const FORMAT_BADGE = 4;
const FORMAT_OBJECT = 5;
const FORMAT_ARRAY = 6;
const FORMAT_LIST = 7;
const FORMAT_TEXT = 8;
const FORMAT_PATH = 9;
const FORMAT_LINK = 10;

window.addEventListener("load", () => {
	closeLoadingContainer();

	// Ce code permet de détecter si des touches sont enfoncés et de jouer des fonctions.
	let keys = {};
	$(window).on("keyup keydown", function (e) {
		keys[e.keyCode] = e.type === 'keydown';

		// Remplacer les numéros par les touches correspondantes disponible sur ce site : https://www.cambiaresearch.com/articles/15/javascript-char-codes-key-codes
		// Mettre si le raccourcis est déjà prit par le navigateur e.preventDefault();

		// ctrl + b -> ouvre le bookmark
		if(keys[17] && keys[66]) {
			User.getBookmark();
			keys = {};
		}
	});

	const modal = document.getElementById('modal');
	modal.addEventListener('show.bs.modal', event => {
		let width = "600";
		if($('#modal .modal-dialog').hasClass('modal-xl')){
			width = "1200";
		} else if($('#modal .modal-dialog').hasClass('modal-lg')){
			width = "800";
		} else if($('#modal .modal-dialog').hasClass('modal-md')){
			width = "600";
		} else if($('#modal .modal-dialog').hasClass('modal-sm')){
			width = "400";
		} else if($('#modal .modal-dialog').hasClass('modal-xs')){
			width = "300";
		} else {
			width = "600";
		}
		if (!($('#modal.in').length)) {
			$('.modal-dialog').css({
				top: 0,
				left: 0,
				width: width
			});
		}
		$("#modal .modal-dialog").draggable({
			cursor: "move",
			handle: ".modal-header",
			scroll: false,
			opacity: 0.35
		});
		$("#modal .modal-dialog").resizable({
			minHeight: 300,
			minWidth: 300,
			maxWidth: $(window).width() - 50,
			maxHeight: $(window).height() - 50,
		});
	});
	modal.addEventListener('hidden.bs.modal', event => {
		let width = "600";
		if($('#modal .modal-dialog').hasClass('modal-xl')){
			width = "1200";
		} else if($('#modal .modal-dialog').hasClass('modal-lg')){
			width = "800";
		} else if($('#modal .modal-dialog').hasClass('modal-md')){
			width = "600";
		} else if($('#modal .modal-dialog').hasClass('modal-sm')){
			width = "400";
		} else if($('#modal .modal-dialog').hasClass('modal-xs')){
			width = "300";
		} else {
			width = "600";
		}

		if (!($('#modal.in').length)) {
			$('.modal-dialog').css({
				top: 0,
				left: 0,
				width: width
			});
		}
		let bubbleId = $(".modal__bubbleshortcut_toggle").attr('onclick');
		bubbleId = bubbleId.split("'")[1];
		if(Bubbleshortcut.existFromBubbleId(bubbleId)){
			Bubbleshortcut.update(bubbleId);
		}
	});
	
	// Redimensionnement de la zone de bookmark #offcanvasbookmark grâce à la souris et au clic et à la zone #offCanvas_zone_resizable avec un min de 350px et un max de la largeur de l'écran
	$("#offCanvas_zone_resizable").resizable({
		handles: "e",
		minWidth: 350,
		maxWidth: $(window).width() - 50,
		resize: function (event, ui) {
			$("#offcanvasbookmark").css("width", ui.size.width);
			$("#offcanvasbookmark").css("max-width", ui.size.width);
		}
	});

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	$('[data-bd-toggle="tooltip"]').tooltip();

	$("#diceroller .modal-dialog").draggable({
		cursor: "move",
		handle: ".modal-header",
	});

	initInterface();

	// Fonction de mise en cache 
	if ('serviceWorker' in navigator) {
		navigator.serviceWorker.register('/service-worker.js')
			.then(function(registration) {
				console.log('Service Worker registered with scope:', registration.scope);
			}).catch(function(error) {
				console.log('Service Worker registration failed:', error);
			});
	}
})

function init() {

	// Fonctionne pas - sencé recharge la page quand on revient en arrière dans l'historique du navigateur
	window.addEventListener("popstate", function(event) {
		location.reload();
	});

	Bubbleshortcut.init();

	$('.selectpicker').selectpicker;
	
	$('.draggable').draggable();

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	let tables = document.querySelectorAll("#table");
	tables.forEach(function(userItem) {
		$(userItem).bootstrapTable('destroy').bootstrapTable({
			exportTypes: ['pdf','excel','xlsx','doc','png','csv','xml','json','sql','txt']});
	});

	$('[data-toggle="tooltip"]').tooltip();
	
}

function closeLoadingContainer(){
	const loading_container = document.querySelector('.loading-container');
	loading_container.classList.add("loading-animation--end");
	setTimeout(() => {
		loading_container.remove();
	}, 500);
}