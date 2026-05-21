<?php
/*
Template name: LP Template
*/

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'munio-lp', get_template_directory_uri() . '/css/lp.css', array(), filemtime( get_template_directory() . '/css/lp.css' ) );
} );

get_header();

if ( ! have_posts() ) {
	get_footer();
	return;
}

the_post();
$pid = get_the_ID();

$hero_bg      = get_post_meta( $pid, 'lp_hero_bg_image',   true );
$hero_name    = get_post_meta( $pid, 'lp_hero_name',       true );
$hero_title   = get_post_meta( $pid, 'lp_hero_title',      true );
$hero_tagline = get_post_meta( $pid, 'lp_hero_tagline',    true );
$hero_cta     = get_post_meta( $pid, 'lp_hero_cta_text',   true ) ?: 'View Works';
$hero_anchor  = get_post_meta( $pid, 'lp_hero_cta_anchor', true ) ?: '#works';

$about_section_label = get_post_meta( $pid, 'lp_about_section_label', true ) ?: 'About';
$about_image         = get_post_meta( $pid, 'lp_about_image',  true );
$about_name          = get_post_meta( $pid, 'lp_about_name',   true );
$about_bio           = get_post_meta( $pid, 'lp_about_bio',    true );
$about_skills        = get_post_meta( $pid, 'lp_about_skills', true );
$about_cta_text      = get_post_meta( $pid, 'lp_about_cta_text', true ) ?: 'Contact';
$about_cta_url       = get_post_meta( $pid, 'lp_about_cta_url',  true );

$works_section_label   = get_post_meta( $pid, 'lp_works_section_label',   true ) ?: 'Selected Works';
$works_section_heading = get_post_meta( $pid, 'lp_works_section_heading', true ) ?: 'Works';
$works_count           = absint( get_post_meta( $pid, 'lp_works_count',    true ) ?: 6 );
$works_category        = get_post_meta( $pid, 'lp_works_category', true );
$works_cta_text        = get_post_meta( $pid, 'lp_works_cta_text', true ) ?: 'View All Works';
$works_cta_url         = get_post_meta( $pid, 'lp_works_cta_url',  true );

$limited_section_label = get_post_meta( $pid, 'lp_limited_section_label', true ) ?: 'Limited Edition';
$limited_headline      = get_post_meta( $pid, 'lp_limited_headline', true );
$limited_desc          = get_post_meta( $pid, 'lp_limited_desc',     true );
$limited_cta_text      = get_post_meta( $pid, 'lp_limited_cta_text', true ) ?: 'Shop Now';
$limited_cta_url       = get_post_meta( $pid, 'lp_limited_cta_url',  true );
$limited_images        = array_filter( array(
	get_post_meta( $pid, 'lp_limited_image_1', true ),
	get_post_meta( $pid, 'lp_limited_image_2', true ),
	get_post_meta( $pid, 'lp_limited_image_3', true ),
	get_post_meta( $pid, 'lp_limited_image_4', true ),
	get_post_meta( $pid, 'lp_limited_image_5', true ),
	get_post_meta( $pid, 'lp_limited_image_6', true ),
) );

$film_section_label = get_post_meta( $pid, 'lp_film_section_label', true ) ?: 'Short Film';
$film_video_url     = get_post_meta( $pid, 'lp_film_video_url',  true );
$film_poster_url    = get_post_meta( $pid, 'lp_film_poster_url', true );
$film_title         = get_post_meta( $pid, 'lp_film_title',      true );
$film_subtitle      = get_post_meta( $pid, 'lp_film_subtitle',   true );
$film_cta_text      = get_post_meta( $pid, 'lp_film_cta_text',   true ) ?: 'Watch Film';
$film_cta_url       = get_post_meta( $pid, 'lp_film_cta_url',    true );

$arrow_icon = '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M1 7h12M7 1l6 6-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

$use_ajax = munio_get_theme_options( 'clapat_munio_enable_ajax' );
?>

