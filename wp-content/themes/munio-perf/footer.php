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
   body.show-loader 等が残りタップできなくなる問題を防ぐ */
(function() {
	var CLASSES = ['show-loader', 'page-is-changing', 'load-next-page',
	               'load-next-project', 'load-project-page', 'load-project-page-carousel'];
	var timer = null;

	function clearBlockingClasses() {
		CLASSES.forEach(function(c) { document.body.classList.remove(c); });
	}

	function scheduleClean(ms) {
		clearTimeout(timer);
		timer = setTimeout(clearBlockingClasses, ms || 1500);
	}

	/* 1. ページ初回ロード完了時に即クリア */
	window.addEventListener('load', function() {
		scheduleClean(800);
	});

	/* 2. iOS back/forward キャッシュ対応 */
	window.addEventListener('pageshow', function(e) {
		if (e.persisted) clearBlockingClasses();
	});

	/* 3. MutationObserver: show-loader が追加されたら 1.5秒後に強制削除 */
	if (window.MutationObserver) {
		new MutationObserver(function(mutations) {
			mutations.forEach(function(m) {
				if (m.type === 'attributes' && m.attributeName === 'class') {
					var hasBlocking = CLASSES.some(function(c) {
						return document.body.classList.contains(c);
					});
					if (hasBlocking) scheduleClean(1500);
				}
			});
		}).observe(document.body, { attributes: true });
	}

	/* 4. jQuery ajaxComplete（正しい書き方） */
	if (window.jQuery) {
		jQuery(document).on('ajaxComplete', function() {
			scheduleClean(600);
		});
	}
})();
</script>
</body>
</html>
