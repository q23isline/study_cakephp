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
            <?= $this->Html->link(__('List Bulletin Boards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bulletinBoards form content">
            <?= $this->Form->create($bulletinBoard) ?>
            <fieldset>
                <legend><?= __('Add Bulletin Board') ?></legend>
                <?php
                    echo $this->Form->control('commentNumber');
                    echo $this->Form->control('comment');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
