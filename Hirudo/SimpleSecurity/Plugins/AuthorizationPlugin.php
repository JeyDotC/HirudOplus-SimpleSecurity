<?php

namespace Sample\Plugins;

use Hirudo\Core\Events\BeforeTaskEventListener;
use Hirudo\Core\Events\BeforeTaskEvent;
use Hirudo\Core\Context\ModuleCall;
use Hirudo\SimpleSecurity\Annotations\RequiredRoles;
use Hirudo\SimpleSecurity\Models\Components\SimpleSecurityComponent;

/**
 * Description of ModuleEnhablePlugin
 *
 * @author JeyDotC
 */
class AuthorizationPlugin extends BeforeTaskEventListener {

    protected function beforeTask(BeforeTaskEvent $e) {
        $context = $e->getContext();
        $requiredRoles = $e->getTask()->getTaskAnnotation("Hirudo\SimpleSecurity\Annotations\RequiredRoles");
        if ($requiredRoles == null) {
            $module = $e->getTask()->getModule();
            $requiredRoles = $context->getDependenciesManager()->getClassMetadataById(new \ReflectionClass($module), "Hirudo\SimpleSecurity\Annotations\RequiredRoles");
        }

        if ($requiredRoles instanceof RequiredRoles) {
            $component = new SimpleSecurityComponent();
            if (!$component->userHasRoles($requiredRoles->value)) {
                $call = ModuleCall::fromString($context->getConfig()->get("forbidden_page"));
                $routing = $context->getRouting();
                $routing->redirect($routing->appAction($call->getApp(), $call->getModule(), $call->getTask()));
            }
        }
    }

}

?>
