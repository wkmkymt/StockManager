<?php

/* ==================================================
 *   Model - PostModel
 * ================================================== */

class Post extends AppModel {

  /* ====================
   *   Validation
   * ==================== */
  public $validate = array(
      "user_id" => array(
          "notBlank" => array(
              "rule" => array("notBlank"),
              "message" => "Username is required!"
          )
      )
  );


  /* ====================
   *   Association
   * ==================== */
  public $recursive = 2;

  public $belongsTo = "User";
  public $hasMany = array("Order" => array("dependent" => true));


  /* ====================
   *   Authorization
   * ==================== */
  public function isOwnerBy($post, $user) {
    return $this->field("id", array("id" => $post, "user_id" => $user)) !== false;
  }

}
