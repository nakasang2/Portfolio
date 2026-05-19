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
				'label'  => 'Short Film セクション（最下部・代表作1本）',
				'fields' => array(
					'lp_film_section_label' => array( 'label' => 'セクションラベル',                                    'type' => 'text',     'placeholder' => 'Short Film' ),
					'lp_film_video_url'     => array( 'label' => '動画ファイル URL（.mp4）自動再生・背景として使用', 'type' => 'text',     'placeholder' => 'https://...' ),
					'lp_film_poster_url'    => array( 'label' => 'ポスター画像（動画のフォールバック）',            'type' => 'image',    'placeholder' => '' ),
					'lp_film_title'         => array( 'label' => 'フィルムタイトル',                               'type' => 'text',     'placeholder' => 'Film Title' ),
					'lp_film_subtitle'      => array( 'label' => 'サブタイトル（役割・説明）',                     'type' => 'text',     'placeholder' => 'Direction / Cinematography' ),
					'lp_film_cta_text'      => array( 'label' => 'ボタン テキスト',                                'type' => 'text',     'placeholder' => 'Watch Film' ),
					'lp_film_cta_url'       => array( 'label' => 'ボタン URL（ポートフォリオページ URL）',         'type' => 'text',     'placeholder' => '' ),
				),
			),
		);
		?>
		<style>
			#munio-lp-settings { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
			.lp-mb-notice { background: #f0f6fc; border-left: 3px solid #2271b1; padding: 10px 14px; margin-bottom: 20px; font-size: 12px; color: #444; }
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
		</style>
		<script>
		jQuery( function( $ ) {
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

		<?php foreach ( $sections as $section_key => $section ) :
			$fields = $section['fields']; ?>
		<div class="lp-mb-group">
			<h4><?php echo esc_html( $section['label'] ); ?></h4>
			<?php foreach ( $fields as $key => $field ) :
				$value = get_post_meta( $post->ID, $key, true ); ?>
			<div class="lp-mb-row">
				<label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field['label'] ); ?></label>
				<div class="lp-mb-input">
					<?php if ( 'textarea' === $field['type'] ) : ?>
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
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endforeach; ?>
		<?php
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

		$text_fields = array(
			'lp_hero_bg_image', 'lp_hero_name', 'lp_hero_title', 'lp_hero_tagline',
			'lp_hero_cta_text', 'lp_hero_cta_anchor',
			'lp_about_section_label', 'lp_about_image', 'lp_about_name', 'lp_about_skills',
			'lp_works_section_label', 'lp_works_section_heading',
			'lp_works_count', 'lp_works_category', 'lp_works_cta_text', 'lp_works_cta_url',
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
