      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          <div id="flash" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
          <div class="row">

            <div class="col-lg-10 col-md-10">
              <?= form_error('pekerjaan_ayah', '<div class="alert alert-danger mb-4" role="alert">', '</div>'); ?>
              <?= form_error('point_penilaian', '<div class="alert alert-danger mb-4" role="alert">', '</div>'); ?>
              <div class="card card-warning">
                <div class="card-header">
                  <h4 style="font-size: 20px; color: #34395e;">Daftar Jenis Pekerjaan Ayah</h4>
                  <div class="card-header-action">
                    <?php if($cek_akses_user['tambah'] == '1') { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pekerjaanAyahModal">
                      Tambah Jenis Pekerjaan Ayah
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
                          <th>Jenis Pekerjaan Ayah</th>
                          <th>Point</th>
                          <th>Aktif</th>
                          <?php if($cek_akses_user['edit'] == '1' || $cek_akses_user['hapus'] == '1') { ?>
                          <th>Aksi</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pekerjaan_ayah as $pa) : ?>
                            <tr>
                              <td><?= $i; ?></td>
                              <td><?= $pa['nama_pekerjaan']; ?></td>
                              <td><?= $pa['point_penilaian']; ?></td>
                              <td><?= $pa['is_active'] == 1 ? "<span class='badge badge-success'>Aktif</span>" : "<span class='badge badge-danger'>Tidak</span>" ?></td>
                              <?php if($cek_akses_user['edit'] == '1' || $cek_akses_user['hapus'] == '1') { ?>
                              <td>
                                <?php if($cek_akses_user['edit'] == '1') { ?>
                                <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-toggle="modal" title="Edit" data-target="#editPekerjaanAyahModal<?= $pa['id']; ?>"><i class="fas fa-pencil-alt" ></i></button>
                                <?php } ?>
                                <?php if($cek_akses_user['hapus'] == '1') { ?>
                                <form style="display: inline-block;" action="<?= base_url('mbeasiswa/pekerjaan_ayah/hapus'); ?>" method="post">
                                <input 
                                name="pekerjaan_ayah_id"
                                type="hidden" 
                                value="<?= $pa['id']; ?>">    
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
          <div class="modal fade" id="pekerjaanAyahModal" tabindex="-1" role="dialog" aria-labelledby="pekerjaanAyahModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="pekerjaanAyahModalLabel">Masukkan Jenis Pekerjaan Ayah</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="<?= base_url('mbeasiswa/pekerjaan_ayah');?>" method="post">

                  <div class="modal-body">
                    <div class="form-group">
                      <textarea style="resize: none; display: block; height: 200px;" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan"rows="2" cols="10" placeholder="Tuliskan Pekerjaan ..."></textarea>
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
          <?php foreach ($pekerjaan_ayah as $pa) : $no++ ?>
          <div class="modal fade" id="editPekerjaanAyahModal<?= $pa['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editPekerjaanAyahModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editPekerjaanAyahModalLabel">Edit Pekerjaan Ayah</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="<?= base_url('mbeasiswa/pekerjaan_ayah/edit');?>" method="post">

                <input type="hidden" name="id" value="<?= $pa['id']; ?>">
                  <div class="modal-body">
                    <div class="form-group">
                      <textarea  style="resize: none; display: block; height: 200px;" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" rows="2" cols="40" placeholder="Tuliskan Pekerjaan ..."><?= $pa['nama_pekerjaan']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <input value="<?= $pa['point_penilaian']; ?>" type="text" class="form-control" id="point_penilaian" name="point_penilaian" placeholder="Point Penilaian ...">
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input type="hidden" name="is_active" value="0" id="is_active" />
                        <input class="form-check-input" <?= $pa['is_active'] == '1' ? "checked" : null; ?>
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

   