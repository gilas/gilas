<div class="center-wrap">
    <div class="companyIdentity">
        <?php echo $this->Html->link($this->Html->image('global/logo.png'), '/', array('escape' => false)) ?>
    </div>
    <!-- END companyIdentity -->
    <!-- START Main Navigation -->
    <nav>
        <?php
        echo $this->Menu->getMenu('1', false, 'current-menu-item');
        ?>
    </nav>
    <!-- END Main Navigation -->
</div>
<!-- END center-wrap -->