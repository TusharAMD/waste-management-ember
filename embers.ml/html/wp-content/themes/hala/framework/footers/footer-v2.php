<footer class="footer_v2">
    <div class="container">
      <div class="row">
      <?php if (is_active_sidebar("hala-footer-widget")) { ?>
        <div class="col-sm-3 col-xs-12">
            <?php dynamic_sidebar("hala-footer-widget"); ?>
        </div>
     <?php } 
	  if (is_active_sidebar("hala-footer-widget-2")) { ?>
        <div class="col-sm-3 col-xs-12">
            <?php dynamic_sidebar("hala-footer-widget-2"); ?>
        </div>
     <?php } 
	 if (is_active_sidebar("hala-footer-widget-3")) { ?>
        <div class="col-sm-3 col-xs-12">
            <?php dynamic_sidebar("hala-footer-widget-3"); ?>
        </div>
     <?php } 
	 if (is_active_sidebar("hala-footer-widget-4")) { ?>
        <div class="col-sm-3 col-xs-12">
            <?php dynamic_sidebar("hala-footer-widget-4"); ?>
            <a href="#header" class="to-top">GO TO TOP<i class="fa fa-long-arrow-up"></i></a>
        </div>
     <?php } ?>
    </div><!-- row --> 
  </div> <!-- container -->  
</footer>
