<?php
/**
 * @var $title
 * @var $title_position
 * @var $url
 * @var $link_attributes
 * @var $new_window
 * @var $attributes
 * @var $classes
 */
?>

<?php if( $title_position == 'above' ) : ?>
	<?php echo $args['before_title'] . $title . $args['after_title']; ?>
<?php endif; ?>

<?php

?>
<div class="sow-image-container">
<?php if ( ! empty( $url ) ) : ?><a href="<?php echo sow_esc_url( $url ) ?>" <?php foreach( $link_attributes as $att => $val ) if ( ! empty( $val ) ) : echo $att.'="' . esc_attr( $val ) . '" '; endif; ?>><?php endif; ?>
	<img <?php foreach( $attributes as $n => $v ) if ( $n === 'alt' || ! empty( $v ) ) : echo $n.'="' . esc_attr( $v ) . '" '; endif; ?>
		class="<?php echo esc_attr( implode(' ', $classes ) ) ?>"/>
<?php if ( ! empty( $url ) ) : ?></a><?php endif; ?>
</div>

<!-- Begin extension -->
<?php if ( ! empty( $caption ) ) : ?>
	<div class="sow-image-caption-container">
		<div style="width:<?php echo $attributes['width']; ?>px;" class=sow-image-caption><small><em><?php echo $caption; ?></em></small></div>
	</div>
<?php endif; ?>
<!-- End extension -->

<?php if( $title_position == 'below' ) : ?>
	<?php echo $args['before_title'] . $title . $args['after_title']; ?>
<?php endif; ?>
