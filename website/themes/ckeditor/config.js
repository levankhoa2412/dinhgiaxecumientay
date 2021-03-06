/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	 config.language = 'vi';
    config.enterMode = CKEDITOR.ENTER_BR;
	// config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = '/StoreManager/admin/themes/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = '/StoreManager/admin/themes/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = '/StoreManager/admin/themes/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = '/StoreManager/admin/themes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '/StoreManager/admin/themes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = '/StoreManager/admin/themes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};

