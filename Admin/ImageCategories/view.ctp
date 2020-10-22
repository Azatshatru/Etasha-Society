<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImageCategory $imageCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Image Category'), ['action' => 'edit', $imageCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Image Category'), ['action' => 'delete', $imageCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Image Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Image Categories'), ['controller' => 'ImageCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Image Category'), ['controller' => 'ImageCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Image Categories'), ['controller' => 'ImageCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Image Category'), ['controller' => 'ImageCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Image Galleries'), ['controller' => 'ImageGalleries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image Gallery'), ['controller' => 'ImageGalleries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="imageCategories view large-9 medium-8 columns content">
    <h3><?= h($imageCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($imageCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($imageCategory->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Image Category') ?></th>
            <td><?= $imageCategory->has('parent_image_category') ? $this->Html->link($imageCategory->parent_image_category->name, ['controller' => 'ImageCategories', 'action' => 'view', $imageCategory->parent_image_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category Image') ?></th>
            <td><?= h($imageCategory->category_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($imageCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($imageCategory->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($imageCategory->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $this->Number->format($imageCategory->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($imageCategory->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($imageCategory->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Date') ?></th>
            <td><?= h($imageCategory->from_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To Date') ?></th>
            <td><?= h($imageCategory->to_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($imageCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($imageCategory->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $imageCategory->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $imageCategory->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($imageCategory->content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Image Categories') ?></h4>
        <?php if (!empty($imageCategory->child_image_categories)): ?>
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
            <?php foreach ($imageCategory->child_image_categories as $childImageCategories): ?>
            <tr>
                <td><?= h($childImageCategories->id) ?></td>
                <td><?= h($childImageCategories->name) ?></td>
                <td><?= h($childImageCategories->slug) ?></td>
                <td><?= h($childImageCategories->parent_id) ?></td>
                <td><?= h($childImageCategories->category_image) ?></td>
                <td><?= h($childImageCategories->content) ?></td>
                <td><?= h($childImageCategories->from_date) ?></td>
                <td><?= h($childImageCategories->to_date) ?></td>
                <td><?= h($childImageCategories->status) ?></td>
                <td><?= h($childImageCategories->lft) ?></td>
                <td><?= h($childImageCategories->rght) ?></td>
                <td><?= h($childImageCategories->level) ?></td>
                <td><?= h($childImageCategories->is_deleted) ?></td>
                <td><?= h($childImageCategories->created_by) ?></td>
                <td><?= h($childImageCategories->modified_by) ?></td>
                <td><?= h($childImageCategories->created) ?></td>
                <td><?= h($childImageCategories->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ImageCategories', 'action' => 'view', $childImageCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ImageCategories', 'action' => 'edit', $childImageCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ImageCategories', 'action' => 'delete', $childImageCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childImageCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Image Galleries') ?></h4>
        <?php if (!empty($imageCategory->image_galleries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Image Category Id') ?></th>
                <th scope="col"><?= __('Photo Image') ?></th>
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
            <?php foreach ($imageCategory->image_galleries as $imageGalleries): ?>
            <tr>
                <td><?= h($imageGalleries->id) ?></td>
                <td><?= h($imageGalleries->name) ?></td>
                <td><?= h($imageGalleries->image_category_id) ?></td>
                <td><?= h($imageGalleries->photo_image) ?></td>
                <td><?= h($imageGalleries->status) ?></td>
                <td><?= h($imageGalleries->lft) ?></td>
                <td><?= h($imageGalleries->rght) ?></td>
                <td><?= h($imageGalleries->is_deleted) ?></td>
                <td><?= h($imageGalleries->created_by) ?></td>
                <td><?= h($imageGalleries->modified_by) ?></td>
                <td><?= h($imageGalleries->created) ?></td>
                <td><?= h($imageGalleries->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ImageGalleries', 'action' => 'view', $imageGalleries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ImageGalleries', 'action' => 'edit', $imageGalleries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ImageGalleries', 'action' => 'delete', $imageGalleries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageGalleries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
