<ul class="nav">
    <li><?php echo $this->Html->link('اماکن', array('controller' => 'places','plugin' => false, 'action' => 'index', 'admin' => true)); ?></li>
    <li><?php echo $this->Html->link('رسته ها', array('controller' => 'rastes','plugin' => false, 'action' => 'index', 'admin' => true)); ?></li>
    <li><?php echo $this->Html->link('درجه ها', array('controller' => 'degrees','plugin' => false, 'action' => 'index', 'admin' => true)); ?></li>
    <?php
      $newCertificates = null;
        $count = $this->requestAction(array('controller' => 'Certificates', 'action' => 'getCountRequest', 'admin' => false));
        if($count){
            $newCertificates = $this->Html->tag('span', $count, array('class' => 'count'));
        }
        ?>
    <li><?php echo $this->Html->link('درخواست ها'.$newCertificates, array('controller' => 'Certificates','plugin' => false, 'action' => 'index', 'admin' => true), array('escape' => false)); ?></li>
    <?php
      $newMessage = null;
      $count = $this->requestAction(array('controller' => 'Pms', 'action' => 'countNewMessages', 'admin' => false));
      if($count){
          $newMessage = $this->Html->tag('span', $count, array('class' => 'count'));
      }
    ?>
    <li><?php echo $this->Html->link('پیام نگار'.$newMessage, array('controller' => 'Pms','plugin' => false, 'action' => 'index', 'admin' => true), array('escape' => false)); ?></li>
    <?php
      $newComplaints = null;
      $count = $this->requestAction(array('controller' => 'Complaints', 'action' => 'countNewComplaints', 'admin' => false));
      if($count){
          $newComplaints = $this->Html->tag('span', $count, array('class' => 'count'));
      }
    ?>
    <li><?php echo $this->Html->link('شکایت'.$newComplaints, array('controller' => 'Complaints','plugin' => false, 'action' => 'index', 'admin' => true), array('escape' => false)); ?></li>
</ul>