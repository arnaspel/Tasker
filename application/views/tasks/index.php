<br><h2><?= $title ?></h2><br>
<?php foreach($tasks as $task) : ?>
	<?php if($task['user_id'] == $this->session->userdata('user_id') || $this->session->userdata('admin') == 1) : ?>


	<?php if($task['done'] == 1) : ?>
	<h3  class="text-success"><?php echo $task['title']; ?></h3>

	<?php else: ?>
	<h3><?php echo $task['title']; ?> </h3>
	<?php endif; ?>
	<h6>Task for: <?php echo $task['name']; ?> </h6>
	<small>Posted on: <?php echo $task['created_at']; ?></small><br>
	<?php echo $task['body']; ?>
	<br>
	<br>
	<p><a class="btn btn-primary" href="<?php echo site_url('/tasks/'.$task['slug']); ?>">Read More</a>
	
</p>
<?php endif; ?>

<?php endforeach; ?>