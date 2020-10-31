<?php require_once __DIR__  . '/../Views/HeaderView.php' ?>

<a href="/">Back</a>
<h1><?php echo $article->title(); ?></h1>
<p><?php echo $article->content(); ?></p>
<p><?php echo implode(', ', $tagNames) ?></p>
<p>
    <small>
        <b><?php echo $article->createdAt(); ?></b>
    </small>
</p>

<h3>Comments</h3>
<?php foreach ($comments->all() as $comment) : ?>
    <h4><?php echo $comment->name(); ?> commented:</h4>
    <p><?php echo $comment->content(); ?></p>
    <p>
        <small>
            <?php echo $comment->createdAt(); ?>
        </small>
    </p>
    <form action="/articles/<?php echo $article->id() ?>/comments/<?php echo $comment->id() ?>" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Delete this</button>
    </form>
<?php endforeach; ?>

<form method="POST" action="/articles/<?php echo $article->id() ?>/comments">
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="content">Comment</label>
        <textarea name="content" id="content" cols="30" rows="4" required></textarea>
    </div>
    <div>
        <button type="submit">Comment</button>
    </div>
</form>

<?php require_once __DIR__  . '/../Views/FooterView.php' ?>
