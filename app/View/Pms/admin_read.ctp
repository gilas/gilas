<div class="pm-box">
    <div class="pm-header">
        <div class="pm-subject">
            <?php echo $message['Message']['subject'] ?>
        </div>
        <div class="pm-date"><?php echo Jalali::niceShort($message['Message']['created']); ?></div>
        <div class="pm-sender">
            <?php echo $message['Message']['Sender']['SenderInfo']['name']; ?>
            <span class="pm-info dropdown">
                <b class="caret dropdown-toggle" data-toggle="dropdown"></b>
                <div class="dropdown-menu">
                    <div>
                        <label>فرستنده</label>
                        <span><?php echo $message['Message']['Sender']['SenderInfo']['name']; ?></span>
                    </div>
                    <div>
                        <label>گیرنده</label>
                        <span><?php 
                        $recipients = array();
                        foreach($message['Message']['Recipients'] as $recipient){
                            $recipients[] =  $recipient['Recipient']['name'];
                        }
                        echo  String::truncate(implode(', ',$recipients), 30);
                        ?></span>
                    </div>
                    <div>
                        <label>تاریخ ارسال</label>
                        <span><?php echo Jalali::niceShort($message['Message']['created']); ?></span>
                    </div>
                  </div>
            </span>
        </div>
    </div>
    <div class="pm-message"><?php echo $message['Message']['message']; ?></div>
    <div class="pm-attach"><?php         
        if($message['Message']['files']){
            $message['Message']['files'] = unserialize($message['Message']['files']);
            echo 'ضمیمه :'. $this->Html->link($message['Message']['files']['name'],'/pm/download/'.$message['Reader']['id']);
        } 
    ?></div>
</div>
<?php if(!empty($conversations)): ?>
    <?php foreach($conversations as $conversation): ?>
    <div class="pm-box">
        <div class="pm-header">
            <div class="pm-subject">
                <?php echo $conversation['Message']['subject'] ?>
            </div>
            <div class="pm-date"><?php echo Jalali::niceShort($conversation['Message']['created']); ?></div>
            <div class="pm-sender">
                <?php echo $conversation['Message']['Sender']['SenderInfo']['name']; ?>
                <span class="pm-info dropdown">
                    <b class="caret dropdown-toggle" data-toggle="dropdown"></b>
                    <div class="dropdown-menu">
                        <div>
                            <label>فرستنده</label>
                            <span><?php echo $conversation['Message']['Sender']['SenderInfo']['name']; ?></span>
                        </div>
                        <div>
                            <label>گیرنده</label>
                            <span><?php 
                            $recipients = array();
                            foreach($conversation['Message']['Recipients'] as $recipient){
                                $recipients[] =  $recipient['Recipient']['name'];
                            }
                            echo  String::truncate(implode(', ',$recipients), 30);
                            ?></span>
                        </div>
                        <div>
                            <label>تاریخ ارسال</label>
                            <span><?php echo Jalali::niceShort($conversation['Message']['created']); ?></span>
                        </div>
                      </div>
                </span>
            </div>
        </div>
        <div class="pm-message"><?php echo $conversation['Message']['message']; ?></div>
        <div class="pm-attach"><?php         
            if($conversation['Message']['files']){
                $conversation['Message']['files'] = unserialize($conversation['Message']['files']);
                echo 'ضمیمه :'. $this->Html->link($conversation['Message']['files']['name'],'/pm/download/'.$conversation['Reader']['id']);
            } 
        ?></div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
<div class="tabs-1 widget">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#reply" data-toggle="tab">پاسخ</a></li>
    </ul>
	<div class="tab-content">
		<div id="reply" class="tab-pane active">
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
                    echo $users[0]['user_name'];
                    echo $this->Form->hidden('Message.Recipients.0.user',array('value'=>$users[0]['user_id']));
                    echo $this->Form->hidden('Message.Recipients.0.parent_id',array('value'=>$users[0]['parent_id']));
                    
                }else{
                    $options = '';
                    $i = 0;
                    foreach($users as $user){
                        $options .= $this->Html->tag('option',$user['user_name'],array('value' => $user['user_id']));
                        echo $this->Form->hidden('Message.Recipients.'.$i.'.parent_id',array('value'=>$user['parent_id']));
                        $i ++;
                    }
                    echo $this->Html->tag('select',$options,array('name' => 'data[Message][Recipients][]','multiple'=>true,'style' => 'width:500px'));
                }
                ?>
            </div>
            <?php
            echo $this->Form->hidden('Message.parent_id',array('value'=>$message['Reader']['id']));
            echo $this->Form->input('subject', array('label' => 'عنوان'));
            $this->TinyMCE->editor('simple');
            echo $this->Form->input('message', array('label' => 'متن', 'class' => 'tinymce'));
            echo $this->Form->end();
            ?>
        </div>
	</div>
</div>