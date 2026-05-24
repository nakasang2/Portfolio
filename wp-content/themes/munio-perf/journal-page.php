<?php
/*
Template name: Journal
*/

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style(
		'munio-journal',
		get_template_directory_uri() . '/css/journal.css',
		array(),
		filemtime( get_template_directory() . '/css/journal.css' )
	);
} );

get_header();

if ( ! have_posts() ) {
	get_footer();
	return;
}

the_post();
$pid       = get_the_ID();
$use_ajax  = munio_get_theme_options( 'clapat_munio_enable_ajax' );
$paged     = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

// ページ設定（メタ or デフォルト）
$page_title    = get_the_title() ?: 'Journal';
$page_subtitle = get_post_meta( $pid, 'journal_subtitle', true ) ?: '';
$posts_per     = absint( get_post_meta( $pid, 'journal_posts_per_page', true ) ?: 9 );

$arrow_icon = '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M1 7h12M7 1l6 6-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>

<div id="main">
<div id="main-content">

	<!-- ================================================
	     PAGE HEADER
	     ================================================ -->
	<section class="journal-hero">
		<div class="journal-hero__inner">
			<span class="journal-hero__eyebrow">Journal</span>
			<h1 class="journal-hero__title"><?php echo esc_html( $page_title ); ?></h1>
			<?php if ( $page_subtitle ) : ?>
			<p class="journal-hero__subtitle"><?php echo esc_html( $page_subtitle ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<!-- ================================================
	     POSTS GRID
	     ================================================ -->
	<section class="journal-section">

		<?php
		$posts_query = new WP_Query( array(
			'post_type'      => 'post',
			'posts_per_page' => $posts_per,
			'post_status'    => 'publish',
			'paged'          => $paged,
		) );
		?>

		<?php if ( $posts_query->have_posts() ) : ?>
		<div class="journal-grid">
			<?php while ( $posts_query->have_posts() ) : $posts_query->the_post();
				$thumb    = get_the_post_thumbnail_url( get_the_ID(), 'large' );
				$cats     = get_the_category();
				$cat_name = ! empty( $cats ) ? $cats[0]->name : '';
			?>
			<a class="journal-card hide-ball<?php echo $use_ajax ? ' ajax-link' : ''; ?>"
			   <?php echo $use_ajax ? 'data-type="page-transition"' : ''; ?>
			   href="<?php the_permalink(); ?>">

				<div class="journal-card__thumb">
					<?php if ( $thumb ) : ?>
					<img src="<?php echo esc_url( $thumb ); ?>"
					     alt="<?php echo esc_attr( get_the_title() ); ?>"
					     loading="lazy">
					<?php else : ?>
					<div class="journal-card__thumb-placeholder"></div>
					<?php endif; ?>
				</div>

				<div class="journal-card__body">
					<div class="journal-card__meta">
						<span class="journal-card__date"><?php echo esc_html( get_the_date() ); ?></span>
						<?php if ( $cat_name ) : ?>
						<span class="journal-card__cat"><?php echo esc_html( $cat_name ); ?></span>
						<?php endif; ?>
					</div>
					<h2 class="journal-card__title"><?php the_title(); ?></h2>
					<p class="journal-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22, '…' ) ); ?></p>
					<span class="journal-card__read">
						Read More <?php echo $arrow_icon; ?>
					</span>
				</div>

			</a>
			<?php endwhile; ?>
		</div>

		<!-- Pagination -->
		<?php
		$big = 999999999;
		$pagination = paginate_links( array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, $paged ),
			'total'     => $posts_query->max_num_pages,
			'prev_text' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M10 3L5 8l5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'next_text' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M6 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'type'      => 'plain',
		) );
		if ( $pagination ) : ?>
		<nav class="journal-pagination" aria-label="ページナビゲーション">
			<?php echo $pagination; ?>
		</nav>
		<?php endif; ?>

		<?php else : ?>
		<p class="journal-empty">投稿が見つかりませんでした。</p>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

	</section>

</div>
</div>

<?php get_footer(); ?>
