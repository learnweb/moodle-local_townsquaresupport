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

use stdClass;

/**
 * Helper function for townsquaresupport_get_subplugin_events, that checks if an amount
 * of events have all the required attributes from the townsquaresupport interface.
 *
 * @param array $subevents
 * @return bool
 */
function local_townsquaresupport_check_subplugin_events(array $subevents): bool {
    if (empty($subevents)) {
        // If no events are available, then everything is okay.
        return true;
    }

    // Check every event.
    foreach ($subevents as $event) {
        if (!is_object($event)) {
            return false;
        }

        // Check if all variables are set.
        $required = ['courseid', 'modulename', 'instancename', 'content', 'timestart', 'coursemoduleid', 'eventtype'];
        foreach ($required as $attribute) {
            if (!isset($event->$attribute)) {
                return false;
            }
        }
    }
    return true;
}
