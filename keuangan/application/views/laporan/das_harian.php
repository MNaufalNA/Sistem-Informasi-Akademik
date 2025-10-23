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
                        <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_das_harian" method="post">

                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="form-group">
                                        <select class="form-control" type="text" name="tahun_ajaran" required>
                                            <?php echo $combo_tahun_ajaran; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php if ($this->session->userdata("hak_akses") != 'das') { ?>
                                    <div class="col-xs-5">
                                        <div class="form-group">
                                            <select class="form-control" type="text" name="id_user" required>
                                                <?php echo $combo_user; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
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

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header text-right">
                        <a class="btn btn-sm btn-warning" href="<?php echo base_url() . 'laporan/das_harian_excel/' . $id_user . '/' . str_replace("/", "-", $tahun_ajaran); ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                        <button class="btn btn-sm btn-danger" onclick="printDiv('cetak')"><i class="fa fa-print"> </i> Cetak Di Web</button>
                    </div>
                    <!-- /.box-header -->
                    <div id="cetak" class="box-body">

                        <center>
                            <h3 style="margin:0;">SMK FARMASICENDIKIA HUSADA</h3>
                            <h3 style="margin:0;">LAPORAN REALISASI ANGGARAN</h3>
                        </center>
                        <br>
                        <?php foreach ($laporan_das->result_array() as $dt) {

                        ?>
                            <div class="row" style="background:#ccc;">
                                <div class="col-xs-6">
                                    <p style="margin:0;font-weight:bold;"><?php echo $dt['nama'] . ' - ' . $dt['nama_jabatan']; ?></p>
                                    <p style="margin:0;font-weight:bold;"><?php echo $dt['jenis_dana'] . ' - ' . $dt['tahun_ajaran']; ?></p>
                                    <p style="margin:0;font-weight:bold;">Kode Anggaran : <?php echo $dt['no_das']; ?></p>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p style="margin:0;font-weight:bold;">Total Dana : Rp. <?php echo number_format($dt['total_terima']); ?></p>
                                    <p style="margin:0;font-weight:bold;">Terpakai : Rp. <?php echo number_format($dt['total_terima'] - $dt['sisa_saldo']); ?></p>
                                    <p style="margin:0;font-weight:bold;">Sisa Dana : Rp. <?php echo number_format($dt['sisa_saldo']); ?></p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Dana</th>
                                        <th>Rincian Pengeluaran</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Nota </th>
                                        <th>Bku</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total_pengeluaran = 0;
                                    $q = $this->db->query("SELECT * FROM das_user_output 
							 WHERE id_das_user = '$dt[id_das_user]' ORDER BY id_das_user DESC");
                                    foreach ($q->result_array() as $data) {
                                        $total_pengeluaran += $data['jumlah'] ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['jenis_das']; ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                            <td><?php echo 'Rp. ' . number_format($data['jumlah']); ?></td>
                                            <td><?php if ($data['ada_nota'] == '1') echo '<label class="label label-success">Ada</label>';
                                                else echo '<label class="label label-warning">Tidak Ada</label>'; ?></td>
                                            <td><?php if ($data['ada_bku'] == '1') echo '<label class="label label-success">Ada</label>';
                                                else echo '<label class="label label-warning">Tidak Ada</label>'; ?></td>
                                        <?php $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td style="font-weight:bold;text-align:center;" colspan="3">Total</td>
                                        <td style="font-weight:bold;">Rp. <?php echo number_format($total_pengeluaran); ?></td>
                                        <td colspan="2"></td>
                                    </tr>
                            </table>
                            <hr />
                        <?php } ?>
                        <br><br>
                        <?php if($this->session->userdata("hak_akses") == "das") { ?>
                        <div class="col-md-6" style="float:left">
                            <p style="margin:0;">&nbsp;</p>

                            <p style="margin:0;">Mengetahui</p>
                            <br><br><br><br><br>
                            <p style="margin:0;">(Bendahara)</p>
                        </div>
                        <div class="col-md-6" style="float:right">
                            <p style="margin:0;">Bandar Lampung, <?php echo tgl_indo(date("Y-m-d")); ?></p>
                            <p style="margin:0;">Penyelenggara Anggaran</p>
                            <br><br><br><br>
                            <p style="margin:0;"><?php echo $this->session->userdata("nama"); ?></p>
                            <p style="margin:0;">(<?php echo $this->session->userdata("nama_jabatan"); ?>)</p>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->
    </section>
</div>