<div class="page-header">
    <h1>اتحادیه <small>لیست درخواست ها, پیام نگار ...</small></h1>
</div>
<div class="row">
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/File.png'); ?>
        <?php echo $this->Html->link('لیست درخواست ها', array('controller' => 'Certificates', 'action' => 'index', 'admin' => TRUE)); ?>
        <?php
        $count = $this->requestAction(array('controller' => 'Certificates', 'action' => 'getCountRequest', 'admin' => false));
        if($count){
            echo $this->Html->link($count,  array('controller' => 'Certificates', 'action' => 'index','published' => 0, 'admin' => TRUE), array('class' => 'count') );
        }
        ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/File.png'); ?>
        <?php echo $this->Html->link('پیام نگار', array('controller' => 'Pms', 'action' => 'index', 'admin' => TRUE)); ?>
        <?php
        $count = $this->requestAction(array('controller' => 'Pms', 'action' => 'countNewMessages', 'admin' => false));
        if($count){
            echo $this->Html->link($count,  array('controller' => 'Pms', 'action' => 'index','folder' => 1, 'admin' => TRUE), array('class' => 'count') );
        }
        ?>
    </div>
</div>
<div class="page-header">
    <h1>مدیریت بخش ها <small>مدیریت منو ، مطالب، گالری، اسلاید و ...</small></h1>
  </div>
<div class="row">
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/File.png'); ?>
        <?php echo $this->Html->link('مدیریت مطالب', array('controller' => 'Contents', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Folder.png'); ?>
        <?php echo $this->Html->link('مدیریت مجموعه مطالب', array('controller' => 'content_categories', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Users.png'); ?>
        <?php echo $this->Html->link('مدیریت کاربران', array('controller' => 'users', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Balloon.png'); ?>
        <?php echo $this->Html->link('نظرات', array('controller' => 'comments', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Link.png'); ?>
        <?php echo $this->Html->link('مدیریت وب لینک ها', array('controller' => 'weblinks', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Image.png'); ?>
        <?php echo $this->Html->link('مدیریت تصاویر', array('controller' => 'gallery_items', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Address Book.png'); ?>
        <?php echo $this->Html->link('تماس ها', array('controller' => 'contact_details', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Database.png'); ?>
        <?php echo $this->Html->link('مدیریت منو', array('controller' => 'menus', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Image.png'); ?>
        <?php echo $this->Html->link('اسلایدر', array('controller' => 'SliderItems', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <?php if(GilasAclComponent::hasPermission(array('controller' => 'AclPermissions', 'action' => 'index', 'admin' => TRUE))): ?>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Lock.png'); ?>
        <?php echo $this->Html->link('سطح دسترسی', array('controller' => 'AclPermissions', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <?php endif; ?>
</div>