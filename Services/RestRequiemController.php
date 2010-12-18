<?php


namespace Bundle\Requiem\Services;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * A restfull controller, all you need to do is to implement the http methods you need (ex: doGet() or doPost() )
 * and call the handle() action from the routing
 */
class RestRequiemController extends RequiemController{

    /**
     * The default handle method, the entry point to use with the request routing
     */
    public function handle(){

        $requestMethod = 'do'.ucfirst(strtolower($_SERVER['REQUEST_METHOD']));

        $this->$requestMethod();

    }
    
    private function notImplementedMethod(){throw new NotFoundHttpException('Method not supported');}
    protected function doGet(){$this->notImplementedMethod();}
    protected function doPost(){$this->notImplementedMethod();}
    protected function doPut(){$this->notImplementedMethod();}
    protected function doDelete(){$this->notImplementedMethod();}
    protected function doTrace(){$this->notImplementedMethod();}
    protected function doOptions(){$this->notImplementedMethod();}
    protected function doConnect(){$this->notImplementedMethod();}
    protected function doPatch(){$this->notImplementedMethod();}

}


?>
