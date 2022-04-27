function timer(){
	var obj = document.getElementById('timer');
	obj.innerHTML--;
	
	if (obj.innerHTML == 0) {
		window.history.back();
		setTimeout(function(){}, 1000);
	} else {
		setTimeout(timer,1000);
	}
	
}
setTimeout(timer,1000);

document.getElementById('timer').onclick = function(){
	window.history.back();
	setTimeout(function(){}, 1000);
};
