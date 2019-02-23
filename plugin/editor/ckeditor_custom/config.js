/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

  config.allowedContent = true;
  config.height = 300;
  config.removeButtons = 'Underline,Subscript,Superscript';
  config.filebrowserUploadUrl = g5_editor_url+"/imageUpload/upload.php";
};
