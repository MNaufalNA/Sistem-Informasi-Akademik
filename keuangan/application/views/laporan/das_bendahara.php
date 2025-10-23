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
                        <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_das_bendahara" method="post">

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
                        <a class="btn btn-sm btn-warning" href="<?php echo base_url() . 'laporan/das_bendahara_excel/' . $id_user . '/' . str_replace("/", "-", $tahun_ajaran); ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                        <button class="btn btn-sm btn-danger" onclick="printDiv('cetak')"><i class="fa fa-print"> </i> Cetak Di Web</button>
                    </div>
                    <!-- /.box-header -->
                    <div id="cetak" class="box-body">

                        <center>
                            <h2 style="margin:0;">Laporan DAS</h2>
                        </center>
                        <br>
                        <?php foreach ($laporan_das->result_array() as $dt) {
                            $total = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user_bendahara WHERE id_das_bendahara = '$dt[id_das_bendahara]'")->row();
                            ?>
                            <div class="row" style="background:#ccc;">
                                <div class="col-xs-6">
                                    <p style="margin:0;font-weight:bold;"><?php echo $dt['nama'] . ' - ' . $dt['nama_jabatan']; ?></p>
                                    <p style="margin:0;font-weight:bold;"><?php echo $dt['jenis_dana'] . ' - ' . $dt['tahun_ajaran']; ?></p>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p style="margin:0;font-weight:bold;">Total Dana : Rp. <?php echo number_format($dt['total']); ?></p>
                                    <p style="margin:0;font-weight:bold;">Sisa Dana : Rp. <?php echo number_format($dt['saldo'] - ($total->hitung_terima - $total->hitung)); ?></p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Anggaran</th>
                                        <th>Nama Daftar Anggaran</th>
                                        <th>Anggaran</th>
                                        <th>Terpakai</th>
                                        <th>Sisa Anggaran</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $total_penerimaan = 0;
                                        $total_terpakai = 0;
                                        $sisa_penerimaan = 0;
                                        $q = $this->db->query("SELECT * FROM das_user_bendahara 
							 WHERE id_das_bendahara = '$dt[id_das_bendahara]' ORDER BY id_das_user_bendahara DESC");
                                        foreach ($q->result_array() as $data) {
                                            $total_penerimaan += $data['total_terima'];
                                            $sisa_penerimaan += $data['sisa_saldo'];
                                            $total_terpakai += $data['total_terima'] - $data['sisa_saldo'];
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['no_das']; ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td><?php echo 'Rp. ' . number_format($data['total_terima']); ?></td>
                                            <td><?php echo 'Rp. ' . number_format($data['total_terima'] - $data['sisa_saldo']); ?></td>
                                            <td><?php echo 'Rp. ' . number_format($data['sisa_saldo']); ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                        <?php $no++;
                                            } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td style="font-weight:bold;text-align:center;" colspan="3">Total</td>
                                        <td style="font-weight:bold;">Rp. <?php echo number_format($total_penerimaan); ?></td>
                                        <td style="font-weight:bold;">Rp. <?php echo number_format($total_terpakai); ?></td>
                                        <td style="font-weight:bold;">Rp. <?php echo number_format($sisa_penerimaan); ?></td>
                                        <td></td>
                                    </tr>
                            </table>
                            <hr />
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

        </div>
        <!-- /.row -->
    </section>
</div>