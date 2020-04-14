<footer class="footer_v1"> 
  <svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
  <path id="trianglePath1" d="M0 50 L50 0 L100 50 Z"></path>
  <path id="trianglePath2" d="M50 0 L100 50 L100 0 Z"></path>
  </svg>
   <div class="container">
    <div class="row">
    
      <?php if (is_active_sidebar("hala-footer-widget")) { ?>
        <div class="col-sm-4 col-xs-12 footer-about col-sm-push-4">
            <?php dynamic_sidebar("hala-footer-widget"); ?>
        </div>
     <?php } 
	  if (is_active_sidebar("hala-footer-widget-2")) { ?>
        <div class="col-sm-4 col-xs-6 col-xxs-12 footer-top-margin col-sm-pull-4">
            <?php dynamic_sidebar("hala-footer-widget-2"); ?>
        </div>
     <?php } 
	 if (is_active_sidebar("hala-footer-widget-3")) { ?>
        <div class="col-sm-4 col-xs-6 col-xxs-12 footer-top-margin pull-right">
            <a href="#header" class="to-top">GO TO TOP<i class="fa fa-long-arrow-up"></i></a>
            <?php dynamic_sidebar("hala-footer-widget-3"); ?>
        </div>
     <?php } ?>
      
      
    </div><!-- row --> 
  </div> 
</footer>
