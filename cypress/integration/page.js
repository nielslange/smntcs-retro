describe('Regular page', () => {

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
	
	it.skip('can show tags', () => {
		cy.showOnPage('tags');
	});
	
	it.skip('can hide tags', () => {
		cy.hideOnPage('tags');
	});
	
	it.skip('can show categories', () => {
		cy.showOnPage('categories');
	});
	
	it.skip('can hide categories', () => {
		cy.hideOnPage('categories');
	});

});