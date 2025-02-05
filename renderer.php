<?php

/**
 * Custom login for MedienLabor+
 * This is a custom renderer
 * @package     local_mllogin
 * @copyright   2025 Bernhard Strehl <moodle@bytesparrow.de>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
use plugin_renderer_base;

class local_mllogin_renderer extends plugin_renderer_base {

  public function render_login_page(\local_mllogin\output\login_page $page) {
    return $this->render_from_template('local_mllogin/login', $page->export_for_template($this));
  }

}
