describe('Regular page', () => {

	it('can show author', () => {
		cy.showOnArchive('author');
	});
	
	it('can hide author', () => {
		cy.hideOnArchive('author');
	});
	
	it('can show date', () => {
		cy.showOnArchive('date');
	});
	
	it('can hide date', () => {
		cy.hideOnArchive('date');
	});
	
	it('can show tags', () => {
		cy.showOnArchive('tags');
	});
	
	it('can hide tags', () => {
		cy.hideOnArchive('tags');
	});
	
	it('can show categories', () => {
		cy.showOnArchive('categories');
	});
	
	it('can hide categories', () => {
		cy.hideOnArchive('categories');
	});

});