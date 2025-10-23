<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Siswa</a></li>
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
                        <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_jurnal" method="post">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input class="form-control tglcalendar" type="text" name="tgl_awal" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $tgl_awal; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input class="form-control tglcalendar" type="text" name="tgl_akhir" readonly="readonly" placeholder="Sampai Tanggal" value="<?php echo $tgl_akhir; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <button class="btn btn-primary"><i class="fa fa-search"> </i> Tampilkan Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                </div>
                <!-- /.box -->
            </div>

            <?php if (!empty($penerimaan) && !empty($pengeluaran)) { ?>
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header text-right">
                            <a class="btn btn-warning" href="<?php echo base_url() . 'laporan/jurnal_excel/' . $tgl_awal . '/' . $tgl_akhir; ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                            <button class="btn btn-sm btn-danger" onclick="printDiv('cetak')"><i class="fa fa-print"> </i> Cetak Di Web</button>
                        </div>
                        <!-- /.box-header -->
                        <div id="cetak" class="box-body">

                            <center>
                                <h2 style="margin:0;">Laporan Jurnal Umum </h2>
                                <p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
                            </center>
                            <br>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Penerimaan</th>
                                        <th>Pengeluaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $total_penerimaan = 0;
                                        $total_pengeluaran = 0;
                                        foreach ($penerimaan->result_array() as $data) {
                                            $total_penerimaan += $data['jumlah'];
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['jumlah']); ?></td>
                                            <td style="text-align:right;">-</td>
                                        </tr>
                                    <?php $no++;
                                        } ?>

                                    <?php
                                        foreach ($pengeluaran->result_array() as $data) {
                                            $total_pengeluaran += $data['jumlah'];
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td style="text-align:right;">-</td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['jumlah']); ?></td>
                                        </tr>
                                    <?php $no++;
                                        } ?>
                                        <tr>
                                        <td style="text-align:center;font-weight:bold;" colspan="3">Total</td>
                                        <td style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total_penerimaan); ?></td>
                                        <td style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total_pengeluaran); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                            <p style="margin:0;">Bandar Lampung, <?php echo tgl_indo(date("Y-m-d")); ?>)</p>
                            <p style="margin:0;">Mengetahui</p>
                            <br><br><br><br><br>
                            <p style="margin:0;">(___________________)</p>
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