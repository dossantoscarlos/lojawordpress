<div class="wrap cssef-img-in-text-design cssef-cp">
    <form action="options.php" method="post">
        <?php settings_fields( 'mordern_browser_settings' ); ?>
		<?php do_settings_sections( 'mordern_browser_settings' ); ?>
        <h4>Suggest Modern Browser</h4>
        <div class="postbox" style="padding:15px">
            <div class="row">
                <div class="col-md-6"> 
                    <p>If you would like to Suggest modern browser when user use IE browser, then turn on</p>
                    <p>
                        <label class="cssef-lw" for="">Suggest Modern Browser</label>
                        <input type="checkbox" name="modern_on" <?php echo checked(get_option('modern_on'), 'modern-on');?> value="modern-on">
                        
                    </p>

                    <p>
                        <label class="cssef-lw" for="">Title Message</label>
                        <input style="width:60%;" type="text" name="modern_title"  value="<?php echo esc_attr(get_option('modern_title'));?>">
                        
                    </p>

                    <p>
                        <label class="cssef-lw" for="" style="margin-top: -45px;">Content Message</label>
                        <textarea style="width:60%;" name="modern_content" id="" cols="20" rows="3"><?php echo esc_attr(get_option('modern_content'));?></textarea>
                        
                    </p>
                   
                    <?php submit_button(); ?>
                
                </div>
                <div class="col-md-6">
                    <!-- <h4>How to use? Check out our Documentation <br><a href="https://docs.theinnovs.com/elements-css-for-elementor/" target="__blank">Click Here</a></h4> -->
                    
                </div>
            </div>
        </div>
    </form>
</div>