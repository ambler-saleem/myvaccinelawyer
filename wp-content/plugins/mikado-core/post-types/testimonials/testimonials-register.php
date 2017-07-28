<?php
namespace MkdCore\CPT\Testimonials;

use MkdCore\Lib;


/**
 * Class TestimonialsRegister
 * @package MkdCore\CPT\Testimonials
 */
class TestimonialsRegister implements Lib\PostTypeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'testimonials';
        $this->taxBase = 'testimonials_category';
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Registers custom post type with WordPress
     */
    public function register() {
        $this->registerPostType();
        $this->registerTax();
    }

    /**
     * Regsiters custom post type with WordPress
     */
    private function registerPostType() {
        global $libero_mikado_Framework;

        $menuPosition = 5;
        $menuIcon = 'dashicons-admin-post';

        if(mkd_core_theme_installed()) {
            $menuPosition = $libero_mikado_Framework->getSkin()->getMenuItemPosition('testimonial');
            $menuIcon = $libero_mikado_Framework->getSkin()->getMenuIcon('testimonial');
        }

        register_post_type('testimonials',
            array(
                'labels' 		=> array(
                    'name' 				=> __('Testimonials','mikado_core' ),
                    'singular_name' 	=> __('Testimonial','mikado_core' ),
                    'add_item'			=> __('New Testimonial','mikado_core'),
                    'add_new_item' 		=> __('Add New Testimonial','mikado_core'),
                    'edit_item' 		=> __('Edit Testimonial','mikado_core')
                ),
                'public'		=>	false,
                'show_in_menu'	=>	true,
                'rewrite' 		=> 	array('slug' => 'testimonials'),
                'menu_position' => 	$menuPosition,
                'show_ui'		=>	true,
                'has_archive'	=>	false,
                'hierarchical'	=>	false,
                'supports'		=>	array('title', 'thumbnail'),
                'menu_icon'  =>  $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name' => __( 'Testimonials Categories', 'mikado_core' ),
            'singular_name' => __( 'Testimonial Category', 'mikado_core' ),
            'search_items' =>  __( 'Search Testimonials Categories','mikado_core' ),
            'all_items' => __( 'All Testimonials Categories','mikado_core' ),
            'parent_item' => __( 'Parent Testimonial Category','mikado_core' ),
            'parent_item_colon' => __( 'Parent Testimonial Category:','mikado_core' ),
            'edit_item' => __( 'Edit Testimonials Category','mikado_core' ),
            'update_item' => __( 'Update Testimonials Category','mikado_core' ),
            'add_new_item' => __( 'Add New Testimonials Category','mikado_core' ),
            'new_item_name' => __( 'New Testimonials Category Name','mikado_core' ),
            'menu_name' => __( 'Testimonials Categories','mikado_core' ),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'testimonials-category' ),
        ));
    }

}