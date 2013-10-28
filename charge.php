<?php

require_once('./header.php');
require('./config.php');
require('./redirect.php');

if ($_POST) {
    $error = NULL;
    try {
        if (!isset($_POST['stripeToken'])) {
            throw new Exception("The Stripe Token was not generated correctly");
        }
        $result = createSub();
        redirect('thankyou.php');
    } catch (Exception $e) {
        $error = $e->getMessage();
        redirect('?error=' . $e->getMessage());
    }

    if ($error == NULL) {
    } else {
        echo "<script type=\"text/javascript\">$(\".payment-errors\").html(\"$error\");</script>";
    }
}
require('./footer.php');
?>

<?php

function createSub() {
    $stripeToken = $_POST['stripeToken'];
    $plan = $_POST['plan'];
    $coupon = $_POST['coupon'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $result = ChargeBee_Subscription::create(array(
                "planId" => $plan,
                "coupon" => $coupon,
                "customer" => array(
                    "email" => $email,
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "phone" => $phone
                ),
                "card" => array(
                    "tmp_token" => $stripeToken
    )));
    return $result;
}

?>
