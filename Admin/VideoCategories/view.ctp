<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VideoCategory $videoCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Video Category'), ['action' => 'edit', $videoCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Video Category'), ['action' => 'delete', $videoCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $videoCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Video Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Video Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Video Categories'), ['controller' => 'VideoCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Video Category'), ['controller' => 'VideoCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Video Categories'), ['controller' => 'VideoCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Video Category'), ['controller' => 'VideoCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Video Galleries'), ['controller' => 'VideoGalleries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Video Gallery'), ['controller' => 'VideoGalleries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="videoCategories view large-9 medium-8 columns content">
    <h3><?= h($videoCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($videoCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($videoCategory->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Video Category') ?></th>
            <td><?= $videoCategory->has('parent_video_category') ? $this->Html->link($videoCategory->parent_video_category->name, ['controller' => 'VideoCategories', 'action' => 'view', $videoCategory->parent_video_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category Image') ?></th>
            <td><?= h($videoCategory->category_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($videoCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($videoCategory->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($videoCategory->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $this->Number->format($videoCategory->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($videoCategory->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($videoCategory->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Date') ?></th>
            <td><?= h($videoCategory->from_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To Date') ?></th>
            <td><?= h($videoCategory->to_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($videoCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($videoCategory->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $videoCategory->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $videoCategory->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($videoCategory->content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Video Categories') ?></h4>
        <?php if (!empty($videoCategory->child_video_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Category Image') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('From Date') ?></th>
                <th scope="col"><?= __('To Date') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col"><?= __('Level') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($videoCategory->child_video_categories as $childVideoCategories): ?>
            <tr>
                <td><?= h($childVideoCategories->id) ?></td>
                <td><?= h($childVideoCategories->name) ?></td>
                <td><?= h($childVideoCategories->slug) ?></td>
                <td><?= h($childVideoCategories->parent_id) ?></td>
                <td><?= h($childVideoCategories->category_image) ?></td>
                <td><?= h($childVideoCategories->content) ?></td>
                <td><?= h($childVideoCategories->from_date) ?></td>
                <td><?= h($childVideoCategories->to_date) ?></td>
                <td><?= h($childVideoCategories->status) ?></td>
                <td><?= h($childVideoCategories->lft) ?></td>
                <td><?= h($childVideoCategories->rght) ?></td>
                <td><?= h($childVideoCategories->level) ?></td>
                <td><?= h($childVideoCategories->is_deleted) ?></td>
                <td><?= h($childVideoCategories->created_by) ?></td>
                <td><?= h($childVideoCategories->modified_by) ?></td>
                <td><?= h($childVideoCategories->created) ?></td>
                <td><?= h($childVideoCategories->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VideoCategories', 'action' => 'view', $childVideoCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VideoCategories', 'action' => 'edit', $childVideoCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VideoCategories', 'action' => 'delete', $childVideoCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childVideoCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Video Galleries') ?></h4>
        <?php if (!empty($videoCategory->video_galleries)): ?>
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
            <?php foreach ($videoCategory->video_galleries as $videoGalleries): ?>
            <tr>
                <td><?= h($videoGalleries->id) ?></td>
                <td><?= h($videoGalleries->name) ?></td>
                <td><?= h($videoGalleries->parent_id) ?></td>
                <td><?= h($videoGalleries->video_category_id) ?></td>
                <td><?= h($videoGalleries->url) ?></td>
                <td><?= h($videoGalleries->status) ?></td>
                <td><?= h($videoGalleries->lft) ?></td>
                <td><?= h($videoGalleries->rght) ?></td>
                <td><?= h($videoGalleries->is_deleted) ?></td>
                <td><?= h($videoGalleries->created_by) ?></td>
                <td><?= h($videoGalleries->modified_by) ?></td>
                <td><?= h($videoGalleries->created) ?></td>
                <td><?= h($videoGalleries->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VideoGalleries', 'action' => 'view', $videoGalleries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VideoGalleries', 'action' => 'edit', $videoGalleries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VideoGalleries', 'action' => 'delete', $videoGalleries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $videoGalleries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
