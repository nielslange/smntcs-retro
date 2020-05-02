describe.only('Regular page', () => {

	it('can show author', () => {
		cy.showOnPage('author');
	});
	
	it('can hide author', () => {
		cy.hideOnPage('author');
	});
	
	it('can show date', () => {
		cy.showOnPage('date');
	});
	
	it('can hide date', () => {
		cy.hideOnPage('date');
	});
	
	it('can show tags', () => {
		cy.showOnPage('tags');
	});
	
	it('can hide tags', () => {
		cy.hideOnPage('tags');
	});
	
	it('can show categories', () => {
		cy.showOnPage('categories');
	});
	
	it('can hide categories', () => {
		cy.hideOnPage('categories');
	});

});