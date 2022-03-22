<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Keterangan</h2>
            <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                    <p class="section-lead">
                        Inputkan data mengenai beasiswa yang nantinya akan digunakan sebagai master data beasiswa dalam proses upload data mahasiswa penerima beasiswa tersebut.
                    </p>
                </div>  
            </div>
            
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card card-warning">

                        <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 text-center mt-3 mb-2">
                                        <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                                            <h2 id="heading">Isi Data Yang Dibutuhkan</h2>
                                            <p>Pastikan semua data yang anda isi sesuai</p>
                                            <form id="msform" action="" method="post" enctype="multipart/form-data">
                                                <ul id="progressbar">
                                                    <li class="active" id="account"><strong>Rincian</strong></li>
                                                    <li id="personal"><strong>Proses</strong></li>
                                                </ul>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> <br> 
                                                <fieldset>
                                                    <div class="form-card">
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <h2 class="fs-title">Keterangan Beasiswa:</h2>
                                                            </div>
                                                            <div class="col-5">
                                                                <h2 class="steps">Step 1 - 2</h2>
                                                            </div>
                                                        </div> 

                                                        <div class="form-group row mb-4">
                                                            <label>Pilih Nama Beasiswa : </label>
                                                            <select class="form-control <?= form_error('nama_beasiswa') ? 'is-invalid' : null ; ?>" name="nama_beasiswa" id="nama_beasiswa">
                                                                <option value="" selected>Pilih beasiswa</option>
                                                                <?php foreach ($nama_beasiswa as $nb) :?>
                                                                    <option value="<?= $nb['id']; ?>" <?= $nb['id'] ==  set_value('nama_beasiswa') ? "selected" : ""; ?>><?= $nb['nama_beasiswa']; ?></option>   
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('nama_beasiswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>

                                                        <div class="form-group row mb-4">
                                                             <label>Pilih Kelompok Beasiswa: </label>
                                                            <select class="form-control <?= form_error('kelompok_beasiswa') ? 'is-invalid' : null ; ?>" name="kelompok_beasiswa" id="kelompok_beasiswa">
                                                                <option value="" selected>Kelompok</option>
                                                                <?php foreach ($kelompok_beasiswa as $kb) :?>
                                                                    <option value="<?= $kb['id']; ?>" <?= $kb['id'] == set_value('kelompok_beasiswa') ? 'selected' : null ; ?>><?= $kb['nama_kelompok']; ?></option>   
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('kelompok_beasiswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>

                                                        <div class="form-group row mb-4">
                                                            <label>Pilih Jenis Beasiswa: </label>
                                                            <select class="form-control <?= form_error('jenis_beasiswa') ? 'is-invalid' : null ; ?>" name="jenis_beasiswa" id="jenis_beasiswa">
                                                                <option value="" selected>Jenis</option>
                                                                <?php foreach ($jenis_beasiswa as $jb) :?>
                                                                    <option value="<?= $jb['id']; ?>" <?= $jb['id'] == set_value('jenis_beasiswa') ? 'selected' : null ; ?>><?= $jb['nama_jenis']; ?></option>   
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('jenis_beasiswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>

                                                        <div class="form-group row mb-4">
                                                            <label>Pilih Sumber Dana: </label>
                                                            <select class="form-control <?= form_error('asal_beasiswa') ? 'is-invalid' : null; ?>" name="asal_beasiswa" id="asal_beasiswa">
                                                                <option value="" selected>Sumber</option>
                                                                <?php foreach ($asal_beasiswa as $ab) :?>
                                                                    <option value="<?= $ab['id']; ?>" <?= $ab['id'] == set_value('asal_beasiswa') ? "selected" : null; ?>><?= $ab['nama_asal_beasiswa']; ?></option>   
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('asal_beasiswa', '<small class="text-danger pl-3">','</small>'); ?>
                                                        </div>

                                                        <div class="form-group row mb-4">
                                                            <label>Besaran bantuan: </label>
                                                            <input type="number" id="biaya" name="biaya" placeholder="Besar bantuan ..."
                                                            class="form-control <?= form_error('biaya') ? 'is-invalid' : (set_value('biaya') ? 'is-valid' : null); ?>"
                                                            value="<?= set_value('biaya'); ?>">
                                                            <div class="text-small text-muted mb-1">(masukkan angka).</div>
                                                            <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>'); ?> 
                                                        </div>       
                                                        
                                                        <div class="form-group row mb-4">
                                                            <label>Metode pembayaran: </label>
                                                            <input type="text" id="metode_pembayaran" name="metode_pembayaran" placeholder="Metode pembayaran ..."
                                                            class="form-control <?= form_error('metode_pembayaran') ? 'is-invalid' : (set_value('metode_pembayaran') ? 'is-valid' : null); ?>"
                                                            value="<?= set_value('metode_pembayaran'); ?>">
                                                            <?= form_error('metode_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>

                                                        <div class="form-group row mb-4">
                                                           <label>Periode Penerimaan: </label>
                                                            <select class="form-control <?= form_error('periode') ? 'is-invalid' : null; ?>" name="periode" id="periode">
                                                                <option value="" selected>Periode</option>
                                                                <?php foreach ($periode as $p) :?>
                                                                    <option value="<?= $p['id']; ?>" <?= $p['id'] == set_value('periode') ? "selected" : null; ?>><?= $p['nama']; ?></option>   
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            <?= form_error('periode', '<small class="text-danger pl-3">','</small>'); ?>
                                                        </div>

                                                        <div class="form-group row mb-4">
                                                            <label>Tahun Penerimaan: </label>
                                                            <input type="number" id="tahun" name="tahun" placeholder="Tahun ..."
                                                            class="form-control <?= form_error('tahun') ? 'is-invalid' : (set_value('tahun') ? 'is-valid' : null) ; ?>"
                                                            value="<?= set_value('tahun'); ?>">
                                                            <div class="text-small text-muted mb-1">(masukkan angka).</div>
                                                            <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>  
                                                        </div>
                                                    </div> 
                                                    <input type="button" name="next" class="next action-button" value="Next" />
                                                    <a href="<?= base_url('mbeasiswa/master_beasiswa'); ?>" class="btn btn-danger action-button" style="background-color: red;"  ><i class="fas fa-arrow-left mr-1"></i>Kembali</a>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <h2 class="fs-title">Proses Pendaftaran :</h2>
                                                            </div>
                                                            <div class="col-5">
                                                                <h2 class="steps">Step 2 - 2</h2>
                                                            </div>
                                                        </div> 
                                                            <div class="form-group row mb-4">
                                                                <label>Kuota Pendaftaran : </label>
                                                                <input type="number" id="kuota_pendaftaran" name="kuota_pendaftaran" placeholder="Kuota Pendaftaran ..."
                                                                class="form-control <?= form_error('kuota_pendaftaran') ? 'is-invalid' : (set_value('kuota_pendaftaran') ? 'is-valid' : null) ; ?>">
                                                                <?= form_error('kuota_pendaftaran', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </div>
                                                            <div class="form-group row mb-4">
                                                                <label>Kuota Penetapan : </label>
                                                                <input type="number" id="kuota_penetapan" name="kuota_penetapan" placeholder="Kuota Penetapan ..."
                                                                class="form-control <?= form_error('kuota_penetapan') ? 'is-invalid' : (set_value('kuota_penetapan') ? 'is-valid' : null) ; ?>">
                                                                <?= form_error('kuota_penetapan', '<small class="text-danger pl-3">', '</small>'); ?>  
                                                            </div>

                                                            <div class="form-group row mb-4">
                                                                <label>Tanggal Penetapan</label>
                                                                <input type="text" class="form-control datepicker" name='tanggal_penetapan'>
                                                                <div class="text-small text-muted mb-1">(cek dan pastikan kembali tanggal penetapan sudah benar) !</div>
                                                            </div>

                                                            <div class="form-group row mb-4">
                                                                <label>Minimal IPK : </label>
                                                                <input type="text" id="min_ipk" name="min_ipk" placeholder="Kuota Penetapan ..."
                                                                class="form-control <?= form_error('min_ipk') ? 'is-invalid' : (set_value('min_ipk') ? 'is-valid' : null) ; ?>"
                                                                <?= form_error('min_ipk', '<small class="text-danger pl-3">', '</small>'); ?> >
                                                            </div>
                                                            <div class="form-group row mb-4">
                                                               <label>Tanggal Buka Pendaftaran</label>
                                                                <input type="datetime-local" class="form-control" name='tgl_awal_pendaftaran'>
                                                                <div class="text-small text-muted mb-1">tanggal dibukanya proses pendaftaran beasiswa bagi mahasiswa <br>(cek dan pastikan kembali tanggal sudah benar) !</div>
                                                            </div>
                                                            <div class="form-group row mb-4">
                                                               <label>Tanggal Tutup Pendaftaran</label>
                                                                <input type="datetime-local" class="form-control" name='tgl_tutup_pendaftaran'>
                                                                <div class="text-small text-muted mb-1">tanggal ditutupnya proses pendaftaran beasiswa bagi mahasiswa <br>(cek dan pastikan tanggal kembali sudah benar) !</div>
                                                            </div>
                                                            <div class="form-group row mb-4">
                                                                   <label>Tanggal Dimulai Penetapan</label>
                                                                    <input type="datetime-local" class="form-control" name='tgl_awal_penetapan'>
                                                                    <div class="text-small text-muted mb-1">tanggal awal dilakukannya proses penetapan beasiswa bagi mahasiswa <br>(cek dan pastikan kembali tanggal sudah benar) !</div>
                                                            </div>
                                                            <div class="form-group row mb-4">
                                                                   <label>Batas Akhir Penetapan</label>
                                                                    <input type="datetime-local" class="form-control" name='tgl_tutup_penetapan'>
                                                                    <div class="text-small text-muted mb-1">tanggal ditutupnya proses penetapan beasiswa bagi mahasiswa <br>(cek dan pastikan kembali tanggal sudah benar) !</div>
                                                            </div>

                                                            <div class="form-group row mb-4">
                                                                <div class="form-check">
                                                                <input type="hidden" name="is_active" value="0" id="is_active" />
                                                                <input class="form-check-input" type="checkbox" value="1" name="is_active"  id="is_active">
                                                                <label class="form-check-label" for="is_active">
                                                                    Aktif ?
                                                                </label>
                                                                <div class="text-small text-muted mb-1">(ceklis jika ingin diaktifkan) !</div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-4">
                                                                <div class="form-check">
                                                                <input type="hidden" name="is_show" value="0" id="is_show" />
                                                                <input class="form-check-input" type="checkbox" value="1" name="is_show"  id="is_show">
                                                                <label class="form-check-label" for="is_show">
                                                                    Tampilkan ?
                                                                </label>
                                                                <div class="text-small text-muted mb-1">(ceklis jika ingin ditampilkan) !</div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-4">
                                                                <div class="form-check">
                                                                <input type="hidden" name="is_buka_pendaftaran" value="0" id="is_buka_pendaftaran" />
                                                                <input class="form-check-input" type="checkbox" value="1" name="is_buka_pendaftaran"  id="is_buka_pendaftaran">
                                                                <label class="form-check-label" for="is_buka_pendaftaran">
                                                                    Buka Pendaftaran ?
                                                                </label>
                                                                <div class="text-small text-muted mb-0">(ceklis jika proses pencalonan dilakukan oleh masing masing fakultas) !</div>
                                                                <div class="text-small text-muted mb-1">(fitur ini nantinya akan digunakan untuk proses pencalonan beasiswa dari fakultas) !</div>
                                                                </div>
                                                            </div>
                                
                                                        </div> 
                                                    <button id="msbutton" type="submit" class="action-button">Daftar</button>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
  $(document).ready(function () {
  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  var current = 1;
  var steps = $("fieldset").length;

  setProgressBar(current);

  $(".next").click(function () {
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate(
      { opacity: 0 },
      {
        step: function (now) {
          // for making fielset appear animation
          opacity = 1 - now;

          current_fs.css({
            display: "none",
            position: "relative",
          });
          next_fs.css({ opacity: opacity });
        },
        duration: 500,
      }
    );
    setProgressBar(++current);
  });

  $(".previous").click(function () {
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //Remove class active
    $("#progressbar li")
      .eq($("fieldset").index(current_fs))
      .removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate(
      { opacity: 0 },
      {
        step: function (now) {
          // for making fielset appear animation
          opacity = 1 - now;

          current_fs.css({
            display: "none",
            position: "relative",
          });
          previous_fs.css({ opacity: opacity });
        },
        duration: 500,
      }
    );
    setProgressBar(--current);
  });

  function setProgressBar(curStep) {
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar").css("width", percent + "%");
  }

  $(".submit").click(function () {
    return false;
  });
});
</script>