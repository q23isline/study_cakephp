<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\BulletinBoard> $bulletinBoards
 */
?>
<div class="bulletinBoards index content">
    <?= $this->Html->link(__('New Bulletin Board'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Bulletin Boards') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('comment_number') ?></th>
                    <th><?= $this->Paginator->sort('comment') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bulletinBoards as $bulletinBoard): ?>
                <tr>
                    <td><?= h($bulletinBoard->id) ?></td>
                    <td><?= $this->Number->format($bulletinBoard->comment_number) ?></td>
                    <td><?= h($bulletinBoard->comment) ?></td>
                    <td><?= h($bulletinBoard->created) ?></td>
                    <td><?= h($bulletinBoard->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bulletinBoard->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bulletinBoard->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bulletinBoard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bulletinBoard->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
