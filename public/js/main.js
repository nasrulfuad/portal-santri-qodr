(function($){
	"use strict";

	$(window).load(function() {
		setTimeout(() => {
			$('.wrapper').fadeOut(1000);
		}, 30);
	});
})(window.jQuery);

// The typewriter element
var typeWriterElement = document.getElementById('typewriter');

// The TextArray: 
var textArray = ["Selamat Datang.. ","I like JavaScript. ","I Love to Develop. ", "I like this Typewriter. "];

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
}, 500);

function get(baseUrl, url, element, offset) {
	$.ajax({
		method: 'GET',
		url: url + '' + '/' + offset,
		dataType: 'json',
		success: (result) => {
			let htmlTag = '';
			if ( result.length != 0 ) {
				$.each(result, (res, val) => {
					htmlTag += `
				          <div class="fh5co-project col-12 col-md-6 col-lg-4 p-3">
				            <div class="fh5co-person text-center">
				              <figure><img src="${ baseUrl }/images/person.jpg" alt="Image"></figure>
				              <h3>${ val.nama.replace(/\b\w/g, l => l.toUpperCase()) }</h3>
				              <span class="fh5co-position">Web Designer</span>
				              <p>Asal  :  ${ val.kota_asal.replace(/\b\w/g, l => l.toUpperCase()) }</p>
				              <p>Cabang  :  ${ (val.cabang_sekarang == 'hq') ? 'HQ' : val.cabang_sekarang.replace(/\b\w/g, l => l.toUpperCase()) }</p>
				              <p>Umur  :  19 Tahun</p>
				              <p>Skills  :  PHP, Laravel, HTML</p>
				              <p>Status : </p>
				              <p class="btn-status">${ val.status_santri }</p>
				            </div>
				          </div>
					`;
				});
			}
			( result.length < 9 ) ? $('#next').addClass('disabled') :'';
			$(element).html(htmlTag);
		}
	});
}
