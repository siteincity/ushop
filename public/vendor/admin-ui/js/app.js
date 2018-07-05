$.app = {};

(function($){

	$.appConfirm = function(content, options) {

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



// (function($){
	
// 	$.fn.appInputImage = function(options) {
	  	
// 		var settings = $.extend({

// 	    	container: $('.preview')

// 	    }, options);

// 	  	this.on('change', function() {
// 			if (this.files) {
				
// 	            for (i = 0; i < this.files.length; i++) {
// 	            	var file = this.files[i];
// 	                var reader = new FileReader();
// 	                reader.onload = function(e) {
// 	                    var image = '<img src="'+e.target.result+'" data-name="'+file.name+'" alt=""/>';
// 	                    settings.container.html(image);  
// 	                }
// 	                reader.readAsDataURL(file);
// 	            }

// 		    }
// 	    })

// 	};
	
// 	$.app.appProductGallery = {
// 		init: function(options){ 
			
// 			var settings = $.extend({

// 	    	}, options);

// 			return this.each(function(){
				
// 				var _this = $.app.appProductGallery;
// 				var element = $(this);
// 				var id = 0;

// 				_this.makeItem(id).remove('.button-remove').appendTo(element);
// 				_this.setActions($(this).find('.apg-item'));	
				
// 				_this.buttonAdd().on('click', function(){
// 					var item = _this.makeItem(id).appendTo(element);
// 					_this.setActions(item);
// 					id = _this.setNext(id);
// 				}).appendTo($(this).find('.apg-item'));
	
// 			})

// 		},
// 		makeItem: function(id){
// 			var item = $('<div/>', {class: 'apg-item form-group', 'data-id': id});
// 			var inputFile = $('<input/>', {class: 'form-control app-input__file', type: 'file', name: 'images['+id+'][image]'});
// 			var inputText = $('<input/>', {class: 'form-control app-input__text', type: 'text', name: 'images['+id+'][title]'});
// 			var preview = $('<div/>', {class: 'item-preview'});
// 			var buttonRemove = $('<button/>', {class: 'app-btn btn button-remove btn-sm btn-danger', type: 'button'}).html('<i class="fa fa-minus-circle"></i>');

// 			return item.append([inputFile, inputText, preview, buttonRemove]);
// 		},
// 		setActions: function(item){
// 			item.find('input[type="file"]').appInputImage({
// 				container: item.find('.item-preview')
// 			});
// 			item.find('.button-remove').on('click',function(){
// 				item.remove();	
// 			});
// 			return item;
// 		},
// 		setNext: function(id){ 
// 			return id + 1;
// 		},
// 		buttonAdd: function(){ 
// 			return $('<button/>', {class: 'btn btn-success button-add btn-sm', type: 'button'}).html('<i class="fa fa-plus-circle"></i>');
// 		},
// 	};

// 	$.fn.appProductGallery = function(method) {
// 		if ($.app.appProductGallery[method]) {
// 			return $.app.appProductGallery[method].apply(this, Array.prototype.slice.call(arguments, 1));
// 		} else if (typeof method === 'object' || !method) {
// 			return $.app.appProductGallery.init.apply(this, arguments);
// 		} else {
// 			$.error('Метод ' +  method + ' в jQuery.appProductGallery не существует');
// 		}   
// 	};

// })(jQuery);


(function($){
	
	$.fn.appInputImage = function(options) {
	  	
		var settings = $.extend({
	    	container: {}
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
	
	$.app.appProductGallery = {
		init: function(options){ 
			
			var settings = $.extend({

	    	}, options);

			return this.each(function(){
				
				
	
			})

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







