<?php
namespace MkdCore\CPT\Slider;

use MkdCore\Lib;

/**
 * Class SliderRegister
 * @package MkdCore\CPT\Slider
 */
class SliderRegister implements Lib\PostTypeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'slides';
        $this->taxBase = 'slides_category';
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
     * Registers custom post type with WordPress
     */
    private function registerPostType() {
        global $libero_mikado_Framework;

        $menuPosition = 5;
        $menuIcon = 'dashicons-admin-post';

        if(mkd_core_theme_installed()) {
            $menuPosition = $libero_mikado_Framework->getSkin()->getMenuItemPosition('slider');
            $menuIcon = $libero_mikado_Framework->getSkin()->getMenuIcon('slider');
        }

        register_post_type($this->base,
            array(
                'labels' 		=> array(
                    'name' 				=> __('Mikado Slider','mikado_core' ),
                    'menu_name'	=> __('Mikado Slider','mikado_core' ),
                    'all_items'	=> __('Slides','mikado_core' ),
                    'add_new' =>  __('Add New Slide','mikado_core'),
                    'singular_name' 	=> __('Slide','mikado_core' ),
                    'add_item'			=> __('New Slide','mikado_core'),
                    'add_new_item' 		=> __('Add New Slide','mikado_core'),
                    'edit_item' 		=> __('Edit Slide','mikado_core')
                ),
                'public'		=>	false,
                'show_in_menu'	=>	true,
                'rewrite' 		=> 	array('slug' => 'slides'),
                'menu_position' => 	$menuPosition,
                'show_ui'		=>	true,
                'has_archive'	=>	false,
                'hierarchical'	=>	false,
                'supports'		=>	array('title', 'thumbnail', 'page-attributes'),
                'menu_icon'  =>  $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name' => __( 'Sliders', 'mikado_core' ),
            'singular_name' => __( 'Slider', 'mikado_core' ),
            'search_items' =>  __( 'Search Sliders','mikado_core' ),
            'all_items' => __( 'All Sliders','mikado_core' ),
            'parent_item' => __( 'Parent Slider','mikado_core' ),
            'parent_item_colon' => __( 'Parent Slider:','mikado_core' ),
            'edit_item' => __( 'Edit Slider','mikado_core' ),
            'update_item' => __( 'Update Slider','mikado_core' ),
            'add_new_item' => __( 'Add New Slider','mikado_core' ),
            'new_item_name' => __( 'New Slider Name','mikado_core' ),
            'menu_name' => __( 'Sliders','mikado_core' ),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'slides-category' ),
        ));
    }
}