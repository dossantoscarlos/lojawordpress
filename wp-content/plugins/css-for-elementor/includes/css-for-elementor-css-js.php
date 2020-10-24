<?php

add_action('wp_footer', 'cssfe_js');
add_action('wp_head', 'cssfe_css' );

function cssfe_css(){
    ?>
        <style>
         
            /**
            * Logo center css start
            */
            li.logocentral img {
                width: 100%;
                height: 100%;
                vertical-align: middle;
            }
            ul li.logocentral a {
                padding-left: 10px !important;
                padding-right: 0px;
                line-height: 0px;
                padding-top:0px;
                padding-bottom: 0px; 
            }
            ul li.logocentral[class*="current-menu-"] > a {
                background-color: transparent !important;
            }
            li.logocentral {
                width: 126px;
                vertical-align: middle;
                align-self: center !important;
            }

            /**
            * sticky header css start
            */
            .cssfe-nav-sticky {
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                transition: .5s ease;
                z-index: 999;
                animation-duration: 0.8s;
                animation-name: fadeInDown;
                animation-timing-function: ease-in-out;
                box-shadow: 0 4px 12px -4px rgba(0, 0, 0, 0.75);
                background: <?php echo esc_attr( get_option( 'background_color' ) );?>;
                height: <?php echo esc_attr( get_option( 'header_height' ) );?>px;
            }

            .cssfe-nav-sticky ul li a{
                color: <?php echo esc_attr( get_option( 'font_color' ) );?> !important;
            }

            /**
            * image in text design css start
            */
            <?php
                $background_type = get_option('background_type');
                if($background_type == 'darken'){
                    $color = '#FFFFFF';
                    $bg = '#000000';
                }elseif($background_type == 'color-dodge'){
                    $color = '#000000';
                    $bg = '#FFFFFF';
                }
            ?>
            .cssef-background-text .elementor-widget-container {
                    background: <?php echo esc_attr($bg); ?>!important;
                }
            .cssef-background-text p,
            .cssef-background-text span,
            .cssef-background-text h1,
            .cssef-background-text h2,
            .cssef-background-text h3,
            .cssef-background-text h4,
            .cssef-background-text h5,
            .cssef-background-text h6{
                color: <?php echo esc_attr($color); ?> !important;
            }
            .cssef-background-text > .elementor-element-populated {
                mix-blend-mode: <?php echo $background_type; ?>;
            }

            /**
            * sticky on section css start
            */
            .cssef-sticky{
                position: sticky !important;
                position: -webkit-sticky;
                top: <?php echo esc_attr( get_option( 'position_top' ) );?>rem;
            }

            /**
            * image carouse add custom link CSS start
            */
            <?php if( class_exists( 'Css_For_Elementor' )) {
                ?>
                    .swiper-slide-image{
                        cursor: pointer;
                    } 
                <?php
            }?>     
            
            /**
            * Center forms CSS start
            */
            <?php 
                if( get_option('cssef_form_lac') == 'Yes' ){
                    $auto = 'auto';
                }
            ?>
            <?php echo '.' . get_option('form_on')?> label.elementor-field-label{
                margin: <?php echo esc_attr($auto); ?>;
            } 
            <?php echo '.' . get_option('form_on')?> .elementor-field{
                text-align: <?php echo esc_attr(get_option('ph_align'));?>;
            }
                    

                        
        </style>

    <?php
}

function cssfe_js(){
    ?>
        <script>

        ;(function($) {
            "use strict";

            /**
            * sticky header scroll up and down JS start
            */
           var scroll = "<?php echo esc_attr(get_option('scroll_up_down'));?>";

           if(scroll == 'Scroll Down'){
                $(window).on('scroll', function() {
                    if ($(window).scrollTop() > 50) {
                        $('.elementor-location-header').addClass("<?php echo esc_attr(get_option('sticky_on'));?>");
                    } else {
                        $('.elementor-location-header').removeClass("<?php echo esc_attr(get_option('sticky_on'));?>");
                    }
                });

           }else if(scroll == 'Scroll Up'){

                $(window).on('scroll', function() {
                    if ($(window).scrollTop() > 50) {
                        $('.elementor-location-header').addClass("<?php echo esc_attr(get_option('sticky_on'));?>");
                    } else {
                        $('.elementor-location-header').removeClass("<?php echo esc_attr(get_option('sticky_on'));?>");
                    }
                });


                (function () {
                    var previousScroll = 0;
                    
                    $(window).on('scroll', function () {
                    var currentScroll = $(this).scrollTop();
                    if (currentScroll > previousScroll){
                        $(".<?php echo esc_attr(get_option('sticky_on'));?>").attr('style', 'top: -100% !important');
                    }
                    else {
                        $(".<?php echo esc_attr(get_option('sticky_on'));?>").css('top', '0px');
                    }
                    previousScroll = currentScroll;
                    });
                }());
           }

           $(window).on('scroll', function() {
                if ($(window).scrollTop() > 5) {
                    $('.elementor-nav-menu__container').parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass("one");
                } else {
                    $('.elementor-nav-menu__container').parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().removeClass("one");
                }
            });


        /**
        * image carouse add custom link JS start
        */

            document.addEventListener('DOMContentLoaded', function () {

                var filteredImages = document.querySelectorAll(".<?php echo esc_attr( get_option( 'carousel_link_on' ) );?>"); //class = swiper-slide

                //Edit the links HERE
                var links = [
                "<?php echo esc_attr(get_option('1st_link'));?>",
                "<?php echo esc_attr(get_option('2nd_link'));?>",
                "<?php echo esc_attr(get_option('3rd_link'));?>",
                "<?php echo esc_attr(get_option('4th_link'));?>",
                "<?php echo esc_attr(get_option('5th_link'));?>",
                "<?php echo esc_attr(get_option('6th_link'));?>",
                

                "<?php echo esc_attr(get_option('1st_link'));?>",
                "<?php echo esc_attr(get_option('2nd_link'));?>",
                "<?php echo esc_attr(get_option('3rd_link'));?>",
                "<?php echo esc_attr(get_option('4th_link'));?>",
                "<?php echo esc_attr(get_option('5th_link'));?>",
                "<?php echo esc_attr(get_option('6th_link'));?>",


                ];

                var _loope = function _loope(i) {
                filteredImages[i].addEventListener('click', function () {
                    if(links){
                        location = links[i];
                    }else{
                        window.alert('Please add link');
                    }
                });
                }

                for (var i = 0; i < filteredImages.length; i++) {
                _loope(i);
                }
            });

        }(jQuery));

        </script>
    <?php
}


add_action('wp_head', 'js_header');

function js_header(){
    if(get_option('modern_on') == 'modern-on'){
        $dis = 'block';
    }elseif(get_site_url() .'/modern-browser/'){
        $dis = 'none';
    }
  
    ?>
   <a id="link" style="display:<?php echo esc_attr($dis); ?>; margin-left: 45%; color:red; font-size:20px" href="<?php echo get_site_url(); ?>/modern-browser/">PLEASE UPDATE YOUR BROWSER</a>
        <script>
         ;(function($) {
            "use strict";
            
            // var ieusers = '<?php //echo get_site_url(); ?>/modern-browser';
            // /msie|trident/i.test(navigator.userAgent) ? document.location = ieusers : null;
            if (navigator.appName == 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1))
            document.getElementById("link");

        }(jQuery));
        </script>

    <?php
}



    
