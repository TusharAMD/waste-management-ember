<footer class="footer_v3 footer-fixed">
    <div class="container">
      <div class="row">
      <?php if (is_active_sidebar("hala-footer-widget")) { ?>
        <div class="footer-widget-1 col-sm-4 col-xs-12">
            <?php dynamic_sidebar("hala-footer-widget"); ?>
        </div>
     <?php } 
	  if (is_active_sidebar("hala-footer-widget-2")) { ?>
        <div class="footer-widget-2 col-sm-4 col-xs-12">
            <?php dynamic_sidebar("hala-footer-widget-2"); ?>
        </div>
     <?php }
	 if (is_active_sidebar("hala-footer-widget-3")) { ?>
        <div class="footer-widget-3 col-sm-4 col-xs-12">
            <?php dynamic_sidebar("hala-footer-widget-3"); ?>
        </div>
     <?php } 
	 if (is_active_sidebar("hala-footer-widget-4")) { ?>
        <div class="footer-widget-4 col-sm-12 col-xs-12">
            <?php dynamic_sidebar("hala-footer-widget-4"); ?>
            <a href="#header" class="to-top">GO TO TOP<i class="fa fa-long-arrow-up"></i></a>
        </div>
     <?php } ?>
    </div><!-- row --> 
  </div> <!-- container -->  
</footer>
