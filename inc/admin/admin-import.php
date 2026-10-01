<?php
/**
* The Gurus_Admin_Import class
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class Gurus_Admin_Import extends Gurus_Admin_Page {

	protected $id = null;
	protected $page_title = null;
	protected $menu_title = null;
	
	public function __construct() {

		$this->id = 'pxlart-import-demos';
		$this->page_title = esc_html__( 'Import Demos', 'gurus' );
		$this->menu_title = esc_html__( 'Import Demos', 'gurus' );
		$this->parent = 'pxlart';
		//$this->position = '10';

		parent::__construct();
	}

	public function display() {
		include_once( get_template_directory() . '/inc/admin/views/admin-demos.php' );
	}


	public function save() {

	}
}
new Gurus_Admin_Import;