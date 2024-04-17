<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_townsquaresupport;

defined('MOODLE_INTERNAL') || die();

use context_module;
use dml_exception;

global $CFG;
require_once($CFG->dirroot . '/calendar/lib.php');
require_once($CFG->dirroot . '/blocks/townsquare/locallib.php');
/**
 *
 */
function townsquaresupport_get_subplugin_events() {
    // Get all available subplugins.
    $events = [];
    $subplugins = \core_plugin_manager::instance()->get_plugins_of_type('supportedmodules');
    var_dump($subplugins);
    foreach ($subplugins as $subplugin) {
        $events += $subplugin->get_events();
    }
}
