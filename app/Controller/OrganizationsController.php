<?php

/* ==================================================
 *   Controller - PostsController
 * ================================================== */

class OrganizationsController extends AppController {

  /* ====================
   *   Config
   * ==================== */
  public $uses = array("OrgGroup", "Organization");


  /* ====================
   *   Index
   * ==================== */
  public function index() {
    $this->set("organizations", $this->paginate());
  }


  /* ====================
   *   View
   * ==================== */
  public function view($id = null) {
    if (!$this->Organization->exists($id))
      throw new NotFoundException(__("Invalid organization"));

    $this->set("organization", $this->Organization->findById($id));
  }


  /* ====================
   *   Add
   * ==================== */
  public function add() {
    if ($this->request->is("post")) {
      $this->Organization->create();
      $this->request->data["Organization"]["user_id"] = $this->Auth->user("id");

      if ($this->Organization->save($this->request->data)) {
        // Org Group
        $query = $this->Organization->find("first", array(
                "recursive" => "-1",
                "fields" => array("id"),
                "order" => "Organization.created DESC"));

        $param = array(
            "user_id" => $this->Auth->user("id"),
            "organization_id" => $query["Organization"]["id"]
        );
        $this->OrgGroup->saveAll($param);

        $this->Session->setFlash(__("The organization has been saved."), "success");
        return $this->redirect(array("controller" => "posts", "action" => "index"));
      } else
        $this->Session->setFlash(__("The organization could not be saved. Please, try again."), "failure");
    }
  }


  /* ====================
   *   Edit
   * ==================== */
  public function edit($id = null) {
    if (!$this->Organization->exists($id))
      throw new NotFoundException(__("Invalid organization"));

    if ($this->request->is(array("post", "put"))) {
      if(isset($this->request->data)) {
        $this->Organization->save($this->request->data);
        $this->Session->setFlash(__("The organization has been saved."), "success");
        return $this->redirect(array("action" => "index"));
      } else
        $this->Session->setFlash(__("The organization could not be saved. Please, try again."), "failure");
    } else
      $this->request->data = $this->Organization->findById($id);
  }


  /* ====================
   *   Delete
   * ==================== */
  public function delete($id = null) {
    if($this->request->is(array("post", "delete"))) {
      if(isset($id)) {
        if(!$this->Organization->exists($id))
          throw new NotFoundException(__("Invalid post"));
        else
          $this->request->data["deleteFlag"] = array($id);
      }

      if(isset($this->request->data["deleteFlag"])) {
        foreach($this->request->data["deleteFlag"] as $deleteID)
          $this->Organization->delete($deleteID);
        $this->Session->setFlash(__("The post has been deleted."), "success");
      } else
        $this->Session->setFlash(__("The post could not be deleted. Please, try again."), "failure");

      return $this->redirect(array("controller" => "posts", "action" => "index"));
    }
  }

}
