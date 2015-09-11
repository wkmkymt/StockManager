<?php

/* ==================================================
 *   Model - OrderModel
 * ================================================== */

class Order extends AppModel {

  /* ====================
   *   Validation
   * ==================== */
  public $validate = array(
      "item_id" => array(
          "notBlank" => array(
              "rule" => array("notBlank"),
              "message" => "Item's Name is required!"
          )
      ),
      "count" => array(
          "notBlank" => array(
              "rule" => array("notBlank"),
              "message" => "Item's Cost is required!"
          ),
          "numeric" => array(
              "rule" => array("numeric"),
              "message" => "Please input a numerical value."
          )
      )
  );


  /* ====================
   *   association
   * ==================== */
  public $belongsTo = "Item";

}
