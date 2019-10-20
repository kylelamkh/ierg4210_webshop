<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Products Controller
 *
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function list()
    {
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }
	
    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$connection = ConnectionManager::get('default');
		$qeury = 'SELECT products.pid, products.name, categories.name AS "category", products.price, products.description FROM `products` INNER JOIN `categories` ON products.cid = categories.cid AND pid = '.$id;
		$product = $connection->execute($qeury)->fetchAll('assoc');
        
		$this->set(compact('product'));
    }
	
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */	
    public function add()
    {
		$entity = $this->Products->find('all')->toArray();
		$this->set(compact('entity'));
		$product = $this->Products->newEntity();
        if ($this->request->is('post')) {
			$this->request->data['photo']['name'] = (count($entity)+1).substr($this->request->data['photo']['name'], -4);
            $product = $this->Products->patchEntity($product, $this->request->getData());
			$product->pid = count($entity)+1;
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'list']);
    }
}
