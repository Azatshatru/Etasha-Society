<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VideoGallery $videoGallery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Video Gallery'), ['action' => 'edit', $videoGallery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Video Gallery'), ['action' => 'delete', $videoGallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $videoGallery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Video Galleries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Video Gallery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Video Galleries'), ['controller' => 'VideoGalleries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Video Gallery'), ['controller' => 'VideoGalleries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Video Categories'), ['controller' => 'VideoCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Video Category'), ['controller' => 'VideoCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Video Galleries'), ['controller' => 'VideoGalleries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Video Gallery'), ['controller' => 'VideoGalleries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="videoGalleries view large-9 medium-8 columns content">
    <h3><?= h($videoGallery->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($videoGallery->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Video Gallery') ?></th>
            <td><?= $videoGallery->has('parent_video_gallery') ? $this->Html->link($videoGallery->parent_video_gallery->name, ['controller' => 'VideoGalleries', 'action' => 'view', $videoGallery->parent_video_gallery->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Video Category') ?></th>
            <td><?= $videoGallery->has('video_category') ? $this->Html->link($videoGallery->video_category->name, ['controller' => 'VideoCategories', 'action' => 'view', $videoGallery->video_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($videoGallery->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($videoGallery->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($videoGallery->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($videoGallery->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($videoGallery->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($videoGallery->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($videoGallery->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($videoGallery->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $videoGallery->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $videoGallery->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Video Galleries') ?></h4>
        <?php if (!empty($videoGallery->child_video_galleries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Video Category Id') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($videoGallery->child_video_galleries as $childVideoGalleries): ?>
            <tr>
                <td><?= h($childVideoGalleries->id) ?></td>
                <td><?= h($childVideoGalleries->name) ?></td>
                <td><?= h($childVideoGalleries->parent_id) ?></td>
                <td><?= h($childVideoGalleries->video_category_id) ?></td>
                <td><?= h($childVideoGalleries->url) ?></td>
                <td><?= h($childVideoGalleries->status) ?></td>
                <td><?= h($childVideoGalleries->lft) ?></td>
                <td><?= h($childVideoGalleries->rght) ?></td>
                <td><?= h($childVideoGalleries->is_deleted) ?></td>
                <td><?= h($childVideoGalleries->created_by) ?></td>
                <td><?= h($childVideoGalleries->modified_by) ?></td>
                <td><?= h($childVideoGalleries->created) ?></td>
                <td><?= h($childVideoGalleries->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VideoGalleries', 'action' => 'view', $childVideoGalleries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VideoGalleries', 'action' => 'edit', $childVideoGalleries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VideoGalleries', 'action' => 'delete', $childVideoGalleries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childVideoGalleries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
