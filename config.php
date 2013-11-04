<?php
  //Add Chargebee libs path 
  require_once('./chargebee/lib/ChargeBee.php');
  //Set the Chargebee SiteName and Apikey
  ChargeBee_Environment::configure("rrcb-test", "jaGdadHeCQxfmFQG2sEgSrzHdyt23cwcd");
  //Set the Stipe public key
  $stripeKey = "pk_0JnWIhqJzGlI647YBLoEtt2YqqpAc";
?>