<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Announcement $announcement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Announcement'), ['action' => 'edit', $announcement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Announcement'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Announcements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="announcements view large-9 medium-8 columns content">
    <h3><?= h($announcement->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($announcement->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($announcement->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($announcement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Announcement Category Id') ?></th>
            <td><?= $this->Number->format($announcement->announcement_category_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($announcement->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($announcement->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($announcement->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($announcement->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Date') ?></th>
            <td><?= h($announcement->from_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To Date') ?></th>
            <td><?= h($announcement->to_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($announcement->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($announcement->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $announcement->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $announcement->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
