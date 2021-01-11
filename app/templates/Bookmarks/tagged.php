<?php
/**
 * @var View $this
 * @var \Cake\ORM\Query&\App\Model\Entity\Bookmark[] $bookmarks
 * @var string[] $tags
 */
 ?>

<h1>
    Bookmarks tagged with
    <?= $this->Text->toList(h($tags)) ?>
</h1>

<section>
    <?php foreach ($bookmarks as $bookmark): ?>
        <article>
            <!-- リンクを作成するために HtmlHelper を使用 -->
            <h4><?= $this->Html->link($bookmark->title, $bookmark->url) ?></h4>
            <small><?= h($bookmark->url) ?></small>

            <!-- テキストを整形するために TextHelper を使用 -->
            <?= $this->Text->autoParagraph(h($bookmark->description)) ?>
        </article>
    <?php endforeach; ?>
</section>