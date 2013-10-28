<?php

require('./config.php');
require('./redirect.php');

if ($_POST) {
    $error = NULL;
    try {
        if (!isset($_POST['stripeToken'])) {
            throw new Exception("The Stripe Token was not generated correctly");
        }
        $result = createSub();
        addAddress($result->subscription(), $result->customer());
        echo "{'forward': 'thankyou.php'}";
    } catch (ChargeBee_APIError $e) {
        $jsonError = $e->getJsonObject();
        header("HTTP/1.0 400 Error");
        print(json_encode($jsonError, true));
    }
}
?>

<?php

function createSub() {
    $stripeToken = $_POST['stripeToken'];
    $createSubParams = array(
        "planId" => $_POST['plan'],
        "customer" => array(
            "email" => $_POST["email"],
            "firstName" => $_POST["first_name"],
            "lastName" => $_POST["last_name"],
            "phone" => $_POST["phone"]
        ),
        "card" => array(
            "tmp_token" => $stripeToken
    ));
    if (isset($_POST['coupon'])) {
        $createSubParams['coupon'] = $_POST['coupon'];
    }
    $result = ChargeBee_Subscription::create($createSubParams);
    return $result;
}

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