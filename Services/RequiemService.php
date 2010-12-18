<?php

namespace Bundle\Requiem\Services;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * A generic artifacts. It's like a RequiemController (a symfony controller with autobind service<->class property)
 * but used for bussiness classes
 */
class RequiemService extends ContainerAware {

    protected $requiemBinder;

    /**
     * Init the artifcat with the specified container and bind service
     * @param ContainerInterface $container The application context
     */
    function __construct(ContainerInterface $container=null){

        if($container) $this->container = $container;

        $this->requiemBinder = new RequiemBinder($this);
        $this->requiemBinder->bindByConvention();

    }
    
}

?>
