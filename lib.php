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
 *
 */
function townsquaresupport_get_subplugin_events() {
    // Get all available event from townsquaresupport subplugins.
    /*$event = [
        'courseid' => 2,
        'modulename' => 'modulename',
        'instancename' => 'instancename',
        'content' => 'HALLO HALLO',
        'timestart' => time(),
        'coursemoduleid' => 1,
        'eventtype' => 'eventtype'
    ];
    $event2 = [
        'courseid' => 2,
        'modulename' => 'modulename',
        'instancename' => 'instancename',
        'content' => 'HALLO TSCHAUUU',
        'timestart' => time(),
        'coursemoduleid' => 1,
        'eventtype' => 'eventtype'
    ];
    $events = [$event, $event2];
    //$subplugins = \core_plugin_manager::instance()->get_plugins_of_type('supportedmodules');
    //var_dump($subplugins);
    //foreach ($subplugins as $subplugin) {
    //    $events += $subplugin->get_events();
    //}
    return $events;*/
    $subplugins = \core_plugin_manager::instance()->get_plugins_of_type('townsquareexpansion');
    return $subplugins;
}
