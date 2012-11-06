<?php
$this->set('title_for_layout','محمد رزاقی');
echo $this->requestAction(array('controller' => 'Contents', 'action' => 'home'),array('return'));
?>