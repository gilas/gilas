<?php
//Validation
$this->Validator->addRule('User');
$this->Validator->removeRule('User.password','notempty');
$this->Validator->addCustomRule('User.password-2','equalTo','#User.password','تکرار رمز عبور با خود رمز عبور برابر نیست');
$this->Validator->validate(); 

echo $this->Form->create('User', array(
    'inputDefaults' => array(
        'error' => array(
            'attributes' => array(
                'class' => 'alert-input-error',
                'id' => 'msg'
            )
        ),
    )
));
?>
<div id="toolbar-menu" class="row">
    <div class="title">ویرایش کاربر</div>
    <ul id="toolbar">
        <li>
            <a onclick="$(this).parents('form').submit();" class="btn btn-success" tooltip-place="bottom" data-original-title="ذخیره" rel="tooltip" >
                <i class="icon-ok icon-white"></i><input type="submit" style="display: none;" />
            </a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>" class="btn btn-danger" tooltip-place="bottom" data-original-title="انصراف" rel="tooltip" >
                <i class="icon-remove icon-white"></i>
            </a>
        </li>
    </ul>
</div>
<?php 
    echo $this->Form->input('User.name',array('label' => array('class' => 'control-label', 'text' => 'نام و نام خانوادگی')));
    echo $this->Form->input('User.username',array('label' => array('class' => 'control-label', 'text' => 'نام کاربری')));
    echo $this->Form->input('User.password',array('type' => 'password','label' => array('class' => 'control-label', 'text' => 'رمز عبور')));
    echo $this->Form->input('User.password-2',array('type' => 'password','label' => array('class' => 'control-label', 'text' => 'تکرار رمز عبور')));
    echo $this->Form->input('User.email',array('label' => array('class' => 'control-label', 'text' => 'پست الکترونیک')));
    echo $this->Form->input('User.role_id',array('label' => array('class' => 'control-label', 'text' => 'نقش')));
?>
<div>
    <label>وضعیت</label>
    <input type="radio" name="data[User][active]" value="1" <?php if ($this->Form->value('User.active') == 1) echo 'checked=""' ?> /> بله
    <input type="radio" name="data[User][active]" value="0" <?php if ($this->Form->value('User.active') == 0) echo 'checked=""' ?> /> خیر
</div>
<?php echo $this->Form->end(); ?>