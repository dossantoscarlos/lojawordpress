
<div class="wrap cssef-img-in-text-design cssef-cp">
    <form action="options.php" method="post">
        <?php settings_fields( 'set_control_settings' ); ?>
		<?php do_settings_sections( 'set_control_settings' ); ?>
    <h4>Set Control</h4>
        <div class="postbox" style="padding:15px">
            <div class="row">
                <div class="col-md-6"> 
                    <p>Would like to Edit within Elementor Editor? Turn on 'Edit within Elementor'</p>
                    <p>
                        <label class="cssef-lw" for="">Enable 'Edit within Elementor'</label>
                        <input type="checkbox" name="front_on" <?php echo checked(get_option('front_on'), 'front-on');?> value="front-on">
                        
                    </p>

                    <p>Would like to redirect to WordPress Dashboard from 'Elementor Editor'? Enable this option</p>
                    <p>
                        <label class="cssef-lw" for="">Enable 'Redirect to WP Dashboard'</label>
                        <input type="checkbox" name="dash_on" <?php echo checked(get_option('dash_on'), 'dash-on');?> value="dash-on"><span data-toggle="modal" data-target="#cssfeDashImg" style="font-size:20px" class="dashicons dashicons-editor-help"> </span>
                        
                    </p>
                   
                    <?php submit_button(); ?>
                
                </div>
                <div class="col-md-6">
                    <h4>How to use? Check out our Documentation <br><a href="https://docs.theinnovs.com/elements-css-for-elementor/" target="__blank">Click Here</a></h4>
                    
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Large modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->

<div class="modal fade" id="cssfeDashImg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     
    <div class="modal-content">
      <img src="<?php echo plugin_dir_url( __FILE__ ).'../img/dash.png';?>" alt="">
    </div>
  </div>
</div>