<?php
/*
 * Template Name: Template Under Construction
 */
?>

<?php
$interiart_under_construction_logo                          =  get_post_meta( get_the_ID(),'interiart_under_contruction_logo', true ) ;
$interiart_under_contruction_imagebg                        =  get_post_meta( get_the_ID(),'interiart_under_contruction_imagebg', true ) ;
$interiart_under_contruction_countdown_title                =  get_post_meta( get_the_ID(),'interiart_under_construction_countdown_title', true ) ;
$interiart_under_construction_countdown_description         =  get_post_meta( get_the_ID(),'interiart_under_construction_countdown_description', true ) ;
$interiart_under_construction_countdown_date                =  get_post_meta( get_the_ID(),'interiart_under_construction_countdown_date', true ) ;
$interiart_under_construction_countdown_month               =  get_post_meta( get_the_ID(),'interiart_under_construction_countdown_month', true ) ;
$interiart_under_construction_countdown_year                =  get_post_meta( get_the_ID(),'interiart_under_construction_countdown_year', true ) ;
$interiart_under_construction_countdown_time                =  get_post_meta( get_the_ID(),'interiart_under_construction_countdown_time', true ) ;
$interiart_under_construction_about_button                  =  get_post_meta( get_the_ID(),'interiart_under_construction_about_button', true ) ;
$interiart_under_construction_about_height                  =  get_post_meta( get_the_ID(),'interiart_under_construction_about_height', true ) ;
$interiart_under_construction_about_title                   =  get_post_meta( get_the_ID(),'interiart_under_construction_about_title', true ) ;
$interiart_under_construction_about_description             =  get_post_meta( get_the_ID(),'interiart_under_construction_about_description', true ) ;
$interiart_under_construction_about_image                   =  get_post_meta( get_the_ID(),'interiart_under_contruction_about_image', true ) ;
$interiart_under_construction_notify_button                 =  get_post_meta( get_the_ID(),'interiart_under_construction_notify_button', true ) ;
$interiart_under_construction_notify_height                 =  get_post_meta( get_the_ID(),'interiart_under_construction_notify_height', true ) ;
$interiart_under_construction_notify_map                    =  get_post_meta( get_the_ID(),'interiart_under_construction_notify_map', true ) ;
$interiart_under_construction_notify_title                  =  get_post_meta( get_the_ID(),'interiart_under_construction_notify_title', true ) ;
$interiart_under_construction_notify_description            =  get_post_meta( get_the_ID(),'interiart_under_construction_notify_description', true ) ;

$interiart_facebook       = ot_get_option('interiart_TzFooterType2_facebook');
$interiart_twitter        = ot_get_option('interiart_TzFooterType2_twitter');
$interiart_tumblr         = ot_get_option('interiart_TzFooterType2_tumblr');
$interiart_linkedin       = ot_get_option('interiart_TzFooterType2_linkedin');
$interiart_youtube        = ot_get_option('interiart_TzFooterType2_youtube');
$interiart_dribbble       = ot_get_option('interiart_TzFooterType2_dribbble');
$interiart_behance        = ot_get_option('interiart_TzFooterType2_behance');
$interiart_skype          = ot_get_option('interiart_TzFooterType2_skype');
$interiart_pinterest      = ot_get_option('interiart_TzFooterType2_pinterest');
$interiart_google_plus    = ot_get_option('interiart_TzFooterType2_google_plus');
?>

<?php
get_header();
?>

