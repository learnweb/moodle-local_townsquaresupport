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

/**
 * Function to get the events from every subplugin that extends the town square.
 *
 * As every subplugin from townsquaresupport follows the same structure and has the get_event method located in the same
 * place, this function can access it directly.
 * @package     local_townsquaresupport
 * @copyright   2024 Tamaro Walter
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_townsquaresupport;

use moodle_exception;

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/local/townsquaresupport/locallib.php');

/**
 * Core function of the townsquaresupport plugin. Retrieves all events from the subplugins and makes them available
 * to the townsquare block.
 *
 * @return array
 * @throws moodle_exception
 */
function local_townsquaresupport_get_subplugin_events(): array {

    // Get all subplugins.
    $subplugins = \core_plugin_manager::instance()->get_plugins_of_type('townsquareexpansion');
    $events = [];

    foreach ($subplugins as $subplugin) {
        // Get the class where the get_events method of the subplugin is located.
        $expansionname = $subplugin->name;
        $classstring = "\\townsquareexpansion_" . $expansionname . "\\" . $expansionname;
        $expansionclass = new $classstring();

        // Get the events from the subplugin.
        $subpluginevents = $expansionclass->get_events();

        // Check if the events meet the requirements of the interface.
        if (local_townsquaresupport_check_subplugin_events($subpluginevents)) {
            $events = array_merge($events, $subpluginevents);
        } else {
            // Throw an error as there is an error in the subplugin code.
            throw new moodle_exception('subpluginerror', 'local_townsquaresupport', '', ['subpluginname' => $expansionname]);
        }
    }
    return $events;
}
