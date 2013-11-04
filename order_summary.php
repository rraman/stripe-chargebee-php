<div class="row">
<div class="col-xs-12">
<div class="row">
	<div class="col-sm-12">
      <div class="page-header"><h3>Your Order Summary</h3></div>
  	</div>
</div>
<div class="row">
	<div class="col-sm-12">

<ul class="text-right list-unstyled">
<?php
  require_once('./config.php');
  require_once('./util.php');
  //Get plan Id 
  $plan = $_GET['plan'];
  //$addons = params("addons", explode('&', $_SERVER['QUERY_STRING']))

  if ($_GET) {
    $error = NULL;
    try {
        //Set All the requierd values for creating the chargebee subscription in an array
        $subParams = array("planId" => $plan);
        if(isset($_GET['coupon']))
        {  
          $subParams["coupon"] = $_GET['coupon'];
        } 
        //Request for estimation of cost if the subscription is created with that select plan, coupon, etc to show it to the
        $result = ChargeBee_Estimate::createSubscription(array("subscription" => $subParams));
        $estimate = $result->estimate();
        //Display the estimate result
        foreach($estimate->lineItems as $li)
        {
          ?>
           <li class="row">
                <span class="col-xs-8 hellip"><?php echo $li->description; ?></span>
                <span class="col-xs-4">$<?php echo number_format($li->amount/100, 2, '.', ''); ?></span>
            </li>
        <?php
        }
        if(isset($estimate->discounts)) 
        {
          foreach($estimate->discounts as $disc)
          {
        ?>
        <li class="row">
              <span class="col-xs-8 hellip"><?php echo $disc->description; ?></span>
              <span class="col-xs-4">$<?php echo number_format($disc->amount/100, 2, '.', ''); ?></span>
          </li>
        <?php
        }
        
        }
        ?>
        <hr class="dashed">
        <li class="row">
            <h4>
            	<strong class="col-xs-8 hellip">Order Total</strong>
            	<strong class="col-xs-4">$ <?php echo number_format($estimate->amount/100, 2, '.', ''); ?></strong>
          	</h4>                            
        </li>
        <?php
    }
    catch (Exception $e) 
    {
      $error = $e->getMessage();
      header("HTTP/1.0 400 Error");
    }
  }
?>
</ul>
<hr>
<?php
  if(!isset($_GET['coupon']))
  {
    ?>
    <div class="row">
      <div class="col-md-12">
        <p>Have coupon code?</p>
        <form id="discount-form" action="order_summary.php" method="GET">
        <input type="hidden" name="plan" value="<?php echo $plan ?>">
        <div class="input-group">
          <input id="coupon" type="text" class="form-control" name="coupon">
          <span class="input-group-btn">
          <input class="btn btn-info" type="submit" value="Apply Coupon">
          </span>
        </div>
        <h6 class="coupon_process process" style="display:none;">Processing&hellip;</h6>
        <small for="coupon" class="text-danger"></small>
        </form>
      </div>
    </div>    
<?php
  }
?>
  </div>
</div>
</div>
</div>