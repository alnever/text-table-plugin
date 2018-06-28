<?php
/*
 * Text Table shortcode definintion
 * @link
 * @since 1.0
 *
 * @package text-table-plugin
 * @subpackage text-table-plugin/admin
*/

namespace TextTablePlugin\Admin;

class Text_Table {

	private $options;


	public function __construct() {
		add_action('admin_menu',array($this,'add_admin_page'));
		add_action('admin_init',array($this,'register_settings'));
	}

	public function add_admin_page() {
		add_options_page(
			'Text Table Settings',
			'Text Table Settings',
			'manage_options',
			'text-table-admin',
			array($this, 'options_page')
		);
	}

	public function register_settings() {
		register_setting(
			'text_table_options_group',
			'text_table_options'
		);

		add_settings_section(
			'text_table_options_section',
			'Text Table Settings',
			array($this, 'options_section'),
			'text-table-admin'
		);

		add_settings_field(
			'custom_css',
			'Custom CSS',
			array($this, 'custom_css'),
			'text-table-admin',
			'text_table_options_section'
		);
	}

	public function options_page() {
		// Get options of the plugin by the slug
		$this->options = get_option('text_table_options'); 
        ?>
        <div class="wrap">
            <h1>Text Table Plugin</h1>
            <form method="post" action="options.php">
            <?php
                // Output settings fields
                settings_fields( 'text_table_options_group' );
                // Do the settings section
                do_settings_sections( 'text-table-admin' );
                // Crete a submit button
                submit_button();
            ?>
            </form>
        </div>
        <?php		
	}

	public function options_section() {
		print '<p>Enter your custom CSS into the field below.</p>';
		print '<p style="color:red; font-weigh: bolder">Caution! Just expierncies user shoud use this option!</p>';
	}

	public function custom_css() {
        printf(
            '<textarea id="custom_css" name="text_table_options[custom_css]" style="width:800px; height:400px;">%s</textarea>',
            isset( $this->options['custom_css'] ) ? esc_attr( $this->options['custom_css']) : ''
        );
	}


}