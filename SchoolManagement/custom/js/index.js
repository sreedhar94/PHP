$('.dropdown').hover(function(){ 
 	$('.dropdown-toggle', this).trigger('click'); 
});
$(document).ready(function() {
    $('#membersData').DataTable();
} );

