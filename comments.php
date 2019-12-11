<?php
/**
 * The template file for displaying the comments and comment form.
 *
 * @package WordPress
 * @subpackage Retro
 * @since 1.0.0
 */



$args = array(
	'walker'            => null,
	'max_depth'         => '',
	'style'             => 'ul',
	'callback'          => null,
	'end-callback'      => null,
	'type'              => 'all',
	'reply_text'        => 'Reply',
	'page'              => '',
	'per_page'          => '',
	'avatar_size'       => 32,
	'reverse_top_level' => null,
	'reverse_children'  => '',
	'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
	'short_ping'        => false,   // @since 3.6
	'echo'              => true     // boolean, default is true
);

wp_list_comments();

comment_form();
