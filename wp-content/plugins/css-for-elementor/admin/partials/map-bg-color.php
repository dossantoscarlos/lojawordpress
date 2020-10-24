
<div class="wrap cssef-img-in-text-design cssef-cp">
    <form action="options.php" method="post">
        <?php settings_fields( 'map_color_settings_group' ); ?>
		<?php do_settings_sections( 'map_color_settings_group' ); ?>
    <h4>Change Map Background Color</h4>
        <div class="postbox" style="padding:15px">
            <div class="row">
                <div class="col-md-6"> 
                    <p>
                        <label class="cssef-lw" for="">Map ON / OFF</label>
                        <input type="checkbox" name="map_on" <?php echo checked(get_option('map_on'), 'map-bg-color');?> value="map-bg-color">
                    </p>
                    <p>
                        <label class="cssef-lw" for="">Use The Class</label> <!--  lw = label width -->
                        <input readonly class="cssef-css-class" type="text" value="map-bg-color"><span id="copy"><i class="far fa-copy"></i></span> <span class="copied"> </span>
                    </p>
                    <p>
                        <label class="cssef-lw" for="">Use Recommend Color</label>
                        <span> #f6f6f6 | #E9E9E9 | #ffffff</span>
                    </p>
                    <p>
                        <label class="cssef-lw" for="">Map color</label>
                        <input type="text" name="map_bg_color" value="<?php echo esc_attr(get_option('map_bg_color'));?>" class="cssfe-color-picker">
                    </p>
                    <?php submit_button(); ?>
                
                </div>
                <div class="col-md-6">
                    <h4>How to use? To get more clear concept watch this!</h4>
                    <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/O_jLxcUDXdI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </form>
</div>