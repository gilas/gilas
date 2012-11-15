<?php
foreach ($contents as $content) {
    ?>
    <a href="<?php
    echo $this->Html->url(array('controller' => 'contents', 'action' => 'view', $content['Content']['id'] . '-' .
        $content['Content']['slug']))
    ?>"><?php
    echo $this->Text->truncate($content['Content']['title'],50);
    ?></a><br />
    <?php
}
?>