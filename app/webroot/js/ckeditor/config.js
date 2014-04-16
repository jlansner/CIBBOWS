/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.toolbarGroups = [
//		{ name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'document',    groups: [ 'mode' ] },
//		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'clipboard',   groups: [ 'clipboard' ] },
//		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		'/',
		{ name: 'links' },
//		{ name: 'insert' },
//		{ name: 'tools' },
//		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
		'/',
		{ name: 'styles' },
//		{ name: 'colors' },
//		{ name: 'about' },
		{ name: 'others' },
		{ name: 'insert'}
	];
//	config.filebrowserBrowseUrl = '/js/filemanager/index.html';
//    config.filebrowserImageBrowseUrl = '/js/filemanager/index.html?type=Images';
//    config.filebrowserUploadUrl = '/js/filemanager/connectors/php/filemanager.php';


	config.filebrowserBrowseUrl = '/js/ckfinder/ckfinder.html';

};
