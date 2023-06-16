<style>
    .card-view-post { 
        width: 500px;
        margin: auto;
        top: 50px;
    }
</style>

<div class="card card-view-post">
    <div class="card-body">
        <h1><?php echo $post['Post']['title']; ?></h1>
        <hr>
        <p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

        <p><?php echo h($post['Post']['body']); ?></p>
    </div>
</div>
