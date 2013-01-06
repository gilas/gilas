<?php
switch($ref_action){
    case 'inbox':
        echo $html->addCrumb('صندوق ورودی',array('action' => 'inbox'));
        break;
    case 'outbox':
        echo $html->addCrumb('صندوق خروجی',array('action' => 'outbox'));
        break;
    case 'draft':
        echo $html->addCrumb('پیش نویس ها',array('action' => 'draft'));
        break;
    case 'trash':
        echo $html->addCrumb('پیام های حذف شده',array('action' => 'trash'));
        break;
}

if(empty($message)){
    echo 'چنین پیامی وجود ندارد';
    return;
}
echo $tinymce->load('simple');
?>
<div style="padding: 10px;">
    <?php echo $html->link('حذف',array('action' => 'delete',$message['Reader']['id'],'ref'=> $ref_action ),array('class' => 'btn red')); ?>
</div>
<div class="box">
    <div class="header">
        <h3><?php echo $message['Message']['subject'] ?></h3>
        <div class="left" style="padding-left: 5px; color:white"><?php 
            echo $jalali->niceShort($message['Message']['created']); 
            ?></div>
    </div>
    <div class="content">
        <div style="color: gray;"><?php
        if($message['Sender']['id'] == $session->read('Auth.User.id')){
            echo 'فرستنده : من <br />';
            if(count($message['Recipients']) == 1){
                echo 'گیرنده : ';
            }else{
                echo 'گیرندگان : ';
            }
            $recipients = Set::combine($message['Recipients'],'{n}.Recipient.id','{n}.Recipient.full_name');
            echo implode(' ، ',$recipients);
        }else{
         echo 'فرستنده : ' . $html->tag('b',$message['Sender']['full_name']);
         } 
         ?></div>
        <hr />
        <?php 
        echo $message['Message']['message'];
        if($message['Message']['files']){
            $message['Message']['files'] = unserialize($message['Message']['files']);
            echo 'ضمیمه :'. $html->link($message['Message']['files']['name'],'/pm/download/'.$message['Reader']['id']);
        }
        
        ?>
        <div>
        </div>
    </div>
</div>
<?php
// Group reply by recipients
// if sender of primary message is this user and have more than one recipient
// it can see grouping
// groups is array that has this fields 
//      full_name of recipient
//      all conversation with user and recipient
// for any recipient groups has one row
$groups = array();
foreach($message['Conversation'] as $key => $conversation){
    if($conversation['Sender']['id'] == $session->read('Auth.User.id')){
        foreach($conversation['Recipients'] as  $r){
            $groups[$r['Recipient']['id']]['full_name'] = $r['Recipient']['full_name'];
            $groups[$r['Recipient']['id']]['convensation'][$key] = $conversation;
        }
    }else{
        $groups[$conversation['Sender']['id']]['full_name'] = $conversation['Sender']['full_name'];
        $groups[$conversation['Sender']['id']]['convensation'][$key] = $conversation;
    }
}

?>
<div class="tabbable tabs-right">
        <ul class="nav nav-tabs">
        <?php $once = true; foreach($groups as $key => $g): ?>
          <li <?php if($once){echo 'class="active"'; $once = false; } ?>><a data-toggle="tab" href="#group<?php echo $key ?>"><?php echo $g['full_name']; ?></a></li>
        <?php endforeach; ?>
        </ul>
        <div class="tab-content">
          <?php $once = true; foreach($groups as $key => $g): ?>
          <div id="group<?php echo $key ?>" class="tab-pane <?php if($once){echo 'active'; $once = false; } ?>">
            <?php foreach($g['convensation'] as $conversation): ?>
                <div class="grid_10 <?php echo ($conversation['Sender']['id'] == $session->read('Auth.User.id'))?'conversation_right':'conversation_left'; ?>">
                    <div class="grid_1">
                    <?php 
                        echo $this->Html->image('new/person.png');
                        if($conversation['Sender']['id'] == $session->read('Auth.User.id')){
                            echo 'من';
                        }else{
                            echo $conversation['Sender']['full_name'];
                        } 
                    ?>
                    </div>
                    <div class="grid_10">
                        <div class="right" style="color: gray;"><?php echo 'عنوان : '. $conversation['Message']['subject'] ?></div>
                        <div class="left"><?php 
                            echo $jalali->niceShort($conversation['Message']['created']); 
                            ?></div>
                        <div class="clear"></div>
                        <hr />
                        <?php echo $conversation['Message']['message'] ?>
                        <?php 
                        if($conversation['Message']['files']){
                            $conversation['Message']['files'] = unserialize($conversation['Message']['files']);
                            echo 'ضمیمه :'. $html->link($conversation['Message']['files']['name'],'/pm/download/'.$conversation['Reader']['id']);
                        }
                        ?>
                        <div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>
        </div>
</div>
    <?php 
    if(! empty($message['Conversation'])):
        foreach($message['Conversation'] as $conversation): 
    ?><!--
    <div class="grid_12 <?php echo ($conversation['Sender']['id'] == $session->read('Auth.User.id'))?'conversation_right':'conversation_left'; ?>">
        <div class="grid_1">
        <?php 
            echo $this->Html->image('new/person.png');
            if($conversation['Sender']['id'] == $session->read('Auth.User.id')){
                echo 'من';
            }else{
                echo $conversation['Sender']['full_name'];
            } 
        ?>
        </div>
        <div class="grid_10">
            <div class="right" style="color: gray;"><?php echo 'عنوان : '. $conversation['Message']['subject'] ?></div>
            <div class="left"><?php 
                echo $jalali->niceShort($conversation['Message']['created']); 
                ?></div>
            <div class="clear"></div>
            <hr />
            <?php echo $conversation['Message']['message'] ?>
            <?php 
            if($conversation['Message']['files']){
                $conversation['Message']['files'] = unserialize($conversation['Message']['files']);
                echo 'ضمیمه :'. $html->link($conversation['Message']['files']['name'],'/pm/download/'.$conversation['Reader']['id']);
            }
            ?>
            <div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    -->
    <?php 
        endforeach;
    endif;

