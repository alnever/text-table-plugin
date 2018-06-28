<?php
/*
 * Text Table parser reads the shortcode's content and convert it into ...
 * @link
 * @since 1.0
 *
 * @package text-table-plugin
 * @subpackage text-table-plugin/frontend
*/

namespace TextTablePlugin\Frontend;

class Text_Table_Parser {

  /*
   * The parser method
   * @param $content - the content of the shortcode/table
   * @param $separator - the separator of the table fields
   * @param $header - number of the header rows
   * @param $vheader - numner of the header columns
   *
   */
  public static function parse($content, $separator = ';',$header = 0, $vheader = 0) {
	$result = "<table class='text_table'>";

	// Get table rows
	$rows = explode("\n", $content);

	// Generate table rows
	$rowIndex = $header;
	foreach ($rows as $row) {
		$row = strip_tags(trim($row)); 

		if ($row !== null && $row !== "") {

			$result .= sprintf("<tr %s>", $rowIndex > 0 ? 'class="header"' : '');

			// Get row cells
			$cells = explode("$separator", $row);

			// Generate row cells
			$cellIndex = $vheader;
			foreach ($cells as $cell) {
				$result .= sprintf(
					"<td %s>%s</td>",
					$cellIndex > 0 ? 'class="header"' : '',
					$cell
				);

				$cellIndex--;
			}

			$result .="</tr>";

			$rowIndex--;

		}
		
	}

	$result .= "</table>";
	return $result;  	
  }
}
