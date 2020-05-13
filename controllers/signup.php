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

  public function signup_model() {
    //include login model
    require "models/signup_model.php";
  }
}
 ?>
