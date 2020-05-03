describe('Post page', () => {

	it('can show author', () => {
		cy.showOnPost('author');
	});
	
	it('can hide author', () => {
		cy.hideOnPost('author');
	});
	
	it('can show date', () => {
		cy.showOnPost('date');
	});
	
	it('can hide date', () => {
		cy.hideOnPost('date');
	});
	
	it('can show tags', () => {
		cy.showOnPost('tags');
	});
	
	it('can hide tags', () => {
		cy.hideOnPost('tags');
	});
	
	it('can show categories', () => {
		cy.showOnPost('categories');
	});
	
	it('can hide categories', () => {
		cy.hideOnPost('categories');
	});

	it('can show pagination', () => {
		cy.adjustPagination('show');
	});

	it('can hide pagination', () => {
		cy.adjustPagination('hide');
	});

});