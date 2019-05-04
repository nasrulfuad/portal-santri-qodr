getTotalRows('http://localhost/santries/public/santri/rows');
getLimit('http://localhost/santries/public', 'http://localhost/santries/public/santri', '#santri', offset = 0);

$('#next').on('click', function(e) {
	e.preventDefault();
	if ( !$(this).hasClass('disabled') ) {
		let nav = $(this).parents('nav');
		$('#currentPage').text((parseInt(nav.attr('data-offset')) / 9) + 2);
		nav.attr('data-offset', (parseInt(nav.attr('data-offset')) + 9));
		getLimit('http://localhost/santries/public', 'http://localhost/santries/public/santri', '#santri', parseInt(nav.attr('data-offset')));
		( parseInt(nav.attr('data-offset')) < 9 ) ? nav.find('#prev').addClass('disabled') : nav.find('#prev').removeClass('disabled');
	}
});

$('#prev').on('click', function(e) {
	e.preventDefault();
	if ( !$(this).hasClass('disabled') ) {
		let that = $(this);
		let nav = that.parents('nav');
		let next = nav.find('#next');
		nav.attr('data-offset', (parseInt(nav.attr('data-offset')) - 9));
		$('#currentPage').text(($('#currentPage').text() - 1));
		getLimit('http://localhost/santries/public', 'http://localhost/santries/public/santri', '#santri', parseInt(nav.attr('data-offset')));
		( parseInt(nav.attr('data-offset')) < 9 ) ? that.addClass('disabled') : that.removeClass('disabled');
		(next.hasClass('disabled')) ? next.removeClass('disabled') : '';
	}
});
