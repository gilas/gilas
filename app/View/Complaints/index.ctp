<?php
if (!empty($requests)) {
    $index = $this->Filter->paginParams['limit'] * ($this->Filter->paginParams['page'] - 1);
    echo $this->AdminForm->startFormTag('Certificate');
    ?>
    <table class="table table-bordered table-striped">
        <tr>
            <th class="col-checkbox"><?php echo $this->AdminForm->selectAll(); ?></th>
            <th class="col-no">ردیف</th>
            <th>شاکی</th>
            <th>موضوع</th>
            <th>تاریخ درخواست</th>
            <th>وضعیت</th>
        </tr>
        <?php foreach ($requests as $request): ?>
            <tr>
                <td id="grid-align"><?php echo $this->AdminForm->checkbox($request['Complaint']['id']); ?></td>
                <td id="grid-align"><?php echo ++$index; ?></td>
                <td><?php echo $request['Complaint']['comp_name'].' '.$request['Complaint']['comp_family']; ?></td>
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