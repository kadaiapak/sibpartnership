<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dafar Mahasiswa</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">Detail Mahasiswa</h2>
                <p class="section-lead">
                Menampilkan detail informasi berkas pendaftaran <?= $mahasiswa->nama_mahasiswa; ?>
                </p>
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-7">
                        <div class="card card-warning">  
                            <table class="table table-striped table-bordered mb-0">
                                <tr>
                                    <td class="font-weight-bold">Nomor Induk Mahasiswa (NIM) / Tahun Masuk</td>
                                    <td><?= $mahasiswa->nim_mahasiswa; ?> / <?= $mahasiswa->tm_msk; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Nama Mahasiswa</td>
                                    <td><?= $mahasiswa->nama_mahasiswa; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Prodi / Jenjang Pendidikan</td>
                                    <td><?= ($mahasiswa->prodi ?? "-"); ?> / <?= $mahasiswa->jjp; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Fakultas</td>
                                    <td><?= ($mahasiswa->fakultas ?? "-"); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Jenis Kelamin</td>
                                    <td><?= ($mahasiswa->jenis_kelamin  == 'P' ? "Perempuan" : ($mahasiswa->jenis_kelamin == 'L' ? 'Laki - Laki' : null)); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">No Hp</td>
                                    <td><?= ($mahasiswa->nohp ?? "-"); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tempat / Tgl Lahir</td>
                                    <td><?= $mahasiswa->tmp_lhr; ?> / <?= $mahasiswa->tgl_lhr; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Agama</td>
                                    <td><?= ($mahasiswa->agama ?? "-"); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tanggal Daftar</td>
                                    <td><?= ($mahasiswa->tanggal_daftar ? $mahasiswa->tanggal_daftar : '') ; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Status Perkuliahan</td>
                                    <td><?= ($cek_aktif == 1 ? "<span class='badge badge-success'>Mahasiswa Aktif</span>" : "<span class='badge badge-warning'>Tidak Aktif</span>"); ?></td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-5">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4 style="font-size: 20px; color: #34395e;">Photo</h4>
                            </div>
                            <div class="card-body">
                                    <div class="chocolat-parent">
                                        <a href="https://cdn.unp.ac.id/portal/<?= $mahasiswa->nim_mahasiswa; ?>.jpg" class="chocolat-image" title="Just an example">
                                            <div>
                                                <img alt="image" src="https://cdn.unp.ac.id/portal/<?= $mahasiswa->nim_mahasiswa; ?>.jpg" class="img-fluid">
                                            </div>
                                        </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"  style="margin-top: -1rem; margin-bottom: 1rem;">
                    <div class="col-xl-2 col-md-2">
                        <?php if($mahasiswa->status_beasiswa == '0') { ?>
                        <form action="<?= base_url('valfakultas/'.$mahasiswa->id_beasiswa.'/'.$mahasiswa->nim_mahasiswa.'/calonkan'); ?>" method="post" id="deleteFormTetapkanCalon" style="display: inline-block;">
                            <button type="submit" class="btn btn-success btn-icon icon-left" id="deleteButtonTetapkanCalon"><i class="fas fa-file-upload"></i>Calonkan</button>
                        </form>
                        <?php } else{ ?>
                        <form action="<?= base_url('valfakultas/'.$mahasiswa->id_beasiswa.'/'.$mahasiswa->nim_mahasiswa.'/batalkan'); ?>" method="post" id="deleteFormBatalkanCalon" style="display: inline-block;">
                            <button type="submit" class="btn btn-danger btn-icon icon-left" id="deleteButtonBatalkanCalon"><i class="fas fa-check-square"></i>Batalkan Pencalonan</button>
                        </form>
                        <?php } ?>

                    </div>
                    <div class="col-xl-2 col-md-2">
                        <a  href="<?= base_url('valfakultas/detail/'.$id_untuk_back); ?>" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i>Kembali</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4 style="color: #34395e; font-size: 20px;">Kelengkapan Berkas Persyaratan Pendaftar :</h4>
                            </div>
                            <div class="card-body">
                                <?php if(count($berkas_pendaftaran) == 0) { ?>
                                <h5>Sedang dalam proses ..</h5>
                                <?php }; ?>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <?php $n = 1; ?>
                                    <?php foreach($berkas_pendaftaran as $b) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?= $n == 1 ? 'active' : ''; ?>" id="profile-tab" data-toggle="tab" href="#b<?= $b['id'] ?>" role="tab" aria-controls="profile"   aria-selected="false">
                                            <?= $b['judul'] ?>
                                        </a>
                                    </li>
                                    <?php $n++; ?>
                                    <?php endforeach ; ?>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <?php $no = 1; ?>
                                    <?php foreach ($berkas_pendaftaran as $b) : ?>
                                    <div class="tab-pane fade <?= $no == 1 ? 'show active' : null; ?>" id="b<?= $b['id'] ?>" role="tabpanel" aria-labelledby="profile-tab">
                                        <object data="<?= base_url('uploads/persyaratan/'.$b['nama_file']); ?>" width="100%" height="380px"></object>
                                    </div> 
                                    <?php $no++ ?>
                                    <?php endforeach ;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>