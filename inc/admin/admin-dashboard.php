<?php
/**
* The Gurus_Admin_Dashboard base class
*/

if( !defined( 'ABSPATH' ) )
	exit; 

class Gurus_Admin_Dashboard extends Gurus_Admin_Page {

	
	protected $id = 'pxlart';
	protected $page_title = null;
	protected $menu_title = null;

	
	public function __construct() {
		$this->id = 'pxlart';
		$this->page_title = gurus()->get_name();
		$this->menu_title = gurus()->get_name();
		$this->position = '50';

		parent::__construct();
	}

	public function display() {
		include_once( get_template_directory() . '/inc/admin/views/admin-dashboard.php' );
	}
 
	public function save() {

	}
}
new Gurus_Admin_Dashboard;
