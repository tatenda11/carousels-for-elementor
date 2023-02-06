<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Tabbed Carousel Widget.
 *
 * @since 1.0.0
 */
class Elementor_Tabbed_Carousel_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Tabbed Carousel';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve list widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Tabbed Carousel', 'elementor-tabbed-carousel-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-bullet-list';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'carousel', 'tabbed'];
	}

	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Carousel Content', 'elementor-tabbed-carousel-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		/**
		 * image
		 * description
		 * button text
		 * heading
		 */
		$repeater->add_control(
			'slide_button',
			[
				'label' => esc_html__( 'Button Label', 'elementor-tabbed-carousel-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'My button', 'elementor-tabbed-carousel-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'slide_image',
			[
				'label' => esc_html__( 'Slide Image', 'elementor-tabbed-carousel-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'url' => \Elementor\Utils::get_placeholder_image_src(),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'slide_heading',
			[
				'label' => esc_html__( 'Slide Heading', 'elementor-tabbed-carousel-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'My Heading', 'elementor-tabbed-carousel-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'slide_description',
			[
				'label' => esc_html__( 'Slide Description', 'elementor-tabbed-carousel-widget' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'elementor-tabbed-carousel-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		/***End Repeater */

		$this->add_control(
			'carousel_slides',
			[
				'label' => esc_html__( 'Carousel Slides', 'elementor-tabbed-carousel-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),           /* Use our repeater */
				'default' => [
					[
						'slide_button' => esc_html__( 'Click Here', 'elementor-list-widget' ),
						'slide_image' => \Elementor\Utils::get_placeholder_image_src(),
						'slide_heading' => 'My Heading',
						'slide_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'elementor-tabbed-carousel-widget',
					]
				],
				'title_field' => '{{{ slide_heading }}}',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		echo "I am working";
	}

	protected function content_template() {
		echo "I am working";
	}

}