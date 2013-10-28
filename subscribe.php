<?php
  require_once('./header.php');
  require_once('./config.php');
  
  $plan = $_GET['plan'];
?>
<script>Stripe.setPublishableKey("<?php echo $stripeKey; ?>");</script>
<div class="row">	
  	<div class="col-sm-4 col-xs-12 pull-right" id="order_summary">
    	  <?php
    	  if(isset($plan)){
          include('order_summary.php');
        }
        ?>
        <div class="row">
        	<div class="col-sm-12">
            	<img src="assets/images/secure.png" alt="secure server"/>
                <div class="using">
                    <h3>Chargebee &amp; Stripe</h3>
                    <p>30 days payment return</p>
                </div>
            </div>
     	</div>
      </div>
      <div class="clearfix visible-xs"></div>
      <div class="col-sm-7" id="checkout_info">            
          <div class="row">
          	<div class="col-sm-12">
                  <div class="page-header"><h3>Hey! There's more!</h3></div>
                  <div class="row">
                  	<div class="col-xs-12">
                      <div class="checkbox">
                          <label>
                              <input type="checkbox">
                              Complete access to our digital archives Containing 13000+ comic book! - <strong>$5</strong></label>
                          </label>
                      </div>
                  </div>
                  	<div class="col-xs-12">
                      <div class="checkbox">
                          <label>
                              <input type="checkbox" checked>Be a part of our discussion forums and find out what the world is saying - <strong>$5</strong></label>
                          </label>
                      </div>
                  </div>
                  </div>
          	</div>
          </div>
          <hr>                        
          <form action="charge.php" method="post" id="subscribe-form">
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="page-header">
                              <h3>Tell about yourself</h3>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Name</label>
                              <small class="text-danger pull-right">cannot be blank</small>
                              <input type="text" class="form-control" name="first_name">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <small class="text-danger pull-right">cannot be blank</small>
                              <label for="">Surname</label>
                              <input type="text" class="form-control" name="last_name">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="email">Email</label>
                              <small for="email" class="text-danger pull-right"></small>
                              <input id="email" type="text" class="form-control" name="email" data-rule-required="true" data-rule-email="true" data-msg-required="Please enter your email address" data-msg-email="Please enter a valid email address">
                          </div>
                      </div> 
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Phone</label>
                              <small class="text-danger pull-right">cannot be blank</small>
                              <input type="text" class="form-control" name="phone">
                          </div>
                      </div>                   
                  </div>
                  <div class="row">
                  	<div class="col-sm-12">
                      	<div class="form-group">
                          	<label for="">Choose Comics Genre</label>
                              <div class="form-control multicheck">
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Action
                                  </label>                                  
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Adventure
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Childern's
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Comedy
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Drama
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Military
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Mystery
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Fantasy
                                  </label>                                 
                              </div>                                
                      	</div>
                      </div>
                  </div>      
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="page-header">
                              <h3>Where would you like to deliver</h3>
                          </div>
                      </div>
                  </div>             
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Address1</label>
                              <small class="text-danger pull-right">cannot be blank</small>
                              <input type="text" class="form-control" name="addr">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Address2</label>
                              <small class="text-danger pull-right">cannot be blank</small>
                              <input type="text" class="form-control" name="extended_addr">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">City</label>
                              <small class="text-danger pull-right">cannot be blank</small>
                              <input type="text" class="form-control" name="city">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">State</label>
                              <small class="text-danger pull-right">cannot be blank</small>
                              <input type="text" class="form-control" name="state">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Postal/Zip</label>
                              <small class="text-danger pull-right">cannot be blank</small>
                              <input type="text" class="form-control" name="zip_code">
                          </div>
                      </div>                                                
                  </div>
				<div class="row">
                      <div class="col-sm-12">
                          <div class="page-header">
                              <h3>Payment Information</h3>
                          </div>
                      </div>
                  </div>                  
                  <div class="row">
                      <div class="col-sm-6">
                      	<div class="form-group">
                              <label for="">Credit Card Number</label>
                              <small class="text-danger pull-right">invalid card number</small>
                              <input type="text" class="card-number form-control" >                                
                          </div>
                      </div>
                      <div class="col-sm-6">
                      	<div class="form-group">
                          	<label for="">&nbsp;</label>
                              <span class="cb-cards hidden-xs">                                        
                                  <span class="visa">  </span>                                        
                                  <span class="mastercard">  </span>                                        
                                  <span class="american_express">  </span>
                                  <span class="discover">  </span>
                              </span> 
                       	</div>
                 		</div>                                       
                  </div>
                  <div class="row">                
                      <div class="col-sm-6">                                	
                          <div class="form-group">
                              <label for="">Card Expiry</label>
                              <small class="text-danger pull-right">invalid card number</small>
                              <div class="row">
                                  <div class="col-xs-6">
                                      <select class="card-expiry-month form-control" >
                                          <option>01</option>
                                          <option>02</option>
                                      </select>
                                  </div>
                                  <div class="col-xs-6">
                                      <select class="card-expiry-year form-control">
                                          <option>2015</option>
                                      </select>
                                  </div>
                              </div>                                            
                          </div>                                       
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">CCV</label>
                              <small class="text-danger pull-right">invalid CVV</small>
                              <div class="row">                                    	
                                  <div class="col-xs-6">                                            
                                      <input type="text" class="card-cvc form-control" placeholder="CCV">
                                  </div>
                                  <div class="col-xs-6">                                            	
                                      <h6 class="cb-cvv"><small>(Last 3-4 digits)</small></h6>
                                  </div>
                              </div>
                          </div>
                      </div>                                      
                  </div>                      
                  <div class="row">
                      <div class="col-sm-12">
                      	<hr>                            
                          <p><input type="checkbox"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                          <p><small class="text-danger" style="display:none;">There were errors while submitting</small></p>
                          <p><input type="submit" class="btn btn-primary btn-lg" value="Subscribe"></p>
                          <h6 class="process text-danger" style="display:none;">Processing…</h6>                            
                      </div>
                  </div>     
                  <input type="hidden" name="plan" value="<?php echo $_GET['plan'] ?>">
              </form>
      </div>
  </div>

<?php
  require_once('./footer.php');
?>