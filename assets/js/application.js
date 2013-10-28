jQuery.validator.setDefaults({
    errorClass  : "text-danger",
    errorElement: "small"
});

// this identifies your website in the createToken call below
function subscribeErrorHandler(jqXHR, textStatus, errorThrown) {
    var resp = JSON.parse(jqXHR.responseText);
    if('error_param' in resp) {
        var errParam = jqXHR.responseJSON.error_param;
        $("#subscribe-form").validate().showErrors({errParam:errMsg});
    }
    var errMsg = jqXHR.responseJSON.error_msg;
    $(".alert-danger").show().find("b").text(errMsg);
}

function subscribeResponseHandler(responseJSON) {
    window.location.replace(responseJSON.forward);
}

function stripeErrorDisplayHandler(response) {
   //card field map
    var errorMap = {
        "number": "card-number",
        "cvc": "card-cvc",
        "exp_month": "card-expiry-month",
        "exp_year": "card-expiry-year"
    };
    //check if param exist in error
    if (response.error.param) {
        var paramClassName = errorMap[response.error.param];
        if (paramClassName) {
            //display error in found class
            $('.' + paramClassName)
                    .parents('.form-group')
                    .find('.text-danger')
                    .text(response.error.message).show();
        } else {
            //print unknown error    
        }
    } else {
        //print unknown error
    }
}

function stripeResponseHandler(status, response) {
	if (response.error) {
        // re-enable the submit button
        $('.submit-button').removeAttr("disabled");
        // show the errors on the form
        stripeErrorDisplayHandler(response);
    } else {
        var form$ = $("#subscribe-form");
        // token contains id, last4, and card type
        var token = response['id'];
        // insert the token into the form so it gets submitted to the server
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                // and submit
        //form$.get(0).submit();
        var options = {
                error:       subscribeErrorHandler,  // post-submit callback 
                success:     subscribeResponseHandler,  // post-submit callback 
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                dataType:    'json'
        };
        form$.ajaxSubmit(options);
        return false;
    }
}

$(document).ready(function() {
    $("#subscribe-form").validate();
    
    $("#subscribe-form").submit(function(event) {
        // disable the submit button to prevent repeated clicks
        $('.submit-button').attr("disabled", "disabled");
        // createToken returns immediately - the supplied callback submits the form if there are no errors
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        return false; // submit from callback
    });
    
    $('#discount-form').on('submit', function(e) {
         var postData = $(this).serializeArray();
         var formURL = $(this).attr("action");
         $.ajax({
             url: "order_summary.php",
             type: "GET",
             data: postData,
             success: function(data, textStatus, jqXHR)
             {
                 var cpnFld = $("#subscribe-form").find("input[name='coupon']");
                 var couponCode = $("#discount-form").find("input[name='coupon']").val();
                 if(cpnFld.length == 0) {
                     $("#subscribe-form").append("<input type='hidden' name='coupon' value='" + couponCode + "' />");
                 } else {
                     cpnFld.val(couponCode);
                 }
                 $('#order_summary').html(data);
             },
             error: function(jqXHR, textStatus, errorThrown)
             {
                 $("#discount-form").validate().showErrors({"coupon":"Invalid coupon code."});
             }
         });
         e.preventDefault();
     });
    
});

$(document).ready(function(e){
 $('#phone').on('keyup', function(e) {
  this.value = this.value.replace(/[^0-9]/g,'');
});
$('#zip_code').on('keyup', function(e) {
  this.value = this.value.replace(/[^0-9]/g,'');
});
$('#card_no').on('keyup', function(e) {
  this.value = this.value.replace(/[^0-9]/g,'');
});

});
