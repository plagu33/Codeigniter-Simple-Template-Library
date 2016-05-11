?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Example extends CI_Controller 
{
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->library(array('session', 'layout'));
		$this->load->helper(array('url'));

		$this->load->model('user/user_model');

		//$this->output->enable_profiler(TRUE);

		$this->layout->add_css_files(array('bootstrap.min.css','style.css'), base_url().'assets/css/');

    $css_text = <<<EOF
.text {
	font-size: 12px;
	background-color: #eeeeee;
}
EOF;

		$this->layout->add_css_rawtext($css_text);

    $js_text = <<<EOT
alert('this is just a test');
EOT;

    $this->layout->add_js_rawtext($js_text, 'header');
    $this->layout->add_custom_meta('link', array(
        'rel' => 'parent',
        'rev' => 'subsection',
        'hreflang' => 'en'
    ));
  }

	/**
	 * index function.
	 * 
	 * @access public
	 * @param mixed $slug (default: false)
	 * @return void
	 */
	public function index() 
	{
		// load views and send data
		$this->load->view('header', $data);
		$this->load->view('index', $data);
		$this->load->view('footer', $data);
	}	
}