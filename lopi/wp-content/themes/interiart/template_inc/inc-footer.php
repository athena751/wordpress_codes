<?php
$interiart_footer_col     =   ot_get_option('interiart_footer_columns',4);
$interiart_footer_width1  =   ot_get_option('interiartfooterwidth1',3);
$interiart_footer_width2  =   ot_get_option('interiartfooterwidth2',3);
$interiart_footer_width3  =   ot_get_option('interiartfooterwidth3',3);
$interiart_footer_width4  =   ot_get_option('interiartfooterwidth4',3);
$interiart_Image_backTop  =   ot_get_option('interiart_image_backTop');

$interiart_facebook       = ot_get_option('interiart_TzFooter_facebook');
$interiart_twitter        = ot_get_option('interiart_TzFooter_twitter');
$interiart_instagram      = ot_get_option('interiart_TzFooter_instagram');
$interiart_tumblr         = ot_get_option('interiart_TzFooter_tumblr');
$interiart_linkedin       = ot_get_option('interiart_TzFooter_linkedin');
$interiart_youtube        = ot_get_option('interiart_TzFooter_youtube');
$interiart_dribbble       = ot_get_option('interiart_TzFooter_dribbble');
$interiart_behance        = ot_get_option('interiart_TzFooter_behance');
$interiart_skype          = ot_get_option('interiart_TzFooter_skype');
$interiart_pinterest      = ot_get_option('interiart_TzFooter_pinterest');
$interiart_google_plus    = ot_get_option('interiart_TzFooter_google_plus');

?>
<footer class="tzFooter tzFooter-Type-1">
    <div class="tzFooterTop">
        <div class="container">
            <div class="row">
                <?php
                if(isset($interiart_footer_col) && $interiart_footer_col!=""):
                    for($i=0;$i<$interiart_footer_col;$i++):
                        $j = $i +1;
                        if($i==0){
                            $interiart_col = $interiart_footer_width1;
                        }elseif($i==1){
                            $interiart_col = $interiart_footer_width2;
                        }elseif($i==2){
                            $interiart_col = $interiart_footer_width3;
                        }elseif($i==3){
                            $interiart_col = $interiart_footer_width4;
                        }
                        ?>
                        <div class="col-md-<?php echo esc_attr($interiart_col); ?> footerattr">
                            <?php
                            if(is_active_sidebar("interiart-footer-".$j) ):
                                dynamic_sidebar("interiart-footer-".$j);
                            endif;
                            ?>
                        </div><!--end class footermenu-->
                    <?php
                    endfor;
                endif;
                ?>
            </div>
        </div><!--end class container-->
    </div>

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
                    if($interiart_instagram != ''){
                        ?>
                        <li>
                            <a href="<?php echo esc_url($interiart_instagram);?>"><i class="fa fa-instagram"></i></a>
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
                            <a href="<?php echo esc_url($interiart_google_plus);?>"><i class="fa fa-google-plus"></i></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div><!--end class container-->
    </div><!--end class footerbottom -->
</footer>