<div id="main">
<div id="main-content">

	<!-- ====================================================
	     HERO
	     ==================================================== -->
	<section class="lp-hero" id="top">
		<?php if ( $hero_bg ) : ?>
		<div class="lp-hero__bg" style="background-image:url('<?php echo esc_url( $hero_bg ); ?>')"></div>
		<?php endif; ?>
		<div class="lp-hero__overlay"></div>

		<div class="lp-hero__content">
			<?php if ( $hero_title ) : ?>
			<p class="lp-hero__eyebrow"><?php echo esc_html( $hero_title ); ?></p>
			<?php endif; ?>

			<?php if ( $hero_name ) : ?>
			<h1 class="lp-hero__name"><?php echo esc_html( $hero_name ); ?></h1>
			<?php endif; ?>

			<?php if ( $hero_tagline ) : ?>
			<p class="lp-hero__tagline"><?php echo esc_html( $hero_tagline ); ?></p>
			<?php endif; ?>

			<a href="<?php echo esc_attr( $hero_anchor ); ?>" class="lp-hero__cta hide-ball">
				<?php echo esc_html( $hero_cta ); ?>
				<?php echo $arrow_icon; ?>
			</a>
		</div>

		<div class="lp-hero__scroll" id="lp-scroll-hint" aria-hidden="true">
			<div class="lp-hero__scroll-mouse">
				<div class="lp-hero__scroll-wheel"></div>
			</div>
			<svg class="lp-hero__scroll-chevron" width="14" height="8" viewBox="0 0 14 8" fill="none">
				<path d="M1 1l6 6 6-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</div>
	</section>

	<!-- ====================================================
	     ABOUT
	     ==================================================== -->
	<?php if ( $about_name || $about_bio || $about_image ) : ?>
	<section id="about" class="lp-section lp-section--alt">
		<div class="lp-about__inner">

			<?php if ( $about_image ) : ?>
			<div class="lp-about__image-wrap">
				<img class="lp-about__image"
				     src="<?php echo esc_url( $about_image ); ?>"
				     alt="<?php echo esc_attr( $about_name ?: 'Profile' ); ?>"
				     loading="lazy">
			</div>
			<?php endif; ?>

			<div class="lp-about__text">
				<span class="lp-section__label"><?php echo esc_html( $about_section_label ); ?></span>
				<?php if ( $about_name ) : ?>
				<h2 class="lp-about__name"><?php echo esc_html( $about_name ); ?></h2>
				<?php endif; ?>
				<?php if ( $about_bio ) : ?>
				<p class="lp-about__bio"><?php echo nl2br( esc_html( $about_bio ) ); ?></p>
				<?php endif; ?>
				<?php if ( $about_skills ) :
					$skills = array_filter( array_map( 'trim', explode( ',', $about_skills ) ) );
				?>
				<div class="lp-about__skills">
					<?php foreach ( $skills as $skill ) : ?>
					<span class="lp-about__skill"><?php echo esc_html( $skill ); ?></span>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>

				<?php if ( $about_cta_url ) : ?>
				<a href="<?php echo esc_url( $about_cta_url ); ?>"
				   class="lp-btn lp-btn--light hide-ball<?php echo $use_ajax ? ' ajax-link' : ''; ?>"
				   <?php echo $use_ajax ? 'data-type="page-transition"' : ''; ?>>
					<?php echo esc_html( $about_cta_text ); ?>
					<?php echo $arrow_icon; ?>
				</a>
				<?php endif; ?>
			</div>

		</div>
	</section>
	<?php endif; ?>

	<!-- ====================================================
	     SELECTED WORKS (horizontal carousel)
	     ==================================================== -->
	<section id="works" class="lp-section">
		<div class="lp-works__header">
			<div>
				<span class="lp-section__label"><?php echo esc_html( $works_section_label ); ?></span>
				<h2 class="lp-section__heading"><?php echo esc_html( $works_section_heading ); ?></h2>
			</div>
			<div class="lp-works__nav" aria-label="作品ナビゲーション">
				<button class="lp-works__nav-btn" id="lp-works-prev" aria-label="前へ">
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M10 3L5 8l5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
				<button class="lp-works__nav-btn" id="lp-works-next" aria-label="次へ">
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M6 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
			</div>
		</div>

		<?php
		$works_args = array(
			'post_type'      => 'munio_portfolio',
			'posts_per_page' => $works_count,
			'post_status'    => 'publish',
		);
		if ( $works_category ) {
			$works_args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio_category',
					'field'    => 'slug',
					'terms'    => array_map( 'trim', explode( ',', $works_category ) ),
				),
			);
		}
		$works_query = new WP_Query( $works_args );
		if ( $works_query->have_posts() ) :
		?>
		<div class="lp-works__carousel-wrap">
			<div class="lp-works__track" id="lp-works-track">
				<?php while ( $works_query->have_posts() ) : $works_query->the_post();
					$hero_img = get_post_meta( get_the_ID(), 'munio-opt-portfolio-hero-img', true );
					$thumb    = ( is_array( $hero_img ) && isset( $hero_img['url'] ) ) ? $hero_img['url'] : get_the_post_thumbnail_url( get_the_ID(), 'large' );
					$subtitle = get_post_meta( get_the_ID(), 'munio-opt-portfolio-subtitle', true );
				?>
				<a class="lp-works__item hide-ball<?php echo $use_ajax ? ' ajax-link' : ''; ?>"
				   <?php echo $use_ajax ? 'data-type="page-transition"' : ''; ?>
				   href="<?php the_permalink(); ?>">
					<?php if ( $thumb ) : ?>
					<img class="lp-works__item-image"
					     src="<?php echo esc_url( $thumb ); ?>"
					     alt="<?php echo esc_attr( get_the_title() ); ?>"
					     loading="lazy">
					<?php endif; ?>
					<div class="lp-works__item-info">
						<div class="lp-works__item-title"><?php the_title(); ?></div>
						<?php if ( $subtitle ) : ?>
						<div class="lp-works__item-subtitle"><?php echo esc_html( $subtitle ); ?></div>
						<?php endif; ?>
					</div>
				</a>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if ( $works_cta_url ) : ?>
		<div class="lp-works__cta-wrap">
			<a href="<?php echo esc_url( $works_cta_url ); ?>"
			   class="lp-btn hide-ball<?php echo $use_ajax ? ' ajax-link' : ''; ?>"
			   <?php echo $use_ajax ? 'data-type="page-transition"' : ''; ?>>
				<?php echo esc_html( $works_cta_text ); ?>
				<?php echo $arrow_icon; ?>
			</a>
		</div>
		<?php endif; ?>
	</section>

	<!-- ====================================================
	     LIMITED EDITION
	     ==================================================== -->
	<?php if ( $limited_headline || $limited_cta_url || $limited_images ) : ?>
	<section id="limited" class="lp-limited white-section">
		<div class="lp-limited__inner">
			<?php if ( $limited_headline ) : ?>
			<h2 class="lp-limited__headline"><?php echo esc_html( $limited_headline ); ?></h2>
			<?php endif; ?>
			<?php if ( $limited_desc ) : ?>
			<p class="lp-limited__desc"><?php echo nl2br( esc_html( $limited_desc ) ); ?></p>
			<?php endif; ?>

			<?php if ( $limited_images ) : ?>
			<div class="lp-limited__gallery">
				<?php foreach ( $limited_images as $img_url ) : ?>
				<div class="lp-limited__gallery-item">
					<img src="<?php echo esc_url( $img_url ); ?>" alt="" loading="lazy">
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<?php if ( $limited_cta_url ) : ?>
			<a href="<?php echo esc_url( $limited_cta_url ); ?>"
			   class="lp-btn lp-btn--dark hide-ball<?php echo $use_ajax ? ' ajax-link' : ''; ?>"
			   <?php echo $use_ajax ? 'data-type="page-transition"' : ''; ?>>
				<?php echo esc_html( $limited_cta_text ); ?>
				<?php echo $arrow_icon; ?>
			</a>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ====================================================
	     SHORT FILM
	     ==================================================== -->
	<!-- ====================================================
	     SHORT FILM (single feature, video background)
	     ==================================================== -->
	<?php if ( $film_title || $film_video_url || $film_poster_url ) : ?>
	<section id="films" class="lp-film-feature">
		<?php if ( $film_video_url ) : ?>
		<video class="lp-film-feature__video"
		       autoplay muted loop playsinline
		       <?php if ( $film_poster_url ) : ?>poster="<?php echo esc_url( $film_poster_url ); ?>"<?php endif; ?>>
			<source src="<?php echo esc_url( $film_video_url ); ?>" type="video/mp4">
		</video>
		<?php elseif ( $film_poster_url ) : ?>
		<div class="lp-film-feature__poster" style="background-image:url('<?php echo esc_url( $film_poster_url ); ?>')"></div>
		<?php endif; ?>

		<div class="lp-film-feature__overlay"></div>

		<div class="lp-film-feature__content">
			<span class="lp-film-feature__eyebrow"><?php echo esc_html( $film_section_label ); ?></span>
			<?php if ( $film_title ) : ?>
			<h2 class="lp-film-feature__title"><?php echo esc_html( $film_title ); ?></h2>
			<?php endif; ?>
			<?php if ( $film_subtitle ) : ?>
			<p class="lp-film-feature__subtitle"><?php echo esc_html( $film_subtitle ); ?></p>
			<?php endif; ?>
			<?php if ( $film_cta_url ) : ?>
			<a href="<?php echo esc_url( $film_cta_url ); ?>"
			   class="lp-film-feature__cta hide-ball<?php echo $use_ajax ? ' ajax-link' : ''; ?>"
			   <?php echo $use_ajax ? 'data-type="page-transition"' : ''; ?>>
				<svg width="14" height="16" viewBox="0 0 14 16" fill="none" aria-hidden="true">
					<path d="M1 1l12 7-12 7V1z" fill="currentColor"/>
				</svg>
				<?php echo esc_html( $film_cta_text ); ?>
			</a>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

