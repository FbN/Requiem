<?php

namespace Bundle\Requiem\Services;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Artifact container aware
 */
class RequiemController extends Controller{

    protected $requiemBinder;

    function __construct() {
        $this->requiemBinder = new RequiemBinder($this);
    }

    public function setContainer(ContainerInterface $container = null) {
        parent::setContainer($container);
        if ($container) $this->requiemBinder->bindByConvention();
    }

}

?>
