<!-- Content wrapper -->
<div class="content-wrapper">
	<!-- Content -->

	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Biaya</span> Pengiriman</h4>


		<div class="card">
			<div class="card-datatable pt-0">
				<form action="<?= base_url('admin/toko/update') ?>" method="POST">
					<input type="hidden" name="id" value="<?= $toko->id ?>">
					<div class="row m-2">
						<div class="col-md-4">
							<label for="">Provinsi</label>
							<div class="input-group">
								<select name="id_provinsi" id="id_provinsi" class="form-control">
									<option value="">Pilih Provinsi</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<label for="">Kabupaten</label>
							<div class="input-group">
								<select name="id_kabupaten" id="id_kabupaten" class="form-control">
									<option value="">Pilih Kabupaten</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<label for="">Raja Ongkir</label>
							<div class="input-group">
								<input type="text" class="form-control" name="raja_ongkir" value="<?= $toko->raja_ongkir ?>">
							</div>
						</div>
					</div>
					<div class="row mt-4 mx-2">
						<div class="col-md-4">
							<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--/ Complex Headers -->
	</div>

</div>
