<?php
  require_once('./topbar.php');
?>
<div class="navbar navbar-default navbar-static-top">
              <div class="container text-center">
                <div style="display:inline-block">                
                  <ul class="nav navbar-nav h4">
                    <li>
                      <a href="index.php">How it works</a>
                    </li>                                
                    <li>
                      <a href="subscribe.php">Subscribe</a>
                    </li>                    
                  </ul>
                </div>        
              </div>
            </div>
<div class="container">
	<div class="row">
    	<div class="col-sm-12">      
        	<div class="page-header">
            	<h3>Choose a subscription plan</h3>
            </div>
            <div class="well">
                <div class="row pricing-plan text-center">
                    <a href="subscribe.php?plan=quarterly" class="col-sm-4 col-xs-12">
                    	<img src="assets/images/plan1.gif" alt="">
                        <div class="h3">$8/Month</div>
                        <div class="h4">3 Months</div>
                        <div class="h4">You pay $24.00</div>
                        <div class="h4">&nbsp;</div>                        
                    </a>                    
                    <hr class="visible-xs">
                    <a href="subscribe.php?plan=half_yearly" class="col-sm-4 col-xs-12">
						<img src="assets/images/plan2.gif" alt="">
                        <div class="h3">$7/Month</div>
                        <div class="h4">6 Months</div>
                        <div class="h4">You pay $42.00</div>
                        <div class="h4">You save 15%</div>
                    </a>
                    <hr class="visible-xs">
                    <a href="subscribe.php?plan=annual" class="col-sm-4 col-xs-12">
                        <img src="assets/images/plan3.gif" alt="">
                        <div class="h3">$6/Month</div>
                        <div class="h4">1 Year</div>
                        <div class="h4">You pay $72</div>                       
                        <div class="h4">You save 25%</div>
                    </a>
                </div>            
            </div>    
        </div>
        <div class="row">
          	<div class="col-sm-12 text-center">
      	    	<h3>The comics you love. Unlimited access. One convenient subscription.</h3>
          	</div>
          </div>
    </div>
</div>    

<?php
  require_once('./footer.php');
?>
