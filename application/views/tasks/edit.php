<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('tasks/update'); ?>
	<input type="hidden" name="id" value="<?php echo $task['id']; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $task['title']; ?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $task['body']; ?></textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>