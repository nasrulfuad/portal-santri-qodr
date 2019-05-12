let baseUrl = 'http://localhost/santries/public';
(function($){
	"use strict";
	$(window).load(function() {
		setTimeout(() => {
			$('#loader').fadeOut(1000);
			Modal.init();
		}, 300);
	});
})(window.jQuery);

var state = "closed";
var wait = 0;
var expTrans = 300;
var xTrans = 200;
var shiftTrans = 400;

var Modal = {
  effects : [
    'scale'
  ],
  
  init: function() {
    $('button[data-toggle=modal]').on('click', function(e) {
      e.stopPropagation();
      e.preventDefault();
      
      var effect = $(this).attr('data-effect');
      $('.modal').addClass(effect).addClass('show').removeClass('hiding');
      $('body').addClass('modal-open');
      $('body').addClass('modal-' + effect);
      
      var h = $('.modal-dialog').height();
      $('.modal-dialog').css({
        'margin-top': '-' + parseInt(h / 2) + 'px'
      });
    });
    
    $('.modal .close-modal').on('click', function(e) {
      $('.modal').removeClass('show').addClass('hiding');
      
      setTimeout(function() {
        for(var i = 0; i < Modal.effects.length; i++) {
          $('.modal').removeClass(Modal.effects[i]);
          $('body').removeClass('modal-' + Modal.effects[i]);
        }

        $('.modal').removeClass('hiding');
        $('body').removeClass('modal-open');
      }, 250);
    });
  }
};

// Nested animations to control search box expansion
$("#magnify").on("click", function(e) { 
	toggleMagnify();
});

// Prevent the animation from executing upon clicking the input box
$("#input").on("click keyup", function(e) {
  e.stopPropagation();
  ( e.keyCode === 27 ) ? toggleMagnify() : '';
});

// The typewriter element
var typeWriterElement = document.getElementById('typewriter');

// The TextArray: 
var textArray = ["Bismillah.. ","Welcome to our portal.. ","I hope you enjoy the web... ", "Barakallahu fiikum... "];

// You can also do this by transfering it through a data-attribute
// var textArray = typeWriterElement.getAttribute('data-array');


// function to generate the backspace effect 
function delWriter(text, i, cb) {
	if (i >= 0 ) {
		typeWriterElement.innerHTML = text.substring(0, i--);
		// generate a random Number to emulate backspace hitting.
 		var rndBack = 10 + Math.random() * 100;
		setTimeout(function() {
			delWriter(text, i, cb);
		},rndBack); 
	} else if (typeof cb == 'function') {
		setTimeout(cb,1000);
	}
};

// function to generate the keyhitting effect
function typeWriter(text, i, cb) {
	if ( i < text.length ) {
		typeWriterElement.innerHTML = text.substring(0, i++);
		// generate a random Number to emulate Typing on the Keyboard.
		var rndTyping = 250 - Math.random() * 100;
		setTimeout( function () { 
			typeWriter(text, i++, cb)
		},rndTyping);
	} else if (i === text.length) {
		setTimeout( function () {
			delWriter(text, i, cb)
		},1000);
	}
};

// the main writer function
function StartWriter(i) {
	if (typeof textArray[i] == "undefined") {
		setTimeout( function () {
			StartWriter(0)
		},1000);
	} else if(i < textArray[i].length) {
		typeWriter(textArray[i], 0, function () {
			StartWriter(i+1);
		});
	}  
};
// wait one second then start the typewriter
setTimeout( function () {
	StartWriter(0);
}, 300);

function getTotalRows(url) {
	$.ajax({
		method: 'GET',
		url: url,
		success: (result) => {
			$('#totalPage').html(Math.ceil(result/24));
		}
	});
}

