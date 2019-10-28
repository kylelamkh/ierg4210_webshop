<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Admin Controller
 *
 *
 * @method 
 */
class CartController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
			$this->autoRender = FALSE;
			session_start();

			if (!empty($_POST["action"])) {
				switch($_POST["action"]) {
					case "add":
						if(!empty($_POST["quantity"])) {
							$this->loadModel('Products');
							$productByCode = $this->Products->get($_POST["pid"], [
																	'contain' => []
																]);
							$itemArray = array($productByCode["pid"]=>array('name'=>$productByCode["name"], 'pid'=>$productByCode["pid"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"]));
							if(!empty($_SESSION["cart_item"])) {
								if(in_array($productByCode["pid"],$_SESSION["cart_item"])) {
									foreach($_SESSION["cart_item"] as $k => $v) {
											if($productByCode["pid"] == $k)
												$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
									}
								} else {
									$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
								}
							} else {
								$_SESSION["cart_item"] = $itemArray;
							}
						}
					break;
					case "remove":
						if(!empty($_SESSION["cart_item"])) {
							foreach($_SESSION["cart_item"] as $k => $v) {
									if($_POST["pid"] == $k)
										unset($_SESSION["cart_item"][$k]);
									if(empty($_SESSION["cart_item"]))
										unset($_SESSION["cart_item"]);
							}
						}
					break;
					case "clear":
						unset($_SESSION["cart_item"]);
					break;		
				}
			}
			if(isset($_SESSION["cart_item"])){
				$item_total = 0;
			}
			
			if(!empty($_SESSION["cart_item"])){
				echo ('<form><button id="btnEmpty" class="btn btn-light btn-block cart-action" onClick="cartAction('."'clear'".','."''".')">Empty Cart</button></div>');
				foreach ($_SESSION["cart_item"] as $item){
					echo ('<div class"row">');
						echo ('<div class="col"><img src="/img/'.$item["pid"].'.jpg" class="img-thumbnail"></div>');
						echo ('<div class="col"><label class="control-label">Quantity:</label><input type="number" value="'.$item["quantity"].'" min="1"></div>');
						echo ('<div class="col">$'.$item["price"].'</div>');
						echo ('<div class="col"><button class="btn btn-light btn-block btnRemoveAction cart-action" onClick="cartAction('."'remove'".','.$item["pid"].')">Remove</button></div>');
					echo ('</div>');
					$item_total += ($item["price"]*$item["quantity"]);
				}
				echo ('<div class="text-center"><div class="row"><div class="col">Total :</div><div class="col">$'.$item_total.'</div></div>');
				echo ('<button class="btn btn-light btn-block">Checkout</button></div>');
				echo ('</form>');
			}
			else{
				echo ('<div class="text-center">Cart Empty</div>');
			}
    }
}