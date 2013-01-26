<?php if(! AuthComponent::user()): ?>
<?php echo $this->Html->link('ورود','#',array('class' => 'btn btn-success', 'id' => 'loginButton')); ?>
<div id="loginForm" style="display: none;">
    <?php
    echo $this->Form->create('User', array('action' => 'login'));
    echo $this->Form->input('username', array('label' => 'نام کاربری'));
    echo $this->Form->input('password', array('label' => 'کلمه عبور'));
    echo $this->Form->end(array('class' => 'button green small', 'label' => 'ورود'));
    ?>
</div>
<?php else: ?>
<?php echo $this->Html->link('سلام '.AuthComponent::user('name').'!','#',array('class' => 'btn btn-success', 'id' => 'loginButton')); ?>
<div id="loginForm" style="display: none;">
    <?php
    echo $this->Html->link('خروج',array('controller' => 'Users', 'action' => 'logout'));
    ?>
</div>
<?php endif; ?>
<?php echo $this->Html->link('پروانه کسب الکترونیک',array('controller' => 'pages', 'action' => 'certificate'),array('class' => 'btn btn-success')); ?>
<?php echo $this->Html->link('شکایت',array('controller' => 'pages', 'action' => 'complaint'),array('class' => 'btn btn-success')); ?>
<script>
    $(function(){
        $('#loginButton').click(function(){
            $('#loginForm').slideToggle()
            return false;
        })
        $('#loginForm').click(function(e){
            e.stopPropagation()
        })
        $(document).click(function(e) {
                $('#loginForm').slideUp()
        }); 
    })
</script>