<div class="container">
	<h5>Tambah Slider</h5>
	<form method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label>Caption Slider</label>
			<textarea type="text" id="editorku" name="caption_slider" class="form-control"></textarea>
			<span class="small text-danger">
				<?php echo form_error("caption_slider") ?>
			</span>
		</div>
		<div class="mb-3">
			<label>Foto Slider</label>
			<input type="file" name="foto_slider" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
