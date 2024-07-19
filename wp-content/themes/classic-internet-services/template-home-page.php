<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Internet Services
 */

get_header(); ?>

<div id="content">

  <?php
    $classic_internet_services_hidcatslide = get_theme_mod('classic_internet_services_hide_categorysec', false);
    $classic_internet_services_pageboxes = get_theme_mod('classic_internet_services_pageboxes');

    if ($classic_internet_services_hidcatslide && $classic_internet_services_pageboxes) { ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('classic_internet_services_pageboxes',false) ) { ?>
          <?php $classic_internet_services_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('classic_internet_services_pageboxes',false)));
            while( $classic_internet_services_queryvar->have_posts() ) : $classic_internet_services_queryvar->the_post(); ?>
              <div class="slidesection"> 
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail('full');
                  } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt=""/>
                <?php } ?>
                <div class="slider-box">
                  <?php if ( get_theme_mod('classic_internet_services_pgboxes_title') != "") { ?>
                    <span><?php echo esc_html(get_theme_mod('classic_internet_services_pgboxes_title','')); ?></span>
                  <?php } ?>
                  <h1><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h1>
                  <?php
                    $trimexcerpt = get_the_excerpt();
                    $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 35 );
                    echo '<p>' . esc_html( $shortexcerpt ) . '</p>'; 
                  ?>
                  <div class="pagemore">
                    <?php 
                    $classic_internet_services_button_text = get_theme_mod('classic_internet_services_button_text', 'Read More');
                    $classic_internet_services_button_link_slider = get_theme_mod('classic_internet_services_button_link_slider', ''); 
                    if (empty($classic_internet_services_button_link_slider)) {
                        $classic_internet_services_button_link_slider = get_permalink();
                    }
                    if ($classic_internet_services_button_text || !empty($classic_internet_services_button_link_slider)) { ?>
                      <?php if(get_theme_mod('classic_internet_services_button_text', 'Read More') != ''){ ?>
                        <div class="slide-btn mt-3">
                          <a href="<?php echo esc_url($classic_internet_services_button_link_slider); ?>" class="button redmor">
                            <?php echo esc_html($classic_internet_services_button_text); ?>
                              <span class="screen-reader-text"><?php echo esc_html($classic_internet_services_button_text); ?></span>
                          </a>
                        </div>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
      <div class="clear"></div>
    </section>
  <?php } ?>
  <?php
    $classic_internet_services_hidepageboxes = get_theme_mod('classic_internet_services_disabled_pgboxes', false);
    $classic_internet_services_pageboxes = get_theme_mod('classic_internet_services_pageboxes');
    if( $classic_internet_services_hidepageboxes && $classic_internet_services_pageboxes){
  ?>
    <div id="services_section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 align-self-center">
            <?php if ( get_theme_mod('classic_internet_services_servicebox_title') != "") { ?>
              <h3><?php echo esc_html(get_theme_mod('classic_internet_services_servicebox_title','')); ?></h3>
            <?php } ?>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 align-self-center">
            <div class="pagemore text-center text-md-end">
              <?php if ( get_theme_mod('classic_internet_services_servicebox_btn_link') != "") { ?>
                <a href="<?php echo esc_url(get_theme_mod('classic_internet_services_servicebox_btn_link','')); ?>"><?php echo esc_html(get_theme_mod('classic_internet_services_button_text1',__('Read More','classic-internet-services'))); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('classic_internet_services_button_text1',__('Read More','classic-internet-services'))); ?></span></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="row">
          <?php for($p=1; $p<4; $p++) { ?>
          <?php if( get_theme_mod('classic_internet_services_pageboxes'.$p,false)) { ?>
            <?php $classic_internet_services_querymed = new WP_query('page_id='.esc_attr(get_theme_mod('classic_internet_services_pageboxes'.$p,false)) ); ?>
              <?php while( $classic_internet_services_querymed->have_posts() ) : $classic_internet_services_querymed->the_post(); ?>
              <div class="col-lg-4 col-md-4">
                <div class="pagecontent mb-3">
                  <?php if (has_post_thumbnail() ){ ?>
                    <div class="thumbbx"><?php the_post_thumbnail();?></div>
                  <?php } ?>
                  <div class="text-inner-box py-3">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php
                      $trimexcerpt = get_the_excerpt();
                      $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 20 );
                      echo '<p>' . esc_html( $shortexcerpt ) . '</p>'; 
                    ?>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } } ?>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  <?php }?>
</div>

<?php get_footer(); ?>