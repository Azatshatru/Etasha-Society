<?php
/**
 * @author: Sonia Solanki
 * @date: March 01, 2018
 * @version: 1.0.0
 */

if($albumCategory && $albums):
    echo $this->Html->tag('h2', $albumCategory->name);
    echo '<ul>';
    foreach($albums as $album):
        echo $this->Html->tag('li', $this->html->link(
                $this->html->tag('div', $this->Image->image(($album->category_image && file_exists($imageRoot.$album->category_image))?$album->category_image:'../gallery-image.jpg', '', 400, 260, true, false, true, true, true, ['alt' => $album->name]), ['class' => 'img-wrapper']).
                $this->html->tag('div', $album->name, ['class' => 'ttl']), ['action' => 'album', $album->slug], ['escape' => false]));
    endforeach;
    echo '</ul>';
    
    if($albumCount > 3):
        echo $this->Html->link(__('Explore more from {0}', $albumCategory->name), ['action' => 'view', $albumCategory->slug], ['class' => 'readmore']);
    endif;
    echo '<hr class="my-4">';
endif;
