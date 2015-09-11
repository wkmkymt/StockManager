<?php

/* ==================================================
 *   Model - PostModel
 * ================================================== */

class OrgGroup extends AppModel {

  /* ====================
   *   Association
   * ==================== */
  public $recursive = 2;

  public $belongsTo = array("User", "Organization");


  /* ====================
   *   Validation
   * ==================== */
  public $validate = array(
      "organization_id" => array(
          "notBlank" => array(
              "rule" => array("notBlank"),
              "message" => "Organization is required!"
          )
      )
  );

}
