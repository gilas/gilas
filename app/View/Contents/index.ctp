<?php
// Add
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-plus icon-white')),array('action' => 'add','content_category_id' => @$this->request->named['content_category_id'],'normalLink' => true ),array('class' => 'btn btn-success','escape' => false, 'rel' => 'tooltip','data-original-title' => 'افزودن','tooltip-place' => 'bottom'));
// Delete
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-trash icon-white')),array('action' => 'delete','confirm' => 'آیا مطمئن هستید ؟'),array('class' => 'btn btn-danger','escape' => false, 'rel' => 'tooltip','data-original-title' => 'حذف','tooltip-place' => 'bottom'));
// Edit
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-pencil icon-white')),array('action' => 'edit','method' => 'get','firstChild' => true),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'ویرایش','tooltip-place' => 'bottom'));
//Show toolbar
$this->AdminForm->showToolbar('لیست مطالب');

//Filtering
// we use action in options for rewriting action attr without querystring
echo $this->Filter->create('Content',array('action' => 'index'));
echo $this->Filter->input('title',array('label' => 'عنوان'));
echo $this->Filter->input('content_category_id',array(
    'label' => 'مجموعه',
    'options' => $contentCategories,
    'empty' => ''
    )
);
echo $this->Filter->end();
?>
<div class="clear"></div>
<?php
if (!empty($contents)) {
    // start form tag
    echo $this->AdminForm->startFormTag();
    ?>
    <table class="table table-bordered table-striped">

        <tr>
            <th class="checkbox-col"><?php echo $this->AdminForm->selectAll(); ?></th>
            <th>ردیف</th>
            <th><?php echo $this->Paginator->sort('Content.title','عنوان') ?></th>
            <th><?php echo $this->Paginator->sort('ContentCategory.name','مجموعه') ?></th>
            <th><?php echo $this->Paginator->sort('User.name','نویسنده') ?></th>
            <th><?php echo $this->Paginator->sort('Content.modified','آخرین ویرایش') ?></th>
            <th>نظرات</th>
        </tr>
        <?php
        //current index
        $index = $this->Filter->paginParams['limit'] * ($this->Filter->paginParams['page'] - 1);
        
        foreach ($contents as $content):
            ?>
            <tr>
                <td id="grid-align"><?php echo $this->AdminForm->checkbox($content['Content']['id']) ?></td>
                <td><?php echo ++$index; ?></td>
                <td><?php echo $this->Html->link($content['Content']['title'],array('action' => 'edit', $content['Content']['id'])); ?></td>
                <td id="grid-align"><?php echo $this->Html->link($content['ContentCategory']['name'],array('controller' => 'ContentCategories', 'action' => 'edit', $content['ContentCategory']['id'])); ?></td>
                <td id="grid-align"><?php echo $content['User']['name']; ?></td>
                <td id="grid-align"><?php echo Jalali::niceShort($content['Content']['modified']); ?></td>
                <td id="grid-align"> 
                <?php 
                echo $this->Html->link(
                    $content['Content']['commentCount'], 
                    ($content['Content']['commentCount'])?array('controller' => 'comments', 'action' => 'view', $content['Content']['id']):'#', 
                    array('class' => 'btn')
                ); 
                ?>
                </td>
            </tr>
            <?php
        endforeach;
        ?>
    </table>
    <?php
    echo $this->AdminForm->endFormTag();// end form tag
}
?>
<?php echo $this->Filter->limitAndPaginate(); ?>