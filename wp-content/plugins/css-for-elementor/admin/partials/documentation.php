
<div class="wrap cssef-img-in-text-design cssef-cp">
    <form action="options.php" method="post">
        <?php settings_fields( 'set_control_settings' ); ?>
		<?php do_settings_sections( 'set_control_settings' ); ?>
    <h4>Set Control</h4>
        <div class="postbox" style="padding:15px">
            <div class="row">
                <div class="col-md-6"> 
                    <p>If you would like to edit within Elementor Editor, then turn on 'Edit within Elementor'</p>
                    <p>
                        <label class="cssef-lw" for="">Enable Edit within Elementor</label>
                        <input type="checkbox" name="front_on" <?php echo checked(get_option('front_on'), 'front-on');?> value="front-on">
                        
                    </p>
                   
                    <?php submit_button(); ?>
                
                </div>
                <div class="col-md-6">
                    <h4>How to use? To get more clear concept watch this!</h4>
                    <iframe width="560" height="315" 
                        src="https://www.youtube.com/embed/Kldxr4MJo94" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </form>
</div>