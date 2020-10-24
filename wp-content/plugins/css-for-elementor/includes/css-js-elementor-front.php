<?php

add_action('wp_footer', 'cssfe_js_front');
add_action('wp_head', 'cssfe_css_front' );

function cssfe_css_front(){
    ?>
        <style>

 
            /**
            * Map css start
            */
       
            /* <?php //echo '.' . esc_attr(get_option('map_on')); ?>::before{
                content: '';
                position: absolute !important;
                width: 100%;
                height: 100%;
                background-color: <?php //echo esc_attr(get_option('map_bg_color'));?> !important;
                pointer-events: none;
                mix-blend-mode: difference;
            }    */

            /* .map-bg-color::before{
                content: '';
                position: absolute !important;
                width: 100%;
                height: 100%;
                background-color: <?php //echo esc_attr(get_option('map_bg_color'));?> !important;
                pointer-events: none;
                mix-blend-mode: difference;
            } */

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
            .front-active {
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
                /* background: red; */
                /* height: 80px; */
            }

            /* .front-active ul li a{
                color: #fff !important;
            } */

            /**
            * image in text design css start
            */
            <?php
                // $background_type = get_option('background_type');
                // if($background_type == 'darken'){
                //     $color = '#FFFFFF';
                //     $bg = '#000000';
                // }elseif($background_type == 'color-dodge'){
                //     $color = '#000000';
                //     $bg = '#FFFFFF';
                // }
            ?>
            /* .cssef-background-text .elementor-widget-container {
                    background: <?php //echo $bg; ?>!important;
                }
            .cssef-background-text p,
            .cssef-background-text span,
            .cssef-background-text h1,
            .cssef-background-text h2,
            .cssef-background-text h3,
            .cssef-background-text h4,
            .cssef-background-text h5,
            .cssef-background-text h6{
                color: <?php //echo $color; ?> !important;
            }
            .cssef-background-text > .elementor-element-populated {
                mix-blend-mode: <?php //echo $background_type; ?>;
            } */

            /**
            * sticky on section css start
            */
            .cssef-sticky{
                position: sticky !important;
                position: -webkit-sticky;
                top: <?php echo esc_attr(get_option('position_top'));?>rem;
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

function cssfe_js_front(){
    ?>
        <script>

        ;(function($) {
            "use strict";

      

            /**
            * sticky header scroll up and down JS start
            */
        //    var scroll = "<?php echo esc_attr(get_option('scroll_up_down'));?>";

        //    if(scroll == 'Scroll Down'){
                $(window).on('scroll', function() {
                    if ($(window).scrollTop() > 50) {
                        $('.elementor-sticky--active').addClass("front-active");
                    } else {
                        $('.elementor-sticky--active').removeClass("front-active");
                    }
                });

        //    }else if(scroll == 'Scroll Up'){

                // $(window).on('scroll', function() {
                //     if ($(window).scrollTop() > 50) {
                //         $('.elementor-nav-menu__container').addClass("front-active-top");
                //     } else {
                //         $('.elementor-nav-menu__container').removeClass("front-active-top");
                //     }
                // });


                // (function () {
                //     var previousScroll = 0;
                    
                //     $(window).on('scroll', function () {
                //     var currentScroll = $(this).scrollTop();
                //     if (currentScroll > previousScroll){
                //         $(".front-active-top").attr('style', 'top: -100% !important');
                //     }
                //     else {
                //         $(".front-active-top").css('top', '0px');
                //     }
                //     previousScroll = currentScroll;
                //     });
                // }());
        //    }


        /**
        * image carouse add custom link JS start
        */

            document.addEventListener('DOMContentLoaded', function () {

                var filteredImages = document.querySelectorAll(".<?php echo esc_attr(get_option('carousel_link_on'));?>"); //class = swiper-slide

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

