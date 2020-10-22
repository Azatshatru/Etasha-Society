<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImageGallery $imageGallery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Image Gallery'), ['action' => 'edit', $imageGallery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Image Gallery'), ['action' => 'delete', $imageGallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageGallery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Image Galleries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image Gallery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Image Categories'), ['controller' => 'ImageCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image Category'), ['controller' => 'ImageCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="imageGalleries view large-9 medium-8 columns content">
    <h3><?= h($imageGallery->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($imageGallery->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Category') ?></th>
            <td><?= $imageGallery->has('image_category') ? $this->Html->link($imageGallery->image_category->name, ['controller' => 'ImageCategories', 'action' => 'view', $imageGallery->image_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Image') ?></th>
            <td><?= h($imageGallery->photo_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($imageGallery->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($imageGallery->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($imageGallery->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($imageGallery->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($imageGallery->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($imageGallery->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($imageGallery->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $imageGallery->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $imageGallery->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
