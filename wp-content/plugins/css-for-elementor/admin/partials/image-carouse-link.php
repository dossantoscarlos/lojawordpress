
<div class="wrap cssef-sticky-header cssef-cp">
<form action="options.php" method="post">
        <?php settings_fields( 'image_carousel_settings_group' ); ?>
		<?php do_settings_sections( 'image_carousel_settings_group' ); ?>
    <h4>Add Custom link on image carousel each image</h4>
   
    <div class="postbox" style="padding:15px">
        <div class="row">
            <div class="col-md-6">
                <p>
                    <label class="cssef-lw" for="">Image carousel link ON / OFF</label>
                    <input type="checkbox" name="carousel_link_on" <?php if(! class_exists('Css_For_Elementor_Pro')){ echo checked(get_option('carousel_link_on'), 'swiper-slide'); }  ?> value="swiper-slide">
                </p>
                <p>
                    <label class="cssef-lw" for="">1st Image link</label>
                    <input style="width:60%;" type="url" name="1st_link" value="<?php echo esc_attr(get_option('1st_link'));?>" placeholder="">

                </p>
                <p>
                    <label class="cssef-lw" for="">2nd Image link</label>
                    <input style="width:60%;" type="url" name="2nd_link" value="<?php echo esc_attr(get_option('2nd_link'));?>" placeholder="">

                </p>
                <p>
                    <label class="cssef-lw" for="">3rd Image link</label>
                    <input style="width:60%;" type="url" name="3rd_link" value="<?php echo esc_attr(get_option('3rd_link'));?>" placeholder="">

                </p>
                <p>
                    <label class="cssef-lw" for="">4th Image link</label>
                    <input style="width:60%;" type="url" name="4th_link" value="<?php echo esc_attr(get_option('4th_link'));?>" placeholder="">

                </p>
                <p>
                    <label class="cssef-lw" for="">5th Image link</label>
                    <input style="width:60%;" type="url" name="5th_link" value="<?php echo esc_attr(get_option('5th_link'));?>" placeholder="">

                </p>
                <p>
                    <label class="cssef-lw" for="">6th Image link</label>
                    <input style="width:60%;" type="url" name="6th_link" value="<?php echo esc_attr(get_option('6th_link'));?>" placeholder="">

                </p>
            </div>
            <div class="col-md-6">
                <h4>How to use? To get more clear concept watch this!</h4>
                <iframe width="560" height="315" 
                    src="https://www.youtube.com/embed/j4J1eXL9gKQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
        </div>
        <?php submit_button(); ?>
    </div>
    
</form>
</div>