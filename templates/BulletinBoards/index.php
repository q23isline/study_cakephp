<?php
/**
 * @var \App\Model\Entity\BulletinBoard $newBulletinBoard
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\BulletinBoard> $bulletinBoards
 */
?>
<?= $this->Html->css('bulletin-boards.css'); ?>
<div class="bulletinBoards index content">
    <h3><?= __('掲示板') ?></h3>
    <div id="comments">
        <?php foreach ($bulletinBoards as $bulletinBoard): ?>
            <div class="comment">
                <div class="comment-row-header">
                    <span class="comment-number"><?= $this->Number->format($bulletinBoard->comment_number) ?></span>
                    <span class="name"><?= __('名無しさん') ?></span>
                    <span class="date"><?= h($bulletinBoard->created->format('Y/m/d H:i:s')) ?></span>
                    <span class="id"><?= __('ID:') . h(substr($bulletinBoard->id, 0, 8)) ?></span>
                    <span class="delete">
                        <?php
                            echo $this->Form->postLink(
                                __('削除'),
                                ['action' => 'delete', $bulletinBoard->id],
                                ['confirm' => __('# {0} を削除してもよろしいですか？', $bulletinBoard->comment_number)]
                            )
                        ?>
                    </span>
                </div>
                <p class="comment-row-content"><?= nl2br(h($bulletinBoard->comment)) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('最初')) ?>
            <?= $this->Paginator->prev('< ' . __('前')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次') . ' >') ?>
            <?= $this->Paginator->last(__('最後') . ' >>') ?>
        </ul>
    </div>
    <div>
        <?= $this->Form->create($newBulletinBoard, ['url' => ['action' => 'add']]) ?>
        <fieldset>
            <?php
                echo $this->Form->control('comment', [
                    'type' => 'textarea',
                    'label' => '',
                    'placeholder' => 'コメント内容',
                ]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('レスを投稿する')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<script>
    function replyHighlight(body) {
        const regexp = new RegExp(/(&gt;&gt;\d+)/, 'gi')
        body = body.replace(regexp, '<span class="reply">$1</span>')
        return body
    }

    var comments = document.getElementById('comments').innerHTML;
    document.getElementById('comments').innerHTML = replyHighlight(comments);
</script>
