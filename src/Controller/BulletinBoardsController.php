<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BulletinBoards Controller
 *
 * @property \App\Model\Table\BulletinBoardsTable $BulletinBoards
 * @method \App\Model\Entity\BulletinBoard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BulletinBoardsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $bulletinBoards = $this->paginate($this->BulletinBoards, ['limit' => 1000, 'order' => ['comment_number']]);

        $this->set(compact('bulletinBoards'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bulletinBoard = $this->BulletinBoards->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $query = $this->BulletinBoards->find();
            $recordObject = $query->select(['comment_number_max' => $query->func()->max('comment_number')])->first();
            if ($recordObject !== null && !is_array($recordObject)) {
                $record = $recordObject->toArray();
            }
            $commentNumberMax = $record['comment_number_max'] ?? 0;
            $data['comment_number'] = (int)$commentNumberMax + 1;
            $bulletinBoard = $this->BulletinBoards->patchEntity($bulletinBoard, $data);
            if ($this->BulletinBoards->save($bulletinBoard)) {
                $this->Flash->success(__('保存されました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存できませんでした。再試行してください。'));
        }
        $this->set(compact('bulletinBoard'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bulletin Board id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bulletinBoard = $this->BulletinBoards->get($id);
        if ($this->BulletinBoards->delete($bulletinBoard)) {
            $this->Flash->success(__('削除しました。'));
        } else {
            $this->Flash->error(__('削除できませんでした。再試行してください。'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
