<?php
foreach($imageCategories as $imageCategory):
    echo $this->Html->tag('div',$this->Html->link($imageCategory->name, ['controller' => 'ImageCategories', 'action' => 'view', $imageCategory->slug]));
endforeach;
