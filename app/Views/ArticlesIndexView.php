<h1>Articles</h1>

<?php foreach ($articles as $index => $article): ?>
    <h3>
        <a href="/articles/<?php echo $index+1; ?>">
            <?php echo $article->title(); ?>
        </a>
    </h3>
    <p><?php echo $article->content(); ?></p>
<?php endforeach; ?>
