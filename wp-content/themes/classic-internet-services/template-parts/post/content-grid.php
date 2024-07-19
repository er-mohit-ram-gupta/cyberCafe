<?php
/**
 * @package Classic Internet Services
 */
?>

<?php
    $classic_internet_services_post_date = get_the_date();
    $classic_internet_services_year = get_the_date('Y');
    $classic_internet_services_month = get_the_date('m');

    $classic_internet_services_author_id = get_the_author_meta('ID');
    $classic_internet_services_author_link = esc_url(get_author_posts_url($classic_internet_services_author_id));
    $classic_internet_services_author_name = get_the_author();
?>

<div class="col-lg-4 col-md-4 postsec-list">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="listarticle">
        <?php if (has_post_thumbnail() ){ ?>
            <div class="post-thumb">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>
        <?php } ?>
        <header class="entry-header">
            <h2 class="single_title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php if ('post' == get_post_type()) : ?>
                <div class="postmeta">
                    <div class="post-date">
                        <a href="<?php echo esc_url(get_month_link($classic_internet_services_year, $classic_internet_services_month)); ?>">
                            <i class="fas fa-calendar-alt"></i> &nbsp;<?php echo esc_html($classic_internet_services_post_date); ?>
                            <span class="screen-reader-text"><?php echo esc_html($classic_internet_services_post_date); ?></span>
                        </a>
                    </div>
                    <div class="post-comment">&nbsp; &nbsp;
                        <a href="<?php echo esc_url(get_comments_link()); ?>">
                            <i class="fa fa-comment"></i> &nbsp; <?php comments_number(); ?>
                            <span class="screen-reader-text"><?php comments_number(); ?></span>
                        </a>
                    </div>
                    <div class="post-author">&nbsp; &nbsp;
                        <a href="<?php echo $classic_internet_services_author_link; ?>">
                            <i class="fas fa-user"></i> &nbsp; <?php echo esc_html($classic_internet_services_author_name); ?>
                            <span class="screen-reader-text"><?php echo esc_html($classic_internet_services_author_name); ?></span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </header>
            <div class="entry-summary">
            <?php if(get_theme_mod('classic_internet_services_blog_post_description_option') == 'Full Content'){ ?>
                <div class="entry-content"><?php
                    $content = get_the_content(); ?>
                    <p><?php echo wpautop($content); ?></p>  
                </div>
             <?php }
            if(get_theme_mod('classic_internet_services_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
                <?php if(get_the_excerpt()) { ?>
                    <div class="entry-content"> 
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html($excerpt); ?></p>
                    </div>
                <?php }?>
            <?php }?> 
            <div class="pagemore" >
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','classic-internet-services'); ?></a>
            </div>
            </div>
        <div class="clearfix"></div>
    </div>
</article>
</div>
