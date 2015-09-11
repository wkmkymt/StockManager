<?php

/* ==================================================
 *   Model - UserModel
 * ================================================== */

App::uses("BlowfishPasswordHasher", "Controller/Component/Auth");


class User extends AppModel {

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
              "rule" => "notBlank",
              "message" => "Username is required!"
          ),
          "maxLength" => array(
              "rule" => array("maxLength", 32),
              "message" => "Organization's Name is too long! (maximum is 32 characters)"
          )
      ),
      "password" => array(
          "notBlank" => array(
              "rule" => "notBlank",
              "message" => "Password is required!"
          ),
          "passwordConfirm" => array(
              "rule" => "passwordConfirm",
              "message" => "Password doesn't match the confirmation!"
          ),
          "maxLength" => array(
              "rule" => array("maxLength", 32),
              "message" => "Organization's Name is too long! (maximum is 32 characters)"
          ),
          "minLength" => array(
              "rule" => array("minLength", 6),
              "message" => "Organization's Name is too short! (minimum is 6 characters)"
          )
      ),
      "repassword" => array(
          "notBlank" => array(
              "rule" => "notBlank",
              "message" => "Password is required!"
          )
      ),
      "role" => array(
          "valid" => array(
              "rule" => array("inList", array("master", "admin", "normal")),
              "message" => "Please enter a valid Role",
              "allowEmpty" => false
          )
      )
  );


  /* ====================
   *   Hash Password
   * ==================== */
  public function beforeSave($options = array()) {
    if(isset($this->data[$this->alias]["password"]))
      $this->data[$this->alias]["password"] = $this->hashPassword($this->data[$this->alias]["password"]);
    return true;
  }

  public function hashPassword($password) {
    $passwordHasher = new BlowfishPasswordHasher();
    return $passwordHasher->hash($password);
  }


  /* ====================
   *   Hash Password
   * ==================== */
  public function passwordConfirm($check) {
    return ($this->data["User"]["password"] === $this->data["User"]["repassword"]);
  }

}
