<?php
/**
 * Displays main header
 *
 * @package Warehouse Cargo
 */
?>
<?php if(get_theme_mod('warehouse_cargo_top_header_setting') != ''){ ?>
<div class="top_header py-3 py-md-0 text-center text-md-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 align-self-center">
                <?php if(get_theme_mod('warehouse_cargo_facebook_url') != '' || get_theme_mod('warehouse_cargo_twitter_url') != '' || get_theme_mod('warehouse_cargo_intagram_url') != '' || get_theme_mod('warehouse_cargo_linkedin_url') != '' || get_theme_mod('warehouse_cargo_pintrest_url') != ''){ ?>
                    <div class="social-link text-center text-lg-right">
                        <?php if(get_theme_mod('warehouse_cargo_facebook_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('warehouse_cargo_facebook_url','')); ?>" class="mr-2"><?php esc_html_e('Facebook','warehouse-cargo'); ?></a>
                        <?php }?>
                        <?php if(get_theme_mod('warehouse_cargo_twitter_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('warehouse_cargo_twitter_url','')); ?>" class="mr-2"><?php esc_html_e('Twitter','warehouse-cargo'); ?></a>
                        <?php }?>
                        <?php if(get_theme_mod('warehouse_cargo_intagram_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('warehouse_cargo_intagram_url','')); ?>" class="mr-2"><?php esc_html_e('Instagram','warehouse-cargo'); ?></a>
                        <?php }?>
                        <?php if(get_theme_mod('warehouse_cargo_linkedin_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('warehouse_cargo_linkedin_url','')); ?>" class="mr-2"><?php esc_html_e('Linkdin','warehouse-cargo'); ?></a>
                        <?php }?>
                        <?php if(get_theme_mod('warehouse_cargo_pintrest_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('warehouse_cargo_pintrest_url','')); ?>"><?php esc_html_e('Pinterest','warehouse-cargo'); ?></a>
                        <?php }?>
                    </div>
                <?php }?>
            </div>
            <div class="col-lg-6 col-md-10 col-sm-10 align-self-center contect-box">
                <?php if(get_theme_mod('warehouse_cargo_email') != ''){ ?>
                    <span class="mr-3"><i class="<?php echo esc_html( get_theme_mod('warehouse_cargo_email_icon') ); ?> mr-3"></i><a href="mailto:<?php echo esc_html(get_theme_mod('warehouse_cargo_email','')); ?>"><?php echo esc_html(get_theme_mod('warehouse_cargo_email','')); ?></a></span>
                <?php }?>
                <?php if(get_theme_mod('warehouse_cargo_phone') != ''){ ?>
                    <span class="mr-3"><i class="<?php echo esc_html( get_theme_mod('warehouse_cargo_phone_icon') ); ?> mr-3"></i><a href="tel:<?php echo esc_html(get_theme_mod('warehouse_cargo_phone','')); ?>"><?php echo esc_html(get_theme_mod('warehouse_cargo_phone','')); ?></a></span>
                <?php }?>
                <?php if(get_theme_mod('warehouse_cargo_location') != ''){ ?>
                    <span><i class="<?php echo esc_html( get_theme_mod('warehouse_cargo_location_icon') ); ?> mr-3"></i><?php echo esc_html(get_theme_mod('warehouse_cargo_location','')); ?></span>
                <?php }?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 align-self-center">
                <div class="topbtn text-md-right text-center">
                    <?php if(get_theme_mod('warehouse_cargo_careers_text') != '' || get_theme_mod('warehouse_cargo_careers_url') != ''){ ?>
                        <i class="<?php echo esc_html( get_theme_mod('warehouse_cargo_careers_icon') ); ?> mr-2"></i><a href="<?php echo esc_url(get_theme_mod('warehouse_cargo_careers_url','')); ?>"><?php echo esc_html(get_theme_mod('warehouse_cargo_careers_text','')); ?></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>