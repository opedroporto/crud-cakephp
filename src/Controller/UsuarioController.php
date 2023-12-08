<?php

namespace App\Controller;

class UsuarioController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function index() {
        $usuarios = $this->paginate($this->Usuario);

        $usuario = $this->Usuario->findById(1)->firstOrFail();
        $this->Authorization->authorize($usuario);

        $this->set(compact("usuarios"));
    }

    public function view($id = null) {
        $usuario = $this->Usuario->findById($id)->firstOrFail();
        $this->Authorization->authorize($usuario);

        $this->set(compact('usuario'));
    }

    public function add() {
        $usuario = $this->Usuario->newEmptyEntity();
        $this->Authorization->authorize($usuario);

        if ($this->request->is('post')) {
            $usuario_data = $this->request->getData();

            if ($this->request->getUploadedFile('foto') && $this->request->getUploadedFile('foto')->getSize() > 0) {
                $foto = $this->request->getUploadedFile('foto');
                $foto_nome = $foto->getClientFilename();
                
                $foto->moveTo(WWW_ROOT . 'img/usuario' .DS.$foto_nome);
                
                // dd($usuario_data);
                $usuario_data['foto'] = $foto_nome;
            } else {
                unset($usuario_data['foto']);
            }

            $usuario = $this->Usuario->patchEntity($usuario, $usuario_data, [
                'acessibleFields' => ['created' => false, 'modified' => false]
            ]);

            if ($this->Usuario->save($usuario)) {
                // $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            // $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('usuario', $usuario);
    }

    public function edit($id)
    {
        $usuario = $this->Usuario
            ->findById($id)
            ->firstOrFail();

        $this->Authorization->authorize($usuario);

        if ($this->request->is(['post', 'put'])) {
            $usuario_data = $this->request->getData();

            if ($this->request->getUploadedFile('foto') && $this->request->getUploadedFile('foto')->getSize() > 0) {
                $foto = $this->request->getUploadedFile('foto');
                $foto_nome = $foto->getClientFilename();
                
                $foto->moveTo(WWW_ROOT . 'img/usuario' .DS.$foto_nome);
                
                // dd($usuario_data);
                $usuario_data['foto'] = $foto_nome;
            } else {
                unset($usuario_data['foto']);
            }

            $usuario = $this->Usuario->patchEntity($usuario, $usuario_data, [
                'acessibleFields' => ['created' => false, 'modified' => false]
            ]);

            if ($this->Usuario->save($usuario)) {
                // $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            // $this->Flash->error(__('Unable to update your article.'));
        }

        $this->set('usuario', $usuario);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $usuario = $this->Usuario->findById($id)->firstOrFail();
        
        $this->Authorization->authorize($usuario);

        try {
            if ($usuario->foto != 'semImagem.png' && unlink(WWW_ROOT . 'img/usuario' .DS.$usuario->foto)) {

            }
        } catch (Exception $e){
        }

        if ($this->Usuario->delete($usuario)) {
            // $this->Flash->success(__('The {0} article has been deleted.', $article->title));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function login()
    {
        $this->Authorization->skipAuthorization();
        
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/';
            return $this->redirect($target);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Usuário ou senha inválido'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Usuario', 'action' => 'login']);
        }
    }
}