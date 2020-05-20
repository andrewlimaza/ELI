<?php
class Google_Font_Dropdown_Custom_Control extends WP_Customize_Control{
		private $fonts = false;
		public function __construct($manager, $id, $args = array(), $options = array()){
			$this->fonts = $this->get_google_fonts();
			parent::__construct( $manager, $id, $args );
		}
	
		public function render_content(){
			?>
				<label class="customize_dropdown_input">
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<select id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" data-customize-setting-link="<?php echo esc_attr($this->id); ?>">
						<?php
							foreach ( $this->fonts as $k => $v ){
								echo '<option value="'.$v['family'].'" ' . selected( $this->value(), $v['family'], false ) . '>'.$v['family'].'</option>';
							}
						?>
					</select>
				</label>
			<?php
		}
	
		public function get_google_fonts(){
			if (get_transient('eli_google_font_list')) {
				$content = get_transient('eli_google_font_list');
			} else {
				$googleApi = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=alpha&key=AIzaSyAu0c2mvEbIWow504eLkw3GQGrwh3qKhGs';
				$fontContent = wp_remote_get( $googleApi, array('sslverify'   => false) );
				$content = json_decode($fontContent['body'], true);
				set_transient( 'eli_google_font_list', $content, 0 );
			}
	
			return $content['items'];
		}
	
    }
    ?>
