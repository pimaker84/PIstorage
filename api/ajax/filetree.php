 <?php
  
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&&strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
  		if(isset($_POST['apiKey'])&&trim($_POST['apiKey'])=='123'){
 			require_once __DIR__.'/../../functions/functions.php';
  			$dir=realpath(__DIR__.'/../../storage');
  			$files=scandirectory($dir);
 			header('Content-type: application/json');
  			echo json_encode(array(
  				'status'=>'ok',
  				'files'=>$files
  			));
  		}
 }
  
  die();