$html->script(array('bootstrap/bootstrap-tab','new/file'),array('inline' => false));
$html->css('bootstrap',null,array('inline' => false));
?>
<div class="clear"></div>
<ul class="nav nav-tabs" id="tab">
    <li class=""><a data-toggle="tab" href="#Reply">پاسخ</a></li>
    <li class=""><a data-toggle="tab" href="#Forward">ارجاع</a></li>
</ul>
<div class="tab-content" id="myTabContent">
    <div id="Reply" class="tab-pane fade active in">
        <form enctype="multipart/form-data" method="post" action="<?php echo $html->url(array('action' => 'reply')) ?>" accept-charset="utf-8">
        <input type="hidden" name="data[id]" value="<?php echo $message['Message']['id']?>" />
        <input type="hidden" name="ref" value="<?php echo $ref_action ?>" />
        <div style="padding: 10px;">
           <input type="submit" class="btn" name="data[send]" value="ارسال" />
           <input type="submit" class="btn" name="data[save]" value="ذخیره" />
           <input type="reset" class="btn" name="" value="پاک کردن" />
        </div>
        <table>
            <?php if(isset($message['Recipients'])): ?>
            <tr>
                <td>گیرنده</td>
                <td><?php 
            if(count($message['Recipients']) == 1){
                echo $message['Recipients'][0]['Recipient']['full_name'];
                //echo "<input type='hidden' name='' "
                echo $form->hidden('Recipients.0',array('value'=>$message['Recipients'][0]['Recipient']['id']));
            }else{    
                $options = '';
                foreach($message['Recipients'] as $recipient){
                    $options .= $html->tag('option',$recipient['Recipient']['full_name'],array('value' => $recipient['Recipient']['id']));
                }
                echo $html->tag('select',$options,array('name' => 'data[Recipients][]','multiple'=>true,'style'=>'width:700px'));
            }
            ?></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td>عنوان</td>
                <td><input type="text" name="data[subject]" value="پاسخ : <?php echo $message['Message']['subject'] ?>" /></td>
            </tr>
            <tr>
                <td>پیام</td>
                <td><textarea class="tinymce" name="data[message]"></textarea></td>
            </tr>
            <tr>
                <td>ضمیمه</td>
                <td><input type="file" name="data[file]" /></td>
            </tr>
        </table>
        </form>
    </div>
    <div id="Forward" class="tab-pane fade">
      <form enctype="multipart/form-data" method="post" action="<?php echo $html->url(array('action' => 'newMessage')) ?>" accept-charset="utf-8">
      <input type="hidden" name="id" value="<?php echo $message['Message']['id']?>" />
        <div style="padding: 10px;">
           <input type="submit" class="btn" name="data[send]" value="ارسال" />
           <input type="submit" class="btn" name="data[save]" value="ذخیره" />
           <input type="reset" class="btn" name="" value="پاک کردن" />
        </div>
        <table>
            <tr>
                <td>گیرنده</td>
                <td><?php 
                        if(count($users) == 1){
                            echo current($users);
                            //echo "<input type='hidden' name='' "
                            echo $form->hidden('Recipients.0',array('value'=>key($users)));
                            
                        }else{
                            $options = '';
                            foreach($users as $user_key => $user_name){
                                if(@in_array($user_key,$message['Recipients'])){
                                    $options .= $html->tag('option',$user_name,array('value' => $user_key,'selected' => true));
                                }else{
                                $options .= $html->tag('option',$user_name,array('value' => $user_key));
                                }
                            }
                            echo $html->tag('select',$options,array('name' => 'data[Recipients][]','multiple'=>true,'style'=>'width:700px'));
                            //echo $form->select('Recipient',$users,array('multiple' => true));
                        }
                    ?></td>
            </tr>
            <tr>
                <td>عنوان</td>
                <td><input type="text" name="data[subject]" value="ارجاع : <?php echo $message['Message']['subject'] ?>" /></td>
            </tr>
            <tr>
                <td>پیام</td>
                <td><textarea class="tinymce" name="data[message]"><?php 
                    echo "<br/><br/><br/>";
                    echo $html->tag('blockquote',"متن ارسالي :<br/>".$message['Message']['message']);
                ?></textarea></td>
            </tr>
            <tr>
                <td>ضمیمه</td>
                <td><input type="file" name="data[file]" /></td>
            </tr>
        </table>
        </form>
    </div>
</div>

<style>
.conversation_right .grid_10{
    background-color: #E8E8E8;
    border: solid 1px #CCC;
}
.conversation_left .grid_10{
    float: left;
    background-color: #FCFFC6;
    border: solid 1px #CCC;
}

.conversation_left .grid_1{
    float: left;
}
.conversation_left .grid_1 img,.conversation_right .grid_1 img {
    background-color: #FFFFFF;
    box-shadow: 0 0 4px #D2D2D2;
    text-align: center;
    display: block;
}
</style>