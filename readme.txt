Plugin Name: Text Table Plugin
Plugin Uri: https://github.com/alnever/text-table-plugin
Description: Adds a shortcode to present a csv-style data as a html-table
Version: 1.0
Author: Alex Neverov
Author URI: http://alneverov.ru


The plugin allows to add shortcode with a table withing. Example:

[text_table header=1 vheader=1]

id;name;city;phone

1;John;New York;+1555999888

2;Neal;Seatle;+1555999887

3;Cathrin;LA;+1555999886

[/text_table]

The content of the shortcode is a CSV-table. Each line is a row of the table. Cells are delimited using a separator symbol (; by default).

v 1.0
usage
[text_table separator=<separator> header=<number of header rows> vheader=<number of head columns>]
<content>
[/text_table]

The following paramenters are optional:

* separator - the delimiter of the cells. Default value is semicolumn (;)
* header - the number of rows, which will be decorated as a table header. Default value is 0
* vheader - the number of columns, which will be decorated as row headers. Default value is 0

The content is a required parameter. It contains a table in the separated text format.

The plugin allows to create a custom CSS, to make tables more compatible to the site's design.
