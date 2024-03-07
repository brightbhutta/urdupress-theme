<?php
function urdupress_meta_box( $meta_boxes ) {
	$prefix = 'upress_';

	$meta_boxes[] = array(
		'id' => 'page-layout',
		'title' => esc_html__( 'Page Layout', 'unews' ),
		'post_types' => array( 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'main_sidebar',
				'name' => esc_html__( 'Display Main Sidebar', 'unews' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Show or Hide Main Sidebar on Page', 'unews' ),
				'std' => true,
			),
			array(
				'id' => $prefix . 'main_sidebar_postion',
				'name' => esc_html__( 'Main Sidebar Position', 'unews' ),
				'type' => 'select',
				'desc' => esc_html__( 'Select Position for Main Sidebar (Left or Right)', 'unews' ),
				'placeholder' => '',
				'options' => array(
					1 => 'Left',
					'Right',
				),
				'std' => '1',
			),
			array(
				'id' => $prefix . 'mini_sidebar',
				'name' => esc_html__( 'Display Mini Sidebar', 'unews' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Show or Hide Mini Sidebar on Page', 'unews' ),
				'std' => true,
			),
			array(
				'id' => $prefix . 'mini_sidebar_postion',
				'name' => esc_html__( 'Mini Sidebar Position', 'unews' ),
				'type' => 'select',
				'desc' => esc_html__( 'Select Position for Mini Sidebar (Left or Right)', 'unews' ),
				'placeholder' => '',
				'options' => array(
					1 => 'Left',
					'Right',
				),
				'std' => '1',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'urdupress_meta_box' );