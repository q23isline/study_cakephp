<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BulletinBoard $bulletinBoard
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('コメント一覧'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bulletinBoards form content">
            <?= $this->Form->create($bulletinBoard) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('comment', [
                        'type' => 'textarea',
                        'label' => __('コメント'),
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('追加')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
