<?php
namespace MkdCore\CPT\Carousels\Shortcodes;

use MkdCore\Lib;

/**
 * Class Carousel
 * @package MkdCore\CPT\Carousels\Shortcodes
 */
class Carousel implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'mkd_carousel';

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
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     *
     * @see mkd_core_get_carousel_slider_array_vc()
     */
    public function vcMap() {

        vc_map( array(
            'name' => 'Mikado Carousel',
            'base' => $this->base,
            'category' => 'by MIKADO',
            'icon' => 'icon-wpb-carousel-slider extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => 'Carousel Slider',
                    'param_name' => 'carousel',
                    'value' => mkd_core_get_carousel_slider_array_vc(),
                    'description' => 'Note: For best visual appearance, please use sliders with at least 6 carousel items set.',
                    'admin_label' => true
                ),
				array(
					'type' => 'dropdown',
					'heading' => 'Carousel Type',
					'param_name' => 'type',
					'value' => array(
						'Default' => '',
						'Carousel Row' => 'row',
						'Carousel Grid' => 'grid'
					)
				),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Order By',
                    'param_name' => 'orderby',
                    'value' => array(
                        '' => '',
                        'Title' => 'title',
                        'Date' => 'date'
                    ),
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Order',
                    'param_name' => 'order',
                    'value' => array(
                        '' => '',
                        'ASC' => 'ASC',
                        'DESC' => 'DESC',
                    ),
                    'description' => ''
                ),
                array(
                	'type' => 'dropdown',
                	'heading' => 'Number of Items',
                	'param_name' => 'no_of_items',
                	'value' => array(
                		'Default' => '',
                		'4' => '4',
                		'5' => '5',
                		'6' => '6'
            		),
            		'save_always' => true,
            		'description' => 'Choose number of items to show initialy (number will change on smaller screens due to responsiveness)',
            		'dependency' => array('element' => 'type', 'value' => array('row'))
            	),
            	array(
            		'type' => 'textfield',
            		'heading' => 'Item Padding (px)',
            		'param_name' => 'padding',
        		),
				array(
					'type' => 'dropdown',
					'heading' => 'Pagination position',
					'param_name' => 'pag_position',
					'value' => array(
						'Default' => '',
						'Left' => 'left',
						'Right' => 'right'
					),
					'dependency'  => array('element' => 'type', 'value' => array('','grid'))
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Autoplay',
					'param_name' => 'autoplay',
					'value' => array(
						'Yes' => 'yes',
						'No' => 'no'
					),
					'save_always' => true
				)
            )
        ) );

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
            'carousel' => '',
            'type' => 'grid',
            'orderby' => 'date',
            'order' => 'ASC',
            'image_animation' => 'image-change',
            'no_of_items' => '',
            'padding' => '',
            'pag_position' => 'left',
            'autoplay' => ''
        );

        $params = shortcode_atts($args, $atts);

		extract($params);
		$carousel_classes = $this->getCarouselClasses($params);
		$carousel_data = $this->getCarouselData($params);

        $html = '';

        if ($carousel !== '') {

            $html .= '<div class="mkd-carousel-holder clearfix">';
            $html .= '<div class="mkd-carousel '.$carousel_classes.'" '.$carousel_data.'>';

            $args = array(
                'post_type' => 'carousels',
                'carousels_category' => $params['carousel'],
                'orderby' => $params['orderby'],
                'order' => $params['order'],
                'posts_per_page' => '-1'
            );

            $query = new \WP_Query($args);

            if ($query->have_posts()) {
                while($query->have_posts()) {
                    $query->the_post();
                    $carousel_item = $this->getCarouselItemData(get_the_ID(), $params);
                    $html .= mkd_core_get_shortcode_module_template_part('carousels', 'carousel-template', '', $carousel_item);
                }
            }

            wp_reset_postdata();


            $html .= '</div>';
            $html .= '</div>';

        }

        return $html;
    }

    /**
     * Return all data that carousel needs, images, titles, links, etc
     *
     * @param $params
     * @return array
     */
    private function getCarouselItemData($item_id, $params) {

        $carousel_item = array();

        if (get_post_meta($item_id, 'mkd_carousel_image', true) !== '') {
            $carousel_item['image'] = get_post_meta($item_id, 'mkd_carousel_image', true);
        } else {
            $carousel_item['image'] = '';
        }

        if ($params['image_animation'] == 'image-change' && get_post_meta($item_id, 'mkd_carousel_hover_image', true) !== '') {
            $carousel_item['hover_image'] = get_post_meta($item_id, 'mkd_carousel_hover_image', true);
            $carousel_item['hover_class'] = 'mkd-has-hover-image';
        }

        if (get_post_meta($item_id, 'mkd_carousel_item_link', true) != '') {
            $carousel_item['link'] = get_post_meta($item_id, 'mkd_carousel_item_link', true);
        } else {
            $carousel_item['link'] = '';
        }

        if (get_post_meta($item_id, 'mkd_carousel_item_target', true) != '') {
            $carousel_item['target'] = get_post_meta($item_id, 'mkd_carousel_item_target', true);
        } else {
            $carousel_item['target'] = '_self';
        }

        $carousel_item['title'] = get_the_title();

        $carousel_item['carousel_image_classes'] = $this->getCarouselImageClasses($params);

        $carousel_item['style'] = '';

        if ($params['padding'] !== ''){
        	$carousel_item['style'] .= 'padding: '.libero_mikado_filter_px($params['padding']).'px;';
        }

        return $carousel_item;

    }

	/**
	 * Return CSS classes for carousel image
	 *
	 * @param $params
	 * @return array
	 */
	private function getCarouselImageClasses($params) {

		$carousel_image_classes = array();
		if($params['image_animation'] !== '') {
			$carousel_image_classes[] = 'mkd-' . $params['image_animation'];
		}

		return implode(' ', $carousel_image_classes);

	}


	/**
	 * Return CSS classes for carousel
	 *
	 * @param $params
	 * @return array
	 */
	private function getCarouselClasses($params) {
		$carousel_classes = array();

		if($params['type'] !== '') {
			$carousel_classes[] =  'mkd-carousel-'.$params['type'];
		}

		if($params['pag_position'] !== '') {
			$carousel_classes[] =  'mkd-pag-'.$params['pag_position'];
		}

		return implode(' ', $carousel_classes);

	}

	/**
	 * Return data for carousel
	 *
	 * @param $params
	 * @return array
	 */
	private function getCarouselData($params) {
		$carousel_data = array();

		if($params['no_of_items'] !== '') {
			$carousel_data[] =  'data-items-shown='.$params['no_of_items'];
		}

		if($params['autoplay'] !== '') {
			$carousel_data[] =  'data-autoplay='.$params['autoplay'];
		}

		return implode(' ', $carousel_data);

	}

}