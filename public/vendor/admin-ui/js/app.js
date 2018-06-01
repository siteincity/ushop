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







