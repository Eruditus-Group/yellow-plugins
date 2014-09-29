<?php $pages = $yellow->pages->index(false, false, 3) ?>
<?php $pages = $pages->sort("title", false)->pagination(30) ?>
<?php if($pages->getPaginationPage() > $pages->getPaginationCount()) $yellow->page->error(404) ?>
<?php $yellow->snippet("header") ?>
<?php $yellow->snippet("sitename") ?>
<?php $yellow->snippet("navigation") ?>
<div class="content sitemap">
<h1><?php echo $yellow->page->getHtml("title") ?></h1>
<ul>
<?php foreach($pages as $page): ?>
<?php $sectionNew = htmlspecialchars(strtoupperu(substru($page->get("title"), 0, 1))) ?>
<?php if($section != $sectionNew) { $section = $sectionNew; echo "</ul><h2>$section</h2><ul>\r\n"; } ?>
<li><a href="<?php echo $page->getLocation() ?>"><?php echo $page->getHtml("title") ?></a></li>
<?php endforeach ?>
</ul>
<?php $yellow->snippet("pagination", $pages) ?>
</div>
<?php $yellow->snippet("footer") ?>
<?php $yellow->page->header("Last-Modified: ".$pages->getModified(true)) ?>