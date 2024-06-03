<div class="container">
		<h5>Produk Terbaru</h5>
		<div class="row">
			<?php foreach ($produk as $key => $value): ?>
			<div class="col-md-4">
				<div class="card border-0 shadow-sm">
					<img src="<?php echo $this->config->item("url_produk").$value['foto_produk'] ?>">
					<div class="card-body text-center">
						<h6><?php echo $value['nama_produk'] ?></h6>
						<p class="lead">Rp <?php echo number_format($value['harga_produk']) ?></p>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
