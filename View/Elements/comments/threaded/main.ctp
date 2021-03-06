<?php
/**
 * Copyright 2009 - 2010, Cake Development Corporation
 *                        1785 E. Sahara Avenue, Suite 490-423
 *                        Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 */
?>
<div class="comments">
  <h3><?php echo __d('comments', 'Comments'); ?>:</h3>
  <div class="indexContainer">
    <?php

if (!$isAddMode || $isAddMode):
	//echo $this->CommentWidget->element('paginator');
	$CommentWidget = $this->CommentWidget;
	echo $this->Tree->generate(${$viewComments}, array(
		'callback' => array(&$CommentWidget, 'treeCallback'),
		'model' => 'Comment',
		'class' => 'tree-block'));
endif;
if ($allowAddByAuth):
	if ($isAddMode && $allowAddByAuth): ?>
    <?php
		echo $this->CommentWidget->element('form', array('comment' => (!empty($comment) ? $comment : 0)));
	else:
		if (empty($this->request->params[$adminRoute]) && $allowAddByAuth):
			echo $this->CommentWidget->link(__d('comments', 'Add Comment'), am($url, array('comment' => 0)), array('class' => 'button'));
		endif;
	endif;
else: ?>
    <h3><?php echo __d('comments', 'Comments'); ?></h3>
    <?php
		echo sprintf(__d('comments', 'If you want to post comments, you need to login first.', true), $this->Html->link(__d('comments', 'login', true), array('controller' => 'users', 'action' => 'login', 'prefix' => $adminRoute, $adminRoute => false)));
endif;

?>
  </div>
</div>
<?php echo $this->Html->image('/comments/img/indicator.gif', array('id' => 'busy-indicator',
 'style' => 'display:none;')); ?> 