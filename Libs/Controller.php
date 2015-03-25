<?php

/**
 *
 */
class Controller {

	function __construct() {
		$this -> view = new View();
	}

	public function loadModel($name) {
		$path = 'Models/' . $name . '_model.php';
		if (file_exists($path)) {
			require $path;
			$modelName = $name . '_model';
			$this -> model = new $modelName();
			$this -> view -> embedScript = self::loadScript();
			// $this -> view -> embedScript = '$this->loadScript()';
		}
	}

	public function loadScript(){
		require 'Models/script_model.php';
		$model = new script_model();		
		return $model->loadDataScript();
		// return $model->loadDataScript();		
	}
}
