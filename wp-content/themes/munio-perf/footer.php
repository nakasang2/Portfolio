<?php
/**
 * Created by Clapat.
 * Date: 16/08/19
 * Time: 11:14 AM
 */
?>
			<?php
				
			// display footer section
			get_template_part('sections/footer_section'); 
				
			?>
			</div>
			<!--/Page Content -->
		</div>
		<!--/Cd-main-content -->
	</main>
	<!--/Main -->	
	
	<div class="cd-cover-layer"></div>
    <div id="magic-cursor" <?php if( !munio_get_theme_options('clapat_munio_enable_magic_cursor') ){ echo "class='disable-cursor'"; } ?>>
        <div id="ball">
        	<div id="hold-event"></div>
        	<div id="ball-loader"></div>
        </div>
    </div>
    <div id="clone-image"></div>
    <div id="rotate-device"></div>
<?php wp_footer(); ?>
</body>
</html>
