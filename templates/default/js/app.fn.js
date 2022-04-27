is.App.fn = class {
	
	static cart() {
		
		let cart = {};
		
		$.each(
			is.Helpers.Sessions.getCookie(),
			function(k, i){
				if (k.indexOf("catalog:") === 0) {
					cart[k] = parseFloat(i);
				}
			}
		);
		return cart;
		
	}
	
	static count() {
		
		let cart = is.App.fn.cart();
		let c = is.Helpers.Objects.len(cart);
		
		//console.log(is.Helpers.Sessions.getCookie());
		//console.log(cart);
		
		if (c) {
			$(".catalog-cart").removeClass("none");
			$(".catalog-cart-none").addClass("none");
			$("#block-collapse-cart__icons .icons-box span").removeClass("none").html(c);
			$(".bottom-nav .cart span").removeClass("none").html(c);
		} else {
			$(".catalog-cart").addClass("none");
			$(".catalog-cart-none").removeClass("none");
			$("#block-collapse-cart__icons .icons-box span").addClass("none").html("");
			$(".bottom-nav .cart span").addClass("none").html("");
		}
		
		let t = 0;
		
		$(".catalog-cart-main").first().find(".catalog-cart-item [is-data=\"sum\"]").each(function(){
			t = t + parseFloat($(this).html());
		});
		
		$(".catalog-cart-total .catalog-cart-total-count").html(c);
		$(".catalog-cart-total .catalog-cart-total-price").html(t);
		
	}
	
	static round(number, precision) {
		var factor = Math.pow(10, precision);
		var n = precision < 0 ? number : 0.01 / factor + number;
		return Math.round(n * factor) / factor;
	}
	
	static match(t, block, del = null) {
		
		let v = parseFloat(t.data("value:value"));
		//let step = parseFloat(t.data("step"));
		let first = block.find(".item-first");
		let second = block.find(".item-second");
		
		//v = Math.floor(v / step) * step;
		v = is.App.fn.round(v, 2);
		
		if (!v || v <= 0) {
			v = 0;
			first.removeClass("none");
			second.addClass("none");
			is.Helpers.Sessions.unCookie(t.name());
			//is.Helpers.Sessions.unSession(t.name());
			if (del) {
				block.each(function(){
					if ( $(this).is(".catalog-cart-item-delete") ) {
						$(this).remove();
					}
				});
			}
		} else {
			first.addClass("none");
			second.removeClass("none");
			is.Helpers.Sessions.setCookie(t.name(), v);
			//is.Helpers.Sessions.setSession(t.name(), v);
		}
		
		t.data("value:value", v);
		
		//t.data("sum", t.data("price") * v);
		//t.data("sum-old", t.data("price-old") * v);
		
		t.data("sum", is.App.fn.round(t.data("price") * v, 3));
		t.data("sum-old", is.App.fn.round(t.data("price-old") * v, 3));
		
		if (t.data("sum-old") && t.data("sum-old") > 0) {
			block.find(".sum-old").removeClass("xs-none").removeClass("none");
		} else {
			block.find(".sum-old").addClass("xs-none").addClass("none");
		}
		
		is.App.fn.count();
		
	}
	
	static refresh(defaults) {
		
		var cart = is.App.fn.cart();
		
		defaults.launch();
		//console.log(defaults.items);
		
		$.each(
			defaults.items,
			function(){
				
				let block = this._items;
				let name = this.name();
				let val = cart[name] ? parseFloat(cart[name]) : 0;
				
				this.data("value:value", val);
				this.value("step", (i) => i ? parseFloat(i) : 0);
				
				let step = this.data("step");
				let t = this;
				
				if (!step) {
					step = 1;
				}
				
				is.App.fn.match(t, block);
				
				this.action("buy", "click",
					function() {
						//console.log('+', step, name, t);
						t.data("value:value", step);
						
						if (!$(".catalog-cart-main").find("[is-name='" + name + "']").length) {
							let clone = t.clone(name, ".catalog-cart-template .catalog-cart-item");
							clone.find("img.lazyload").attr("srcset", "");
							clone.appendTo($(".catalog-cart-main"));
						}
						
						is.App.fn.match(t, block);
					}
				);
				
				this.action("del", "click",
					function() {
						t.data("value:value", "");
						is.App.fn.match(t, block, true);
					}
				);
				
				this.action("inc", "click",
					function() {
						t.value("value:value", (i) => i + step);
						is.App.fn.match(t, block);
					}
				);
				
				this.action("dec", "click",
					function() {
						t.value("value:value", (i) => i - step);
						is.App.fn.match(t, block, true);
					}
				);
				
				this.action("enter", "focusout",
					function() {
						let v = $(this).val();
						t.value("value:value", (i) => parseFloat(v));
						is.App.fn.match(t, block, true);
					}
				);
				
			}
		);
		
	}
	
}