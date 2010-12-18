<?php

namespace Bundle\Requiem\Services;

/**
 * A utility class used to implement the autobind of container services to artifacts members properties
 * by convention <service name>Services
 *
 * A special case is the doctrine entitymanager that it binded to the $em property or $entityService by default
 *
 * @author fbn
 */
class RequiemBinder {

    private $target;

    function __construct($target){
        $this->target = $target;
    }

    public function bindByConvention() {

        $reflect = new \ReflectionClass($this->target);

        foreach ($reflect->getProperties() as $prop) {

            $serviceName = \substr($propName = $prop->getName(), 0, -7);

            if (\substr($prop->getName(), -7) === 'Service' && $this->target->has($serviceName)) {
                $prop->setAccessible(true);
                if ($prop->getValue($this->target) === null)
                    $prop->setValue($this->target, $this->target->get($serviceName));
            }
        }

        if ($reflect->hasProperty('entityService')) {
            $prop = $reflect->getProperty('entityService');
            $prop->setAccessible(true);
            if ($prop->getValue($this->target) === null) {
                $prop->setValue($this->target, $this->target->get('doctrine.orm.entity_manager'));
            }
        }

        if ($reflect->hasProperty('em')) {
            $prop = $reflect->getProperty('em');
            $prop->setAccessible(true);
            if ($prop->getValue($this->target) === null) {
                $prop->setValue($this->target, $this->target->get('doctrine.orm.entity_manager'));
            }
        }
    }

}

?>
