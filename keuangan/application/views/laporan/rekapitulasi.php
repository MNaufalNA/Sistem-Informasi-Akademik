<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Laporan</a></li>
            <li class="active"><?php echo $judul; ?></li>
        </ol>
    </section>
    <section class="content">
        <!-- Main row -->
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h4>Cari Berdasarkan </h4>
                    </div>
                    <div class="box-body">
                        <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_rekapitulasi" method="post">

                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <select class="form-control" type="text" name="tahun_ajaran" required>
                                            <?php echo $combo_tahun_ajaran; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <select class="form-control" type="text" name="id_kelas" required>
                                            <?php echo $combo_kelas; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <select class="form-control" type="text" name="id_jenis_pembayaran" required>
                                            <?php echo $combo_jenis_pembayaran; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <button class="btn btn-primary"><i class="fa fa-search"> </i> Tampilkan Data</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                </div>
                <!-- /.box -->
            </div>

            <?php if (!empty($rekapitulasi)) { ?>
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header text-right">
                            <a class="btn btn-warning" href="<?php echo base_url() . 'laporan/rekapitulasi_excel/' . str_replace("/", "-", $tahun_ajaran) . '/' . $kelas . '/' . $id_jenis_pembayaran; ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                            <button class="btn btn-sm btn-danger" onclick="printDiv('cetak')"><i class="fa fa-print"> </i> Cetak Di Web</button>
                        </div>
                        <!-- /.box-header -->
                        <div id="cetak" class="box-body">

                            <center>
                                <h2 style="margin:0;">Laporan Rekapitulasi</h2>
                                <h3 style="margin:0;"><?php echo $nama_pos . ' - ' . $tahun_ajaran; ?></h3>
                            </center>
                            <br>
                            <?php
                                if ($tipe_pembayaran == 'Bulanan') {
                                    $q_bulan = $this->db->query("SELECT bulan FROM pembayaran_bulanan WHERE id_jenis_pembayaran = '$id_jenis_pembayaran' GROUP BY bulan ORDER BY id_pembayaran_bulanan");
                                    ?>
                                <div style="overflow-x:scroll">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kelas</th>
                                                <th>Nama</th>
                                                <?php foreach ($q_bulan->result_array() as $d_bulan) { ?>
                                                    <th><?php echo $d_bulan['bulan']; ?></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $no = 1;
                                                    foreach ($rekapitulasi->result_array() as $data) {

                                                        $q_tagihan = $this->db->query("SELECT bayar FROM pembayaran_bulanan WHERE id_jenis_pembayaran = '$id_jenis_pembayaran' AND id_siswa = $data[id_siswa] GROUP BY bulan ORDER BY id_pembayaran_bulanan");
                                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td>
                                                        <div style="width:100px;"><?php echo $data['nama_kelas']; ?></div>
                                                    </td>
                                                    <td>
                                                        <div style="width:200px;"><?php echo $data['nama_siswa']; ?></div>
                                                    </td>
                                                    <?php foreach ($q_tagihan->result_array() as $d_tagihan) {
                                                                    if ($d_tagihan['bayar'] > 0) {
                                                                        $style = "style='background:green;color:#fff;'";
                                                                    } else {
                                                                        $style = "style='background:red;color:#fff;'";
                                                                    }
                                                                    ?>
                                                        <td <?php echo $style; ?>>
                                                            <div style="width:70px;">Rp. <?php echo number_format($d_tagihan['bayar']); ?></div>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php $no++;
                                                    } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else { ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Nama</th>
                                            <th>Total Tagihan</th>
                                            <th>Total Bayar</th>
                                            <th>Sisa Tagihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $no = 1;
                                                foreach ($rekapitulasi->result_array() as $data) {
                                                    $bayar = $this->db->query("SELECT COALESCE(SUM(bayar),0) as hitung FROM pembayaran_bebas_dt WHERE id_pembayaran_bebas = $data[id_pembayaran_bebas]")->row();

                                                    if ($bayar->hitung >= $data['tagihan']) {
                                                        $style = "style='background:green;color:#fff;'";
                                                    } else {
                                                        $style = "style='background:red;color:#fff;'";
                                                    }
                                                    ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['nama_kelas']; ?></td>
                                                <td><?php echo $data['nama_siswa']; ?></td>
                                                <td <?php echo $style; ?>><?php echo 'Rp. ' . number_format($data['tagihan']); ?></td>
                                                <td <?php echo $style; ?>><?php echo 'Rp. ' . number_format($bayar->hitung); ?></td>
                                                <td <?php echo $style; ?>><?php echo 'Rp. ' . number_format($data['tagihan'] - $bayar->hitung); ?></td>
                                            <?php $no++;
                                                    } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <br><br>
                            <div class="col-md-6" style="float:left">
                                <p style="margin:0;">Bandar Lampung, <?php echo tgl_indo(date("Y-m-d")); ?>)</p>
                                <p style="margin:0;">Mengetahui</p>
                                <br><br><br><br><br>
                                <p style="margin:0;">(Bendahara)</p>
                            </div>
                            <div class="col-md-6" style="float:right">
                                <p style="margin:0;">&nbsp;</p>
                                <p style="margin:0;">&nbsp;</p>
                                <br><br><br><br>
                                <p style="margin:0;"><?php echo $this->session->userdata("nama"); ?></p>
                                <p style="margin:0;">(<?php echo $this->session->userdata("nama_jabatan"); ?>)</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            <?php } ?>

        </div>
        <!-- /.row -->
    </section>
</div>

<script>
    $('#cari-siswa').typeahead({
        source: function(query, result) {
            $.ajax({
                url: "<?php echo base_url(); ?>pembayaran/ajax_siswa",
                data: 'query=' + query,
                dataType: "json",
                type: "POST",
                success: function(data) {
                    result($.map(data, function(item) {
                        return item;
                    }));
                }
            });
        }
    });
</script>