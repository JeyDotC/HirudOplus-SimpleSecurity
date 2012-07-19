<?php

use Hirudo\SimpleSecurity\Models\Components\SimpleSecurityComponent;

/**
 * «Copyright 2012 Jeysson José Guevara Mendivil(JeyDotC)» 
 * 
 * This file is part of Hirudo.
 * 
 * Hirudo is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Hirudo is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Hirudo.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * 
 * @param array $params
 * @param string $content
 * @param type $template
 * @param boolean $repeat
 * @return string
 */
function smarty_block_display_for($params, $content, $template, &$repeat) {
    if (!$repeat) {
        $roles = $params["roles"];
        $component = new SimpleSecurityComponent();
        if (is_array($roles) && $component->userHasRoles($roles)) {
            return $content;
        }
    }
}

?>
