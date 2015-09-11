<?php

/* ==================================================
 *   Controller - AppController
 * ================================================== */

App::uses("Controller", "Controller");
App::uses("Security", "Utility");


class AppController extends Controller {

  /* ====================
   *   Helper
   * ==================== */
  public $helpers = array("Session", "Html", "Form", "Date");


  /* ====================
   *   Component
   * ==================== */
  public $components = array(
      "Session",
      "Auth" => array(
          "loginRedirect" => array(
              "controller" => "posts",
              "action" => "index"
          ),
          "logoutRedirect" => array(
              "controller" => "users",
              "action" => "login"
          ),
          "authenticate" => array(
              "Form" => array(
                  "passwordHasher" => "Blowfish",
                  "userModel" => "User",
                  "fields" => array("username" => "name", "password" => "password")
              )
          ),
          "authorize" => array("Controller")
      )
  );


  /* ====================
   *   Get Login User ID
   * ==================== */
  public function loginUserID() {
    return $this->Auth->user("id");
  }


  /* ====================
   *   Authorization
   * ==================== */
  public function isAuthorized($user) {
    if(isset($user["role"]) && $user["role"] === "admin")
      return true;
    return false;
  }

  public function beforeFilter() {
    $user = $this->Auth->user();

    if($user)
      $this->Auth->allow();

    $this->set("session", $user);
  }

}