<div class="tzUnder_Construction_top" <?php
if($interiart_under_contruction_imagebg != ''){
    echo 'style="background-image:url('. esc_url($interiart_under_contruction_imagebg) .')"';
}
?>>
    <div class="tzUnder_Construction_overlay"></div>
    <div class="container">
        <div class="tzUnder_Construction_logo">
            <img class="under_construction_logo" src="<?php echo esc_url($interiart_under_construction_logo)?>" alt="logo under construction" />
        </div>
        <div class="tzUnder_Construction_Countdown">
            <div class="tzcountdown">
                <?php echo( ( isset($interiart_under_contruction_countdown_title) && !empty($interiart_under_contruction_countdown_title)) ? '<h3 class="tzCountdowntitle">'.esc_html($interiart_under_contruction_countdown_title).'</h3>' : '' ); ?>
                <?php echo( ( isset($interiart_under_construction_countdown_description) && !empty($interiart_under_construction_countdown_description)) ? '<p class="tzCountdowndes">'.balanceTags($interiart_under_construction_countdown_description).'</p>' : '' ); ?>
                <div class="countdown">
                    <div class="tzcountdownitem">
                        <span class="days">00</span>
                        <p class="timeRefDays"><?php esc_html_e('days','fuchsia'); ?></p>
                    </div>
                    <div class="tzdivide"></div>
                    <div class="tzcountdownitem">
                        <span class="hours">00</span>
                        <p class="timeRefHours"><?php  esc_html_e('hours', 'fuchsia'); ?></p>
                    </div>
                    <div class="tzdivide"></div>
                    <div class="tzcountdownitem">
                        <span class="minutes">00</span>
                        <p class="timeRefMinutes"><?php  esc_html_e('mins', 'fuchsia'); ?></p>
                    </div>
                    <div class="tzdivide"></div>
                    <div class="tzcountdownitem">
                        <span class="seconds">00</span>
                        <p class="timeRefSeconds"><?php  esc_html_e('secs', 'fuchsia'); ?></p>
                    </div>
                </div>

                <div class="tzbutton">
                    <a class="tzbtn tzbtn-left" href="#tzabout"><?php
                        if($interiart_under_construction_about_button != ''){
                            echo esc_html($interiart_under_construction_about_button);
                        }else{
                            echo esc_html__('learn more','interiart');
                        }
                        ?></a>
                    <a class="tzbtn tzbtn-right" href="#tznotifyme"><?php
                        if($interiart_under_construction_notify_button != ''){
                            echo esc_html($interiart_under_construction_notify_button);
                        }else{
                            echo esc_html__('notify me','interiart');
                        }
                        ?></a>
                </div>
            </div>

            <script>
                jQuery(document).ready(function(){
                    var countdown = jQuery(".countdown");
                    countdown.countdown({
                        date: "<?php echo $interiart_under_construction_countdown_date.' '.$interiart_under_construction_countdown_month.' '.$interiart_under_construction_countdown_year.' '.$interiart_under_construction_countdown_time; ?>", // add the countdown's end date (i.e. 3 november 2012 12:00:00)
                        format: "on" // on (03:07:52) | off (3:7:52) - two_digits set to ON maintains layout consistency
                    });
                    if( jQuery(".tz-countdown").length >0 ){
                        var h_des,
                            h_content = countdown.height();
                        if( jQuery(".tzconutdowndes").length > 0 ){
                            h_des = jQuery(".tzconutdowndes").outerHeight(true);
                        }else {
                            h_des
                        }
                        jQuery(".tzcountdown").css('height',h_des+h_content);
                    }

                });
            </script>
        </div>
    </div>
</div>

