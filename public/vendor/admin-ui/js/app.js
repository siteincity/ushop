$.app = {};

(function($){

	$.appConfirm = function(content, options) {
	  	
		var settings = $.extend({
			content: '',
	    }, options);
 		
 		return confirm(content);

	};

})(jQuery);


(function($){

	$.appMessage = function(content, options) {
	  	
		var settings = $.extend({

			type: 'success',
			title: '',
			content: ''

	    }, options);

	    toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"showDuration": 10,
		}

		return toastr[settings.type](content);

	};

})(jQuery); 



(function($){
	
	$.app.appProductGallery = {
		init: function(options){ 
			
			return this.each(function(){
				
				var _this = $.app.appProductGallery;
				var element = $(this);
				var id = 0;

				_this.setActions($(this).find('.apg-item'));	
				
				_this.buttonAdd().on('click', function(){
					var item = _this.makeItem(id).appendTo(element);
					_this.setActions(item);
					id = _this.setNext(id);
				}).prependTo(element);
	
			})

		},
		makeItem: function(id){
			var num = $('<div/>', {class: 'apg-num'}).text(id);
			var item = $('<div/>', {class: 'apg-item', 'data-id': id});
			var inputFile = $('<input/>', {class: 'form-control app-input__file', type: 'file', name: 'images['+id+'][image]'});
			var inputText = $('<input/>', {class: 'form-control app-input__text', type: 'text', name: 'images['+id+'][title]'});
			var preview = $('<div/>', {class: 'item-preview'});
			var buttonRemove = $('<button/>', {class: 'btn btn-danger button-remove', type: 'button'}).text('remove');
			item.append(inputFile).append(inputText).append(preview).append(buttonRemove).append(num);
			return item;
		},
		setActions: function(item){
			item.find('input[type="file"]').appInputImage({
				container: item.find('.item-preview')
			});
			item.find('.button-remove').on('click',function(){
				item.remove();	
			});
			return item;
		},
		setNext: function(id){ 
			return id + 1;
		},
		buttonAdd: function(id){ 
			return $('<button/>', {class: 'btn btn-default api-button-add', type: 'button'}).text('add');
		},
	};

	$.fn.appProductGallery = function(method) {
		if ($.app.appProductGallery[method]) {
			return $.app.appProductGallery[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || !method) {
			return $.app.appProductGallery.init.apply(this, arguments);
		} else {
			$.error('Метод ' +  method + ' в jQuery.appProductGallery не существует');
		}   
	};

})(jQuery);


(function($){

	$.fn.appInputImage = function(options) {
	  	
		var settings = $.extend({

	    	container: $('.preview'),
	    	before: function(){},
	    	success: function(){}

	    }, options);

	  	this.on('change', function() {
			if (this.files) {
				
	            for (i = 0; i < this.files.length; i++) {
	            	var file = this.files[i];
	                var reader = new FileReader();
	                reader.onload = function(e) {
	                    var image = '<img src="'+e.target.result+'" data-name="'+file.name+'" alt=""/>';
	                    settings.container.html(image);  
	                }
	                reader.readAsDataURL(file);
	            }

		    }
	    })

	};

})(jQuery);


(function($){

	$.fn.appButtonDelete = function(options) {
	  	
		var settings = $.extend({

	    	token: '',
	    	confirm: {
	    		content: 'Вы уверены?',
	    	},
	    	before: function(){},
	    	success: function(){}

	    }, options);

	  	this.on('click', function(e) {
	    	e.preventDefault();

			var data = $(this).data();
	
			if ($.appConfirm(settings.confirm.content)) {
				
				$.ajax({
			        type: 'POST',
			        url: data.url,
			        dataType: 'json',
			        data: {
			            _method: 'DELETE',
			            _token: settings.token,
			        },
			        beforeSend: function(){
						if ($.isFunction(settings.before)) {
							settings.before.call(this);	
			        	}   
					},
			        success: function (data) {
			        	if ($.isFunction(settings.success) && data) {
							settings.success.call(this, data);	
			        	} 	
			        }
			    });

		    }	
			  
	    })

	};

})(jQuery); 







