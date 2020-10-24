<div class="wrap cssef-img-in-text-design cssef-cp">
    <form action="options.php" method="post">
        <?php settings_fields( 'center_forms_settings' ); ?>
		<?php do_settings_sections( 'center_forms_settings' ); ?>
    <h4>Center Forms Easily & Quickly</h4>
        <div class="postbox" style="padding:15px">
            <div class="row">
                <div class="col-md-6"> 
                    <p>
                        <label class="cssef-lw" for="">Form Center ON / OFF</label>
                        <input type="checkbox" name="form_on" <?php echo checked(get_option('form_on'), 'cssef-center-form');?> value="cssef-center-form">
                    </p>
                    <p>
                        <label class="cssef-lw" for="">Use The Class</label> <!--  lw = label width -->
                        <input readonly class="cssef-css-class" type="text" value="cssef-center-form"><span id="copy"><i class="far fa-copy"></i></span> <span class="copied"> </span>
                    </p>
                    <p>
                        <label class="cssef-lw" for="">Label Align Center</label>
                        <input type="radio" value="Yes" name="cssef_form_lac" <?php echo checked( get_option( 'cssef_form_lac' ), 'Yes' );?>><span>Yes</span>
                        <input type="radio" value="No" name="cssef_form_lac" <?php echo checked( get_option( 'cssef_form_lac' ), 'No' );?>><span>No</span>
                    </p>
                    <p>
                        <label class="cssef-lw" for="">Placeholder Align</label>
                        <select name="ph_align" id="">
                            <option value="Left" <?php echo selected(get_option( 'ph_align' ), 'Left');?>>Left</option>
                            <option value="Center" <?php echo selected(get_option( 'ph_align' ), 'Center');?>>Center</option>
                            <option value="Right" <?php echo selected(get_option( 'ph_align' ), 'Right');?>>Right</option>
                        </select>
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