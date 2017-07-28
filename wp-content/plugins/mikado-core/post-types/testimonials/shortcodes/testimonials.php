<?php

namespace MkdCore\CPT\Testimonials\Shortcodes;


use MkdCore\Lib;

/**
 * Class Testimonials
 * @package MkdCore\CPT\Testimonials\Shortcodes
 */
class Testimonials implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'mkd_testimonials';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     *
     * @see vc_map()
     */
    public function vcMap() {
        if(function_exists('vc_map')) {
            vc_map( array(
                'name' => 'Testimonials',
                'base' => $this->base,
                'category' => 'by MIKADO',
                'icon' => 'icon-wpb-testimonials extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params' => array(
                    array(
                        'type' => 'textfield',
						'admin_label' => true,
                        'heading' => 'Category',
                        'param_name' => 'category',
                        'value' => '',
                        'description' => 'Category Slug (leave empty for all)'
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => 'Number',
                        'param_name' => 'number',
                        'value' => '',
                        'description' => 'Number of Testimonials. 3 per slide'
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => 'Show Author',
                        'param_name' => 'show_author',
                        'value' => array(
                            'Yes' => 'yes',
                            'No' => 'no'
                        ),
						'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => 'Show Author Job Position',
                        'param_name' => 'show_position',
                        'value' => array(
                            'Yes' => 'yes',
							'No' => 'no',
                        ),
						'save_always' => true,
                        'dependency' => array('element' => 'show_author', 'value' => array('yes')),
                        'description' => ''
                    )
                )
            ) );
        }
    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null) {
        
        $args = array(
            'number' => '-1',
            'category' => '',
            'show_author' => 'yes',
            'show_position' => 'yes'
        );
		$params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);

        $number = esc_attr($number);
        $category = esc_attr($category);
		
		$query_args = $this->getQueryParams($params);

		$html = '';
        $html .= '<div class="mkd-testimonials-holder clearfix">';
        $html .= '<div class="mkd-testimonials">';

        query_posts($query_args);
        if (have_posts()) :
            while (have_posts()) : the_post();
                $author = get_post_meta(get_the_ID(), 'mkd_testimonial_author', true);
                $text = get_post_meta(get_the_ID(), 'mkd_testimonial_text', true);
                $job = get_post_meta(get_the_ID(), 'mkd_testimonial_author_position', true);

				$params['author'] = $author;
				$params['text'] = $text;
				$params['job'] = $job;
				$params['current_id'] = get_the_ID();				
				
				$html .= mkd_core_get_shortcode_module_template_part('testimonials','testimonials-template', '', $params);
				
            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'mikado_core');
        endif;

        wp_reset_query();
        $html .= '</div>';
		$html .= '</div>';
		
        return $html;
    }

	/**
    * Generates testimonials query attribute array
    *
    * @param $params
    *
    * @return array
    */
	private function getQueryParams($params){
		
		$args = array(
            'post_type' => 'testimonials',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => $params['number']
        );

        if ($params['category'] != '') {
            $args['testimonials_category'] = $params['category'];
        }
		return $args;
	}
	 
}