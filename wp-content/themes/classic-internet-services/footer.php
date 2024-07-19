<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Classic Internet Services
 */
?>
<div id="footer">

	<?php 
    $classic_internet_services_footer_widget_enabled = get_theme_mod('classic_internet_services_footer_widget', false);
    
    if ($classic_internet_services_footer_widget_enabled !== false && $classic_internet_services_footer_widget_enabled !== '') { ?>

      <div class="footer-widget">
        <div class="container">
          <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
          <?php endif; // end footer widget area ?>
                    
          <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
          <?php endif; // end footer widget area ?>
        
          <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>
          <?php endif; // end footer widget area ?>
          
          <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>
          <?php endif; // end footer widget area ?>
        </div>
      </div>
    <?php } ?>
    <div class="clear"></div>

  <div class="copywrap text-center">
    <div class="container">
      <a href="<?php echo esc_url(get_theme_mod('classic_internet_services_copyright_link',__('https://www.theclassictemplates.com/products/free-internet-provider-wordpress-theme/','classic-internet-services'))); ?>" target="_blank"><?php echo esc_html(get_theme_mod('classic_internet_services_copyright_line',__('Classic Internet Services WordPress Theme','classic-internet-services'))); ?></a> <?php echo esc_html('By Classic Templates','classic-internet-services'); ?>
    </div>
  </div>

</div>

<?php if(get_theme_mod('classic_internet_services_scroll_hide',false)){ ?>
 <a id="button"><?php esc_html_e('TOP', 'classic-internet-services'); ?></a>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>