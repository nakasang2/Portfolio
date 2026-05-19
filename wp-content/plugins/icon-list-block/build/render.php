<?php
$id = wp_unique_id('ilbIconList-');
// Sanitize all links
if ( isset( $attributes['lists'] ) && is_array( $attributes['lists'] ) ) {
	foreach ( $attributes['lists'] as $key => $list ) {
		if ( isset( $list['link'] ) ) {
			$attributes['lists'][$key]['link'] = esc_url_raw(
				$list['link'],
				[ 'http', 'https', 'mailto', 'tel' ] // Only allow safe protocols
			);
		}
	}
}
?>
<div <?php echo wp_kses_post(get_block_wrapper_attributes()); ?> id='<?php echo esc_attr($id); ?>' data-attributes='<?php echo esc_attr(wp_json_encode($attributes)); ?>' data-ispremium="<?php echo ilbIsPremium() ? '1' : '0'; ?>">
</div>