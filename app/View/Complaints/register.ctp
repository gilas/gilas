<?php 

$this->Html->addCrumb('ثبت شکایت');
$this->Validator->addRule('Complaint');
$this->Validator->defaultParams['errorClass'] = 'error-message';
echo $this->Validator->validate(true); 
echo $this->Form->create('Complaint',array(
	'inputDefaults' => array(
		'div' => array('class' => 'input text')
	),
	'class' => 'form-list',
    'type' => 'file',
));
?>
<h4>اطلاعات شاکی</h4>
<?php
echo $this->Form->input('comp_name', array('label' => 'نام'));
echo $this->Form->input('comp_family', array('label' => 'نام خانوادگی'));
echo $this->Form->input('comp_email', array('label' => 'پست الکترونیک'));
echo $this->Form->input('comp_mobile', array('label' => 'شماره همراه'));
echo $this->Form->input('comp_address', array('label' => 'آدرس'));
?>
<h4>اطلاعات متشاکی</h4>
<?php
if(count($users) == 1):
?>
<div class="input text"><label for="ComplaintUserId">نام عضو</label><input type="hidden" id="ComplaintUserId" name="data[Complaint][user_id]" value="<?php echo key($users) ?>"><span><?php echo current($users) ?></span></div>
<?php
else:
    echo $this->Form->input('user_id', array('label' => 'نام عضو', 'empty' => '-- انتخاب عضو --'));
endif;
    echo $this->Form->input('subject', array('label' => 'موضوع شکایت'));
    echo $this->Form->input('content', array('label' => 'متن شکایت', 'type' => 'textarea'));
    //TODO: i comment it and write the html code, because in view this code generate "required" class in div tag
    //echo $this->Form->input('attachment', array('label' => 'ضمیمه', 'type' => 'file', 'div' => 'input text'));
?>
<div class="input text"><label for="ComplaintAttachment">ضمیمه</label><input type="file" id="ComplaintAttachment" name="data[Complaint][attachment]"><?php echo $this->Form->error('Complaint.attachment'); ?></div>
<a class="button red small" style="width: 50px">لغو</a>	
<input type="submit" value="ارسال" class="button green small"  style="width: 70px;float:left"/>
<?php echo $this->Form->end();?>