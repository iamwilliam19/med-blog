<?php /**
 *
 */
class detail extends Controller
{

  function __construct()
  {
    //call parent constructor
    Parent::__construct();
    //$this->view->msg = "we have arrived";
    $this->view->render('detail');
  }
}
 ?>
