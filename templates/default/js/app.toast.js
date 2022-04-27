is.App.toast = function(obj, delay = 0) {
	
	if (!obj) {
		return;
	}
	
	let container = $(".toast-container").first();
	let toast = $(".toast-template").first().clone().removeClass("toast-template none");
	
	if (!obj.datetime) {
		let now = new Date();
		obj.datetime = now.getHours() + ":" + now.getMinutes();
	}
	
	$.each(obj, function(k, i){
		if (k === "color") {
			toast.find(".toast-icon").css("background-color", i);
		} else {
			toast.find(".toast-" + k).html(i);
		}
	});
	
	setTimeout(function(){
		
		toast.appendTo(container);
		
		new bootstrap.Toast(toast, {
			"animation" : true,
			"autohide" : false
		}).show();
		
	}, parseFloat(delay) * 1000);
	
}
