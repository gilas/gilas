<?php 
$html->script('new/file',array('inline'=>false)); 
echo $tinymce->load('simple');
if(empty($message)){
    $message = $form->data;
}
?>
<div class="box">
    <div class="header"><h3>ارسال پیام</h3></div>
    <div class="content">
        <form id="newMessage" enctype="multipart/form-data" method="post" action="<?php echo (isset($this->passedArgs['redirect']))?$html->url('/'.urldecode($this->passedArgs['redirect'])):$html->url(array('action' => 'newMessage')) ?>" accept-charset="utf-8">
            <div style="padding: 10px;">
               <input type="submit" class="btn" name="data[send]" value="ارسال" />
               <?php if(empty($this->passedArgs['redirect'])): ?>
               <input type="submit" class="btn" name="data[save]" value="ذخیره" />
               <?php endif; ?>
               <input type="reset" class="btn" name="" value="پاک کردن" />
            </div>
            <table class="users">
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
                            echo $html->tag('select',$options,array('name' => 'data[Recipients][]','multiple'=>true,'style' => 'width:500px'));
                            //echo $form->select('Recipient',$users,array('multiple' => true));
                        }
                    ?></td>
                </tr>
                <tr>
                    <td>عنوان</td>
                    <td><input type="text" name="data[subject]" value="<?php echo $message['subject'] ?>" /></td>
                </tr>
                <tr>
                    <td>پیام</td>
                    <td><textarea class="tinymce" name="data[message]"><?php echo $message['message'] ?></textarea></td>
                </tr>
                <tr>
                    <td>ضمیمه</td>
                    <td><input type="file" name="data[file]" /></td>
                </tr>
            </table>
    </form>
    </div>
</div>