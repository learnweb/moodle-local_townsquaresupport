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

/**
 * Function to get the events from every subplugin that extends the town square.
 *
 * As every subplugin from townsquaresupport follows the same structure and has the get_event method located in the same
 * place, this function can access it directly.
 */
function townsquaresupport_get_subplugin_events() {

    // Get all subplugins.
    $subplugins = \core_plugin_manager::instance()->get_plugins_of_type('townsquareexpansion');
    $events = [];

    foreach ($subplugins as $subplugin) {

        // Get the class where the get_events method of the subplugin is located.
        $expansionname = $subplugin->name;
        $classstring = "\\townsquareexpansion_" . $expansionname . "\\" . $expansionname;
        $expansionclass = new $classstring();

        // Get the events from the subplugin and add it to the events array.
        $events = array_merge($events, $expansionclass->get_events());

    }
    return $events;
}
