$(function(){
    
    
    var t = 300; // Default animation timer    
 

    $('.app-grid .btn-delete').on('click', function(){	    
    	var id = $(this).data('id')
	    $.ajax({
	        method: 'POST',
	        url: _current_url + '/' + id,
	        data: {
	            _method: 'DELETE',
	            _token: _token,
	        },
	        success: function (data) {
	            location.reload();
	        }
	    });
    })


    

   
     
     
 
})