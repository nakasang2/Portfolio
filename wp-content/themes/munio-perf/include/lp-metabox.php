<?php
/**
 * LP Template — Admin metaboxes
 */

if ( ! function_exists( 'munio_lp_enqueue_media' ) ) {
	function munio_lp_enqueue_media( $hook ) {
		if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
			return;
		}
		wp_enqueue_media();
		wp_enqueue_script( 'jquery-ui-sortable' );
	}
	add_action( 'admin_enqueue_scripts', 'munio_lp_enqueue_media' );
}

if ( ! function_exists( 'munio_lp_register_metabox' ) ) {
	function munio_lp_register_metabox() {
		add_meta_box(
			'munio-lp-settings',
			'LP Template 設定',
			'munio_lp_render_metabox',
			'page',
			'normal',
			'high'
		);
	}
	add_action( 'add_meta_boxes', 'munio_lp_register_metabox' );
}

if ( ! function_exists( 'munio_lp_render_metabox' ) ) {
	function munio_lp_render_metabox( $post ) {
		wp_nonce_field( 'munio_lp_save', 'munio_lp_nonce' );

		/* ── セクション並び順 ──────────────────────────── */
		$default_order  = 'about,works,posts,limited,films';
		$saved_order    = get_post_meta( $post->ID, 'lp_section_order', true ) ?: $default_order;
		$order_keys     = array_filter( explode( ',', $saved_order ) );
		// 保存済みに含まれていないキーを末尾に追加（新セクション追加時の互換）
		$all_keys       = array( 'about', 'works', 'posts', 'limited', 'films' );
		foreach ( $all_keys as $k ) {
			if ( ! in_array( $k, $order_keys, true ) ) {
				$order_keys[] = $k;
			}
		}
		$section_labels = array(
			'about'   => 'About',
			'works'   => 'Selected Works',
			'posts'   => 'Blog Posts',
			'limited' => 'Limited Edition',
			'films'   => 'Short Film',
		);

		/* ── フィールド定義 ────────────────────────────── */
		$sections = array(
			'hero' => array(
				'label'  => 'Hero セクション',
				'fields' => array(
					'lp_hero_bg_image'   => array( 'label' => '背景画像',                          'type' => 'image',  'placeholder' => '' ),
					'lp_hero_name'       => array( 'label' => '名前（大見出し）',                  'type' => 'text',   'placeholder' => 'Your Name' ),
					'lp_hero_title'      => array( 'label' => '肩書き（小見出し）',                'type' => 'text',   'placeholder' => 'Digital Artist & Filmmaker' ),
					'lp_hero_tagline'    => array( 'label' => 'キャッチコピー',                    'type' => 'text',   'placeholder' => 'Creating worlds through lens and light.' ),
					'lp_hero_cta_text'   => array( 'label' => 'CTAボタン テキスト',                'type' => 'text',   'placeholder' => 'View Works' ),
					'lp_hero_cta_anchor' => array( 'label' => 'CTAボタン リンク先（アンカー/URL）','type' => 'text',   'placeholder' => '#works' ),
				),
			),
			'about' => array(
				'label'  => 'About セクション',
				'fields' => array(
					'lp_about_section_label' => array( 'label' => 'セクションラベル',               'type' => 'text',     'placeholder' => 'About' ),
					'lp_about_image'         => array( 'label' => 'プロフィール画像',               'type' => 'image',    'placeholder' => '' ),
					'lp_about_name'          => array( 'label' => '名前',                          'type' => 'text',     'placeholder' => 'Your Name' ),
					'lp_about_bio'           => array( 'label' => '自己紹介文',                    'type' => 'textarea', 'placeholder' => '' ),
					'lp_about_skills'        => array( 'label' => 'スキル（カンマ区切り）',        'type' => 'text',     'placeholder' => 'Film, 3DCG, Photography, Direction' ),
					'lp_about_cta_text'      => array( 'label' => 'ボタン テキスト',               'type' => 'text',     'placeholder' => 'Contact' ),
					'lp_about_cta_url'       => array( 'label' => 'ボタン URL（空欄で非表示）',    'type' => 'text',     'placeholder' => '/contact' ),
				),
			),
			'works' => array(
				'label'  => 'Selected Works セクション',
				'fields' => array(
					'lp_works_section_label'   => array( 'label' => 'セクションラベル',                          'type' => 'text',   'placeholder' => 'Selected Works' ),
					'lp_works_section_heading' => array( 'label' => 'セクション見出し',                         'type' => 'text',   'placeholder' => 'Works' ),
					'lp_works_count'           => array( 'label' => '表示件数',                                 'type' => 'number', 'placeholder' => '6' ),
					'lp_works_category'        => array( 'label' => 'カテゴリー slug（空欄 = 全件）',           'type' => 'text',   'placeholder' => '' ),
					'lp_works_cta_text'        => array( 'label' => '「全作品を見る」ボタン テキスト',          'type' => 'text',   'placeholder' => 'View All Works' ),
					'lp_works_cta_url'         => array( 'label' => '「全作品を見る」ボタン URL（空欄で非表示）','type' => 'text',   'placeholder' => '/portfolio' ),
				),
			),
			'posts' => array(
				'label'  => 'Blog Posts セクション',
				'fields' => array(
					'lp_posts_section_label'   => array( 'label' => 'セクションラベル',                         'type' => 'text',   'placeholder' => 'Journal' ),
					'lp_posts_section_heading' => array( 'label' => 'セクション見出し',                         'type' => 'text',   'placeholder' => 'Latest Posts' ),
					'lp_posts_count'           => array( 'label' => '表示件数',                                 'type' => 'number', 'placeholder' => '3' ),
					'lp_posts_cta_text'        => array( 'label' => '「全記事を見る」ボタン テキスト',          'type' => 'text',   'placeholder' => 'View All Posts' ),
					'lp_posts_cta_url'         => array( 'label' => '「全記事を見る」ボタン URL（空欄で非表示）','type' => 'text',   'placeholder' => '/blog' ),
				),
			),
			'limited' => array(
				'label'  => 'Limited Edition セクション',
				'fields' => array(
					'lp_limited_section_label' => array( 'label' => 'セクションラベル',                        'type' => 'text',     'placeholder' => 'Limited Edition' ),
					'lp_limited_headline'      => array( 'label' => '見出し',                                  'type' => 'text',     'placeholder' => 'Limited Edition Prints' ),
					'lp_limited_desc'          => array( 'label' => '説明文',                                  'type' => 'textarea', 'placeholder' => '' ),
					'lp_limited_image_1'       => array( 'label' => '画像 1',                                  'type' => 'image',    'placeholder' => '' ),
					'lp_limited_image_2'       => array( 'label' => '画像 2',                                  'type' => 'image',    'placeholder' => '' ),
					'lp_limited_image_3'       => array( 'label' => '画像 3',                                  'type' => 'image',    'placeholder' => '' ),
					'lp_limited_image_4'       => array( 'label' => '画像 4',                                  'type' => 'image',    'placeholder' => '' ),
					'lp_limited_image_5'       => array( 'label' => '画像 5',                                  'type' => 'image',    'placeholder' => '' ),
					'lp_limited_image_6'       => array( 'label' => '画像 6',                                  'type' => 'image',    'placeholder' => '' ),
					'lp_limited_cta_text'      => array( 'label' => 'ボタン テキスト',                         'type' => 'text',     'placeholder' => 'Shop Now' ),
					'lp_limited_cta_url'       => array( 'label' => 'ボタン URL（固定ページ URL を貼り付け）', 'type' => 'text',     'placeholder' => '' ),
				),
			),
			'films' => array(
				'label'  => 'Short Film セクション',
				'fields' => array(
					'lp_film_section_label' => array( 'label' => 'セクションラベル',                                'type' => 'text',  'placeholder' => 'Short Film' ),
					'lp_film_video_url'     => array( 'label' => '動画ファイル URL（.mp4）自動再生・背景として使用', 'type' => 'text',  'placeholder' => 'https://...' ),
					'lp_film_poster_url'    => array( 'label' => 'ポスター画像（動画のフォールバック）',            'type' => 'image', 'placeholder' => '' ),
					'lp_film_title'         => array( 'label' => 'フィルムタイトル',                               'type' => 'text',  'placeholder' => 'Film Title' ),
					'lp_film_subtitle'      => array( 'label' => 'サブタイトル（役割・説明）',                     'type' => 'text',  'placeholder' => 'Direction / Cinematography' ),
					'lp_film_cta_text'      => array( 'label' => 'ボタン テキスト',                                'type' => 'text',  'placeholder' => 'Watch Film' ),
					'lp_film_cta_url'       => array( 'label' => 'ボタン URL（ポートフォリオページ URL）',         'type' => 'text',  'placeholder' => '' ),
				),
			),
		);
		?>
		<style>
			#munio-lp-settings { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
			.lp-mb-group { margin-bottom: 32px; }
			.lp-mb-group h4 { font-size: 12px; font-weight: 700; color: #1d2327; text-transform: uppercase; letter-spacing: .06em; border-bottom: 1px solid #e2e4e7; padding-bottom: 10px; margin: 0 0 16px; }
			.lp-mb-row { display: flex; gap: 16px; margin-bottom: 14px; align-items: flex-start; }
			.lp-mb-row label { width: 210px; flex-shrink: 0; font-size: 12px; font-weight: 500; color: #50575e; padding-top: 6px; line-height: 1.4; }
			.lp-mb-row .lp-mb-input { flex: 1; }
			.lp-mb-row input[type="text"],
			.lp-mb-row input[type="number"],
			.lp-mb-row textarea { width: 100%; box-sizing: border-box; font-size: 13px; }
			.lp-mb-row textarea { min-height: 90px; resize: vertical; }
			.lp-mb-img-wrap { display: flex; align-items: center; gap: 10px; }
			.lp-mb-img-wrap input { flex: 1; }
			.lp-mb-img-preview { width: 56px; height: 56px; object-fit: cover; border-radius: 3px; border: 1px solid #e2e4e7; display: none; flex-shrink: 0; }
			/* Sortable */
			.lp-mb-order-note { font-size: 12px; color: #646970; margin: 0 0 12px; }
			.lp-mb-sortable { list-style: none; margin: 0; padding: 0; }
			.lp-mb-sortable li { display: flex; align-items: center; gap: 10px; padding: 10px 14px; background: #f6f7f7; border: 1px solid #dcdcde; border-radius: 3px; margin-bottom: 6px; cursor: grab; font-size: 13px; font-weight: 500; color: #1d2327; user-select: none; }
			.lp-mb-sortable li:active { cursor: grabbing; background: #f0f6fc; border-color: #2271b1; }
			.lp-mb-sortable li .lp-mb-handle { color: #b4b9be; font-size: 16px; line-height: 1; }
			.lp-mb-hero-fixed { display: flex; align-items: center; gap: 10px; padding: 10px 14px; background: #f0f0f1; border: 1px solid #dcdcde; border-radius: 3px; margin-bottom: 6px; font-size: 13px; font-weight: 500; color: #787c82; }
			.lp-mb-hero-fixed .lp-mb-handle { color: #c8cbcf; }
		</style>
		<script>
		jQuery( function( $ ) {
			// Sortable section order
			var $list  = $( '#lp-section-sortable' );
			var $input = $( '#lp-section-order-input' );

			function updateOrderInput() {
				var order = [];
				$list.find( 'li' ).each( function() { order.push( $( this ).data( 'key' ) ); } );
				$input.val( order.join( ',' ) );
			}

			$list.sortable( {
				handle: '.lp-mb-handle',
				axis: 'y',
				update: updateOrderInput
			} );

			// Media picker
			$( '.lp-mb-media-btn' ).on( 'click', function( e ) {
				e.preventDefault();
				var $btn     = $( this );
				var $input   = $btn.closest( '.lp-mb-img-wrap' ).find( 'input[type="text"]' );
				var $preview = $btn.closest( '.lp-mb-img-wrap' ).find( '.lp-mb-img-preview' );
				var frame = wp.media( { title: '画像を選択', button: { text: '選択' }, multiple: false } );
				frame.on( 'select', function() {
					var att = frame.state().get( 'selection' ).first().toJSON();
					$input.val( att.url );
					$preview.attr( 'src', att.url ).show();
				} );
				frame.open();
			} );

			// Pre-fill existing image previews
			$( '.lp-mb-img-wrap input[type="text"]' ).each( function() {
				var url = $( this ).val();
				if ( url ) $( this ).closest( '.lp-mb-img-wrap' ).find( '.lp-mb-img-preview' ).attr( 'src', url ).show();
			} );
		} );
		</script>

		<!-- ── セクション並び順 ───────────────────────── -->
		<div class="lp-mb-group">
			<h4>セクション並び順</h4>
			<p class="lp-mb-order-note">☰ をドラッグして順番を変更できます（Hero は常に最上部に固定）</p>
			<input type="hidden" name="lp_section_order" id="lp-section-order-input"
			       value="<?php echo esc_attr( implode( ',', $order_keys ) ); ?>">
			<!-- Hero fixed -->
			<div class="lp-mb-hero-fixed">
				<span class="lp-mb-handle">☰</span> Hero
			</div>
			<!-- Sortable -->
			<ul class="lp-mb-sortable" id="lp-section-sortable">
				<?php foreach ( $order_keys as $key ) :
					if ( ! isset( $section_labels[ $key ] ) ) continue; ?>
				<li data-key="<?php echo esc_attr( $key ); ?>">
					<span class="lp-mb-handle">☰</span>
					<?php echo esc_html( $section_labels[ $key ] ); ?>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<!-- ── Hero（固定・並び替え対象外） ───────────── -->
		<?php
		$hero_section = $sections['hero'];
		?>
		<div class="lp-mb-group">
			<h4><?php echo esc_html( $hero_section['label'] ); ?></h4>
			<?php foreach ( $hero_section['fields'] as $key => $field ) :
				$value = get_post_meta( $post->ID, $key, true ); ?>
			<div class="lp-mb-row">
				<label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field['label'] ); ?></label>
				<div class="lp-mb-input">
					<?php echo munio_lp_render_field( $key, $field, $value ); ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		<!-- ── 並び替え対象セクション ─────────────────── -->
		<?php foreach ( $order_keys as $key ) :
			if ( ! isset( $sections[ $key ] ) ) continue;
			$section = $sections[ $key ];
			$fields  = $section['fields']; ?>
		<div class="lp-mb-group" id="lp-mb-section-<?php echo esc_attr( $key ); ?>">
			<h4><?php echo esc_html( $section['label'] ); ?></h4>
			<?php foreach ( $fields as $fkey => $field ) :
				$value = get_post_meta( $post->ID, $fkey, true ); ?>
			<div class="lp-mb-row">
				<label for="<?php echo esc_attr( $fkey ); ?>"><?php echo esc_html( $field['label'] ); ?></label>
				<div class="lp-mb-input">
					<?php echo munio_lp_render_field( $fkey, $field, $value ); ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endforeach; ?>
		<?php
	}
}

/**
 * フィールド HTML を返すヘルパー
 */
if ( ! function_exists( 'munio_lp_render_field' ) ) {
	function munio_lp_render_field( $key, $field, $value ) {
		ob_start();
		if ( 'textarea' === $field['type'] ) : ?>
		<textarea id="<?php echo esc_attr( $key ); ?>"
		          name="<?php echo esc_attr( $key ); ?>"
		          placeholder="<?php echo esc_attr( $field['placeholder'] ); ?>"><?php echo esc_textarea( $value ); ?></textarea>
		<?php elseif ( 'image' === $field['type'] ) : ?>
		<div class="lp-mb-img-wrap">
			<input type="text"
			       id="<?php echo esc_attr( $key ); ?>"
			       name="<?php echo esc_attr( $key ); ?>"
			       value="<?php echo esc_attr( $value ); ?>"
			       placeholder="画像 URL、またはメディアから選択">
			<button type="button" class="button lp-mb-media-btn">メディアから選択</button>
			<img class="lp-mb-img-preview" src="<?php echo esc_attr( $value ); ?>" alt="">
		</div>
		<?php elseif ( 'number' === $field['type'] ) : ?>
		<input type="number"
		       id="<?php echo esc_attr( $key ); ?>"
		       name="<?php echo esc_attr( $key ); ?>"
		       value="<?php echo esc_attr( $value ); ?>"
		       placeholder="<?php echo esc_attr( $field['placeholder'] ); ?>"
		       min="1" max="24" style="width:80px;">
		<?php else : ?>
		<input type="text"
		       id="<?php echo esc_attr( $key ); ?>"
		       name="<?php echo esc_attr( $key ); ?>"
		       value="<?php echo esc_attr( $value ); ?>"
		       placeholder="<?php echo esc_attr( $field['placeholder'] ); ?>">
		<?php endif;
		return ob_get_clean();
	}
}

if ( ! function_exists( 'munio_lp_save_metabox' ) ) {
	function munio_lp_save_metabox( $post_id ) {
		if ( ! isset( $_POST['munio_lp_nonce'] ) ) {
			return;
		}
		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['munio_lp_nonce'] ) ), 'munio_lp_save' ) ) {
			return;
		}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

		// セクション並び順
		if ( isset( $_POST['lp_section_order'] ) ) {
			$allowed = array( 'about', 'works', 'posts', 'limited', 'films' );
			$order   = array_filter( explode( ',', sanitize_text_field( wp_unslash( $_POST['lp_section_order'] ) ) ) );
			$order   = array_values( array_intersect( $order, $allowed ) );
			update_post_meta( $post_id, 'lp_section_order', implode( ',', $order ) );
		}

		$text_fields = array(
			'lp_hero_bg_image', 'lp_hero_name', 'lp_hero_title', 'lp_hero_tagline',
			'lp_hero_cta_text', 'lp_hero_cta_anchor',
			'lp_about_section_label', 'lp_about_image', 'lp_about_name', 'lp_about_skills',
			'lp_about_cta_text', 'lp_about_cta_url',
			'lp_works_section_label', 'lp_works_section_heading',
			'lp_works_count', 'lp_works_category', 'lp_works_cta_text', 'lp_works_cta_url',
			'lp_posts_section_label', 'lp_posts_section_heading',
			'lp_posts_count', 'lp_posts_cta_text', 'lp_posts_cta_url',
			'lp_limited_section_label', 'lp_limited_headline', 'lp_limited_cta_text', 'lp_limited_cta_url',
			'lp_limited_image_1', 'lp_limited_image_2', 'lp_limited_image_3',
			'lp_limited_image_4', 'lp_limited_image_5', 'lp_limited_image_6',
			'lp_film_section_label', 'lp_film_video_url', 'lp_film_poster_url', 'lp_film_title', 'lp_film_subtitle',
			'lp_film_cta_text', 'lp_film_cta_url',
		);
		$textarea_fields = array( 'lp_about_bio', 'lp_limited_desc' );

		foreach ( $text_fields as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
			}
		}
		foreach ( $textarea_fields as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_post_meta( $post_id, $field, sanitize_textarea_field( wp_unslash( $_POST[ $field ] ) ) );
			}
		}
	}
	add_action( 'save_post', 'munio_lp_save_metabox' );
}
