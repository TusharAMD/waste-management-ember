<?php
require_once(Hala_ABS_PATH_ADMIN .'/tgm-plugin-activation/plugin-options.php');
if( ! function_exists( 'Hala_wbc_importer_description' ) ) {
 function Hala_wbc_importer_description()
 {
  $output = "";
  /* validate server import */
  $validate_phpinfo_import = array(
   'memory_limit'    => array( 'val' => 128, 'type' => 'M' ),
   'post_max_size'    => array( 'val' => 128, 'type' => 'M' ),
   'upload_max_filesize'  => array( 'val' => 128, 'type' => 'M' ),
   'max_execution_time'  => array( 'val' => 180, 'type' => '' ),
   'max_input_time'   => array( 'val' => 180, 'type' => '' ),
  );
  $output .= ( function_exists( 'hala_VerifyImportSampleData' ) ) 
   ? hala_verifyImportSampleData( $validate_phpinfo_import ) 
   : "";
  /* backup database */
  $output .= ( function_exists( 'hala_VerifyImportSampleData' ) ) 
   ? hala_backupDatabase( __DIR__ . '/backup-database', get_template_directory_uri() . '/framework/admin/backup-database' ) 
   : ""; 
  return "<div class='hala-block-accordion-wrap'>{$output}</div>";
 }
 add_filter('wbc_importer_description', 'Hala_wbc_importer_description' );
}