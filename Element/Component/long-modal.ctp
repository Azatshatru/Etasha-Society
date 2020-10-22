<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
 * @version: 1.0.0
 */
?>
<div id="long-modal" class="modal fade modal-scroll" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php if(isset($showHeader) && $showHeader): ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><?= !empty($modalTitle)?$modalTitle:'' ?></h4>
            </div>
            <?php endif; ?>
            
            <div class="modal-body">
                <?= $this->Html->tag('i', '', ['class' => 'fa fa-circle-o-notch fa-spin fa-3x']) ?>
                <span> <?= __('Loading...'); ?></span>
            </div>
            
            <?php if(isset($showFooter) && $showFooter): ?>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-outline dark"><?= __('Close'); ?></button>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
