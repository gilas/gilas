<?php
foreach ($comments as $comment) {
    echo $comment['Comment']['name'];
    ?>
    در
    <a href="<?php
    echo $this->Html->url(array('controller' => 'contents', 'action' => 'view', $comment['Content']['id'] . '-' .
        $comment['Content']['slug']))
    ?>"><?php
    echo $this->Text->truncate($comment['Content']['title'],30);
    ?></a><br />
    <?php
}
?>