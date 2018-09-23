<?php if($task['done'] == 1) : ?>
	<h2  class="text-success"><?php echo $task['title']; ?></h2>

	<?php else: ?>
		<h2><?php echo $task['title']; ?> </h2>
<?php endif; ?>
<small>Posted on: <?php echo $task['created_at']; ?></small>
<br>
<?php echo $task['body']; ?>
<hr>
<div class="row">
	<div class="col">
	<?php if(!$task['done'] == 1 && $task['user_id'] == $this->session->userdata('user_id')) : ?>
		<?php echo form_open('/tasks/done/'.$task['id']); ?>
		<input type="submit" value="Done" class="btn btn-success">
		</form>
	<?php endif; ?>
	
	<?php if($this->session->userdata('logged_in') && $this->session->userdata('admin') == 1)  : ?>
		<a class="btn btn-primary" href="<?php echo base_url(); ?>tasks/edit/<?php echo $task['slug']; ?>">Edit</a>
	</div>  
      <div class="col">
          <div class="float-right"><?php echo form_open('/tasks/delete/'.$task['id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger">
		</form>
	</div>
   </div>
	<?php endif; ?> 

	