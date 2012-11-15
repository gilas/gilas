<?php
if (isset($categories)) {
    $lastCategory = array_pop($categories);
    foreach ($categories as $category) {
        $this->Html->addCrumb($category['ContentCategory']['name'], array(
            'controller' => 'contents',
            'action' => 'category',
            $category['ContentCategory']['id'] . '-' . $category['ContentCategory']['name'],
        ));
    }
    $this->Html->addCrumb($lastCategory['ContentCategory']['name']);
}
if (empty($contents)) {
    echo 'هیچ مطلبی یافت نشد';
    return;
}
foreach ($contents as $content):
    ?>

    <div class="page_content blog_page_content">
        <article class="preview blog-main-preview">
            <h2><?php echo $this->Html->link($content['Content']['title'], array('action' => 'view', $content['Content']['id'] . '-' . $content['Content']['slug'])); ?></h2>
            <span class="metadata postinfo">نوشته شده توسط <?php echo $content['User']['name']; ?> در  <?php echo Jalali::niceShort($content['Content']['created']); ?></span>
            <p><?php echo $content['Content']['intro']; ?></p>
            <?php if (!empty($content['Content']['content'])): ?>
                <div class="alignleft">
                    <a class="button green small" href="<?php echo $this->Html->url(array('action' => 'view', $content['Content']['id'] . '-' . $content['Content']['slug'])) ?>">ادامه مطلب</a>
                </div>
            <?php endif; ?>
            <div class="post-details"></div>
        </article>
    </div>
<?php endforeach; ?>

<?php
$url = $this->Filter->getParam();
// set to past action, so we can paginate link to it
$url['action'] = $pastAction;
$this->Paginator->options(array(
    'url' => $url,
));
?>
<div class="wp-pagenavi">
    <span class="pages"><?php echo $this->Paginator->counter('صفحه {:page} از {:pages}') ?></span>
    <?php echo $this->Paginator->numbers(array('class' => 'page', 'separator' => ' ')); ?>
</div>
