<?php
/*
Module Name: Columns
Module URI: http://www.siteeditor.org/modules/columns
Description: Module Columns For Page Builder Application
Author: Site Editor Team @Pakage
Author URI: http://www.siteeditor.org
Version: 1.0.0
*/

class PBColumnsShortcode extends PBShortcodeClass{

	/**
	 * Register module with siteeditor.
	 */
	function __construct() {
		parent::__construct( array(
                "name"        => "sed_columns",                               //*require
                "title"       => __("Columns","site-editor"),                 //*require for toolbar
                "description" => __("Add Columns to page","site-editor"),
                "icon"        => "sedico-column",                               //*require for icon toolbar
                "module"      =>  "columns",         //*require
            ) // Args
		);
	}

    function get_atts(){
        $atts = array(
            'pb_columns'            => 3 ,
            'responsive_option'     => 'normal-columns',
            'equal_column_width'    => false ,
            'responsive_spacing'   =>  "",
        );
        return $atts;
    }

    function add_shortcode( $atts , $content = null ){
        extract($atts);

    }

    function shortcode_settings(){

        $params = array(

            'pb_columns' => array(
                'type' => 'number',
                'label' => __('Number Column', 'site-editor'),
                'description'  => __('Add Custom Columns to page', 'site-editor')
            ),

            'responsive_option' => array(
                'type' => 'select',
                'label' => __('Responsive Option', 'site-editor'),
                'description' => '',// __("Select the Icon's Style", "site-editor"),
                'choices'   =>array(
                    'normal-columns'         => __('Full Width Any Columns', 'site-editor'),
                    'float-columns'          => __('Auto Mode Columns', 'site-editor'),
                    'table-cell-columns'     => __('Inline Columns', 'site-editor'),
                    'hidden-columns'         => __('Hidden Columns', 'site-editor'),
                ),
            ),

            "responsive_spacing"    => array(
                'type'    => 'text',
                'label'   => __('Module Responsive Spacing', 'site-editor'),
                'description'    => '',// __('','site-editor'),
            ),

            /*'equal_column_width' => array(
                'type' => 'checkbox',
                'label' => __('Equal Column Width', 'site-editor'),
                'description'  => __('This option allows to set equal column width for all the columns in this module.', 'site-editor'),
            ),*/


            "animation"  =>  array(
                "type"          => "animation" ,
                "label"         => __("Animation Settings", "site-editor"),
            ),

            'row_container' => array(
                'type'          => 'row_container',
                'label'         => __('Module Wrapper Settings', 'site-editor')
            )

        );

        return $params;

    }

    function custom_style_settings(){
        return array(                                                                     
            array(
                'columns' , 'sed_current' ,
                array( 'background','gradient','border','trancparency' ) , __("Tr Columns" , "site-editor") ) ,

            array(
                'column' , '>td.sed-column-pb' ,
                array( 'background','gradient' ) , __("Td Column" , "site-editor") ) ,

        );
    }

    function contextmenu( $context_menu ){
      $columns_menu = $context_menu->create_menu( "columns" , __("Columns","site-editor") , 'columns' , 'class' , 'element' , '' , "sed_columns" , array(
            "seperator"        => array(45 , 75)
        ));
      //$context_menu->add_change_column_item( $columns_menu );
    }

}

new PBColumnsShortcode();

include SED_PB_MODULES_PATH . '/columns/sub-shortcode/column.php';

global $sed_pb_app;

$sed_pb_app->register_module(array(
    "group"                 => "basic" ,
    "name"                  => "columns",
    "title"                 => __("Columns","site-editor"),
    "description"           => __("Add Full Customize Columns","site-editor"),
    "icon"                  => "sedico-column",
    "type_icon"             => "font",
    "is_special"            => true ,
    "has_extra_spacing"     =>  true ,
    "shortcode"             => "sed_columns",
    "priority"              => 10
));

