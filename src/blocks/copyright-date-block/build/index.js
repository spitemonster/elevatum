import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit.js';
import '@wordpress/i18n';
import '@wordpress/block-editor';

var $schema = "https://schemas.wp.org/trunk/block.json";
var apiVersion = 3;
var name = "create-block/copyright-date-block";
var version = "0.1.0";
var title = "Copyright Date Block";
var category = "widgets";
var icon = "smiley";
var description = "Example block scaffolded with Create Block tool.";
var example = {
};
var supports = {
	html: false
};
var textdomain = "copyright-date-block";
var editorScript = "file:./index.js";
var render = "file:./render.php";
var viewScript = "file:./view.js";
var metadata = {
	$schema: $schema,
	apiVersion: apiVersion,
	name: name,
	version: version,
	title: title,
	category: category,
	icon: icon,
	description: description,
	example: example,
	supports: supports,
	textdomain: textdomain,
	editorScript: editorScript,
	render: render,
	viewScript: viewScript
};

/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType(metadata.name, {
  /**
   * @see ./edit.js
   */
  title: metadata.title,
  edit: Edit
});
