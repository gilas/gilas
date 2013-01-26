<?php
// Delete
$this->AdminForm->addToolbarItem($this->Html->tag('i', '', array('class' => 'icon-trash icon-white')), array('action' => 'delete', 'confirm' => 'آیا مطمئن هستید ؟'), array('class' => 'btn btn-danger', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'حذف', 'tooltip-place' => 'bottom'));
//Show toolbar
$this->AdminForm->showToolbar('لیست شکایت ها');

//Filtering
// we use action in options for rewriting action attr without querystring
echo $this->Filter->create('Complaint',array('action' => 'index'));
echo $this->Filter->input('name',array('label' => 'شاکی'));
echo $this->Filter->input('status',array(
    'label' => 'وضعیت',
    'options' => $statusOptions,
    'empty' => '',
    )
);
echo $this->Filter->input('code',array('label' => 'کد رهگیری'));
echo $this->Filter->end();

if (!empty($requests)) {
    $index = $this->Filter->paginParams['limit'] * ($this->Filter->paginParams['page'] - 1);
    echo $this->AdminForm->startFormTag('Complaint');
    ?>
    <table class="table table-bordered table-striped">
        <tr>
            <th class="col-checkbox"><?php echo $this->AdminForm->selectAll(); ?></th>
            <th class="col-no">ردیف</th>
            <th>شاکی</th>
            <th>متشاکی</th>
            <th>موضوع</th>
            <th>تاریخ درخواست</th>
            <th>وضعیت</th>
        </tr>
        <?php foreach ($requests as $request): ?>
            <tr>
                <td id="grid-align"><?php echo $this->AdminForm->checkbox($request['Complaint']['id']); ?></td>
                <td id="grid-align"><?php echo ++$index; ?></td>
                <td><?php echo $request['Complaint']['comp_name'].' '.$request['Complaint']['comp_family']; ?></td>
                <td><?php echo $request['UserInformation']['first_name'].' '.$request['UserInformation']['last_name']; ?></td>
                <td><?php echo $this->Html->link($request['Complaint']['subject'], array('action' => 'view', $request['Complaint']['id'])); ?></td>
                <td><?php echo Jalali::niceShort($request['Complaint']['created']); ?></td>
                <td><?php echo $request['Complaint']['formattedStatus']; ?></td>
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