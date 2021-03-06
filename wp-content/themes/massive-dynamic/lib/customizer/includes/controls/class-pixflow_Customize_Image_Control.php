<?php

/**
 * Customize Image Control Class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 3.4.0
 */
class Pixflow_Customize_Image_Control extends WP_Customize_Upload_Control {
	public $type = 'image';
	public $get_url;
	public $statuses;
	public $extensions = array( 'jpg', 'jpeg', 'gif', 'png' );

	public $subtitle = '';

	public $separator = false;

	public $required;

	protected $tabs = array();

    public $class;

	/**
	 * Constructor.
	 *
	 * @since 3.4.0
	 * @uses WP_Customize_Upload_Control::__construct()
	 *
	 * @param WP_Customize_Manager $manager
	 * @param string $id
	 * @param array $args
	 */
	public function __construct( $manager, $id, $args ) {
		$this->statuses = array( '' => '<img class="upload-icon" src="'.PIXFLOW_THEME_CUSTOMIZER_URI.'/assets/images/upload-drop-zone-cloud-icon.png"/>' );

		parent::__construct( $manager, $id, $args );

		$this->add_tab( 'upload-new', esc_attr__('Upload New','massive-dynamic'), array( $this, 'tab_upload_new' ) );
		$this->add_tab( 'uploaded',   esc_attr__('Uploaded','massive-dynamic'),   array( $this, 'tab_uploaded' ) );

		// Early priority to occur before $this->manager->prepare_controls();
		add_action( 'customize_controls_init', array( $this, 'prepare_control' ), 5 );
	}

	/**
	 * Prepares the control.
	 *
	 * If no tabs exist, removes the control from the manager.
	 *
	 * @since 3.4.2
	 */
	public function prepare_control() {
		if ( ! $this->tabs )
			$this->manager->remove_control( $this->id );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 3.4.0
	 * @uses WP_Customize_Upload_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['statuses'] = $this->statuses;
	}

	/**
	 * Render the control's content.
	 *
	 * @since 3.4.0
	 */
	public function render_content() {
		$src = $this->value();
		if ( isset( $this->get_url ) )
			$src = call_user_func( $this->get_url, $src );

		?>
		<div class="customize-image-picker <?php echo ' '.esc_attr($this->class); ?>">
			<span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
			</span>

			<?php if ( '' != $this->subtitle ) : ?>
				<div class="customizer-subtitle"><?php echo esc_html($this->subtitle); ?></div>
			<?php endif; ?>

			<div class="customize-control-content ">
				<div class="dropdown preview-thumbnail" tabindex="0">
					<div class="dropdown-content">
						<?php if ( empty( $src ) ): ?>
							<img class="px-display-none" />
						<?php else: ?>
							<img src="<?php echo esc_url( set_url_scheme( $src ) ); ?>" />
						<?php endif; ?>
						<div class="dropdown-status"></div>
					</div>
					<div class="dropdown-arrow"></div>
				</div>
			</div>

			<div class="library">
				<ul class="md-hidden">
					<?php foreach ( $this->tabs as $id => $tab ): ?>
						<li data-customize-tab='<?php echo esc_attr( $id ); ?>' tabindex='0'>
							<?php echo esc_html( $tab['label'] ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php foreach ( $this->tabs as $id => $tab ): ?>
					<div class="library-content" data-customize-tab='<?php echo esc_attr( $id ); ?>'>
						<?php call_user_func( $tab['callback'] ); ?>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="actions">
				<a href="#" class="remove"><?php esc_attr_e( 'Remove','massive-dynamic' ); ?></a>
			</div>
		</div>
		<?php if ( $this->separator ) echo '<hr class="customizer-separator">';
	}

	/**
	 * Add a tab to the control.
	 *
	 * @since 3.4.0
	 *
	 * @param string $id
	 * @param string $label
	 * @param mixed $callback
	 */
	public function add_tab( $id, $label, $callback ) {
		$this->tabs[ $id ] = array(
			'label'    => $label,
			'callback' => $callback,
		);
	}

	/**
	 * Remove a tab from the control.
	 *
	 * @since 3.4.0
	 *
	 * @param string $id
	 */
	public function remove_tab( $id ) {
		unset( $this->tabs[ $id ] );
	}

	/**
	 * @since 3.4.0
	 */
	public function tab_upload_new() {
		if ( ! _device_can_upload() ) {
			echo '<p>' . sprintf( esc_attr__('The web browser on your device cannot be used to upload files. You may be able to use the <a href="%s">native app for your device</a> instead.','massive-dynamic'), 'https://wordpress.org/mobile/' ) . '</p>';
		} else {
			?>
			<div class="upload-dropzone">
				<?php esc_attr_e('Drop a file here or <a href="#" class="upload">select a file</a>','massive-dynamic'); ?>
			</div>
			<div class="upload-fallback">
				<span class="button-secondary"><?php esc_attr_e('Select File','massive-dynamic'); ?></span>
			</div>
			<?php
		}
	}

	/**
	 * @since 3.4.0
	 */
	public function tab_uploaded() {
		?>
		<div class="uploaded-target"></div>
		<?php
	}

	/**
	 * @since 3.4.0
	 *
	 * @param string $url
	 * @param string $thumbnail_url
	 */
	public function print_tab_image( $url, $thumbnail_url = null ) {
		$url = set_url_scheme( $url );
		$thumbnail_url = ( $thumbnail_url ) ? set_url_scheme( $thumbnail_url ) : $url;
		?>
		<a href="#" class="thumbnail" data-customize-image-value="<?php echo esc_url( $url ); ?>">
			<img src="<?php echo esc_url( $thumbnail_url ); ?>" />
		</a>
		<?php
	}
}
