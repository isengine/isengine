<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;

use is\Components\Globals;

$globals = Globals::getInstance();

$catalog = $globals -> get('catalog');

if (!$catalog) {
	return;
}

?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
<script>
$(function () {
	
	var catalog = <?= Parser::toJson($catalog); ?>;
	console.log(catalog);
	console.log(<?= $globals -> get('catalog-settings'); ?>);
	
	$("#jsGrid").jsGrid({
		
		width: "100%",
		height: "auto",
		
		heading: true,
		inserting: false,
		editing: false,
		filtering: true,
		sorting: true,
		paging: true,
		autoload: true,
		pageSize: 15,
		pageButtonCount: 5,
		
        pagerFormat: "{first} {prev} {pages} {next} {last}",
        pagePrevText: "<i class=\"bi bi-chevron-left\"></i>",
        pageNextText: "<i class=\"bi bi-chevron-right\"></i>",
        pageFirstText: "<i class=\"bi bi-chevron-double-left\"></i>",
        pageLastText: "<i class=\"bi bi-chevron-double-right\"></i>",
		
		data: catalog,
		controller: {
			loadData: function(filter) {
				return $.grep(catalog, function(element) {
					var r = 1;
					$.each(element, function(i) {
						let f = filter[i];
						let e = element[i];
						let v = (typeof(e) === "object" && e !== null) ? JSON.stringify(e) : (!e ? "" : "" + e);
						
						r = r ? !f || (f && v.toLowerCase().indexOf(typeof(f) === "string" ? f.toLowerCase() : f) + 1) ? 1 : 0 : 0;
					});
					return r;
				});
			}
		},
		onRefreshed: function(i) {
			is.App.fn.refresh(view);
		},
		//onDataLoaded: function() {
		//	is.App.fn.refresh(view);
		//},
		//onPageChanged: function() {
		//	is.App.fn.refresh(view);
		//},
		
		//onDataLoading:    function(args) { console.log("a"); }, // before controller.loadData
		//onDataLoaded:     function(args) { console.log("b"); }, // on done of controller.loadData
		//onError:          function(args) { console.log("c"); }, // on fail of any controller call
		//onInit:           function(args) { console.log("d"); }, // after grid initialization 
		//onItemInserting:  function(args) { console.log("e"); }, // before controller.insertItem
		//onItemInserted:   function(args) { console.log("f"); }, // on done of controller.insertItem
		//onItemUpdating:   function(args) { console.log("g"); }, // before controller.updateItem
		//onItemUpdated:    function(args) { console.log("h"); }, // on done of controller.updateItem
		//onItemDeleting:   function(args) { console.log("i"); }, // before controller.deleteItem
		//onItemDeleted:    function(args) { console.log("j"); }, // on done of controller.deleteItem
		//onItemInvalid:    function(args) { console.log("k"); }, // after item validation, in case data is invalid
		//onOptionChanging: function(args) { console.log("l"); }, // before changing the grid option
		//onOptionChanged:  function(args) { console.log("m"); }, // after changing the grid option
		//onPageChanged:    function(args) { console.log("n"); }, // after changing the current page    
		//onRefreshing:     function(args) { console.log("o"); }, // before grid refresh
		//onRefreshed:      function(args) { console.log("p"); }, // after grid refresh
		
		fields: <?= $globals -> get('catalog-settings'); ?>
		
	});
	
});
</script>