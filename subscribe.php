<?php
  require_once('./header.php');
  require_once('./config.php');
  require_once('./redirect.php');
  if (!isset($_GET['plan'])){
      redirect('pricing.php');
  }
  $plan = $_GET['plan'];
?>
<script>Stripe.setPublishableKey("<?php echo $stripeKey; ?>");</script>
 <div id="container" class="container">
<div class="row">		
  	<div class="col-sm-4 col-xs-12 pull-right" id="order_summary">
    	  <?php
    	  if(isset($plan)){
          include('order_summary.php');
        }
        ?>
        <br><br>
        <div class="row hidden-xs">
        	<div class="col-sm-12">
            	<img src="assets/images/secure.png" alt="secure server"/>
                <div class="using">
                    <h4>Chargebee &amp; Stripe</h4>
                    <p>30 days payment return</p>
                </div>
            </div>
     	</div>
      </div>
      <div class="clearfix visible-xs"></div>
      <div class="col-sm-7" id="checkout_info">   
      		<?php /*?><div class="row">
            	<div class="col-xs-12">
                    <div class="alert alert-success">
                        <strong>Well done!</strong> You successfully read this important alert message.
                    </div>         
                </div>
            </div><?php */?>
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
                              <label for="first_name">Name</label>
                              <input type="text" class="form-control" name="first_name" required data-msg-required="cannot be blank">
                              <small for="first_name" class="text-danger"></small>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="last_name">Surname</label>
                              <input type="text" class="form-control" name="last_name" required data-msg-required="cannot be blank">
                              <small for="last_name" class="text-danger"></small>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input id="email" type="text" class="form-control" name="email" data-rule-required="true" data-rule-email="true" data-msg-required="Please enter your email address" data-msg-email="Please enter a valid email address">
                              <small for="email" class="text-danger"></small>
                          </div>
                      </div> 
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="phone">Phone</label>
                              <input type="text" maxlength="10" class="form-control" name="phone" required data-msg-required="cannot be blank">
                              <small for="phone" class="text-danger"></small>
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
                              <label for="addr">Address1</label>
                              <input type="text" class="form-control" name="addr" required data-msg-required="cannot be blank">
                              <small for="addr" class="text-danger"></small>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="extended_addr">Address2</label>
                              <input type="text" class="form-control" name="extended_addr">
                              <small for="extended_addr" class="text-danger"></small>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="city">City</label>
                              <input type="text" class="form-control" name="city" required data-msg-required="cannot be blank">
                              <small for="city" class="text-danger"></small>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="state">State</label>
                              <input type="text" class="form-control" name="state" required data-msg-required="cannot be blank">
                              <small for="state" class="text-danger"></small>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="zip_code">Postal/Zip</label>
                              <input type="text" class="form-control" name="zip_code" required data-msg-required="cannot be blank">
                              <small for="zip_code" class="text-danger"></small>
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
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="card_no">Credit Card Number</label>
                            <div class="row">
                            	<div class="col-sm-6">
                            	<input type="text" class="card-number form-control" name="card_no" required data-msg-required="cannot be blank"> 
                           	</div>
                            <div class="col-sm-6">                      	
                              <span class="cb-cards hidden-xs">                                        
                                  <span class="visa">  </span>                                        
                                  <span class="mastercard">  </span>                                        
                                  <span class="american_express">  </span>
                                  <span class="discover">  </span>
                              </span> 
                       	</div>
                 		</div>
                            <small for="card_no" class="text-danger"></small>
                        </div>
                    </div>                                                             
                </div>
                  <div class="row">                
                      <div class="col-sm-6">                                	
                          <div class="form-group">
                              <label for="expiry_month">Card Expiry</label>
                              <div class="row">
                                  <div class="col-xs-6">
                                      <select class="card-expiry-month form-control" name="expiry_month" required data-msg-required="empty">
                                          <option selected>01</option>
                                          <option>02</option>
                                          <option>13</option>
                                      </select>
                                  </div>
                                  <div class="col-xs-6">
                                      <select class="card-expiry-year form-control" name="expiry_year" required data-msg-required="empty">
                                          <option selected="">2015</option>
                                          <option>2023</option>
                                      </select>
                                  </div>
                              </div> 
                              <small for="expiry_month" class="text-danger"></small>
                              <small for="expiry_year" class="text-danger"></small>
                          </div>                                       
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="ccv">CCV</label>
                              <div class="row">                                    	
                                  <div class="col-xs-6">                                            
                                      <input type="text" class="card-cvc form-control" name="ccv" placeholder="CCV" required data-msg-required="empty">
                                  </div>
                                  <div class="col-xs-6">                                            	
                                      <h6 class="cb-cvv"><small>(Last 3-4 digits)</small></h6>
                                  </div>
                              </div>
                              <small for="ccv" class="text-danger"></small>
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
</div>
<?php
  require_once('./footer.php');
?>