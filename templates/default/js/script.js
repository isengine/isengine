// lazyload

lozad(".lazyload").observe();

// cart

var view = new is.View.Elements();
is.App.fn.refresh(view);

//if ( $("#catalog-cart-main [is-name]").length < Object.keys(cart).length ) {
//	document.location.reload();
//	Location.reload();
//}

// form-mask

$(".form-mask-phone").mask("+7 000 000-00-00");

// toast

/*
is.App.toast({
	"title" : "Bootstrap",
	"datetime" : "just now",
	"body" : "See? Just like this."
}, 2);

is.App.toast({
	"title" : "Bootstrap",
	"body" : "Heads up, toasts will stack automatically",
	"color" : "green"
});
*/

if (is.Helpers.Sessions.getCookie("order-complete")) {
	is.App.toast({
		"title" : "Заказ принят",
		"body" : "Ваш заказ принят в обработку",
		"color" : "orange"
	});
	is.Helpers.Sessions.unCookie("order-complete");
}

if (is.Helpers.Sessions.getCookie("login")) {
	is.App.toast({
		"title" : "Добро пожаловать",
		"body" : "Мы снова рады видеть Вас!",
		"color" : "orange"
	});
	is.Helpers.Sessions.unCookie("login");
}

if (is.Helpers.Sessions.getCookie("logout")) {
	is.App.toast({
		"title" : "До свидания",
		"body" : "Возвращайтесь скорее. Мы будем рады видеть Вас снова!",
		"color" : "orange"
	});
	is.Helpers.Sessions.unCookie("logout");
}

if (is.Helpers.Sessions.getCookie("register")) {
	is.App.toast({
		"title" : "Вы зарегистрированы",
		"body" : "Регистрация прошла успешно. Теперь вы должны получить письмо со ссылкой на активацию. Без активации Вы не сможете пользоваться личным кабинетом! Это сделано для защиты от мошенников. Приносим извинения за неудобства.",
		"color" : "orange"
	});
	is.Helpers.Sessions.unCookie("register");
}

if (is.Helpers.Sessions.getCookie("activate")) {
	is.App.toast({
		"title" : "Активация прошла успешно",
		"body" : "Вы можете войти в свой личный кабинет!",
		"color" : "orange"
	});
	is.Helpers.Sessions.unCookie("activate");
}
