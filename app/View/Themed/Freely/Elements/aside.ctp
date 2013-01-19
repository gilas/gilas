<?php if(AuthComponent::user('id')): ?>
    <div class="categories_widget widget">
    	<h3 class="widget-title">منوی اصلی</h3>
        <?php if(AuthComponent::user('Role.name') == 'Register'): ?>
    	<ul class="menu">
            <?php if(SettingsController::read('Content.register_has_content')): ?>
            <li class="current-menu-item">
                <?php echo $this->Html->link('لیست مجموعه ها', array('controller' => 'ContentCategories', 'action' => 'index', 'admin' => false, 'plugin' => false)); ?>
            </li>
            <li class="current-menu-item">
                <?php echo $this->Html->link('لیست مطالب', array('controller' => 'Contents', 'action' => 'index', 'admin' => false, 'plugin' => false)); ?>
            </li>
            <?php endif; ?>
            <li class="current-menu-item">
                <?php echo $this->Html->link('درباره', array('controller' => 'Contents', 'action' => 'addAbout', 'admin' => false, 'plugin' => false)); ?>
            </li>
            <li class="current-menu-item">
                 <?php
                 $newMessage = null;
                $count = $this->requestAction(array('controller' => 'Pms', 'action' => 'countNewMessages', 'admin' => false));
                if($count){
                    $newMessage = $this->Html->tag('span', $count, array('class' => 'count'));
                }
                ?>
                <?php echo $this->Html->link('پیام نگار'.$newMessage, array('controller' => 'Pms', 'action' => 'index', 'admin' => false, 'plugin' => false),array('escape' => false)); ?>
            </li>
            <li class="current-menu-item">
                <?php echo $this->Html->link('صفحه شخصی', '/~'. AuthComponent::user('username')); ?>
            </li>
            <li class="current-menu-item">
                <?php echo $this->Html->link('خروج', array('controller' => 'Users', 'action' => 'logout', 'admin' => false, 'plugin' => false)); ?>
            </li>
        </ul>
        <?php else: ?>
    	<ul class="menu">
            <li class="current-menu-item">
                <?php echo $this->Html->link('داشبورد', array('controller' => 'Dashboards', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?>
            </li>
            <li class="current-menu-item">
                <?php echo $this->Html->link('خروج', array('controller' => 'Users', 'action' => 'logout', 'admin' => true, 'plugin' => false)); ?>
            </li>
        </ul>
        <?php endif; ?>
    </div>
<?php endif; ?>