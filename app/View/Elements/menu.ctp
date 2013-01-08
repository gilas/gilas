<ul class="nav">
    <li><?php echo $this->Html->link('اماکن', array('controller' => 'places','plugin' => false, 'action' => 'index', 'admin' => true)); ?></li>
    <li><?php echo $this->Html->link('رسته ها', array('controller' => 'rastes','plugin' => false, 'action' => 'index', 'admin' => true)); ?></li>
    <li><?php echo $this->Html->link('درجه ها', array('controller' => 'degrees','plugin' => false, 'action' => 'index', 'admin' => true)); ?></li>
    <li><?php echo $this->Html->link('درخواست ها', array('controller' => 'Certificates','plugin' => false, 'action' => 'index', 'admin' => true)); ?></li>
    <li><?php echo $this->Html->link('پیام نگار', array('controller' => 'Pms','plugin' => false, 'action' => 'index', 'admin' => true)); ?></li>
</ul>