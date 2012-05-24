/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
   config.filebrowserBrowseUrl = '/js/ckeditor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = '/js/ckeditor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = '/js/ckeditor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = '/js/ckeditor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = '/js/ckeditor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = '/js/ckeditor/kcfinder/upload.php?type=flash';
};
