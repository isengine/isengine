<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Masters\View;

$view = View::getInstance();

?>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- Page specific script -->
<!-- Bootstrap Switch -->
<script src="/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- jsGrid -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>

<script>
$(function () {
	
	$("input[data-bootstrap-switch]").each(function(){
		$(this).bootstrapSwitch('state', $(this).prop('checked'));
	});
	
	var content = <?= Parser::toJson($view->get('vars|content')); ?>;
	//console.log(collection);
	
	//var db = {
	//	loadData: function(filter) {
	//		return $.grep(data, function (group) {
	//			return (
	//				filter.courseId === undefined ||
	//				group.courseId === filter.courseId
	//			) && (
	//				!filter.endDate ||
	//				group.endDate.indexOf(filter.endDate) > -1);
	//		});
	//	}
	//}
	
	$('#jsGridOptions .bootstrap-switch').on('switchChange.bootstrapSwitch', function (event, state) {
		let name = $(event.target).attr('name');
		$("#jsGrid").jsGrid("option", name, state);
	}); 
	
	$('#jsGridVisible .bootstrap-switch').on('switchChange.bootstrapSwitch', function (event, state) {
		let name = $(event.target).attr('name');
		$("#jsGrid").jsGrid("fieldOption", name, "visible", state);
	}); 
	
	$("#jsGridOptions input").change(function() {
		let name = $(this).attr('name');
		let val = $(this).val();
		$("#jsGrid").jsGrid("option", name, val);
	});
		
	$("#jsGrid").jsGrid({
		width: "100%",
		height: "auto",
		
		/*
		height: "100%",
		heading: true,
		inserting: true,
		editing: true,
		filtering: true,
		sorting: true,
		paging: true,
		autoload: true,
		pageSize: 15,
		pageButtonCount: 5,
		*/
		
		heading:   $('#jsGridOptions input[name="heading"]'  ).attr('checked') === 'checked',
		inserting: $('#jsGridOptions input[name="inserting"]').attr('checked') === 'checked',
		editing:   $('#jsGridOptions input[name="editing"]'  ).attr('checked') === 'checked',
		filtering: $('#jsGridOptions input[name="filtering"]').attr('checked') === 'checked',
		sorting:   $('#jsGridOptions input[name="sorting"]'  ).attr('checked') === 'checked',
		paging:    $('#jsGridOptions input[name="paging"]'   ).attr('checked') === 'checked',
		pageSize:  $('#jsGridOptions input[name="pageSize"]').val(),
		
		deleteConfirm: function(item) {
		    return "The row \"" + item.Name + "\" will be removed. Are you sure?";
		},
		
		data: content,
		controller: {
			
			loadData: function(filter) {
				return $.grep(content, function(element) {
					var r = 1;
					$.each(element, function(i) {
						let f = filter[i];
						let e = element[i];
						let v = (typeof(e) === "object" && e !== null) ? JSON.stringify(e) : (!e ? "" : "" + e);
						
						r = r ? !f || (f && v.toLowerCase().indexOf(f.toLowerCase()) + 1) ? 1 : 0 : 0;
					});
					return r;
				});
			},
			
			insertItem: function(insertingClient) {
				this.clients.push(insertingClient);
			},
			
			updateItem: function(updatingClient) { },
			
			deleteItem: function(deletingClient) {
				var clientIndex = $.inArray(deletingClient, this.clients);
				this.clients.splice(clientIndex, 1);
			}
			
		},
		
		fields: <?= Parser::toJson(Objects::add($view->get('vars|columns'), $view->get('vars|keys'))); ?>
		/*
		data: db.clients,
		controller: db,
		fields: [
			{ name: "Name", type: "text", width: 150 },
			{ name: "Age", type: "number", width: 50 },
			{ name: "Address", type: "text", width: 200 },
			{ name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
			{ name: "Married", type: "checkbox", title: "Is Married" },
			{ name: "control", type: "control" }
		]
		*/
	});
	
	$('#jsGridVisible input').each(function(){
		let name = $(this).attr('name');
		let val = $(this).attr('checked') === 'checked';
		$("#jsGrid").jsGrid("fieldOption", name, "visible", val);
	});
	
	//$("#jsGrid").jsGrid(
	//	"fieldOption",
	//	"control",
	//	"visible",
	//	 $('#jsGridVisible input[name="control"]').attr('checked') === 'checked'
	//);
	
});
</script>