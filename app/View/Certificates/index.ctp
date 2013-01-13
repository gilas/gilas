<div class="row" id="toolbar-menu">
    <div class="title">لیست اعضا</div>
</div>
<?php
//Filtering
// we use action in options for rewriting action attr without querystring
echo $this->Filter->create('Certificate',array('action' => 'index'));
echo $this->Filter->input('name',array('label' => 'نام'));
echo $this->Filter->end();
?>
<div class="clear"></div>
<?php
if (!empty($requests)) {
    $index = $this->Filter->paginParams['limit'] * ($this->Filter->paginParams['page'] - 1);
    echo $this->AdminForm->startFormTag('Certificate');
    ?>
    <table class="table table-bordered table-striped">
        <tr>
            <th class="col-checkbox"><?php echo $this->AdminForm->selectAll(); ?></th>
            <th class="col-no">ردیف</th>
            <th>نام</th>
        </tr>
        <?php foreach ($requests as $request): ?>
            <tr>
                <td id="grid-align"><?php echo $this->AdminForm->checkbox($request['UserInformation']['id']); ?></td>
                <td id="grid-align"><?php echo ++$index; ?></td>
                <td><?php echo $this->Html->link($request['UserInformation']['first_name'].' '.$request['UserInformation']['last_name'],'/~'. $request['User']['username']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
    echo $this->AdminForm->endFormTag();
}
?>

<?php 
// show paginatation to user
echo $this->Filter->limitAndPaginate(); 
?>