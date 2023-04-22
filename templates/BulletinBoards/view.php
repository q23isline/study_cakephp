<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BulletinBoard $bulletinBoard
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Bulletin Board'), ['action' => 'edit', $bulletinBoard->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bulletin Board'), ['action' => 'delete', $bulletinBoard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bulletinBoard->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bulletin Boards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bulletin Board'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bulletinBoards view content">
            <h3><?= h($bulletinBoard->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($bulletinBoard->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comment') ?></th>
                    <td><?= h($bulletinBoard->comment) ?></td>
                </tr>
                <tr>
                    <th><?= __('CommentNumber') ?></th>
                    <td><?= $this->Number->format($bulletinBoard->commentNumber) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($bulletinBoard->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($bulletinBoard->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
