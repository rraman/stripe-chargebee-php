<?php
  require_once('./topbar.php');
  require_once('./config.php');
?>
 <div id="container" class="container">
<div class="row">
  	<div class="col-sm-12 text-center">
      	<br>        	
          <h1>Wondrous Comics<br><small>Our daily source of Inspiration</small></h1>            
          <div class="clearfix" style="min-height:60px;"> </div>           
          <div class="social">
              <div class="twitter">
                  <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="none" data-text="I Just subscribed to @Wondrous_Comics. The ultimate comics store!">Tweet</a>
                  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
              </div>
              <div class="facebook">                
                  <iframe src="http://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FRunning-book%2F244681115688639&amp;width&amp;height=80&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
                  <br/>
                  <a href="#" 
                     onclick="window.open(
                     'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('https://www.facebook.com/pages/Running-book/244681115688639'), 
                     'facebook-share-dialog','width=626,height=436'); return false;"> Share on Facebook </a>

              </div>
          </div>
          <div class="clearfix" style="min-height:60px;"> </div>
          <h2>Thank You</h2>
          <div class="well">
          	<h4>You have Subscribed to our Monthly Comics!</h4>
              <p>You will receive our next email in just a few minutes.</p>
              <p>Until then, <a href="#">check out the archives</a>.</p>
          </div>
      </div>
  </div>
</div>
<?php
  require_once('./footer.php');
?>