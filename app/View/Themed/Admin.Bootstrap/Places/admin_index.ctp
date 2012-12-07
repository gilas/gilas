<?php
// Add
$this->AdminForm->addToolbarItem($this->Html->tag('i', '', array('class' => 'icon-plus icon-white')), array('action' => 'add', 'normalLink' => true), array('class' => 'btn btn-success', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'افزودن', 'tooltip-place' => 'bottom'));
// Delete
$this->AdminForm->addToolbarItem($this->Html->tag('i', '', array('class' => 'icon-trash icon-white')), array('action' => 'delete', 'confirm' => 'آیا مطمئن هستید ؟'), array('class' => 'btn btn-danger', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'حذف', 'tooltip-place' => 'bottom'));
// Edit
$this->AdminForm->addToolbarItem($this->Html->tag('i', '', array('class' => 'icon-pencil icon-white')), array('action' => 'edit', 'method' => 'get', 'firstChild' => true), array('class' => 'btn btn-info', 'escape' => false, 'rel' => 'tooltip', 'data-original-title' => 'ویرایش', 'tooltip-place' => 'bottom'));
//Show toolbar
$this->AdminForm->showToolbar('لیست مکان ها');
if (!empty($places)) {
    $index = $this->Filter->paginParams['limit'] * ($this->Filter->paginParams['page'] - 1);
    echo $this->AdminForm->startFormTag();
    ?>
    <table class="table table-bordered table-striped">
        <tr>
            <th><?php echo $this->AdminForm->selectAll(); ?></th>
            <th>ردیف</th>
            <th>نام</th>
            <th>تعداد مجوز ها</th>
        </tr>
        <?php foreach ($places as $place): ?>
            <tr>
                <td id="grid-align"><?php echo $this->AdminForm->checkbox($place['Place']['id']); ?></td>
                <td id="grid-align"><?php echo ++$index; ?></td>
                <td id="grid-align"><?php echo $place['Place']['name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
    echo $this->AdminForm->endFormTag();
}
?>