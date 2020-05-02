// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************

Cypress.Commands.add('login', () => {
	cy.viewport(1400, 2000);
	cy.visit('/wp-admin');
	cy.wait(500);
	cy.get('#user_login').type('admin');
	cy.get('#user_pass').type('password');
	cy.get('#wp-submit').click();
});

Cypress.Commands.add('checkThemeActivation', slug => {
	cy.viewport(1200, 2000);
	cy.visit('/wp-admin/themes.php');
	cy.wait(500);
	cy.get('body').then($body => {
		if ( $body.find('div[data-slug="' + slug + '"] a.activate').length > 0) {
			cy.get('div[data-slug="' + slug + '"] a.activate').click();
		}
	});
});

Cypress.Commands.add('setAlignment', (alignment) => {
		cy.login();
		cy.visit('/wp-admin/customize.php');
		cy.get('#accordion-section-smntcs_retro_theme_options_section').click();

		if ( alignment == 'center') {
			cy.get('#_customize-input-smntcs_retro_centre_site').check();
		} else {
			cy.get('#_customize-input-smntcs_retro_centre_site').uncheck();
		}

		cy.wait(500);
		cy.get('#save').click();
		cy.visit('/');
		cy.reload();

		if ( alignment == 'center') {
			cy.get('body').should('not.have.css', 'margin-left', '0px');
		} else {
			cy.get('body').should('have.css', 'margin-left', '0px');
		}
});

Cypress.Commands.add('setSiteWith', int => {
	cy.login();
	cy.visit('/wp-admin/customize.php');
	cy.get('#accordion-section-smntcs_retro_theme_options_section').click();
	cy.get('#_customize-input-smntcs_retro_site_width-radio-' + int).check();
	cy.wait(500);
	cy.get('#save').click();
	cy.visit('/');
	cy.reload();
	cy.get('body').should('have.css', 'max-width', int + 'px');
});