<?php


//add_action( 'wp_head', 'cssfe_lightbox_caption_css' );
//add_action( 'wp_footer', 'cssfe_lightbox_caption_js' );

function cssfe_lightbox_caption_css() {
    ?>
        <style>
            .captionlightbox {
                color: white;
                position: absolute;
                bottom: 3%;
                font-size: 29px;
            }
        </style>

    <?php
}

function cssfe_lightbox_caption_js() {
    ?>
        <script>
         ;(function($) {
            "use strict";

                document.addEventListener('DOMContentLoaded', function() {

                document.querySelector('.elementor-gallery__container').addEventListener('click', function(e){
                setTimeout(function(){
                var captions = document.querySelectorAll('.e-gallery-item:not(.e-gallery-item--hidden) > div.elementor-gallery-item__content > div.elementor-gallery-item__description');
                var lightboxcaptions = document.querySelectorAll('.swiper-zoom-container');

                var lastcaption = captions[captions.length- 1];
                var cloneforduplicate = lastcaption.cloneNode(true);
                var cloneforotherduplicate = captions[0].cloneNode(true);
                var duplicate = document.querySelectorAll('.swiper-slide-duplicate');
                duplicate[0].appendChild(cloneforduplicate);
                duplicate[1].appendChild(cloneforotherduplicate);

                var captionsDupClass = document.querySelectorAll('.swiper-slide-duplicate > .elementor-gallery-item__description');
                captionsDupClass[0].classList.add('captionlightbox');
                captionsDupClass[1].classList.add('captionlightbox');

                var _loope = function _loope(i) {
                var clone = captions[i].cloneNode(true);
                lightboxcaptions[i+ 1].appendChild(clone);
                var captionsClass = document.querySelectorAll('.swiper-zoom-container > .elementor-gallery-item__description');
                captionsClass[i].classList.add('captionlightbox');

                };
                for (var i = 0; i < captions.length; i++) {
                _loope(i);
                }
                }, 300);

                });
                });

            }(jQuery));
        </script>
    
    <?php
}