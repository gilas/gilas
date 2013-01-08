<?php
$this->Validator->addRule('Message');
$this->Validator->validate(); 
echo $this->Form->create('Message', array(
    'inputDefaults' => array(
        'error' => array(
            'attributes' => array(
                'class' => 'alert-input-error',
                'id' => 'msg'
            )
        ),
    ),
));
?>
<input id="PmMethod" type="hidden" name="data[Message][method]" />
<div id="toolbar-menu" class="row">
    <div class="title">ارسال پیام</div>
    <ul id="toolbar">
        <li>
            <a onclick="$('#PmMethod').val('send');$(this).parents('form').submit();" class="btn btn-success" tooltip-place="bottom" data-original-title="ارسال" rel="tooltip" >
                <i class="icon-ok icon-white"></i><input name="send" type="submit" style="display: none;" />
            </a>
        </li>
        <li>
            <a onclick="$('#PmMethod').val('save');$(this).parents('form').submit();" class="btn btn-info" tooltip-place="bottom" data-original-title="ذخیره" rel="tooltip" >
                <i class="icon-file icon-white"></i><input name="save" type="submit" style="display: none;" />
            </a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>" class="btn btn-danger" tooltip-place="bottom" data-original-title="انصراف" rel="tooltip" >
                <i class="icon-remove icon-white"></i>
            </a>
        </li>
    </ul>
</div>
<div class="input text">
    <label for="MessageRecipients">گیرنده</label>
    <?php
    if(count($users) == 1){
        echo current($users);
        echo $this->Form->hidden('Message.Recipients.0',array('value'=>key($users)));
        
    }else{
        $options = '';
        foreach($users as $user_key => $user_name){
            if(@in_array($user_key,$message['Recipients'])){
                $options .= $this->Html->tag('option',$user_name,array('value' => $user_key,'selected' => true));
            }else{
            $options .= $this->Html->tag('option',$user_name,array('value' => $user_key));
            }
        }
        echo $this->Html->tag('select',$options,array('name' => 'data[Message][Recipients][]','multiple'=>true,'style' => 'width:500px'));
    }
    ?>
</div>
<?php
echo $this->Form->input('subject', array('label' => 'عنوان'));
$this->TinyMCE->editor('simple');
echo $this->Form->input('message', array('label' => 'متن', 'class' => 'tinymce'));
echo $this->Form->end();
?>
