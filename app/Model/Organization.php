<?php

/* ==================================================
 *   Model - PostModel
 * ================================================== */

class Organization extends AppModel {

  /* ====================
   *   Association
   * ==================== */
  public $recursive = 2;

  public $hasMany = array("OrgGroup" => array("dependent" => true));


  /* ====================
   *   Validation
   * ==================== */
  public $validate = array(
      "name" => array(
          "notBlank" => array(
              "rule" => array("notBlank"),
              "message" => "Organization's Name is required!"
          ),
          "maxLength" => array(
              "rule" => array("maxLength", 32),
              "message" => "Organization's Name is too long! (maximum is 32 characters)"
          ),
          "minLength" => array(
              "rule" => array("minLength", 3),
              "message" => "Organization's Name is too short! (minimum is 3 characters)"
          )
      )
  );

}