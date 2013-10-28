<?php

require_once('./header.php');
require('./config.php'); // will produce a fatal error (E_COMPILE_ERROR) and stop the script
#include('./config.php'); // include will only produce a warning (E_WARNING) and the script will continue

if ($_POST) {
    $error = NULL;
    try {
        if (!isset($_POST['stripeToken'])) {
            throw new Exception("The Stripe Token was not generated correctly");
        }
        $result = createSub();
        addAddress($result->subscription(), $result->customer());
        redirect('confirm.php');
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;
//        redirect('?error=' . $e->getMessage());
    }

    if ($error == NULL) {
        $wildeQuotes = array(
            "A little sincerity is a dangerous thing, and a great deal of it is absolutely fatal.",
            "Always forgive your enemies; nothing annoys them so much.",
            "America is the only country that went from barbarism to decadence without civilization in between.",
            "I think that God in creating Man somewhat overestimated his ability.",
            "I am not young enough to know everything.",
            "Fashion is a form of ugliness so intolerable that we have to alter it every six months.",
            "Most modern calendars mar the sweet simplicity of our lives by reminding us that each day that passes is the anniversary of some perfectly uninteresting event.",
            "Scandal is gossip made tedious by morality."
        );

        echo "<h1>Here's your quote!</h1>";
        echo "<h2>" . $wildeQuotes[array_rand($wildeQuotes)] . "</h2>";
    } else {
        require_once('.600096/payment_form.php');
        echo "<script type=\"text/javascript\">$(\".payment-errors\").html(\"$error\");</script>";
    }
}
require('./footer.php');
?>

<?php

function createSub() {
    $stripeToken = $_POST['stripeToken'];

    $createSubParams = array(
        "planId" => $_POST['plan'],
        "customer" => array(
            "email" => $_POST['email'],
            "firstName" => $_POST['first_name'],
            "lastName" => $_POST['last_name'],
            "phone" => $_POST['phone']
        ),
        "card" => array(
            "tmp_token" => $stripeToken
    ));
    if (isset($_POST['coupon_id'])) {
        $createSubParams['coupon'] = $_POST['coupon_id'];
    }
    $result = ChargeBee_Subscription::create($createSubParams);
    return $result;
}

require('./redirect.php');
?>

<?php

function addAddress($subscription, $customer) {
    $result = ChargeBee_Address::update(array(
                "subscriptionId" => $subscription->id,
                "label" => "shipping_address",
                "firstName" => $customer->firstName,
                "lastName" => $customer->lastName,
                "addr" => $_POST['addr'],
                "extended_addr" => $_POST['extended_addr'],
                "city" => $_POST['city'],
                "state" => $_POST['state'],
                "zip" => $_POST['zip_code']
    ));
    $address = $result->address();
    return $address;
}
?>