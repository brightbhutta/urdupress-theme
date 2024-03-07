<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Urdu News
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title text-center"><?php esc_html_e( 'ہم  معذرت چاہتے ہیں', 'unews' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content text-center">
					<h3 class="text-center pb1-0 mb-10"><?php esc_html_e( 'اس لنک پر کچھ بھی موجود نہیں، براہ کرم اپنے مطلوبہ لنک کی دوبارہ جانچ پڑتال کریں!
 یا آپ نیچے موجود لنکس کو بھی ملاحظہ فرما سکتے ہیں.', 'unews' ); ?></h3>
					<div class="posts-404">
						<?php get_template_part( 'template-parts/posts', '404' ); ?>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
