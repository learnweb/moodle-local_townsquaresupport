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
 * Internal library of functions for the townsquaresupport plugin
 *
 * @package     local_townsquaresupport
 * @copyright   2024 Tamaro Walter
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_townsquaresupport;

/**
 * Helper function for townsquaresupport_get_subplugin_events, that checks if an amount
 * of events have all the required attributes from the townsquaresupport interface.
 *
 * @param array $subevents
 * @return bool
 */
function local_townsquaresupport_check_subplugin_events($subevents): bool {
    if (!gettype($subevents == 'array')) {
        return false;
    }

    if ($subevents == []) {
        // If no events are available, then everything is okay.
        return true;
    } else {
        // Check every event.
        foreach ($subevents as $event) {
            if (gettype($event) != 'object') {
                return false;
            }

            // Check if all variables are set.
            $issetcheck = local_townsquaresupport_check_isset($event, 'courseid') &&
                local_townsquaresupport_check_isset($event, 'modulename') &&
                local_townsquaresupport_check_isset($event, 'instancename') &&
                local_townsquaresupport_check_isset($event, 'content') &&
                local_townsquaresupport_check_isset($event, 'timestart') &&
                local_townsquaresupport_check_isset($event, 'coursemoduleid') &&
                local_townsquaresupport_check_isset($event, 'eventtype');

            if (!$issetcheck) {
                return false;
            }
        }
    }
    return true;
}

/**
 * Helper function for check_subplugin_events function that proves if a variable is set in an array.
 *
 * @param array $event              Event that is checked.
 * @param string $variablename      Name of the variable
 * @return bool
 */
function local_townsquaresupport_check_isset($event, $variablename): bool {
    return isset($event->$variablename);
}
