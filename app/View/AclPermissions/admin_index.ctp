<?php
// Add
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-refresh icon-white')),array('action' => 'sync','normalLink' => true ),array('class' => 'btn btn-success','escape' => false, 'rel' => 'tooltip','data-original-title' => 'بروزرسانی','tooltip-place' => 'bottom'));
foreach($aros as $aro_id => $aro){
    $this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-ok icon-white')),array('action' => 'editPermission', 'aro' => $aro_id,'type' => 'on'),array('class' => 'btn btn-success','escape' => false, 'rel' => 'tooltip','data-original-title' => $aro,'tooltip-place' => 'bottom'));
    $this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-remove icon-white')),array('action' => 'editPermission', 'aro' => $aro_id,'type' => 'off'),array('class' => 'btn btn-success','escape' => false, 'rel' => 'tooltip','data-original-title' => $aro,'tooltip-place' => 'bottom'));
}
//Show toolbar
$this->AdminForm->showToolbar('مدیریت سطح دسترسی');
$actions = array();
$controller = '' ;
foreach($acos as  $aco_id => $aco){
    if(substr_count($aco,'_') == 0){
        $controller = $aco;
    }else{
        $actions[$controller][$aco_id] = $aco;
    }
}
echo $this->AdminForm->startFormTag('AclPermission');
?>
<div class="tabbable tabs-right">
    <ul class="nav nav-tabs" style="margin-left: 0;height: 450px;overflow-y: scroll;overflow-x: hidden;">
        <?php $flag = true; foreach($actions as $controller => $action): ?>
            <li <?php if($flag){echo 'class="active"';$flag = false;} ?> ><a data-toggle="tab" href="#<?php echo $controller?>"><?php echo $controller?></a></li>
        <?php endforeach; ?>
    </ul>
    <div class="tab-content" style="clear: none;border:none;padding:0;">
        <?php $flag = true; foreach($actions as $controller => $action): ?>
            <div id="<?php echo $controller?>" class="tab-pane  <?php if($flag){echo 'active';$flag = false;} ?>">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col-checkbox"><?php echo $this->AdminForm->selectAll() ?></th>
                            <th style="width: 150px;">تابع</th>
                            <?php
                            foreach($aros as $aro){
                                echo $this->Html->tag('th',$aro);
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($action as $aco_id => $aco){
                                    echo '<tr>';
                                    echo $this->Html->tag('td', $this->AdminForm->checkbox($aco_id),array('id' => 'grid-align'));
                                    echo $this->Html->tag('td',ltrim($aco,'_'));
                                    foreach($permissions[$aco_id] as $aro_id => $permission){
                                        echo '<td id="grid-align">';
                                        if($permission){
                                            // Published
                                            echo $this->AdminForm->item(
                                                $this->Html->image('tick.png'),//title
                                                array('action' => 'editPermission', 'aro' => $aro_id,'type' => 'off'),// url
                                                array('escape' => false)//option
                                            );
                                        }else{
                                            // Non Published
                                            echo $this->AdminForm->item(
                                                $this->Html->image('publish_x.png'),
                                                array('action' => 'editPermission', 'aro' => $aro_id,'type' => 'on'),
                                                array('escape' => false)
                                            );
                                        }
                                        echo '</td>';
                                    }
                                echo '</tr>'; 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php echo $this->AdminForm->endFormTag();// end form tag ?>