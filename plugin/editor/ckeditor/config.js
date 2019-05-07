/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {

  	config.toolbarGroups = [
  		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
  		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
  		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
  		{ name: 'forms', groups: [ 'forms' ] },
  		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
  		{ name: 'colors', groups: [ 'colors' ] },
  		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
  		{ name: 'styles', groups: [ 'styles' ] },
  		{ name: 'links', groups: [ 'links' ] },
  		{ name: 'insert', groups: [ 'insert' ] },
  		{ name: 'tools', groups: [ 'tools' ] },
  		{ name: 'others', groups: [ 'others' ] },
  		{ name: 'about', groups: [ 'about' ] }
  	];

  	config.removeButtons = 'Save,NewPage,Preview,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Anchor,Flash,Smiley,SpecialChar,PageBreak,Iframe,ShowBlocks,Maximize,About,Subscript,Superscript,Blockquote,CreateDiv,Language,Styles,BidiLtr,BidiRtl,Templates';

	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserUploadUrl = g5_editor_url+"/imageUpload/upload.php";
	config.filebrowserUploadMethod = 'form';
};
