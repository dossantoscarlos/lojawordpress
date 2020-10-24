
<div class="wrap cssef-sticky-header cssef-cp">
<form action="options.php" method="post">
        <?php settings_fields( 'sticky_header_settings_group' ); ?>
		<?php do_settings_sections( 'sticky_header_settings_group' ); ?>
    <h4>Setting Sticky header</h4>

    <div class="postbox" style="padding:15px">
        <div class="row">
            <div class="col-md-6">
                <p>
                    <label class="cssef-lw" for="">Sticky Header ON / OFF</label>
                    <input type="checkbox" name="sticky_on" <?php echo checked(get_option('sticky_on'), 'cssfe-nav-sticky');?> value="cssfe-nav-sticky"> </br>
                    <span style="color:red;">Note: You need to activate Elementor Pro to work Sticky Headers</span>
                </p>
                <p>
                    <label class="cssef-lw" for="">Select sticky type</label>
                    <select name="scroll_up_down" id="">
                        <option value="Scroll Up" <?php echo selected( get_option( 'scroll_up_down' ), 'Scroll Up' );?>>Scroll Up</option>
                        <option value="Scroll Down" <?php echo selected( get_option( 'scroll_up_down' ), 'Scroll Down' );?>>Scroll Down</option>
                    </select>

                </p>
                <p>
                    <label class="cssef-lw" for="">Font color</label>
                    <input type="text" name="font_color" value="<?php echo esc_attr(get_option('font_color'));?>" class="cssfe-color-picker"> 
                </p>
                <p>
                    <label class="cssef-lw" for="">background color</label>
                    <input type="text" name="background_color" value="<?php echo esc_attr(get_option('background_color'));?>" class="cssfe-color-picker">
                </p>
                <p>
                    <label class="cssef-lw" for="">Header Height</label>
                    <span class="px-type-input">
                        <input type="text" name="header_height" value="<?php echo esc_attr(get_option('header_height'));?>" placeholder="100">
                        <span class="set-input-text">px</span>
                    </span>
                </p>
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
        <?php submit_button(); ?>
    </div>
    
</form>
</div>