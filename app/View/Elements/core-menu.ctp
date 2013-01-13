<ul class="nav">
    <li class="dropdown">
        <a class="dropdown-toggle brand" data-toggle="dropdown" href="#">
            <?php echo $this->Html->image('logo-small.png'); ?>
        </a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('داشبورد', array('controller' => 'dashboards','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
            <li class="divider"></li>
            <li><?php echo $this->Html->link('تنظیمات', array('controller' => 'settings', 'action' => 'index', 'admin' => TRUE)); ?></li>
            <li><?php echo $this->Html->link('مدیریت کاربران', array('controller' => 'Users', 'action' => 'index', 'admin' => TRUE)); ?></li>
            <li class="divider"></li>
            <li><?php echo $this->Html->link('مدیریت مطالب', array('controller' => 'Contents','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
            <li><?php echo $this->Html->link('مدیریت مجموعه مطالب', array('controller' => 'content_categories','plugin' => false, 'action' => 'index', 'admin' => TRUE), array('class' => 'active')); ?></li>
            <li><?php echo $this->Html->link('نظرات', array('controller' => 'comments','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
            <li class="divider"></li>
            <li><?php echo $this->Html->link('مدیریت منو', array('controller' => 'menus','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
            <li><?php echo $this->Html->link('مدیریت مجموعه گالری تصاویر', array('controller' => 'gallery_categories','plugin' => false, 'action' => 'index', 'admin' => TRUE), array('class' => 'active')); ?></li>
            <li><?php echo $this->Html->link('اسلایدر', array('controller' => 'SliderItems','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
            <li><?php echo $this->Html->link('تماس ها', array('controller' => 'contact_details','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
        </ul>
    </li>
</ul>