describe('Settings', () => {

	it('can centre align site', () => {
		cy.adjustAlignment('center');
	});
	
	it('can left align site', () => {
		cy.adjustAlignment('left');
	});

	it('can set site width to 1024px', () => {
		cy.setSiteWith(1024);
	});
	
	it('can set site width to 960px', () => {
		cy.setSiteWith(960);
	});

	it('can set site width to 768px', () => {
		cy.setSiteWith(768);
	});	

	it('can set site width to 580px', () => {
		cy.setSiteWith(580);
	});

});

