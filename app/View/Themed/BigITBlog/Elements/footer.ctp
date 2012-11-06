<div class="container">

    <div class="widget one-third clearfix">
        <h4 class="widget-title">بیگ آی تی بلاگ چیه؟</h4>
        <p><?php
echo $this->Html->image('avatar-min.png', array('class' => 'avatar'));
?>
            بیگ آی تی بلاگ جایی برای نوشتن تجارب شخصی من از برنامه
            نویسی و علاقه مندی هام در حوزه فناوری اطلاعاته. گاهی اوقات هم خاطراتم رو از پروژه هایی که انجام دادم یا در حال انجام اونها هستم می نویسم :)
        </p>
    </div>

    <div class="widget one-third clearfix">
        <h4 class="widget-title">آخرین پست ها</h4>
        <?php
        echo $this->requestAction(array('controller' => 'contents', 'action' => 'latestContents'), array('return'));
        ?>
    </div>

    <div class="widget one-third last clearfix">
        <h4 class="widget-title">آخرین نظرات</h4>
        <?php echo $this->requestAction(array('controller' => 'comments', 'action' => 'latestComments'), array('return')); ?>
    </div>
</div>