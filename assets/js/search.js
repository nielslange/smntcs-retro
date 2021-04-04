( function () {
	const button = document.querySelector('#header-search-button');
	const form = document.querySelector('#header-search-form');
	button.addEventListener( 'click', () => {
		form.classList.toggle('visible');
	} );
} ) ();
