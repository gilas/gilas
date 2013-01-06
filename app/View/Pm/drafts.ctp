<?php
if(empty($messages)){
    echo 'هیچ پیامی ذخیره نشده است';
    return;
}
?>
<a class="btn red" id="delete">حذف</a>
<table class="users pm-list">
    <colgroup>
        <col class="selection-col"/>
        <col class="subject-col"/>
        <col class="attach-col"/>
        <col class="datetime-col"/>
    </colgroup>
    <tr>
        <th><input type="checkbox" role="selectAll" /></th>
        <th>موضوع</th>
        <th>&nbsp;</th>
        <th>زمان ذخیره</th>
    </tr>
    <?php foreach($messages as $message): ?>
    <tr <?php if($message['Reader']['new'] == 1) echo 'class="new-mail"'?> >
        <td class="selection"><input type="checkbox"  data="<?php echo $message['Reader']['id'] ?>" role="subselect" /></td>
        <td class="subject"><?php 
            if(empty($message['Message']['subject']))
                $message['Message']['subject'] = 'بدون موضوع';
            echo $html->link($message['Message']['subject'],array('action'=>'newMessage',$message['Message']['id'])); 
        ?></td>
        <td><?php if(! empty($message['Message']['files'])) echo $html->image('new/icons/mail-attach.png'); ?></td>
        <td><?php echo $jalali->niceShort($message['Message']['created']); ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="15" style="text-align: center;">
        <?php echo $paginator->first('ابتدا ',array('url' =>$filter)); ?>
        <?php echo $paginator->prev('« قبلی ',array('url' =>$filter)); ?>
        <?php echo $paginator->numbers(array('url' =>$filter)); ?>
        <?php echo $paginator->next('بعدی » ',array('url' =>$filter)); ?>
        <?php echo $paginator->last('انتها ',array('url' =>$filter)); ?>
        </td>
    </tr>
</table>
<script>
    $(function(){
        $('input[role=selectAll]').change(function(){
            $this = $(this)
            if($this.attr('checked')){
                $this.parents('table').find('input[role=subselect]').attr('checked','checked')
            }else{
                $this.parents('table').find('input[role=subselect]').removeAttr('checked')
            }
        })
        $('input[role=subselect]').change(function(){
            
            $allIsSelected = true;
            $table = $(this).parents('table');
            $table.find('input[role=subselect]').each(function(){
                if(! $(this).attr('checked')){
                    $allIsSelected = false;
                }
             })
             if($allIsSelected){
                $table.find('input[role=selectAll]').attr('checked','checked')
             }else{
                $table.find('input[role=selectAll]').removeAttr('checked')
             }
        })
         $('#delete').click(function(){
            if(confirm('آیا مطمئن هستید؟')){
                $ids = new Array;
                $('input[role=subselect]').each(function(){
                    if($(this).attr('checked')){
                        $ids.push($(this).attr('data'))
                    }
                })
                $.get('<?php echo $html->url(array('action' => 'delete')) ?>',{'id':$ids},function(data){
                    window.location.reload() 
                })
            }
            
        })
    })
</script>