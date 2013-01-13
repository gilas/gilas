<?php
$this->Validator->addRule('ContentCategory');
$this->Validator->validate();
echo $this->Form->create('ContentCategory', array(
    'inputDefaults' => array(
        'error' => array(
            'attributes' => array(
                'class' => 'alert-input-error',
                'id' => 'msg'
            )
        ),
        'empty' => '--- بدون مرجع ---'
    )
));
?>
<div id="toolbar-menu" class="row">
    <div class="title">افزودن مجموعه مطلب</div>
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
echo $this->Form->input('parent_id', array('label' => 'مجموعه مرجع'));
echo $this->Form->input('name', array('label' => 'نام مجموعه'));
$this->TinyMCE->editor('simple');
echo $this->Form->input('descriptions', array('label' => 'توضیحات', 'id' => 'tinyElm1', 'class' => 'tinymce'));
echo $this->Form->end();
?>
