<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="courses view large-9 medium-8 columns content">
    <h3><?= h($course->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($course->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Course') ?></th>
            <td><?= $course->has('parent_course') ? $this->Html->link($course->parent_course->name, ['controller' => 'Courses', 'action' => 'view', $course->parent_course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo Image') ?></th>
            <td><?= h($course->logo_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($course->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($course->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($course->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($course->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($course->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($course->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Date') ?></th>
            <td><?= h($course->from_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To Date') ?></th>
            <td><?= h($course->to_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($course->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($course->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $course->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $course->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Courses') ?></h4>
        <?php if (!empty($course->child_courses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Logo Image') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('From Date') ?></th>
                <th scope="col"><?= __('To Date') ?></th>
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
            <?php foreach ($course->child_courses as $childCourses): ?>
            <tr>
                <td><?= h($childCourses->id) ?></td>
                <td><?= h($childCourses->name) ?></td>
                <td><?= h($childCourses->parent_id) ?></td>
                <td><?= h($childCourses->logo_image) ?></td>
                <td><?= h($childCourses->url) ?></td>
                <td><?= h($childCourses->from_date) ?></td>
                <td><?= h($childCourses->to_date) ?></td>
                <td><?= h($childCourses->status) ?></td>
                <td><?= h($childCourses->lft) ?></td>
                <td><?= h($childCourses->rght) ?></td>
                <td><?= h($childCourses->is_deleted) ?></td>
                <td><?= h($childCourses->created_by) ?></td>
                <td><?= h($childCourses->modified_by) ?></td>
                <td><?= h($childCourses->created) ?></td>
                <td><?= h($childCourses->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Courses', 'action' => 'view', $childCourses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Courses', 'action' => 'edit', $childCourses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Courses', 'action' => 'delete', $childCourses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childCourses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