<div id="tzabout" class="tzUnder_Construction_Section tzUnder_Construction_About_Section">
    <div class="tzUnder_Construction_left" <?php
    if($interiart_under_construction_about_height != ''){
        echo 'style="height:'.$interiart_under_construction_about_height.'px"';
    }
    ?>>
        <div class="tzUnder_Construction_About">
            <?php
            if($interiart_under_construction_about_title != ''){
                ?>
                <h3 class="tzUnder_Construction_About_title"><?php echo balanceTags($interiart_under_construction_about_title);?></h3>
                <?php
            }
            ?>

            <?php
            if($interiart_under_construction_about_description != ''){
                ?>
                <p class="tzUnder_Construction_About_description"><?php echo balanceTags($interiart_under_construction_about_description);?></p>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="tzUnder_Construction_right" <?php
        if($interiart_under_construction_about_height != '' || $interiart_under_construction_about_image != '' ){
            echo 'style="';

            if($interiart_under_construction_about_height != ''){
                echo 'height:'.$interiart_under_construction_about_height.'px;';
            }

            if($interiart_under_construction_about_image != ''){
                echo 'background-image:url('. esc_url($interiart_under_construction_about_image) .')"';
            }
        }

    ?>></div>
</div>
<div id="tznotifyme" class="tzUnder_Construction_Section tzUnder_Construction_Notify_Section">
    <div class="tzUnder_Construction_left" <?php
    if($interiart_under_construction_notify_height != ''){
        echo 'style="height:'.$interiart_under_construction_notify_height.'px"';
    }
    ?>>
        <div class="tzUnder_Construction_Map">
            <?php echo balanceTags($interiart_under_construction_notify_map);?>
        </div>
    </div>
    <div class="tzUnder_Construction_right" <?php
    if($interiart_under_construction_notify_height != ''){
        echo 'style="height:'.$interiart_under_construction_notify_height.'px"';
    }
    ?>>
        <div class="tzUnder_Construction_Form">
            <?php
            if($interiart_under_construction_notify_title != ''){
                ?>
                <h3 class="tzUnder_Construction_Notify_title"><?php echo balanceTags($interiart_under_construction_notify_title);?></h3>
                <?php
            }
            ?>

            <?php
            if($interiart_under_construction_notify_description != ''){
                ?>
                <p class="tzUnder_Construction_Notify_description"><?php echo balanceTags($interiart_under_construction_notify_description);?></p>
                <?php
            }
            ?>

            <?php
            echo do_shortcode('[newsletter_form button_label="notify me"][newsletter_field name="email" label=" "][/newsletter_form]');
            ?>
        </div>
    </div>
</div>

<footer class="tzFooter tzFooter-Type-2">
    <div class="tzFooterBottom">
        <div class="container">
            <div class="tzCopyright pull-left">
                <?php
                $interiart_footer_text = ent2ncr(ot_get_option('interiart_copyright'));
                if($interiart_footer_text == ''){
                    echo '<p>Copyright &copy Templaza</p>';
                }else{
                    echo balanceTags($interiart_footer_text );
                }
                ?>
            </div>
            <div class="tzFooterSocial pull-right">
                <ul>
                    <?php
                    if($interiart_facebook != ''){
                        ?>
                        <li>
                            <a href="<?php echo esc_url($interiart_facebook);?>"><i class="fa fa-facebook"></i></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if($interiart_twitter != ''){
                        ?>
                        <li>
                            <a href="<?php echo esc_url($interiart_twitter);?>"><i class="fa fa-twitter"></i></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if($interiart_tumblr != ''){
                        ?>
                        <li>
                            <a href="<?php echo esc_url($interiart_tumblr);?>"><i class="fa fa-tumblr"></i></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if($interiart_linkedin != ''){
                        ?>
                        <li>
                            <a href="<?php echo esc_url($interiart_linkedin);?>"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if($interiart_youtube != ''){
                        ?>
                        <li>
                            <a href="<?php echo esc_url($interiart_youtube);?>"><i class="fa fa-youtube-play"></i></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if($interiart_dribbble != ''){
                        ?>
                        <li>
                            <a href="<?php echo esc_url($interiart_dribbble);?>"><i class="fa fa-dribbble"></i></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if($interiart_behance != ''){
                        ?>
                        <li>
                            <a href="<?php echo esc_url($interiart_behance);?>"><i class="fa fa-behance"></i></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if($interiart_skype != ''){
                        ?>
                        <li>
                            <a href="<?php echo esc_url($interiart_skype);?>"><i class="fa fa-skype"></i></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if($interiart_pinterest != ''){
                        ?>
                        <li>
                            <a href="<?php echo esc_url($interiart_pinterest);?>"><i class="fa fa-pinterest-p"></i></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if($interiart_google_plus != ''){
                        ?>
                        <li>
                            <a href="<?php echo esc_url($interiart_google_plus);?>"><i class="fa fa-google"></i></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div><!--end class container-->
    </div><!--end class footerbottom -->
</footer>
<?php
get_footer();
?>

