 // delete from database
  $(document).on('click', '#delete', function(){
  	var id = $(this).data('id');
  	$clicked_btn = $(this);
  	$.ajax({
  	  url: '../deleteRow.php',
  	  type: 'GET',
  	  data: {
    	'delete': 1,
    	'user_id': id,
      },
      success: function(response){
        // remove the deleted 
        $clicked_btn.parent().remove();
        
      }
  	});
  });
//   var edit_id;
