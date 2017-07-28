<?php
namespace MkdCore\CPT\Carousels;

use MkdCore\Lib;

/**
 * Class CarouselRegister
 * @package MkdCore\CPT\Carousels
 */
class CarouselRegister implements Lib\PostTypeInterface {
    /**
     * @var string
     */
    private $base;
    /**
     * @var string
     */
    private $taxBase;

    public function __construct() {
        $this->base = 'carousels';
        $this->taxBase = 'carousels_category';
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
            $menuPosition = $libero_mikado_Framework->getSkin()->getMenuItemPosition('carousel');
            $menuIcon = $libero_mikado_Framework->getSkin()->getMenuIcon('carousel');
        }

        register_post_type($this->base,
            array(
                'labels'    => array(
                    'name'        => __('Mikado Carousel','mikado_core' ),
                    'menu_name' => __('Mikado Carousel','mikado_core' ),
                    'all_items' => __('Carousel Items','mikado_core' ),
                    'add_new' =>  __('Add New Carousel Item','mikado_core'),
                    'singular_name'   => __('Carousel Item','mikado_core' ),
                    'add_item'      => __('New Carousel Item','mikado_core'),
                    'add_new_item'    => __('Add New Carousel Item','mikado_core'),
                    'edit_item'     => __('Edit Carousel Item','mikado_core')
                ),
                'public'    =>  false,
                'show_in_menu'  =>  true,
                'rewrite'     =>  array('slug' => 'carousels'),
                'menu_position' =>  $menuPosition,
                'show_ui'   =>  true,
                'has_archive' =>  false,
                'hierarchical'  =>  false,
                'supports'    =>  array('title'),
                'menu_icon'  =>  $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name' => __( 'Carousels', 'mikado_core' ),
            'singular_name' => __( 'Carousel', 'mikado_core' ),
            'search_items' =>  __( 'Search Carousels','mikado_core' ),
            'all_items' => __( 'All Carousels','mikado_core' ),
            'parent_item' => __( 'Parent Carousel','mikado_core' ),
            'parent_item_colon' => __( 'Parent Carousel:','mikado_core' ),
            'edit_item' => __( 'Edit Carousel','mikado_core' ),
            'update_item' => __( 'Update Carousel','mikado_core' ),
            'add_new_item' => __( 'Add New Carousel','mikado_core' ),
            'new_item_name' => __( 'New Carousel Name','mikado_core' ),
            'menu_name' => __( 'Carousels','mikado_core' ),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'carousels-category' ),
        ));
    }

}