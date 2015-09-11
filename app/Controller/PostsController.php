<?php

/* ==================================================
 *   Controller - PostsController
 * ================================================== */

class PostsController extends AppController {

  /* ====================
   *   Config
   * ==================== */
  public $uses = array("Post", "Order", "Item", "User");


  /* ====================
   *   Authorization
   * ==================== */
  public function isAuthorized($user) {
    if($this->action === "add")
      return true;

    if(in_array($this->action, array("edit", "delete")) && isset($this->require->params)) {
      $postId = (int)$this->request->params["pass"][0];
      if($this->Post->isOwnerBy($postId, $user["id"]))
        return true;
    }

    return parent::isAuthorized($user);
  }


  /* ====================
   *   Index
   * ==================== */
  public function index() {
    $user = $this->Auth->user();

    $this->set("posts", $this->paginate(array("Post.user_id" => $user["id"])));
  }


  /* ====================
   *   View
   * ==================== */
  public function view($id = null) {
    if(!$this->Post->exists($id))
      throw new NotFoundException(__("Invalid post"));

    $this->set("post", $this->Post->findById($id));
  }


  /* ====================
   *   Add
   * ==================== */
  public function add() {
    if($this->request->is("post")) {
      $this->request->data["Post"]["user_id"] = $this->Auth->user("id");

      if($this->Post->save($this->request->data["Post"])) {
        /* Order */
        foreach($this->request->data["Order"] as $data) {
          $query = $this->Post->find("first", array(
                  "recursive" => "-1",
                  "fields" => array("id"),
                  "order" => "Post.created DESC"));
          $data["post_id"] = $query["Post"]["id"];
          $this->Order->saveAll($data);
        }

        $this->Session->setFlash(__("The post has been saved."), "success");
        return $this->redirect(array("action" => "index"));
      } else
        $this->Session->setFlash(__("The post could not be saved. Please, try again."), "failure");
  }
    $user = $this->Auth->user();
    $this->set("itemList", $this->Item->find("list", array("fields" => array("id", "name"), "conditions" => array("Item.user_id" => $user["id"]))));
  }


  /* ====================
   *   Edit
   * ==================== */
  public function edit($id = null) {
    if(!$this->Post->exists($id))
      throw new NotFoundException(__("Invalid post"));

    if($this->request->is(array("post", "put"))) {
      if(isset($this->request->data)) {
        $query = $this->Order->find("all", array(
                "conditions" => array("Order.post_id" => $id),
                "fields" => array("Order.id")
            ));
        foreach($query as $index => $data)
          $this->request->data["Order"][$index]["id"] = $data["Order"]["id"];

        $this->Post->saveAll($this->request->data);
        $this->Session->setFlash(__("The post has been saved."), "success");
        return $this->redirect(array("action" => "index"));
      } else
        $this->Session->setFlash(__("The post could not be saved. Please, try again."), "failure");
    } else
      $this->request->data = $this->Post->findById($id);

    $this->set("post", $this->Post->findById($id));
    $this->set("itemList", $this->Item->find("list", array("fields" => array("id", "name"))));
    $this->set("userList", $this->User->find("list", array("fields" => array("id", "name"))));
  }


  /* ====================
   *   Delete
   * ==================== */
  public function delete($id = null) {
    if($this->request->is(array("post", "delete"))) {
      if(isset($id)) {
        if(!$this->Post->exists($id))
          throw new NotFoundException(__("Invalid post"));
        else
          $this->request->data["deleteFlag"] = array($id);
      }

      if(isset($this->request->data["deleteFlag"])) {
        foreach($this->request->data["deleteFlag"] as $deleteID)
          $this->Post->delete($deleteID);
        $this->Session->setFlash(__("The post has been deleted."), "success");
      } else
        $this->Session->setFlash(__("The post could not be deleted. Please, try again."), "failure");

      return $this->redirect(array("action" => "index"));
    }
  }
}
