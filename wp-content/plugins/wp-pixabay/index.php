<?php
/*
  Plugin Name: WP Pixabay
  Plugin URI: https://wpclever.net/
  Description: WP Pixabay helps you search millions of free photos, vectors and art illustrations from https://pixabay.com then insert into content or set as featured image very quickly.
  Version: 1.5.3
  Author: WPclever.net
  Author URI: https://wpclever.net
  Text Domain: wppb
  Domain Path: /languages/
 */

define( 'WPPB_VERSION', '1.5.3' );
define( 'WPPB_URI', plugin_dir_url( __FILE__ ) );
define( 'WPPB_REVIEWS', 'https://wordpress.org/support/plugin/wp-pixabay/reviews/?filter=5' );
define( 'WPPB_CHANGELOGS', 'https://wordpress.org/plugins/wp-pixabay/#developers' );
define( 'WPPB_DISCUSSION', 'https://wordpress.org/support/plugin/wp-pixabay' );
if ( ! defined( 'WPC_URI' ) ) {
	define( 'WPC_URI', WPPB_URI );
}

include( 'includes/wpc-menu.php' );
include( 'includes/wpc-dashboard.php' );

if ( ! class_exists( 'WPcleverWppb' ) ) {
	class WPcleverWppb {
		function __construct() {
			add_action( 'plugins_loaded', array( $this, 'wppb_load_textdomain' ) );
			add_action( 'admin_menu', array( $this, 'wppb_menu' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'wppb_load_scripts' ) );
			add_filter( 'plugin_action_links', array( $this, 'wppb_action_links' ), 99, 2 );
			add_filter( 'plugin_row_meta', array( $this, 'wppb_row_meta' ), 99, 2 );
			add_action( 'media_buttons', array( $this, 'wppb_add_button' ) );
			add_action( 'save_post', array( $this, 'wppb_save_post_data' ), 10, 3 );
			add_action( 'admin_footer', array( $this, 'wppb_popup_content' ) );
		}

		function wppb_load_textdomain() {
			load_plugin_textdomain( 'wppb', false, basename( dirname( __FILE__ ) ) . '/languages/' );
		}

		function wppb_menu() {
			add_submenu_page( 'wpclever', esc_html__( 'WP Pixabay', 'wppb' ), esc_html__( 'WP Pixabay', 'wppb' ), 'manage_options', 'wpclever-wppb', array(
				&$this,
				'wppb_menu_pages'
			) );
		}

		function wppb_menu_pages() {
			$page_slug  = 'wpclever-wppb';
			$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'how';
			?>
			<div class="wpclever_settings_page wrap">
				<h1 class="wpclever_settings_page_title"><?php echo esc_html__( 'WP Pixabay', 'wppb' ) . ' ' . WPPB_VERSION; ?></h1>
				<div class="wpclever_settings_page_desc about-text">
					<p>
						<?php printf( esc_html__( 'Thank you for using our plugin! If you are satisfied, please reward it a full five-star %s rating.', 'wppb' ), '<span style="color:#ffb900">&#9733;&#9733;&#9733;&#9733;&#9733;</span>' ); ?>
						<br/>
						<a href="<?php echo esc_url( WPPB_REVIEWS ); ?>"
						   target="_blank"><?php esc_html_e( 'Reviews', 'wppb' ); ?></a> | <a
							href="<?php echo esc_url( WPPB_CHANGELOGS ); ?>"
							target="_blank"><?php esc_html_e( 'Changelogs', 'wppb' ); ?></a>
						| <a href="<?php echo esc_url( WPPB_DISCUSSION ); ?>"
						     target="_blank"><?php esc_html_e( 'Discussion', 'wppb' ); ?></a>
					</p>
				</div>
				<div class="wpclever_settings_page_nav">
					<h2 class="nav-tab-wrapper">
						<a href="?page=<?php echo $page_slug; ?>&amp;tab=how"
						   class="nav-tab <?php echo $active_tab == 'how' ? 'nav-tab-active' : ''; ?>">
							<?php esc_html_e( 'How to use?', 'wppb' ); ?>
						</a>
						<a href="?page=<?php echo $page_slug; ?>&amp;tab=settings"
						   class="nav-tab <?php echo $active_tab == 'settings' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Settings', 'wppb' ); ?></a>
						<a href="?page=<?php echo $page_slug; ?>&amp;tab=premium"
						   class="nav-tab <?php echo $active_tab == 'premium' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Premium Version', 'wppb' ); ?></a>
					</h2>
				</div>
				<div class="wpclever_settings_page_content">
					<?php if ( $active_tab == 'how' ) { ?>
						<div class="wpclever_settings_page_content_text">
							<p>1. Press the "Pixabay" button above editor</p>
							<p><img src="<?php echo WPPB_URI; ?>assets/images/how-01.jpg"/></p>

							<p>2. Type any key to search</p>
							<p><img src="<?php echo WPPB_URI; ?>assets/images/how-02.jpg"/></p>

							<p>3. Choose the photo as you want then insert or set featured</p>
							<p><img src="<?php echo WPPB_URI; ?>assets/images/how-03.jpg"/></p>
						</div>
					<?php } elseif ( $active_tab == 'settings' ) { ?>
						<form method="post" action="options.php" novalidate="novalidate">
							<?php wp_nonce_field( 'update-options' ) ?>
							<table class="form-table">
								<tr>
									<th scope="row"><label for="wppb_key">Pixabay API Key</label></th>
									<td>
										<input name="wppb_key" type="text" id="wppb_key"
										       value="<?php echo get_option( 'wppb_key' ); ?>"/> <span
											class="description">
											Just need to fill your key when the default not work.
										</span>
									</td>
								</tr>
								<tr>
									<th>How to get Pixabay API Key?</th>
									<td>
										Step 1: Go to
										<a href="https://pixabay.com"
										   target="_blank">https://pixabay.com</a> and create new account (verify via
										email required).
										<br/><br/>
										Step 2: Login with your account and go to
										<a href="https://pixabay.com/api/docs/#api_key"
										   target="_blank">https://pixabay.com/api/docs/#api_key</a>
										then you can see the key.
										<br/><br/>
										<img src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/images/how-04.jpg"/>
									</td>
								</tr>
								<tr class="submit">
									<th colspan="2">
										<input type="hidden" name="action" value="update"/>
										<input type="hidden" name="page_options" value="wppb_key"/>
										<input type="submit" name="submit" id="submit" class="button button-primary"
										       value="Save Changes"/>
									</th>
								</tr>
							</table>
						</form>
					<?php } elseif ( $active_tab == 'premium' ) { ?>
						<div class="wpclever_settings_page_content_text">
							<p>Get the Premium Version just $15! <a
									href="https://wpclever.net/downloads/wp-pixabay" target="_blank">https://wpclever.net/downloads/wp-pixabay</a>
							</p>
							<p><strong>Extra features for Premium Version</strong></p>
							<ul style="margin-bottom: 0">
								<li>- Upload image(s) to Media Library</li>
								<li>- Get the lifetime update & premium support</li>
							</ul>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php
		}

		function wppb_load_scripts() {
			wp_enqueue_script( 'colorbox', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.colorbox.js', array( 'jquery' ) );
			wp_enqueue_style( 'colorbox', plugin_dir_url( __FILE__ ) . 'assets/css/colorbox.css' );
			wp_enqueue_style( 'wppb', plugin_dir_url( __FILE__ ) . 'assets/css/backend.css' );
			wp_enqueue_script( 'wppb', plugin_dir_url( __FILE__ ) . 'assets/js/backend.js', array( 'jquery' ), WPPB_VERSION, true );
			wp_localize_script( 'wppb', 'wppb_vars', array(
				'wppb_key'   => ( get_option( 'wppb_key' ) != '' ? get_option( 'wppb_key' ) : '1498928-f190b376157b831824bdfb89b' ),
				'wppb_url'   => admin_url( 'admin-ajax.php' ),
				'wppb_nonce' => wp_create_nonce( 'wppb_nonce' )
			) );
		}

		function wppb_action_links( $links, $file ) {
			static $plugin;
			if ( ! isset( $plugin ) ) {
				$plugin = plugin_basename( __FILE__ );
			}
			if ( $plugin == $file ) {
				$settings_link = '<a href="' . admin_url( 'admin.php?page=wpclever-wppb&tab=settings' ) . '">' . esc_html__( 'Settings', 'wppb' ) . '</a>';
				$links[]       = '<a href="' . admin_url( 'admin.php?page=wpclever-wppb&tab=premium' ) . '">' . esc_html__( 'Premium Version', 'wppb' ) . '</a>';
				array_unshift( $links, $settings_link );
			}

			return (array) $links;
		}

		function wppb_row_meta( $links, $file ) {
			static $plugin;
			if ( ! isset( $plugin ) ) {
				$plugin = plugin_basename( __FILE__ );
			}
			if ( $plugin == $file ) {
				$row_meta = array(
					'support' => '<a href="https://wpclever.net/contact" target="_blank">' . esc_html__( 'Premium support', 'wppb' ) . '</a>',
				);

				return array_merge( $links, $row_meta );
			}

			return (array) $links;
		}

		function wppb_add_button( $editor_id ) {
			echo ' <a href="#wppb_popup" id="wppb_btn" data-editor="' . $editor_id . '" class="wppb_btn button add_media" title="Pixabay"><span class="dashicons dashicons-camera wppb_dashicons"></span> Pixabay</a><input type="hidden" id="wppb_featured_url" name="wppb_featured_url" value="" /><input type="hidden" id="wppb_featured_title" name="wppb_featured_title" value="" /><input type="hidden" id="wppb_featured_caption" name="wppb_featured_caption" value="" /> ';
		}

		function wppb_save_post_data( $post_id, $post ) {
			if ( isset( $post->post_status ) && 'auto-draft' == $post->post_status ) {
				return;
			}
			if ( wp_is_post_revision( $post_id ) ) {
				return;
			}
			if ( ! empty( $_POST['wppb_featured_url'] ) ) {
				if ( strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post-new.php' ) || strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post.php' ) ) {
					if ( 'page' == $_POST['post_type'] ) {
						if ( ! current_user_can( 'edit_page', $post_id ) ) {
							return;
						}
					} else {
						if ( ! current_user_can( 'edit_post', $post_id ) ) {
							return;
						}
					}
					$file_url = sanitize_text_field( $_POST['wppb_featured_url'] );
					$title    = sanitize_text_field( $_POST['wppb_featured_title'] );
					$caption  = sanitize_text_field( $_POST['wppb_featured_caption'] );
					self::wppb_save_featured( $file_url, $title, $caption );
				}
			}
		}

		function wppb_save_featured( $file_url, $title = null, $caption = null ) {
			global $post;
			if ( ! function_exists( 'media_handle_upload' ) ) {
				require_once( ABSPATH . 'wp-admin' . '/includes/image.php' );
				require_once( ABSPATH . 'wp-admin' . '/includes/file.php' );
				require_once( ABSPATH . 'wp-admin' . '/includes/media.php' );
			}
			$post_data = array(
				'post_title'   => $title,
				'post_excerpt' => $caption,
			);
			$filename  = pathinfo( $file_url, PATHINFO_FILENAME );
			@set_time_limit( 300 );
			if ( ! empty( $file_url ) ) {
				$tmp                    = download_url( $file_url );
				$ext                    = pathinfo( $file_url, PATHINFO_EXTENSION );
				$file_array['name']     = $filename . '.' . $ext;
				$file_array['tmp_name'] = $tmp;
				if ( is_wp_error( $tmp ) ) {
					@unlink( $file_array['tmp_name'] );
					$file_array['tmp_name'] = '';
				}
				$thumb_id = media_handle_sideload( $file_array, $post->ID, $desc = null, $post_data );
				if ( is_wp_error( $thumb_id ) ) {
					@unlink( $file_array['tmp_name'] );

					return $thumb_id;
				}
			}
			set_post_thumbnail( $post, $thumb_id );
		}

		function wppb_popup_content() {
			?>
			<div style='display:none'>
				<div id="wppb_popup" style="width: 920px; height: 440px; position: relative; overflow: hidden">
					<table
						style="width: 100%; height: 100%; padding: 0; margin: 0; border-spacing: 0; vertical-align: top">
						<tr>
							<td style="width: 620px; vertical-align: top; padding: 10px">
								<div class="wppb_form_line">
									<div><select name="wppb_language" id="wppb_language" class="wppb_select">
											<option value="en"><?php esc_html_e( 'Language', 'wppb' ); ?></option>
											<option value="cs">cs</option>
											<option value="da">da</option>
											<option value="de">de</option>
											<option value="en">en</option>
											<option value="es">es</option>
											<option value="fr">fr</option>
											<option value="id">id</option>
											<option value="it">it</option>
											<option value="hu">hu</option>
											<option value="nl">nl</option>
											<option value="no">no</option>
											<option value="pl">pl</option>
											<option value="pt">pt</option>
											<option value="ro">ro</option>
											<option value="sk">sk</option>
											<option value="fi">fi</option>
											<option value="sv">sv</option>
											<option value="tr">tr</option>
											<option value="vi">vi</option>
											<option value="bg">bg</option>
											<option value="ru">ru</option>
											<option value="el">el</option>
											<option value="ja">ja</option>
											<option value="ko">ko</option>
											<option value="zh">zh</option>
										</select></div>
									<div><select name="wppb_category" id="wppb_category" class="wppb_select">
											<option value="all"><?php esc_html_e( 'Category', 'wppb' ); ?></option>
											<option value="all">all</option>
											<option value="fashion">fashion</option>
											<option value="nature">nature</option>
											<option value="backgrounds">backgrounds</option>
											<option value="science">science</option>
											<option value="education">education</option>
											<option value="people">people</option>
											<option value="feelings">feelings</option>
											<option value="religion">religion</option>
											<option value="health">health</option>
											<option value="places">places</option>
											<option value="animals">animals</option>
											<option value="industry">industry</option>
											<option value="food">food</option>
											<option value="computer">computer</option>
											<option value="sports">sports</option>
											<option value="transportation">transportation</option>
											<option value="travel">travel</option>
											<option value="buildings">buildings</option>
											<option value="business">business</option>
											<option value="music">music</option>
										</select></div>
									<div><select name="wppb_type" id="wppb_type" class="wppb_select">
											<option value="all"><?php esc_html_e( 'Type', 'wppb' ); ?></option>
											<option value="all">all</option>
											<option value="photo">photo</option>
											<option value="illustration">illustration</option>
											<option value="vector">vector</option>
										</select></div>
									<div><select name="wppb_orientation" id="wppb_orientation" class="wppb_select">
											<option value="all"><?php esc_html_e( 'Orientation', 'wppb' ); ?></option>
											<option value="horizontal">horizontal</option>
											<option value="vertical">vertical</option>
										</select></div>
									<div><select name="wppb_editorchoice" id="wppb_editorchoice" class="wppb_select">
											<option
												value="false"><?php esc_html_e( 'EditorsChoice', 'wppb' ); ?></option>
											<option value="true">true</option>
											<option value="false">false</option>
										</select></div>
								</div>
								<div class="wppb_form_line" style="margin-top: 5px">
									<div><select name="wppb_order" id="wppb_order" class="wppb_select">
											<option value="popular"><?php esc_html_e( 'Order', 'wppb' ); ?></option>
											<option value="popular">popular</option>
											<option value="latest">latest</option>
										</select></div>
									<div>
										<select name="wppb_safesearch" id="wppb_safesearch" class="wppb_select">
											<option value="false"><?php esc_html_e( 'SafeSearch', 'wppb' ); ?></option>
											<option value="true">true</option>
											<option value="false">false</option>
										</select>
									</div>
									<div>
										<select name="wppb_hires" id="wppb_hires" class="wppb_select">
											<option value="no"><?php esc_html_e( 'High-res', 'wppb' ); ?></option>
											<option value="no">no</option>
											<option value="large">large</option>
											<option value="fullhd">fullhd</option>
											<option value="original">original</option>
										</select>
									</div>
									<div>
										<input type="text" id="wppb_input" name="wppb_input" value=""
										       class="wppb_input wppb_input-normal"
										       placeholder="<?php esc_html_e( 'keyword', 'wppb' ); ?>"/>
									</div>
									<div>
										<input type="button" id="wppb_search" class="wppb_button"
										       value="<?php esc_html_e( 'Search', 'wppb' ); ?>"/>
									</div>
								</div>
								<div id="wppb_container" class="wppb_container"></div>
								<div id="wppb_page" class="wppb_page"></div>
							</td>
							<td style="border-left: 1px solid #ddd; background: #fcfcfc; vertical-align: top; padding: 10px">
								<div id="wppb_use-image" class="wppb_use-image">
									<div class="wppb_right" style="height: 370px; overflow-y: auto; overflow-x: hidden">
										<table class="wppb_table">
											<tr class="wppb_tr">
												<td colspan="2" class="wppb_td">
													<div class="wppb_item-single" id="wppb_view"
													     style="margin-right: 20px;"></div>
												</td>
											</tr>
											<tr class="wppb_tr">
												<td class="wppb_td"><?php esc_html_e( 'Title', 'wppb' ); ?></td>
												<td class="wppb_td">
													<input type="text" id="wppb_title" value=""
													       class="wppb_input"/>
												</td>
											</tr>
											<tr>
												<td class="wppb_td"><?php esc_html_e( 'Caption', 'wppb' ); ?></td>
												<td class="wppb_td">
											<textarea id="wppb_caption" name="wppb_caption"
											          class="wppb_textarea"></textarea>
												</td>
											</tr>
											<tr>
												<td class="wppb_td"><?php esc_html_e( 'File name', 'wppb' ); ?>
												</td>
												<td class="wppb_td">
													<select name="wppb_filename" id="wppb_filename" class="wppb_select">
														<option
															value="0"><?php esc_html_e( 'Keep original file name', 'wppb' ); ?>
														</option>
														<option
															value="1"><?php esc_html_e( 'Generate from title', 'wppb' ); ?>
														</option>
													</select>
												</td>
											</tr>
											<tr>
												<td class="wppb_td"><?php esc_html_e( 'Size', 'wppb' ); ?></td>
												<td class="wppb_td">
													<input type="number" id="wppb_width" value="0"
													       class="wppb_input wppb_input-small"
													       placeholder="<?php esc_html_e( 'width', 'wppb' ); ?>"/>
													<input
														type="number" id="wppb_height" value="0"
														class="wppb_input wppb_input-small"
														placeholder="<?php esc_html_e( 'height', 'wppb' ); ?>"/>
												</td>
											</tr>
											<tr>
												<td class="wppb_td"><?php esc_html_e( 'Alignment', 'wppb' ); ?>
												</td>
												<td class="wppb_td">
													<select name="wppb_align" id="wppb_align" class="wppb_select">
														<option
															value="alignnone"><?php esc_html_e( 'None', 'wppb' ); ?>
														</option>
														<option
															value="alignleft"><?php esc_html_e( 'Left', 'wppb' ); ?>
														</option>
														<option
															value="alignright"><?php esc_html_e( 'Right', 'wppb' ); ?>
														</option>
														<option
															value="aligncenter"><?php esc_html_e( 'Center', 'wppb' ); ?>
														</option>
													</select>
												</td>
											</tr>
											<tr>
												<td class="wppb_td"><?php esc_html_e( 'Link to', 'wppb' ); ?></td>
												<td class="wppb_td">
													<select name="wppb_link" id="wppb_link" class="wppb_select">
														<option
															value="0"><?php esc_html_e( 'None', 'wppb' ); ?></option>
														<option
															value="1"><?php esc_html_e( 'Original site', 'wppb' ); ?></option>
														<option
															value="2"><?php esc_html_e( 'Original image', 'wppb' ); ?></option>
													</select>
												</td>
											</tr>
											<tr>
												<td class="wppb_td">&nbsp;</td>
												<td class="wppb_td">
													<input name="wppb_blank" id="wppb_blank" type="checkbox"
													       class="wppb_checkbox"/> <?php esc_html_e( 'Open new windows', 'wppb' ); ?>
												</td>
											</tr>
											<tr>
												<td class="wppb_td">&nbsp;</td>
												<td class="wppb_td">
													<input name="wppb_nofollow" id="wppb_nofollow"
													       type="checkbox"
													       class="wppb_checkbox"/> <?php esc_html_e( 'Rel nofollow', 'wppb' ); ?>
												</td>
											</tr>
										</table>
									</div>
									<div class="wppb_actions">
										<div>
											<input type="hidden" id="wppb_url" value=""/>
											<input type="hidden" id="wppb_eid" value=""/>
											<input type="button" id="wppb_insert" class="wppb_button"
											       value="<?php esc_html_e( 'Insert', 'wppb' ); ?>"/>
										</div>
										<div>
											<a href="https://wpclever.net/downloads/wp-pixabay" target="_blank"
											   onclick="return confirm('This feature only available in Premium Version!\nBuy it now? Just $15')">
												<input type="button" id="wppb_save" class="wppb_button_disable"
												       value="<?php esc_html_e( 'Save&Insert', 'wppb' ); ?>"/>
											</a>
										</div>
										<div>
											<input type="button" id="wppb_featured" class="wppb_button"
											       value="<?php esc_html_e( 'Featured', 'wppb' ); ?>"/>
										</div>
									</div>
									<div style="display:inline-block">
								<span class="wppb_loading-text" id="wppb_note"
								      style="display:none"><?php esc_html_e( 'Saving to Media Library...', 'wppb' ); ?></span>
										<span id="wppb_error"></span>
									</div>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<?php
		}
	}

	new WPcleverWppb();
}
