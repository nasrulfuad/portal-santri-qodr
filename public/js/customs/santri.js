getTotalRows('http://localhost/santries/public/santri/rows');
firstGet('http://localhost/santries/public', 'http://localhost/santries/public/santri/get', '#santri', offset = 0);

$('.next-page').on('click', function(e) {
	console.log('next-page')
	e.preventDefault();
	if ( !$(this).hasClass('disabled') ) {
		let nav = $(this).parents('nav');
		$('#currentPage').text((parseInt(nav.attr('data-offset')) / 9) + 2);
		nav.attr('data-offset', (parseInt(nav.attr('data-offset')) + 9));
		getLimit('http://localhost/santries/public', 'http://localhost/santries/public/santri/get', '#santri', parseInt(nav.attr('data-offset')));
		( parseInt(nav.attr('data-offset')) < 9 ) ? nav.find('#prev').addClass('disabled') : nav.find('#prev').removeClass('disabled');
	}
});

$('.prev-page').on('click', function(e) {
	e.preventDefault();
	if ( !$(this).hasClass('disabled') ) {
		let that = $(this);
		let nav = that.parents('nav');
		let next = nav.find('#next');
		nav.attr('data-offset', (parseInt(nav.attr('data-offset')) - 9));
		$('#currentPage').text(($('#currentPage').text() - 1));
		getLimit('http://localhost/santries/public', 'http://localhost/santries/public/santri/get', '#santri', parseInt(nav.attr('data-offset')));
		( parseInt(nav.attr('data-offset')) < 9 ) ? that.addClass('disabled') : that.removeClass('disabled');
		(next.hasClass('disabled')) ? next.removeClass('disabled') : '';
	}
});

$('#searchSantri').on('submit', (e) => {
	e.preventDefault();
	let key = $('#input').val();
	$('#next').removeClass('next-page').addClass('next-page-search');
	$('#prev').removeClass('prev-page').addClass('prev-page-search');
	search('http://localhost/santries/public', 'http://localhost/santries/public/santri/search', '#santri', key);
});
