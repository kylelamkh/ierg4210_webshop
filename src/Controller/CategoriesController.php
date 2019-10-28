<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * Categories Controller
 *
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    var $in_session = "0";
	
	/**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->loadModel('Products');
		//$products = $this->Products->find('all');
		$products = $this->paginate('Products');
		$this->set('products', $products);
		$this->set('$in_session', $this->in_session);
    }
	
	public function men()
    {
        $this->loadModel('Products');
		$menProducts = $this->Products->find('all', [
						'conditions' => ['cid' => '1']
						]);
		$menProducts = $this->paginate($menProducts);
		$this->set('menProducts', $menProducts);
        $this->set('$in_session', $this->in_session);
    }
	
	public function women()
    {
        $this->loadModel('Products');
		$womenProducts = $this->Products->find('all', [
						'conditions' => ['cid' => '2']
						]);
		$womenProducts = $this->paginate($womenProducts);
		$this->set('womenProducts', $womenProducts);
        $this->set('$in_session', $this->in_session);
    }
	
	public function accessories()
    {
        $this->loadModel('Products');
		$accessoriesProducts = $this->Products->find('all', [
						'conditions' => ['cid' => '3']
						]);
		$accessoriesProducts = $this->paginate($accessoriesProducts);
		$this->set('accessoriesProducts', $accessoriesProducts);
        $this->set('$in_session', $this->in_session);
    }
	
	public function list()
    {
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);

        $this->set('category', $category);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'list']);
    }
}
