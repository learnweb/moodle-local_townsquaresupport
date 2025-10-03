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
 * Unit tests for the local_townsquaresupport.
 *
 * @package   local_townsquaresupport
 * @copyright 2024 Tamaro Walter
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace local_townsquaresupport;

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/local/townsquaresupport/locallib.php');

/**
 * PHPUnit tests for testing the logic of proving if subplugin events satisfy the requirements of the townsquaresupport interface.
 *
 * @package   local_townsquaresupport
 * @copyright 2024 Tamaro Walter
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * @covers ::\local_townsquaresupport\townsquaresupport_check_subplugin_events()
 */
final class eventcheck_test extends \advanced_testcase {
    // Attributes.

    /** @var object The data that will be used for testing */
    private $testdata;


    // Construct functions.

    public function setUp(): void {
        parent::setUp();
        $this->testdata = new \stdClass();
        $this->resetAfterTest();
        $this->helper_test_set_up();
    }

    public function tearDown(): void {
        $this->testdata = null;
        parent::tearDown();
    }

    // Tests.

    /**
     * Test, if the check_subplugin_events function works correctly.
     * @return void
     */
    public function test_checkevents(): void {
        // Test the subevents.
        $this->assertEquals(false, local_townsquaresupport_check_subplugin_events($this->testdata->subevents1));
        $this->assertEquals(true, local_townsquaresupport_check_subplugin_events($this->testdata->subevents2));
        $this->assertEquals(false, local_townsquaresupport_check_subplugin_events($this->testdata->subevents3));
    }

    // Helper functions.

    /**
     * Helper function that sets up the testdata.
     * @return void
     */
    private function helper_test_set_up(): void {
        // Build different arrays of events that are incorrect (and one correct array).

        // First incorrect event: variable 'content' is missing.
        $incorrecteevent1 = ['courseid' => 12, 'modulename'  => 'pluginname', 'instancename' => 'instance1',
                             'timestart' => 123456789, 'coursemoduleid' => 13, 'eventtype' => 'eventtypeone', ];

        // Two completely correct events.
        $correctevent1 = ['courseid' => 12, 'modulename'  => 'pluginname', 'instancename' => 'instance1', 'content' => 'hello',
                         'timestart' => 123456789, 'coursemoduleid' => 13, 'eventtype' => 'eventtypeone', ];

        $correctevent2 = ['courseid' => 15, 'modulename'  => 'pluginname', 'instancename' => 'instance2', 'content' => 'bye',
            'timestart' => 123456787, 'coursemoduleid' => 16, 'eventtype' => 'eventtypeone', ];

        // Build different combinations of the events.
        $this->testdata->subevents1 = [(object)$incorrecteevent1, (object)$correctevent1];
        $this->testdata->subevents2 = [(object)$correctevent1, (object)$correctevent2];
        $this->testdata->subevents3 = ['arraykey' => 'incorrectsubevent'];
    }
}
