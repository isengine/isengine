<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Local;
use is\Helpers\Parser;
use is\Helpers\Paths;
use is\Masters\View;
use is\Components\Uri;

$view = View::getInstance();
$uri = Uri::getInstance();

$path = $uri->getData('collection') . ':' . $uri->getData('parents') . ':' . $uri->getData('name');
Local::createFolder(DI . Paths::toReal($path) . DS);

?>
<!-- jQuery -->
<script src="/assets/isjs.min.js"></script>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
<script src="/plugins/eissasoubhi/summernote-gallery.min.js" type="text/javascript"></script>
<!-- CodeMirror 5.60.0 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/htmlmixed/htmlmixed.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- Page specific script -->
<!-- Bootstrap Switch -->
<script src="/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Mediamanager -->
<script src="/plugins/mediamanager/dropzone.min.js"></script>
<script src="/plugins/mediamanager/mediamanager.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
	
	var glob = new is.View.Globals();
	
	$("input[data-bootstrap-switch]").each(function(){
		$(this).bootstrapSwitch('state', $(this).prop('checked'));
	});
	
	var content = <?= Parser::toJson($view->get('vars|content')); ?>;
	//console.log(collection);
	
	$('div[type="adminlte-form-editor-array"] input').each(function(){
		let i = $(this);
		let p = i.parent();
		
		let group = $("<div class=\"row mb-1\"></div>");
		let inner = $("<div class=\"col-auto\"><button class=\"btn btn-sm text-white adminlte-form-editor-array-remove\" type=\"button\"><i class=\"fas fa-trash\"></i></button></div>");
		
		i.appendTo(group);
		inner.appendTo(group);
		group.appendTo(p);
	});
	
	$('.adminlte-form-editor-array-add').click(function(){
		let name = $(this).attr('for');
		let target = $(this).siblings('#' + name).first();
		let element = target.children().last().clone();
		//element.val(null).attr('value', null);
		element.find('input').val(null).attr('value', null);
		element.appendTo(target);
	});
	
	$('body').on('click', '.adminlte-form-editor-array-remove', function(){
		let n = $(this).parents('div[type="adminlte-form-editor-array"]').children('.row').length;
		if (n > 1) {
			$(this).parents('.row').first().empty().remove();
		}
	});
	
	// Initialize Media Manager with minimal options
	var mediamanager = new Mediamanager({
		loadItemsUrl: '/api/adminlte/getitems/?path=<?= $path; ?>',
		uploadUrl: '/api/adminlte/putitems/?path=<?= $path; ?>',
		deleteItemUrl: '/api/adminlte/cutitems/?path=<?= $path; ?>'
	});
	
	$('.summernote').summernote({
		//airMode: true
		//['style', ['style']],
		//['fontstyle', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
		//['font', ['fontname', 'color', 'fontsize', 'height', 'paragraph']],
		//['para', ['ul', 'ol', 'table', 'hr']],
		//['special', ['undo', 'redo']],
		//['insert', ['media', 'video', 'link']],
		//['view', ['fullscreen', 'codeview', 'help']]
		dialogsInBody: true,
		toolbar: [
			['style', ['style']],
			['fontstyle', ['bold', 'italic', 'underline', 'clear']],
			['font', ['color', 'fontsize', 'paragraph']],
			['para', ['ul', 'ol', 'table', 'hr']],
			['insert', ['media', 'video', 'link']],
			['view', ['fullscreen', 'codeview', 'help']]
		],
		buttons: {
			media: function (context) {
				var ui = $.summernote.ui;
				
				// create button
				var button = ui.button({
					contents: '<i class="note-icon-picture"/>',
					tooltip: 'Media manager',
					click: function () {
						mediamanager.open();
						mediamanager.options.insertType = 'html';
						mediamanager.options.insert = function (data) {
							$('.summernote').summernote('insertNode', data);
						}
						// invoke insertText method with 'hello' on editor module.
						//context.invoke('editor.insertText', 'hello');
					}
				});
				
				// return button as jquery object
				return button.render();
			}
		},
		callbacks: {
			onChange: function(contents, editable) {
				$(this).html(contents);
				//console.log('onChange:', this);
			},
			onChangeCodeview: function(contents, editable) {
				$(this).html(contents);
				//console.log('onChange:', this);
			}
		}
	});
	
	// CodeMirror
	$('.codemirror').each(function(){
		CodeMirror.fromTextArea(this, {
			lineNumbers: true,
			lineWrapping: true,
			mode: "htmlmixed",
			theme: "material"
		});
	});
	
});
</script>