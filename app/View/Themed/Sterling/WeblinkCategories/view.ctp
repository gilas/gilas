<?php
$this->Html->addCrumb($weblinks['0']['WeblinkCategory']['name']);
?>
<table class="weblinks">
    <tr>
        <td style="width: 10%"></td>
        <td style="width: 78%">عنوان</td>
        <td>تعداد بازدید</td>
    </tr>
    <?php foreach ($weblinks as $weblink): ?>
        <tr>
            <td style="text-align: center;"><?php echo $this->Html->image('global/link.png'); ?></td>
            <td><?php echo $this->Html->link($weblink['Weblink']['title'], array('controller' => 'weblinks', 'action' => 'go', $weblink['Weblink']['id']), array('title' => $weblink['Weblink']['description'], 'target' => 'blank')); ?></td>
            <td style="text-align: center"><?php echo $weblink['Weblink']['hits']; ?></td>
        </tr>


    <?php endforeach; ?>
</table>