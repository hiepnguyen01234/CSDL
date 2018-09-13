/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//+ Nếu muốn đổi skin cho ckeditor:
	//config.skin='office2003';  // có thể đổi thành 1 trong 3 giá trị sau: v2, kama, office2003 
	//+ Mặc định thì ckeditor sẽ chèn thẻ p vào trước phần văn bản của ta, nếu bạn muốn loại bỏ thẻ p này thì cho dòng code sau vào:
	config.enterMode = CKEDITOR.ENTER_BR;
	
	config.filebrowserBrowseUrl = 		'js/ckeditorStandard/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl =   'js/ckeditorStandard/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl =   'js/ckeditorStandard/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = 		'js/ckeditorStandard/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl =   'js/ckeditorStandard/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl =   'js/ckeditorStandard/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
