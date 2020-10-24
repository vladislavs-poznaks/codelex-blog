<a href="/">Back</a>
<h1>Edit Article "<?= $article->title(); ?>"</h1>

<form action="/articles/<?php echo $article->id(); ?>" method="POST">

    <input type="hidden" name="_method" value="PUT">

    <div>
        <label for="title">Article's Title</label>
        <input type="text" name="title" id="title" value="<?php echo $article->title(); ?>">
    </div>
    <br>
    <div>
        <label for="content">Article's Content</label>
        <textarea
                name="content"
                id="content"
                cols="30"
                rows="4"
        ><?php echo $article->content(); ?></textarea>
    </div>

    <button type="submit">Update</button>
</form>
