<?php 
/*
* author: imtoantran
* display revslider
*
* 
*/

class revslider extends Controller
{
	

	public function index($id='')
	{
		# code...
		$id = $_POST['slider_id'];
		$data = $this->model->loadSlides($id);
		$slider = null;
		foreach ($data as $key => $value) {
			# code...
			$params = json_decode($value['params']);
			$layers = json_decode($value['layers']);
			$slider[$key]['image'] = $params->image;
			$slider[$key]['layers'] = $layers;
		}
		$this -> view-> slider = $slider;
		$this->view->render("revslider/index",true);
	}
}

?>