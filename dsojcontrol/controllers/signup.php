<?php /**
 *
 */
class signup extends Controller
{

  function __construct()
  {
    //call parent constructor
    Parent::__construct();
    //$this->view->msg = "we have arrived";
    $this->view->render('signup');
  }

  public function login_model() {
    //include login model
    require "models/login_model.php";
  }
}
 ?>
