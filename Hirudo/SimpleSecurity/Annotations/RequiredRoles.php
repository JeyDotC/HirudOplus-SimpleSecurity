<?php

namespace Hirudo\SimpleSecurity\Annotations;
use Doctrine\Common\Annotations\Annotation\Target;
/**
 * Description of RequiredRoles
 *
 * @author Perseo
 * @Target({"METHOD", "CLASS"})
 */
class RequiredRoles {
    /** @var array<string> */
    public $value;

}

?>
