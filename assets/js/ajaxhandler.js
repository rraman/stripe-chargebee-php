$(document).ready(function() {
             $('#checkout_form').on('submit', function(e) {
                 var postData = $(this).serializeArray();
                 var formURL = $(this).attr("action");
                 $.ajax({
                     url: "order_summary.php",
                     type: "GET",
                     data: postData,
                     success: function(data, textStatus, jqXHR)
                     {
                         $('#order_summary').html(data);
                         //$('#checkout_form').html(data);    
                         
                     },
                     error: function(jqXHR, textStatus, errorThrown)
                     {
                         alert(textstatus);
                     }
                 });
                 e.preventDefault();
             });
});
