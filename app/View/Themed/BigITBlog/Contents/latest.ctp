<?php

foreach ($contents as $content)
{

?>
<a href="<?php

    echo $this->Html->url(array('action' => 'view', $content['Content']['id'] . '-' .
            $content['Content']['slug']))

?>"><?php

    echo $content['Content']['title'];

?></a><br />
<?php

}

?>