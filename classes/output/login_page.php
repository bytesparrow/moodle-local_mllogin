<?php

/**
 * Custom login for MedienLabor+
 * defines the parameters for the file login.mustache
 * 
 * @package     local_mllogin
 * @copyright   2025 Bernhard Strehl <moodle@bytesparrow.de>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mllogin\output;

use renderable;
use renderer_base;
use templatable;

class login_page implements renderable, templatable {

  public function export_for_template(renderer_base $output) {

    global $PAGE, $OUTPUT, $CFG;
    //LOGO
    $renderer = $PAGE->get_renderer('core');
    $logoUrl = $renderer->get_logo_url();

    $errormsg = "";
    if (optional_param('errorcode', 0, PARAM_INT)) {
      $errorcode = optional_param('errorcode', 0, PARAM_INT);
      switch ($errorcode) {
        case 1: $errormsg = get_string("cookiesnotenabled");
          break;
        case 2:$errormsg = get_string("invalidlogin");
          break;
        case 3: $errormsg = get_string("invalidlogin");
          break;
        case 4: $errormsg = get_string('sessionerroruser', 'error');
          break;
        default:
          break;
      }
    }

    $languagedata = new \core\output\language_menu($PAGE);
    $languagemenu = $languagedata->export_for_action_menu($OUTPUT);

    if ($CFG->maintenance_enabled == true) {
      if (!empty($CFG->maintenance_message)) {
        $maintenance = $CFG->maintenance_message;
      }
      else {
        $maintenance = get_string('sitemaintenance', 'admin');
      }
    }

    return array(
      "canloginbyemail" => !empty($CFG->authloginviaemail),
      "canloginasguest" => $CFG->guestloginbutton && !isguestuser(),
      "username" => "", //nicht leicht erhältlich
      "logourl" => "$logoUrl",
      "logintoken" => \core\session\manager::get_login_token(),
      "languagemenu" => $languagemenu,
      "maintenance" => $maintenance,
      "error" => $errormsg,
      "info" => "", //nicht gesetzt
      "vhb_link" => new \moodle_url('https://kurse.vhb.org/VHBPORTAL/kursprogramm/kursprogramm.jsp'),
    );
  }

}
