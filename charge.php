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
        $stripeToken = $_POST['stripeToken'];
        $plan = $_POST['plan_id'];
        $email = $_POST['email'];
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $phone = $_POST['phone'];

        $result = createSub($plan, $email, $firstName, $lastName, $phone, $stripeToken);
        header("Location: confirm.php");
        /* Redirect to a different page in the current directory that was requested */
//        $host = $_SERVER['HTTP_HOST'];
//        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
//        $extra = 'mypage.php';
//        header("Location: http://$host$uri/$extra");
    } catch (Exception $e) {
        $error = $e->getMessage();
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
        require_once('./payment_form.php');
        echo "<script type=\"text/javascript\">$(\".payment-errors\").html(\"$error\");</script>";
    }
}
require_once('./footer.php');
?>

<?php

function createSub($plan, $email, $firstName, $lastName, $phone, $stripeToken) {
    $result = ChargeBee_Subscription::create(array(
                "planId" => $plan,
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
