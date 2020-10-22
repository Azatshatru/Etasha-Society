<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Alumnus $alumnus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Alumnus'), ['action' => 'edit', $alumnus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Alumnus'), ['action' => 'delete', $alumnus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alumnus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Alumnus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Alumnus'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="alumnus view large-9 medium-8 columns content">
    <h3><?= h($alumnus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Student Name') ?></th>
            <td><?= h($alumnus->student_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Father Name') ?></th>
            <td><?= h($alumnus->father_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Student Img') ?></th>
            <td><?= h($alumnus->student_img) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch') ?></th>
            <td><?= h($alumnus->batch) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Session') ?></th>
            <td><?= h($alumnus->session) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Name') ?></th>
            <td><?= h($alumnus->company_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= h($alumnus->designation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($alumnus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($alumnus->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($alumnus->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($alumnus->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($alumnus->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($alumnus->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($alumnus->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Msg') ?></h4>
        <?= $this->Text->autoParagraph(h($alumnus->msg)); ?>
    </div>
</div>
