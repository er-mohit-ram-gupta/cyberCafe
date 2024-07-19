<?php
/*
 * @package Classic Internet Services
 */

function classic_internet_services_admin_enqueue_scripts() {
    wp_enqueue_style( 'classic-internet-services-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'classic_internet_services_admin_enqueue_scripts' );

add_action('after_switch_theme', 'classic_internet_services_options');

function classic_internet_services_options() {
    global $pagenow;
    if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
        wp_redirect( admin_url( 'themes.php?page=classic-internet-services' ) );
        exit;
    }
}

function classic_internet_services_theme_info_menu_link() {

    $classic_internet_services_theme = wp_get_theme();
    add_theme_page(
        sprintf( esc_html__( 'Welcome to %1$s %2$s', 'classic-internet-services' ), $classic_internet_services_theme->get( 'Name' ), $classic_internet_services_theme->get( 'Version' ) ),
        esc_html__( 'Theme Info', 'classic-internet-services' ),'edit_theme_options','classic-internet-services','classic_internet_services_theme_info_page'
    );
}
add_action( 'admin_menu', 'classic_internet_services_theme_info_menu_link' );

function classic_internet_services_theme_info_page() {

    $classic_internet_services_theme = wp_get_theme();
    ?>
<div class="wrap theme-info-wrap">
    <h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'classic-internet-services' ), esc_html($classic_internet_services_theme->get( 'Name' )), esc_html($classic_internet_services_theme->get( 'Version' ))); ?>
    </h1>
    <p class="theme-description">
    <?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'classic-internet-services' ); ?>
    </p>
    <div class="important-link">
        <p class="main-box columns-wrapper clearfix">
            <div class="themelink column column-half clearfix">
                <p><strong>Pro version of our theme</strong></p>
                <p>Are you exited for our theme? Then we will proceed for pro version of theme.</p>
                <a href="<?php echo esc_url( CLASSIC_INTERNET_SERVICES_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'classic-internet-services' ); ?></a>
                <p><strong>Check all classic features</strong></p>
                <p>Explore all the premium features.</p>
                <a href="<?php echo esc_url( CLASSIC_INTERNET_SERVICES_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'classic-internet-services' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong>Need Help?</strong></p>
                <p>Go to our support forum to help you out in case of queries and doubts regarding our theme.</p>
                <a href="<?php echo esc_url( CLASSIC_INTERNET_SERVICES_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'classic-internet-services' ); ?></a>
                <p><strong>Leave us a review</strong></p>
                <p>Are you enjoying our theme? We would love to hear your feedback.</p>
                <a href="<?php echo esc_url( CLASSIC_INTERNET_SERVICES_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'classic-internet-services' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong>Check Our Demo</strong></p>
                <p>Here, you can view a live demonstration of our premium them.</p>
                <a href="<?php echo esc_url( CLASSIC_INTERNET_SERVICES_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'classic-internet-services' ); ?></a>
                <p><strong>Theme Documentation</strong></p>
                <p>Need more details? Please check our full documentation for detailed theme setup.</p>
                <a href="<?php echo esc_url( CLASSIC_INTERNET_SERVICES_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'classic-internet-services' ); ?></a>
            </div>
        </p>
    </div>
    <div id="getting-started">
        <h3><?php printf( esc_html__( 'Getting started with %s', 'classic-internet-services' ),
        esc_html($classic_internet_services_theme->get( 'Name' ))); ?></h3>
        <div class="columns-wrapper clearfix">
            <div class="column column-half clearfix">
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Description', 'classic-internet-services' ); ?></h4>
                    <div class="theme-description-1"><?php echo esc_html($classic_internet_services_theme->get( 'Description' )); ?></div>
                </div>
            </div>
            <div class="column column-half clearfix">
                <img src="<?php echo esc_url( $classic_internet_services_theme->get_screenshot() ); ?>" alt=""/>
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Options', 'classic-internet-services' ); ?></h4>
                    <p class="about">
                    <?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'classic-internet-services' ),esc_html($classic_internet_services_theme->get( 'Name' ))); ?></p>
                    <p>
                    <div class="themelink-1">
                        <a target="_blank" href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Customize Theme', 'classic-internet-services' ); ?></a>
                        <a href="<?php echo esc_url( CLASSIC_INTERNET_SERVICES_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Checkout Premium', 'classic-internet-services' ); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="theme-author">
      <p><?php
        printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'classic-internet-services' ),
            esc_html($classic_internet_services_theme->get( 'Name' )),
            '<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'classic-internet-services' ) . '">classictemplate</a>',
            '<a target="_blank" href="' . esc_url( CLASSIC_INTERNET_SERVICES_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'classic-internet-services' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'classic-internet-services' ) . '</a>'
        );
        ?></p>
    </div>
</div>
<?php
}
?>
