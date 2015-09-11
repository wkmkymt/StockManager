<?php

/* ==================================================
 *   Model - ItemModel
 * ================================================== */

class Item extends AppModel {

  /* ====================
   *   Validation
   * ==================== */
  public $validate = array(
      "name" => array(
          "notBlank" => array(
              "rule" => array("notBlank"),
              "message" => "Item's Name is required!"
          ),
          "maxLength" => array(
              "rule" => array("maxLength", 32),
              "message" => "Item's Name is too long! (maximum is 32 characters)"
          )
      ),
      "value" => array(
          "notBlank" => array(
              "rule" => array("notBlank"),
              "message" => "Item's Value is required!"
          ),
          "numeric" => array(
              "rule" => array("numeric"),
              "message" => "Please input a numerical value."
          ),
      )
  );

}
