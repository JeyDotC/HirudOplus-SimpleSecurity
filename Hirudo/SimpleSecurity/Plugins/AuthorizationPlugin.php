<?php

namespace Sample\Plugins;

use Hirudo\Core\Events\BeforeTaskEventListener;
use Hirudo\Core\Events\BeforeTaskEvent;
use Hirudo\Core\Context\ModulesContext;
use Hirudo\Core\Context\ModuleCall;

/**
 * Description of ModuleEnhablePlugin
 *
 * @author JeyDotC
 */
class AuthorizationPlugin extends BeforeTaskEventListener {

    protected function beforeTask(BeforeTaskEvent $e) {
        
    }

}

?>
