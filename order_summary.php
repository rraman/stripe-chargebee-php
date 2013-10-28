<ul class="text-right list-unstyled">
<?php
  require_once('./config.php');
  require_once('./util.php');

  $plan = $_GET['plan'];
  //$addons = params("addons", explode('&', $_SERVER['QUERY_STRING']))

  if ($_GET) {
    $error = NULL;
    try {
        $subParams = array("planId" => $plan);
        if(isset($_GET['coupon']))
        {  
          $subParams["coupon"] = $_GET['coupon'];
        } 
        $result = ChargeBee_Estimate::createSubscription(array("subscription" => $subParams));
        $estimate = $result->estimate();
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
        <hr>
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
      echo $error;
    }
  }
?>
</ul>
<hr>
<div class="row">        	
  <div class="col-md-12">
    <p>Have coupon code?</p>
    <div class="input-group">
      <input type="text" class="form-control">
      <span class="input-group-btn">
          <button class="btn btn-info" type="button">Apply Coupon</button>
      </span>
    </div>
  </div>
</div>