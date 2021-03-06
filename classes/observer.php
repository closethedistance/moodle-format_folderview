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
 * Event observer class for Folderview course format.
 *
 * @package    format_folderview
 * @author     Sam Chaffee
 * @copyright  Copyright (c) 2017 Blackboard Inc. (http://www.blackboard.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace format_folderview;

use core\event\course_content_deleted;

defined('MOODLE_INTERNAL') || die();

/**
 * Event observer class for Folderview course format.
 *
 * @package    format_folderview
 * @copyright  Copyright (c) 2017 Blackboard Inc. (http://www.blackboard.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class observer {

    /**
     * @param course_content_deleted $event
     */
    public static function course_content_deleted(course_content_deleted $event) {
        global $DB;

        $DB->delete_records('format_folderview_display', array('course' => $event->objectid));
        $DB->delete_records('user_preferences', array('name' => "format_folderview_{$event->objectid}"));
    }
}