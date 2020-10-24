
<div class="wrap cssef-img-in-text-design cssef-cp">
    <form action="options.php" method="post">
        <?php settings_fields( 'image_in_text_settings_group' ); ?>
		<?php do_settings_sections( 'image_in_text_settings_group' ); ?>
    <h4>Image in text design</h4>
    <div class="postbox" style="padding:15px">
        <div class="row">
            <div class="col-md-6"> 
                <p>
                    <label class="cssef-lw" for="">Use The Class</label> <!--  lw = label width -->
                    <input readonly class="cssef-css-class" type="text" value="cssef-background-text"><span id="copy"><i class="far fa-copy"></i></span> <span class="copied"> </span>
                </p>
                <p>
                    <label class="cssef-lw" for="">Select Background Type</label>
                    <select name="background_type" id="">
                        <option value="darken" <?php echo selected(get_option('background_type'), 'darken' );?>>darken</option>
                        <option value="color-dodge" <?php echo selected(get_option('background_type'), 'color-dodge' );?>>color-dodge</option>
                    </select>
                </p>
                <?php submit_button(); ?>
            
            </div>
            <div class="col-md-6">
                <h4>How to use? To get more clear concept watch this!</h4>
                <iframe width="560" height="315" 
                    src="https://www.youtube.com/embed/amdIqkXAkHo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
    </form>
</div>