</div>
</div>

<script>
(function() {
	// Hero reveal
	var hero = document.querySelector('.lp-hero');
	if (hero) setTimeout(function() { hero.classList.add('is-loaded'); }, 100);

	// Scroll hint — fade out once user starts scrolling
	var scrollHint = document.getElementById('lp-scroll-hint');
	if (scrollHint) {
		var onScroll = function() {
			if (window.scrollY > 60) {
				scrollHint.classList.add('is-hidden');
				window.removeEventListener('scroll', onScroll);
			}
		};
		window.addEventListener('scroll', onScroll, { passive: true });
	}

	// Works carousel navigation
	var track = document.getElementById('lp-works-track');
	var prev  = document.getElementById('lp-works-prev');
	var next  = document.getElementById('lp-works-next');
	if (track && prev && next) {
		var scrollAmount = function() {
			var item = track.querySelector('.lp-works__item');
			if (!item) return 320;
			var itemWidth   = item.offsetWidth + 3; // +3 = gap
			var trackWidth  = track.parentElement.offsetWidth;
			var visibleCount = Math.max(1, Math.floor(trackWidth / itemWidth));
			return itemWidth * visibleCount;
		};
		next.addEventListener('click', function() {
			track.scrollBy({ left: scrollAmount(), behavior: 'smooth' });
		});
		prev.addEventListener('click', function() {
			track.scrollBy({ left: -scrollAmount(), behavior: 'smooth' });
		});
	}
})();
</script>

<?php get_footer(); ?>
