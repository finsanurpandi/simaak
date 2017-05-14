<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter PDF Library
 *
 * Generate PDF's in your CodeIgniter applications.
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Yudha Pratama
 * @license			None
 * @link			https://github.com/shinryu99/ci-mpdf
 */

require_once(dirname(__FILE__) . '/mpdf60/mpdf.php');

class Pdf extends MPDF
{
	/**
	 * Get an instance of CodeIgniter
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function ci()
	{
		return get_instance();
	}

	/**
	 * Load a CodeIgniter view into domPDF
	 *
	 * @access	public
	 * @param	string	$view The view to load
	 * @param	array	$data The view data
	 * @return	void
	 */
	public function load_view($view, $data = array(), $paper , $margin)
	{
		$this->mPDF($mode='',$format=$paper,$default_font_size=0,$default_font='',$mgl=$margin[0],$mgr=$margin[1],$mgt=$margin[2],$mgb=$margin[3],$mgh=9,$mgf=9, $orientation='P');
		$html = $this->ci()->load->view($view, $data, TRUE);

		$this->WriteHtml($html);
	}

	function load($param=NULL)

	{

		if ($params == NULL)

		{

			$param = '"en-GB-x","A4","","",10,10,10,10,6,3';

		}


		return new mPDF($param);

	}

}
