<?php /**
 *
 */
class message_detail extends Controller
{

  function __construct()
  {
    //call parent constructor
    Parent::__construct();
    //$this->view->msg = "we have arrived";
    $this->view->render('message_detail');
  }

  
}
 ?>
