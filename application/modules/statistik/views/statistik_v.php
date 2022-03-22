    
      <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1 card-warning">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total User</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->fungsi->count_user(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1 card-warning">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Beasiswa</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->fungsi->count_masterBeasiswa(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1 card-warning">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Penerima Beasiswa</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->fungsi->count_totalPenerima(); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php foreach($this->fungsi->count_totalProdi() as $ct) {?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1 card-warning">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4><?= $ct->prodi; ?></h4>
                  </div>  
                  <div class="card-body">
                    <?= $ct->total_prodi; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </section>
      </div>
      
  