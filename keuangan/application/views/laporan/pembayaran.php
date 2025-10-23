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
                        <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_pembayaran" method="post">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Dari Tanggal</label>
                                        <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input class="form-control tglcalendar" type="text" name="tgl_awal" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $tgl_awal; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Sampai Tanggal</label>
                                        <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input class="form-control tglcalendar" type="text" name="tgl_akhir" readonly="readonly" placeholder="Sampai Tanggal" value="<?php echo $tgl_akhir; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <input id="cari-siswa" class="form-control" type="text" name="nis" placeholder="Cari Siswa">
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        <select class="form-control" type="text" name="id_kelas">
                                            <?php echo $combo_kelas; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="angkatan" placeholder="Angkatan">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <select class="form-control" type="text" name="id_jenis_pembayaran">
                                            <?php echo $combo_jenis_pembayaran; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <button class="btn btn-primary"><i class="fa fa-search"> </i> Tampilkan Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                </div>
                <!-- /.box -->
            </div>

            <?php if (!empty($pembayaran_bulanan) && !empty($pembayaran_bebas)) { ?>
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header text-right">
                            <a class="btn btn-warning" href="<?php echo base_url() . 'laporan/pembayaran_excel/' . $tgl_awal . '/' . $tgl_akhir . '/' . $id_jenis_pembayaran . '/' . $kelas . '/' . $nis . '/' . $angkatan; ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                            <button class="btn btn-sm btn-danger" onclick="printDiv('cetak')"><i class="fa fa-print"> </i> Cetak Di Web</button>
                        </div>
                        <!-- /.box-header -->
                        <div id="cetak" class="box-body">

                            <center>
                                <h2 style="margin:0;">Laporan Pembayaran Siswa </h2>
                                <p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
                            </center>
                            <br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Pembayaran</th>
                                        <th>Tagihan</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $total_tagihan = 0;
                                        $total_bayar = 0;
                                        $no = 1;
                                        foreach ($pembayaran_bulanan->result_array() as $data) {
                                            $total_tagihan += $data['tagihan'];
                                            $total_bayar += $data['bayar'];
                                            ?>

                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nama_kelas']; ?></td>
                                            <td><?php echo $data['nis']; ?></td>
                                            <td><?php echo $data['nama_siswa']; ?></td>
                                            <td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran'] . ' - ' . $data['bulan']; ?></td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['tagihan']); ?></td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['bayar']); ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                        </tr>
                                    <?php $no++;
                                        } ?>

                                    <?php
                                        foreach ($pembayaran_bebas->result_array() as $data) {
                                            $total_tagihan += $data['tagihan'];
                                            $total_bayar += $data['bayar'];
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nama_kelas']; ?></td>
                                            <td><?php echo $data['nis']; ?></td>
                                            <td><?php echo $data['nama_siswa']; ?></td>
                                            <td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['tagihan']); ?></td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['bayar']); ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                        </tr>
                                    <?php $no++;
                                        } ?>

                                    <tr>
                                        <td style="text-align:center;font-weight:bold;" colspan="5">Total</td>
                                        <td style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total_tagihan); ?></td>
                                        <td style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total_bayar); ?></td>
                                    </tr>
                                </tbody>
                            </table>
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