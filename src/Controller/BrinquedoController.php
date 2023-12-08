<?php

namespace App\Controller;

class BrinquedoController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
    }

    public function index() {
        $brinquedos = $this->paginate($this->Brinquedo);
        $this->set(compact("brinquedos"));
    }

    public function view($id = null) {
        $brinquedo = $this->Brinquedo->findById($id)->firstOrFail();

        $this->Authorization->authorize($brinquedo);

        $this->set(compact('brinquedo'));
    }

    public function add() {
        $brinquedo = $this->Brinquedo->newEmptyEntity();
        $this->Authorization->authorize($brinquedo);

        if ($this->request->is('post')) {
            $brinquedo_data = $this->request->getData();

            if ($this->request->getUploadedFile('foto') && $this->request->getUploadedFile('foto')->getSize() > 0) {
                $foto = $this->request->getUploadedFile('foto');
                $foto_nome = $foto->getClientFilename();

                $foto->moveTo(WWW_ROOT . 'img/brinquedo' .DS.$foto_nome);
                
                // dd($brinquedo_data);
                $brinquedo_data['foto'] = $foto_nome;
            } else {
                unset($brinquedo_data['foto']);
            }

            $brinquedo = $this->Brinquedo->patchEntity($brinquedo, $brinquedo_data, [
                'acessibleFields' => ['created' => false, 'modified' => false]
            ]);

            if ($this->Brinquedo->save($brinquedo)) {
                // $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            // $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('brinquedo', $brinquedo);
    }

    public function edit($id)
    {
        $brinquedo = $this->Brinquedo
            ->findById($id)
            ->firstOrFail();

        $this->Authorization->authorize($brinquedo);

        if ($this->request->is(['post', 'put'])) {
            $brinquedo_data = $this->request->getData();

            if ($this->request->getUploadedFile('foto') && $this->request->getUploadedFile('foto')->getSize() > 0) {
                $foto = $this->request->getUploadedFile('foto');
                $foto_nome = $foto->getClientFilename();
                
                $foto->moveTo(WWW_ROOT . 'img/brinquedo' .DS.$foto_nome);
                
                // dd($brinquedo_data);
                $brinquedo_data['foto'] = $foto_nome;
            } else {
                unset($brinquedo_data['foto']);
            }

            $brinquedo = $this->Brinquedo->patchEntity($brinquedo, $brinquedo_data, [
                'acessibleFields' => ['created' => false, 'modified' => false]
            ]);

            if ($this->Brinquedo->save($brinquedo)) {
                // $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            // $this->Flash->error(__('Unable to update your article.'));
        }

        $this->set('brinquedo', $brinquedo);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $brinquedo = $this->Brinquedo->findById($id)->firstOrFail();

        $this->Authorization->authorize($brinquedo);

        try {
            if ($brinquedo->foto != 'semImagem.png' && unlink(WWW_ROOT . 'img/brinquedo' .DS.$brinquedo->foto)) {

            }
        } catch (Exception $e){
        }

        if ($this->Brinquedo->delete($brinquedo)) {

            return $this->redirect(['action' => 'index']);
        }
    }
}