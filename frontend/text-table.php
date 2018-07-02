<?php
/*
 * Text Table shortcode definintion
 * @link
 * @since 1.0
 *
 * @package text-table-plugin
 * @subpackage text-table-plugin/frontend
*/

namespace TextTablePlugin\Frontend;

class Text_Table {

  public function __construct() {
    add_action('wp_enqueue_scripts',array($this,'enqueue_styles'));
    add_shortcode('text_table',array($this, 'shortcode'));
  }

  public function shortcode($atts = [], $content = "", $tag = null) {
    $atts = array_change_key_case((array)$atts, CASE_LOWER);

    if ($content != null) {
      // define a separator
      $separator = isset($atts['separator']) ? $atts['separator'] : ';';
      $header = isset($atts['header']) ? $atts['header'] : 0;
      $vheader = isset($atts['vheader']) ? $atts['vheader'] : 0;

      $style =  isset(get_option('text_table_options')['custom_css']) ? 
                 sprintf("<style>%s</style>",get_option('text_table_options')['custom_css']) :
                 "";

      return $style . Text_Table_Parser::parse($content, $separator, $header, $vheader);
    }
  }

  public function enqueue_styles() {
    wp_enqueue_style(
      'text-table-style',
      plugin_dir_url(__FILE__)."css/text-table.css",
      null, null, 'all'
    );
  }

}