function getLimit(url, element, offset) {
	$.ajax({
		method: 'GET',
		url: url + '' + '/' + offset,
		dataType: 'json',
		beforeSend: () => {
			$('.wrapper').fadeIn(1000);
		},
		success: (result) => {
			let htmlTag = '';
			( result.length != 0 ) ? htmlTag += render(result) : htmlTag += 'Kosong';
			( result.length < 24 ) ? $('#next').addClass('disabled') :'';
			let wait = new Promise((response, ejected) => {
				$('.wrapper').fadeOut(1000);
				setTimeout(() => {
					response();
				}, 800);
			});
			wait.then(() => {
				$(element).html(htmlTag);
			});
		}
	});
}

function firstGet(url, element, offset) {
	$.ajax({
		method: 'GET',
		url: url + '' + '/' + offset,
		dataType: 'json',
		success: (result) => {
			let htmlTag = '';
			( result.length != 0 ) ? htmlTag += render(result) : htmlTag += 'Kosong';
			( result.length < 24 ) ? $('#next').addClass('disabled') :'';
			$(element).html(htmlTag);
		}
	});
}

function search(url, element) {
	$.ajax({
		method: 'GET',
		url: url,
		dataType: 'json',
		beforeSend: () => {
			$('.wrapper').fadeIn(1000);
		},
		success: (result) => {
			let htmlTag = '';
			let totalRows = parseInt(result.totalRow);
			( result.data.length != 0 ) ? htmlTag += render(result.data) : htmlTag += 'Kosong';
			( result.nextPage != '' ) ? $('#next').removeClass('disabled') : $('#next').addClass('disabled');
			( result.prevPage != '' ) ? $('#prev').removeClass('disabled') : $('#prev').addClass('disabled');
			$('#next').attr('link', result.nextPage);
			$('#prev').attr('link', result.prevPage);

			let wait = new Promise((response, ejected) => {
				$('.wrapper').fadeOut(1000);
				setTimeout(() => {
					response();
				}, 800);
			});
			wait.then(() => {
				$(element).html(htmlTag);
				$('#totalPage').html(Math.ceil(totalRows/24));
			});
		}
	});
}

function render(results)
{
	let htmlTag = '';
	$.each(results, (res, val) => {
		htmlTag += `
	          <div class="fh5co-project col-12 col-md-6 col-lg-6 col-xl-2 p-3">
	            <div class="fh5co-person text-center">
	              <figure><img src="${ baseUrl }/images/person.jpg" alt="Image"></figure>
	              <h6>${ val.panggilan.replace(/\b\w/g, l => l.toUpperCase()) }</h6>
	              <span class="fh5co-position">Web Designer</span>
	              <p>Umur  :  19 Tahun</p>
	              <button class="btn-status" data-toggle="modal" data-effect="scale" data-toggle="tooltip" title="Click to show details">Detail</button>
	            </div>
	          </div>
		`;
	});
	return htmlTag;
}

function toggleMagnify()
{
  if (state === "closed" && wait === 0) {
    wait = 1;
    // Handle to X animation
    $("#handle1").animate({ left: "-=19", top: "-=19" }, xTrans);
    $("#handle2").animate(
      { right: "-=25", top: "+=19", opacity: "+1" },
      xTrans,
      function() {
        // Expansion of the search box
        $("#search").animate({ width: "+=400" }, expTrans);
        $("#input").animate({ width: "+=390" }, expTrans);
        $("#handle1").animate({ left: "+=400" }, expTrans, function() {
          // Change states
          state = "expanded";
          wait = 0;
          $("#input").select();
        });
      }
    );

  } else if (state === "expanded" && wait === 0) {
      wait = 1;
      // Collapse of the search box
      $("#handle1").animate({ left: "-=400" }, expTrans);
      $("#input").animate({ width: "-=390", opactity: "-=1" }, expTrans).blur();
      $("#search").animate({ width: "-=400" }, expTrans, function() {
        // Turn the X back to the handle
        $("#handle2").animate({ right: "+=25", top: "-=19", opacity: "-1" }, xTrans);
        $("#handle1").animate({ left: "+=19", top: "+=19" }, xTrans, function() {
          // change states
          state = "closed";
          wait = 0;
        });
      });
  }
}
