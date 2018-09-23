<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('tasks/create'); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>
  <div class="form-group">
	  <label>User</label>
	  <select name="user_id" class="form-control">
		  <?php foreach($users as $user): ?>
		  	<option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
		  <?php endforeach; ?>
	  </select>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>