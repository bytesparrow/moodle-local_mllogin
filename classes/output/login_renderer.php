<?php

/**
 * Custom login for MedienLabor+
 * renders the template login.mustache
 * 
 * @package     local_mllogin
 * @copyright   2025 Bernhard Strehl <moodle@bytesparrow.de>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mllogin\output;

use plugin_renderer_base;

class login_renderer extends plugin_renderer_base {

  public function render_login_page(login_page $page) {
    return $this->render_from_template('local_mllogin/login', $page->export_for_template($this));
  }

}
