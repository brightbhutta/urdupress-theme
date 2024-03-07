<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Urdu News
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title text-center"><?php esc_html_e( 'ہم  معذرت چاہتے ہیں', 'unews' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content text-center">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'unews' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<h4 class="text-center"><?php esc_html_e( 'آپ کی مطلوبہ سرچ ٹرم سے متعلق ہماری ویب سائٹ پر کوئ مواد موجود نہیں! براہ کرم کسی اور سرچ ٹرم کے ساتھ دوبارہ کوشش کریں', 'unews' ); ?></h4>
			<div class="posts-404">
				<?php get_template_part( 'template-parts/posts', '404' ); ?>
			</div>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'unews' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
