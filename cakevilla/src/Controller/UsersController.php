<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadModel("Albums");
        $this->loadModel("Galleries");
        $this->Auth->allow(['register']);
    }

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function dashboard(){
        $albums = $this->Albums->find("all");
        $this->set("albums",$albums);
        $galleries = $this->Galleries->find("all");
        $this->set("galleries",$galleries);
        
    }
    public function register(){
        
        if($this->request->is('post')){
            
            $user = $this->Users->newEntity($this->request->getData());
            $validation = $user->errors();

            if (!empty($validation)) {
             // print_r($validation);
            $this->Flash->set($validation,["element"=>"user_error"]);
             } else {

            $hasher = new DefaultPasswordHasher();
            $myname = $this->request->getData('name');
            $myemail = $this->request->getData('email');
            $mypass = $this->request->getData('password'); // will convert to bcrypt hash password
         
            $user->name = $myname;
            $user->email = $myemail;
            $user->password = $hasher->hash($mypass);
            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');
            if($this->Users->save($user)){
                $this->Flash->set('Registeration successfully', ['element'=>'user_success']);               
            } else{
                $this->Flash->set('Register failed, please try again', ['element'=>'user_error']);
            }
        }
        }
    }
    public function login(){
          if ($this->request->is('post')) {
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Flash->user_error('Your username or password is incorrect.');
            }

    }
    public function logout(){
        $this->Flash->user_success('You\'re successfully logged out.');
        return $this->redirect($this->Auth->logout());

    }
    public function addalbum(){
        // print_r($this->request->data);
     if ($this->request->is('post')) {
        $album = $this->Albums->newEntity($this->request->getData());
        $album->AlbumName = $this->request->getData('add_album');
        $this->Albums->save($album);
            $this->Flash->set('added successfully', ['element'=>'user_success']);
    }
      
    }
     public function listAlbum(){
        $albums = $this->Albums->find("all");
        $this->set("albums",$albums);
    }
    public function addGallery(){

        $albums = $this->Albums->find("all");
        $this->set("albums",$albums);
       
     
        $gallery = $this->Galleries->newEntity($this->request->getData());
        $form_data = $this->request->getData();
        $image_name = $this->request->data['file']['name'];
        $uploaded_path = "/img/uploads/";
        $tmp_name = $this->request->getData['file']['tmp_name'];
        $gallery->name =  $this->request->getData['album'];
        move_uploaded_file($tmp_name, WWW_ROOT.$uploaded_path."".$image_name);
        $this->Galleries->save($gallery);
       
     
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

   
}
