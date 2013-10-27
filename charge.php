<?php
  require_once('./header.php');

  if ($_POST) {
    $error = NULL;
    try {
      if (!isset($_POST['stripeToken']))
        throw new Exception("The Stripe Token was not generated correctly");
        $result = ChargeBee_Subscription::create(array(
          "planId" => "agency", 
          "card" => array(
            "tmp_token" =>  $_POST['stripeToken']
          )
          ));
    }
    catch (Exception $e) {
      $error = $e->getMessage();
    }

    if ($error == NULL) {
      require_once('./confirm.php');
    }
    else {
      require_once('./payment_form.php');
      echo "<script type=\"text/javascript\">$(\".payment-errors\").html(\"$error\");</script>";
    }
  }
  require_once('./footer.php');
?>