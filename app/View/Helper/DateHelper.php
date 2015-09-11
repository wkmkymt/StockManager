<?php

/* ==================================================
 *   Helper - DateHelper
 * ================================================== */

App::uses('TimeHelper', 'View/Helper');


class DateHelper extends AppHelper {

  /* ====================
   *   date format
   * ==================== */
  public function dateFormat($date, $format = "Y/m/d H:i:s") {
    return date($format, strtotime($date));
  }

}
