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
	 * get repeater field dynamically
	 */
	private function getCarouselFields() {
		$repeater = new \Elementor\Repeater();
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

		$repeater->add_control(
			'slide_call_to_action',
			[
				'label' => esc_html__( 'Slide Call To Action', 'elementor-tabbed-carousel-widget' ),
				'type' =>\Elementor\Controls_Manager::URL,
				'placeholder' => '#',
				'dynamic' => [
					'active' => true,
				],
			]
		);

		return $repeater;
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

		
		$repeater->add_control(
			'carousel_group_label',
			[
				'label' => esc_html__( 'Button Label', 'elementor-tabbed-carousel-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => esc_html__( 'My button', 'elementor-tabbed-carousel-widget' ),
			]
		);

		$repeater->add_control(
			'carousel_slides',
			[
				'label' => esc_html__( 'Carousel Slides', 'elementor-tabbed-carousel-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $this->getCarouselFields()->get_controls(),           
				'title_field' => '{{{ slide_heading }}}',
				'default' => [
					[
						'slide_image' => 'https://picsum.photos/200/300.jpg',
						'slide_heading' => 'Slide Heading 1',
						'slide_description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum',
						'slide_call_to_action' => '#',
					],
					[
						'slide_image' => 'https://picsum.photos/200/300.jpg',
						'slide_heading' => 'Slide Heading 2',
						'slide_description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum',
						'slide_call_to_action' => '#',
					],
				],
			]
		);
		

		$this->add_control(
			'carousel_sections',
			[
				'label' => esc_html__( 'List Items', 'elementor-tabbed-carousel-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),           
			]
		);

		$this->end_controls_section(); 
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$fields = $settings['carousel_sections'];
		?>
			<div class='tabbed-carousel-section hide'>
				<div class='carousel-tab-nav'>
					<ul  class='carousel-tab-nav-list'>
						<?php foreach ( $fields as $index => $field ) { ?>
							<li>
								<button class='carousel-tab-nav-button <?php if($index === 0 ) { echo "active-slide-button";}?>' data-slide-index="<?php echo $index;?>"><?php echo $field['carousel_group_label']; ?></button>
							</li>
						<?php } ?>
					</ul>
				</div>
				<div class='carousel-wrapper-container'>
					<?php foreach ( $fields as $index => $field ) { ?>
						<div id="section-<?php echo $index;?>" class='carousel-wrapper carousel-section <?php if($index === 0 ) { echo "active-slide-section";}?>' data-slide-index="<?php echo $index;?>">
							<div class="your-class" style="width:100%;min-height:350px;">
								<?php foreach ( $fields[$index]['carousel_slides'] as $item ) {?>
									<div class='carousel-slide'>
										<div class='col-6 image-seg'>
											<img src="<?php echo $item['slide_image']['url']; ?>" alt="<?php echo $item['slide_heading'];?>">
										</div>
										<div class='col-6 content-seg'>
											<h2><?php echo $item['slide_heading'];?></h2>
											<p>
												<?php echo $item['slide_description'];?>
											</p>
											<a href="<?php echo $item['slide_call_to_action'];?>" style="background-color:#009EDB; padding:15px; color:#fff;text-decoration:none;font-weight:bold;">Read more</a>
										</div>
									</div>
								<?php }?>
							</div>	
						</div> 
					<?php }?> 
				</div>
			</div>
		<?php
	}

	protected function content_template() {
		echo "I am working";
	}

}
