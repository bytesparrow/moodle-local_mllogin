<?php

/**
 * Custom login for MedienLabor+
 * This is the site local/mllogin/index.php
 *
 * @package     local_mllogin
 * @copyright   2025 Bernhard Strehl <moodle@bytesparrow.de>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
// Include config.php.
// phpcs:disable moodle.Files.RequireLogin.Missing
// Let codechecker ignore the next line because otherwise it would complain about a missing login check
// after requiring config.php which is really not needed.
require $_SERVER ["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 'config.php';

$PAGE->set_url(new moodle_url('/local/mllogin/index.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'local_mllogin'));
#$PAGE->set_heading(get_string('pluginname', 'local_mllogin'));
$PAGE->set_pagelayout('login'); # oder login

$custom_renderer = $PAGE->get_renderer('local_mllogin');
$page = new \local_mllogin\output\login_page();


echo $OUTPUT->header();
echo $custom_renderer->render_login_page($page);
echo $OUTPUT->footer();
