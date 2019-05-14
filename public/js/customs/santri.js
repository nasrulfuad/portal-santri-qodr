getTotalRows('http://localhost/santries/public/santri/rows');
firstGet('http://localhost/santries/public/santri/get', '#santri', offset = 0);
let nav = $('#nav');
let currentPage = $('#currentPage');


$('#next').on('click', function(e) {
	e.preventDefault();
	let navStatus = $('#nav').attr('status');
	if ( !$(this).hasClass('disabled') ) {
		currentPage.text((parseInt(currentPage.text()) + 1));
		if ( navStatus != 'search' ) {
			nav.attr('data-offset', (parseInt(nav.attr('data-offset')) + 24));
			getLimit('http://localhost/santries/public/santri/get', '#santri', parseInt(nav.attr('data-offset')));
			( parseInt(nav.attr('data-offset')) < 24 ) ? nav.find('#prev').addClass('disabled') : nav.find('#prev').removeClass('disabled');
		} else {
			search($(this).attr('link'), '#santri');
		}
	}
});

$('#prev').on('click', function(e) {
	e.preventDefault();
	let navStatus = $('#nav').attr('status')
	if ( !$(this).hasClass('disabled') ) {
		currentPage.text((parseInt(currentPage.text()) - 1));
		if ( navStatus != 'search' ) {
			let that = $(this);
			let next = nav.find('#next');
			nav.attr('data-offset', (parseInt(nav.attr('data-offset')) - 24));
			getLimit('http://localhost/santries/public/santri/get', '#santri', parseInt(nav.attr('data-offset')));
			( parseInt(nav.attr('data-offset')) < 24 ) ? that.addClass('disabled') : that.removeClass('disabled');
			(next.hasClass('disabled')) ? next.removeClass('disabled') : '';
		} else {
			search($(this).attr('link'), '#santri');
		}
	}
});

$('#searchSantri').on('submit', (e) => {
	e.preventDefault();
	let key = $('#input').val();
	if ( key != '' ) {
		$('#nav').attr('status', 'search');
		search(`http://localhost/santries/public/santri/search/${ key }`, '#santri');
		currentPage.text('1');
	}
});
