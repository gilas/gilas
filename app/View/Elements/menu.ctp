<ul class="nav">
    <li><?php echo $this->Html->link('اماکن', array('controller' => 'places','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
    <li><?php echo $this->Html->link('رسته ها', array('controller' => 'rastes','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
    <li><?php echo $this->Html->link('درجه ها', array('controller' => 'degrees','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
    <li><?php echo $this->Html->link('درخواست ها', array('controller' => 'Certificates','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
</ul>