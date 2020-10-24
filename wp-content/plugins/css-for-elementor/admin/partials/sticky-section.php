<div class="wrap cssef-sticky-section cssef-cp">
    <form action="options.php" method="post">
        <?php settings_fields( 'sticky_section_settings_group' ); ?>
		<?php do_settings_sections( 'sticky_section_settings_group' ); ?>
    <h4>Sticky on inner section</h4>
    <div class="postbox" style="padding:15px;">
        <div class="row">
            <div class="col-md-6"> 
        
                <p>
                    <label class="cssef-lw" for="">Use The Class</label> <!--  lw = label width -->
                    <input readonly class="cssef-css-class" type="text" value="cssef-sticky"><span id="copy"><i class="far fa-copy"></i></span> <span class="copied"> </span>
                </p>
                <p>
                    <label class="cssef-lw" for="">Position Top</label>
                    <span class="px-type-input">
                        <input type="text" name="position_top" value="<?php echo esc_attr(get_option('position_top'));?>" placeholder="3">
                        <span class="set-input-text">rem</span>
                    </span>
                </p>
                
                <?php submit_button(); ?>
            </div>
            <div class="col-md-6">
                <h4>How to use? To get more clear concept watch this!</h4>
                <iframe width="560" height="315" 
                    src="https://www.youtube.com/embed/vqzx4LZfVaU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
    
</form>
</div>