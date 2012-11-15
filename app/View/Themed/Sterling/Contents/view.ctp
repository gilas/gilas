<?php
foreach ($categories as $category) {
    $this->Html->addCrumb($category['ContentCategory']['name'], array(
        'controller' => 'contents',
        'action' => 'category',
        $category['ContentCategory']['id'] . '-' . $category['ContentCategory']['name'],
    ));
}
$this->Html->addCrumb($content['Content']['title']);
$this->set('title_for_layout', $content['Content']['title']);
?>

<div class="page_content blog_page_content">
    <article class="preview blog-main-preview">
        <h2><?php echo $this->Html->link($content['Content']['title'], array('action' => 'view', $content['Content']['id'] . '-' . $content['Content']['slug'])); ?></h2>
        <span class="metadata postinfo">نوشته شده توسط <?php echo $content['User']['name']; ?> در  <?php echo Jalali::niceShort($content['Content']['created']); ?></span>
        <p><?php echo $content['Content']['intro'] . $content['Content']['content']; ?></p>
        <div class="post-details"></div>
    </article>
</div>

<?php if (!empty($comments)): ?>
    <p class="tt-comment-count">نظرات</p>
    <div id="blog-comment-outer-wrap">
        <ol id="post-comments" class="comment-ol">
            <?php foreach ($comments as $comment): ?>
                <li id="li-comment-<?php echo $comment['Comment']['id'] ?>">
                    <?php echo $comment['Comment']['content'] ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
<?php endif; ?>


<?php if ($content['Content']['allow_comment']): ?>
    <div id="respond">
        <h3 class="comment-title">ارسال نظر</h3>
        <?php
        echo $this->Form->create('Comment', array('id' => 'commentform'));
        echo $this->Form->input('name', array('label' => 'نام'));
        echo $this->Form->input('email', array('label' => 'پست الکترونیک'));
        echo $this->Form->input('website', array('label' => 'وبسایت'));
        echo $this->Form->input('content', array('label' => 'متن'));
        echo $this->Form->end(array('label' => 'ارسال', 'id' => 'submit-button'));
        ?>
    </div>
<?php endif; ?>