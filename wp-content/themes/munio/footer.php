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
<script>
/* Fail-safe: モバイルで AJAX 遷移の transitionend が発火しない場合に
   body.show-loader / page-is-changing が残りリンクが押せなくなる問題を防ぐ */
(function() {
	var CLASSES = ['show-loader', 'page-is-changing', 'load-next-page',
	               'load-next-project', 'load-project-page', 'load-project-page-carousel'];
	function clearBlockingClasses() {
		CLASSES.forEach(function(c) { document.body.classList.remove(c); });
	}
	/* ページ読み込み完了から 4 秒後に強制クリア */
	window.addEventListener('load', function() {
		setTimeout(clearBlockingClasses, 4000);
	});
	/* AJAX 遷移後にも再適用（popstate / ajax:complete） */
	document.addEventListener('ajaxComplete', clearBlockingClasses);
})();
</script>
</body>
</html>
