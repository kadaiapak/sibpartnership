      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          <div id="flash" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
          <div class="row">

            <div class="col-lg-10 col-md-10">
              <?= form_error('status_orangtua', '<div class="alert alert-danger mb-4" role="alert">', '</div>'); ?>
              <?= form_error('point_penilaian', '<div class="alert alert-danger mb-4" role="alert">', '</div>'); ?>
              <div class="card card-warning">
                <div class="card-header">
                  <h4 style="font-size: 20px; color: #34395e;">Daftar Status Orang tua</h4>
                  <div class="card-header-action">
                    <?php if($cek_akses_user['tambah'] == '1') { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statusOrangtuaModal">
                      Tambah Jenis Status Orang tua
                    </button>
                    <?php } ?>
                  </div>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Jenis Status Orangtua</th>
                          <th>Point</th>
                          <th>Aktif</th>
                          <?php if($cek_akses_user['edit'] == '1' || $cek_akses_user['hapus'] == '1') { ?>
                          <th>Aksi</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($status_orangtua as $so) : ?>
                            <tr>
                              <td><?= $i; ?></td>
                              <td><?= $so['nama_status']; ?></td>
                              <td><?= $so['point_penilaian']; ?></td>
                              <td><?= $so['is_active'] == 1 ? "<span class='badge badge-success'>Aktif</span>" : "<span class='badge badge-danger'>Tidak</span>" ?></td>
                              <?php if($cek_akses_user['edit'] == '1' || $cek_akses_user['hapus'] == '1') { ?>
                              <td>
                                <?php if($cek_akses_user['edit'] == '1') { ?>
                                <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-toggle="modal" title="Edit" data-target="#editStatusOrangtua<?= $so['id']; ?>"><i class="fas fa-pencil-alt" ></i></button>
                                <?php } ?>
                                <?php if($cek_akses_user['hapus'] == '1') { ?>
                                <form style="display: inline-block;" action="<?= base_url('mbeasiswa/status_orangtua/hapus'); ?>" method="post">
                                <input 
                                name="status_orangtua_id"
                                type="hidden" 
                                value="<?= $so['id']; ?>">    
                                <button onclick="return confirm('Yakin dihapus?')" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete">
                                        <i class="fas fa-trash"></i>
                                </button>
                                </form>
                                <?php } ?>
                              </td>
                              <?php } ?>
                            </tr>
                        <?php $i++ ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </section>

          <!-- modal untuk tambah data -->
          <div class="modal fade" id="statusOrangtuaModal" tabindex="-1" role="dialog" aria-labelledby="statusOrangtuaModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="statusOrangtuaModalLabel">Masukkan Status Orangtua</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="<?= base_url('mbeasiswa/status_orangtua');?>" method="post">

                  <div class="modal-body">
                    <div class="form-group">
                      <input type="text" class="form-control" id="nama_status" name="nama_status" placeholder="Tuliskan Status ...">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="point_penilaian" name="point_penilaian" placeholder="Point Penilaian...">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                          <input type="hidden" name="is_active" value="0" id="is_active" />
                          <input class="form-check-input" type="checkbox" value="1" name="is_active"  id="is_active">
                          <label class="form-check-label" for="is_active">
                              Aktif ?
                          </label>
                          <div class="text-small text-muted mb-1">(ceklis jika ingin ditampilkan) !</div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- modal untuk edit -->
          <?php $no = 0; ?>
          <?php foreach ($status_orangtua as $so) : $no++ ?>
          <div class="modal fade" id="editStatusOrangtua<?= $so['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editStatusOrangtuaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editStatusOrangtuaLabel">Edit Status Orangtua</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="<?= base_url('mbeasiswa/status_orangtua/edit');?>" method="post">

                <input type="hidden" name="id" value="<?= $so['id']; ?>">
                  <div class="modal-body">
                    <div class="form-group">
                      <input type="text" class="form-control" id="nama_status" name="nama_status" value="<?= $so['nama_status']; ?>">
                    </div>
                    <div class="form-group">
                      <input value="<?= $so['point_penilaian']; ?>" type="text" class="form-control" id="point_penilaian" name="point_penilaian" placeholder="Point Penilaian ...">
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input type="hidden" name="is_active" value="0" id="is_active" />
                        <input class="form-check-input" <?= $so['is_active'] == '1' ? "checked" : null; ?>
                        type="checkbox" value="1" name="is_active"  id="is_active">
                        <label class="form-check-label" for="is_active">
                            Aktif ?
                        </label>
                        <div class="text-small text-muted mb-0">(ceklis jika ingin ditampilkan) !</div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
      </div>

   