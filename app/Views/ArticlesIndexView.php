<?php require_once __DIR__  . '/../Views/HeaderView.php' ?>

<h1>Articles</h1>

<?php foreach ($articles as $article): ?>
    <h3>
        <a href="/articles/<?php echo $article->id(); ?>">
            <?php echo $article->title(); ?>
        </a>
    </h3>
    <p><?php echo $article->content(); ?></p>
    <p>
        <small>
            <?php echo $article->createdAt(); ?>
        </small>
    </p>
<?php endforeach; ?>

<?php require_once __DIR__  . '/../Views/FooterView.php' ?>
