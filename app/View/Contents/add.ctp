<?php
$this->Validator->addRule('Content');
$this->Validator->validate(); 
echo $this->Form->create('Content', array(
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
    <div class="title">افزودن مطلب</div>
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
echo $this->Form->input('title', array('label' => 'عنوان مطلب'));
echo $this->Form->input('slug', array('label' => 'نام مستعار'));
echo $this->Form->input('content_category_id', array('label' => 'مجموعه','empty' => '--- انتخاب مجموعه ---' ,'value' => @$this->request->named['content_category_id'], ));
$this->TinyMCE->editor('simple');
echo $this->Form->input('intro', array('label' => 'متن','id' => 'tinyElm1', 'class' => 'tinymce'));
?>
<a onclick="insertReadmore();return false;" class="btn btn-primary" style="margin-top: 10px;">ادامه مطلب</a>
<?php
echo $this->Form->end();
?>
<script>
    function insertReadmore() {
            var content = $('#tinyElm1').html();
            if (content.match(/<hr\s+id=("|')system-readmore("|')\s*\/*>/i)) {
                    alert('چنین لینکی تنها یکبار مجوز درج دارد.');
                    return false;
            } else {
                if(content == ''){
                    alert('متنی باید وارد شود تا ادامه مطلب درج گردد');
                    return;
                }
                $('#tinyElm1').tinymce().execCommand('mceInsertContent',false,'<hr id="system-readmore" />');
            }
    }
</script>