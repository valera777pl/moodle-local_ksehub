<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * English strings for local_ksehub.
 *
 * @package    local_ksehub
 * @copyright  2026 KSE Hub
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allow'] = 'Allow';
$string['badstate'] = 'This link is broken or incomplete. Open the connection again from KSE Hub.';
$string['consentrevoke'] = 'You can turn it off at any time: in KSE Hub, or in Moodle under Preferences → Security keys.';
$string['consenttitle'] = 'Connect Moodle to KSE Hub';
$string['consentwhat'] = 'KSE Hub will be able to read your courses, grades, assignment deadlines and quiz attempts. It will not be able to submit work, send messages or change anything in Moodle.';
$string['consentwho'] = 'You are signed in as {$a}.';
$string['ksehub:connect'] = 'Connect Moodle to KSE Hub with a read-only key';
$string['noadmins'] = 'Site administrators don\'t get a key this way: their key would read everyone\'s data. Use a student account.';
$string['norestuse'] = 'Your account may not use the REST web service: the role "Authenticated user" needs the capability webservice/rest:use.';
$string['notconfigured'] = 'The KSE Hub plugin is not set up: its return address is empty or does not start with https:// (Site administration → Plugins → Local plugins → KSE Hub).';
$string['pluginname'] = 'KSE Hub';
$string['privacy:metadata:ksehub'] = 'To connect Moodle to KSE Hub, the user\'s read-only web service key is sent to KSE Hub, which uses it to read the user\'s own courses, grades and deadlines.';
$string['privacy:metadata:ksehub:state'] = 'An opaque value from KSE Hub that tells which KSE Hub account started the connection.';
$string['privacy:metadata:ksehub:token'] = 'The user\'s web service key for the read-only service kse_hub_readonly.';
$string['restdisabled'] = 'The REST protocol is turned off (Site administration → Server → Web services → Manage protocols).';
$string['returnbutton'] = 'Return to KSE Hub';
$string['returning'] = 'Returning to KSE Hub…';
$string['returnurl'] = 'Return address';
$string['returnurl_desc'] = 'The KSE Hub page that receives the read-only key. Only https:// addresses work. Clear it to turn the plugin off.';
$string['serviceempty'] = 'The web service "{$a}" has no functions (Site administration → Server → Web services → External services → Functions).';
$string['servicemissing'] = 'The web service "{$a}" does not exist or is disabled (Site administration → Server → Web services → External services).';
$string['servicenotreadonly'] = 'The web service "kse_hub_readonly" has functions that do more than read: {$a}. Remove them: this plugin issues read-only keys only.';
