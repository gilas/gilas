<?php
// Delete
$this->AdminForm->addToolbarItem($this->Html->tag('i', '', array('class' => 'icon-trash icon-white')), array('action' => 'delete', 'confirm' => 'آیا مطمئن هستید ؟'), array('class' => 'btn btn-danger', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'حذف', 'tooltip-place' => 'bottom'));
//Show toolbar
$this->AdminForm->showToolbar('لیست درخواست ها');
//Filtering
// we use action in options for rewriting action attr without querystring
echo $this->Filter->create('Certificate',array('action' => 'index'));
echo $this->Filter->input('name',array('label' => 'نام'));
echo $this->Filter->input('published',array(
    'label' => 'وضعیت',
    'options' => $statusOptions,
    'empty' => '',
    )
);
echo $this->Filter->input('code',array('label' => 'کد رهگیری'));
echo $this->Filter->end();
if (!empty($requests)) {
    $index = $this->Filter->paginParams['limit'] * ($this->Filter->paginParams['page'] - 1);
    echo $this->AdminForm->startFormTag('Certificate');
    ?>
    <table class="table table-bordered table-striped">
        <tr>
            <th class="col-checkbox"><?php echo $this->AdminForm->selectAll(); ?></th>
            <th class="col-no">ردیف</th>
            <th>نام</th>
            <th>مکان</th>
            <th>رسته</th>
            <th>درجه</th>
            <th>تاریخ درخواست</th>
            <th>وضعیت</th>
        </tr>
        <?php foreach ($requests as $request): ?>
            <tr>
                <td id="grid-align"><?php echo $this->AdminForm->checkbox($request['UserInformation']['id']); ?></td>
                <td id="grid-align"><?php echo ++$index; ?></td>
                <td><?php echo $this->Html->link($request['UserInformation']['first_name'].' '.$request['UserInformation']['last_name'], array('action' => 'view', $request['UserInformation']['id'])); ?></td>
                <td><?php echo $request['Place']['name']; ?></td>
                <td><?php echo $request['Raste']['name']; ?></td>
                <td><?php echo $request['Degree']['name']; ?></td>
                <td><?php echo Jalali::niceShort($request['UserInformation']['created']); ?></td>
                <td><?php echo $request['UserInformation']['formattedStatus']; ?></td>
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