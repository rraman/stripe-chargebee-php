// this identifies your website in the createToken call below
function subscribeErrorHandler(jqXHR, textStatus, errorThrown) {
    
}

function subscribeResponseHandler(responseText, statusText, xhr, $form) {
    
}

function stripeResponseHandler(status, response) {
	if (response.error) {
        // re-enable the submit button
        $('.submit-button').removeAttr("disabled");
        // show the errors on the form
        $(".payment-errors").html(response.error.message);
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
});
