// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************

Cypress.Commands.add("login", () => {
	cy.viewport(1400, 2000);
	cy.visit("/wp-admin");
	cy.wait(500);
	cy.get("#user_login").type("admin");
	cy.get("#user_pass").type("password");
	cy.get("#wp-submit").click();
});

Cypress.Commands.add("checkThemeActivation", (slug) => {
	cy.viewport(1200, 2000);
	cy.visit("/wp-admin/themes.php");
	cy.wait(500);
	cy.get("body").then(($body) => {
		if ($body.find('div[data-slug="' + slug + '"] a.activate').length > 0) {
			cy.get('div[data-slug="' + slug + '"] a.activate').click();
		}
	});
});

Cypress.Commands.add("adjustAlignment", (alignment) => {
	cy.login();
	cy.visit("/wp-admin/customize.php");
	cy.get("#accordion-panel-smntcs_retro_theme_options_section").click();

	if (alignment == "center") {
		cy.get("#_customize-input-smntcs_retro_centre_site").check();
	} else {
		cy.get("#_customize-input-smntcs_retro_centre_site").uncheck();
	}

	cy.wait(500);
	cy.get("#save").click();
	cy.visit("/");
	cy.reload();

	if (alignment == "center") {
		cy.get("body").should("not.have.css", "margin-left", "0px");
	} else {
		cy.get("body").should("have.css", "margin-left", "0px");
	}
});

Cypress.Commands.add("setSiteWith", (int) => {
	cy.login();
	cy.visit("/wp-admin/customize.php");
	cy.get("#accordion-panel-smntcs_retro_theme_options_section").click();
	cy.get("#_customize-input-smntcs_retro_site_width-radio-" + int).check();
	cy.wait(500);
	cy.get("#save").click();
	cy.visit("/");
	cy.reload();
	cy.get("body").should("have.css", "max-width", int + "px");
});

Cypress.Commands.add("showOnArchive", (field) => {
	cy.login();
	cy.visit("/wp-admin/customize.php");
	cy.get("#accordion-panel-smntcs_retro_theme_options_section").click();
	cy.get("#_customize-input-smntcs_retro_archive_show_" + field).check();
	cy.wait(500);
	cy.get("#save").click();
	cy.visit("/");
	cy.reload();
	cy.get(".post-" + field);
});

Cypress.Commands.add("hideOnArchive", (field) => {
	cy.login();
	cy.visit("/wp-admin/customize.php");
	cy.get("#accordion-panel-smntcs_retro_theme_options_section").click();
	cy.get("#_customize-input-smntcs_retro_archive_show_" + field).uncheck();
	cy.wait(500);
	cy.get("#save").click();
	cy.visit("/");
	cy.reload();
	cy.get(".post-" + field).should("not.exist");
});

Cypress.Commands.add("showOnPost", (field) => {
	cy.login();
	cy.visit("/wp-admin/customize.php");
	cy.get("#accordion-panel-smntcs_retro_theme_options_section").click();
	cy.get("#_customize-input-smntcs_retro_post_show_" + field).check();
	cy.wait(500);
	cy.get("#save").click();
	cy.visit("/test-post");
	cy.reload();
	cy.get(".post-" + field);
});

Cypress.Commands.add("hideOnPost", (field) => {
	cy.login();
	cy.visit("/wp-admin/customize.php");
	cy.get("#accordion-panel-smntcs_retro_theme_options_section").click();
	cy.get("#_customize-input-smntcs_retro_post_show_" + field).uncheck();
	cy.wait(500);
	cy.get("#save").click();
	cy.visit("/test-post");
	cy.reload();
	cy.get(".post-" + field).should("not.exist");
});

Cypress.Commands.add("showOnPage", (field) => {
	cy.login();
	cy.visit("/wp-admin/customize.php");
	cy.get("#accordion-panel-smntcs_retro_theme_options_section").click();
	cy.get("#_customize-input-smntcs_retro_page_show_" + field).check();
	cy.wait(500);
	cy.get("#save").click();
	cy.visit("/test-page");
	cy.reload();
	cy.get(".post-" + field);
});

Cypress.Commands.add("hideOnPage", (field) => {
	cy.login();
	cy.visit("/wp-admin/customize.php");
	cy.get("#accordion-panel-smntcs_retro_theme_options_section").click();
	cy.get("#_customize-input-smntcs_retro_page_show_" + field).uncheck();
	cy.wait(500);
	cy.get("#save").click();
	cy.visit("/test-page");
	cy.reload();
	cy.get(".post-" + field).should("not.exist");
});

Cypress.Commands.add("adjustPagination", (alignment) => {
	cy.login();
	cy.visit("/wp-admin/customize.php");
	cy.get("#accordion-panel-smntcs_retro_theme_options_section").click();

	if (alignment == "show") {
		cy.get("#_customize-input-smntcs_retro_show_post_pagination").check();
	} else {
		cy.get("#_customize-input-smntcs_retro_show_post_pagination").uncheck();
	}

	cy.wait(500);
	cy.get("#save").click();
	cy.visit("/test-post");
	cy.reload();

	if (alignment == "show") {
		cy.get(".post-pagination");
	} else {
		cy.get(".post-pagination").should("not.exist");
	}
});
