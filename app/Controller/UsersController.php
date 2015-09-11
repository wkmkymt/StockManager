<?php

/* ==================================================
 *   Controller - UsersController
 * ================================================== */

class UsersController extends AppController {

  /* ====================
   *   Config
   * ==================== */
  public $uses = array("User", "OrgGroup", "Organization");


  /* ====================
   *   Allow Action
   * ==================== */
  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow("login", "logout", "add");
  }


  /* ====================
   *   Login
   * ==================== */
  public function login() {
    if($this->request->is("post")) {
      if($this->Auth->login()) {
        $this->Session->setFlash(__("Successfully logged in."), "success");
        return $this->redirect($this->Auth->redirectUrl());
      }
      else
        $this->Session->setFlash(__("Invalid name or password, try again"), "failure");
    }
  }


  /* ====================
   *   Logout
   * ==================== */
  public function logout() {
    $this->Session->setFlash(__("Successfully logged out."), "success");
    $this->redirect($this->Auth->logout());
  }


  /* ====================
   *   Index
   * ==================== */
  public function index() {
    $this->set("users", $this->paginate());
  }


  /* ====================
   *   View
   * ==================== */
  public function view($id = null) {
    if(!$this->User->exists($id))
      throw new NotFoundException(__("Invalid user"));

    $this->set("user", $this->User->findById($id));
  }


  /* ====================
   *   Add
   * ==================== */
  public function add() {
    if($this->request->is("post")) {
      $this->request->data["User"]["role"] = "normal";

      if($this->User->save($this->request->data)) {
        $this->Session->setFlash(__("The post has been saved."), "success");
        if($this->loginUserID())
          return $this->redirect(array("action" => "logout"));
        else
          return $this->redirect(array("action" => "login"));
      } else
        $this->Session->setFlash(__("The post could not be saved. Please, try again."), "failure");
    }
  }


  /* ====================
   *   Edit
   * ==================== */
  public function edit($id = null) {
    if(!$this->User->exists($id))
      throw new NotFoundException(__("Invalid user"));

    if($this->request->is(array("post", "put"))) {
      if(isset($this->request->data)) {
        $this->User->save($this->request->data);
        $this->Session->setFlash(__("The user has been saved."), "success");
        return $this->redirect(array("action" => "index"));
      } else
        $this->Session->setFlash(__("The user could not be saved. Please, try again."), "failure");
    } else
      $this->request->data = $this->User->findById($id);
  }


  /* ====================
   *   Delete
   * ==================== */
  public function delete($id = null) {
    if($this->request->is(array("post", "delete"))) {
      if(isset($id)) {
        if(!$this->User->exists($id))
          throw new NotFoundException(__("Invalid post"));
        else
          $this->request->data["deleteFlag"] = array($id);
      }

      if(isset($this->request->data["deleteFlag"])) {
        foreach($this->request->data["deleteFlag"] as $deleteID)
          $this->User->delete($deleteID);
        $this->Session->setFlash(__("The post has been deleted."), "success");
      } else
        $this->Session->setFlash(__("The post could not be deleted. Please, try again."), "failure");

      return $this->redirect(array("action" => "index"));
    }
  }

}
