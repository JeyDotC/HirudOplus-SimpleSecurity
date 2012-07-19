<?php

namespace Hirudo\SimpleSecurity\Models\Components;

use Hirudo\Core\Context\ModulesContext;

/**
 * Description of SecurityComponent
 *
 * @author mastil-01
 */
class SimpleSecurityComponent {

    private $context;

    function __construct() {
        $this->context = ModulesContext::instance();
    }

    public function userHasRoles(array $roles) {
        $userRoles = $this->context->getCurrentUser()->getPermissions();
        return is_array($userRoles) && count(array_intersect($roles, $userRoles)) > 0;
    }

}

?>
