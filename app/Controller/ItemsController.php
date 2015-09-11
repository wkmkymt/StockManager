<?php

/* ==================================================
 *   Controller - ItemsController
 * ================================================== */

class ItemsController extends AppController {

  /* ====================
   *   Index
   * ==================== */
  public function index() {
    $user = $this->Auth->user();
    $this->set("items", $this->paginate(array("Item.user_id" => $user["id"])));
  }


  /* ====================
   *   View
   * ==================== */
  public function view($id = null) {
    if(!$this->Item->exists($id))
      throw new NotFoundException(__("Invalid item"));

    $this->set("item", $this->Item->findById($id));
  }


  /* ====================
   *   Add
   * ==================== */
  public function add() {
    if($this->request->is("post")) {
      $this->request->data["Item"]["user_id"] = $this->Auth->user("id");
      $this->Item->create();
      if($this->Item->save($this->request->data)) {
        $this->Session->setFlash(__("The item has been saved."), "success");
        return $this->redirect(array("action" => "index"));
      } else
        $this->Session->setFlash(__("The item could not be saved. Please, try again."), "failure");
    }
  }


  /* ====================
   *   Edit
   * ==================== */
  public function edit($id = null) {
    if(!$this->Item->exists($id))
      throw new NotFoundException(__("Invalid item"));

    if($this->request->is(array("post", "put"))) {
      if($this->Item->save($this->request->data)) {
        $this->Session->setFlash(__("The item has been saved."), "success");
        return $this->redirect(array("action" => "index"));
      } else
        $this->Session->setFlash(__("The item could not be saved. Please, try again."), "failure");
    } else
      $this->request->data = $this->Item->findById($id);

    $this->set("item", $this->Item->findById($id));
  }


  /* ====================
   *   Delete
   * ==================== */
  public function delete($id = null) {
    if($this->request->is(array("post", "delete"))) {
      if(isset($id)) {
        if(!$this->Item->exists($id))
          throw new NotFoundException(__("Invalid post"));
        else
          $this->request->data["deleteFlag"] = array($id);
      }

      debug($this->request->data);

      if(isset($this->request->data["deleteFlag"])) {
        foreach($this->request->data["deleteFlag"] as $deleteID)
          $this->Item->delete($deleteID);
        $this->Session->setFlash(__("The post has been deleted."), "success");
      } else
        $this->Session->setFlash(__("The post could not be deleted. Please, try again."), "failure");

      return $this->redirect(array("action" => "index"));
    }
  }

}
