<?php
namespace MkdCore\CPT\Portfolio;

use MkdCore\Lib\PostTypeInterface;

/**
 * Class PortfolioRegister
 * @package MkdCore\CPT\Portfolio
 */
class PortfolioRegister implements PostTypeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'portfolio-item';
        $this->taxBase = 'portfolio-category';

        add_filter('single_template', array($this, 'registerSingleTemplate'));
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
        $this->registerTagTax();
    }

    /**
     * Registers portfolio single template if one does'nt exists in theme.
     * Hooked to single_template filter
     * @param $single string current template
     * @return string string changed template
     */
    public function registerSingleTemplate($single) {
        global $post;

        if($post->post_type == $this->base) {
            if(!file_exists(get_template_directory().'/single-portfolio-item.php')) {
                return MIKADO_CORE_CPT_PATH.'/portfolio/templates/single-'.$this->base.'.php';
            }
        }

        return $single;
    }

    /**
     * Registers custom post type with WordPress
     */
    private function registerPostType() {
        global $libero_mikado_Framework, $libero_mikado_options;

        $menuPosition = 5;
        $menuIcon = 'dashicons-admin-post';
        $slug = $this->base;

        if(mkd_core_theme_installed()) {
            $menuPosition = $libero_mikado_Framework->getSkin()->getMenuItemPosition('portfolio');
            $menuIcon = $libero_mikado_Framework->getSkin()->getMenuIcon('portfolio');

            if(isset($libero_mikado_options['portfolio_single_slug'])) {
                if($libero_mikado_options['portfolio_single_slug'] != ""){
                    $slug = $libero_mikado_options['portfolio_single_slug'];
                }
            }
        }

        register_post_type( $this->base,
            array(
                'labels' => array(
                    'name' => __( 'Portfolio','mikado_core' ),
                    'singular_name' => __( 'Portfolio Item','mikado_core' ),
                    'add_item' => __('New Portfolio Item','mikado_core'),
                    'add_new_item' => __('Add New Portfolio Item','mikado_core'),
                    'edit_item' => __('Edit Portfolio Item','mikado_core')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => $slug),
                'menu_position' => $menuPosition,
                'show_ui' => true,
                'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments'),
                'menu_icon'  =>  $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name' => __( 'Portfolio Categories', 'mikado_core' ),
            'singular_name' => __( 'Portfolio Category', 'mikado_core' ),
            'search_items' =>  __( 'Search Portfolio Categories','mikado_core' ),
            'all_items' => __( 'All Portfolio Categories','mikado_core' ),
            'parent_item' => __( 'Parent Portfolio Category','mikado_core' ),
            'parent_item_colon' => __( 'Parent Portfolio Category:','mikado_core' ),
            'edit_item' => __( 'Edit Portfolio Category','mikado_core' ),
            'update_item' => __( 'Update Portfolio Category','mikado_core' ),
            'add_new_item' => __( 'Add New Portfolio Category','mikado_core' ),
            'new_item_name' => __( 'New Portfolio Category Name','mikado_core' ),
            'menu_name' => __( 'Portfolio Categories','mikado_core' ),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'portfolio-category' ),
        ));
    }

    /**
     * Registers custom tag taxonomy with WordPress
     */
    private function registerTagTax() {
        $labels = array(
            'name' => __( 'Portfolio Tags', 'mikado_core' ),
            'singular_name' => __( 'Portfolio Tag', 'mikado_core' ),
            'search_items' =>  __( 'Search Portfolio Tags','mikado_core' ),
            'all_items' => __( 'All Portfolio Tags','mikado_core' ),
            'parent_item' => __( 'Parent Portfolio Tag','mikado_core' ),
            'parent_item_colon' => __( 'Parent Portfolio Tags:','mikado_core' ),
            'edit_item' => __( 'Edit Portfolio Tag','mikado_core' ),
            'update_item' => __( 'Update Portfolio Tag','mikado_core' ),
            'add_new_item' => __( 'Add New Portfolio Tag','mikado_core' ),
            'new_item_name' => __( 'New Portfolio Tag Name','mikado_core' ),
            'menu_name' => __( 'Portfolio Tags','mikado_core' ),
        );

        register_taxonomy('portfolio-tag',array($this->base), array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'portfolio-tag' ),
        ));
    }
}