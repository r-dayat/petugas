<?php
    require "../views/functions.php";
    $keyword = $_GET["keyword"];
    $query = "SELECT d.tglberobat, a.nik, a.nama, b.nama_gender, a.alamat, c.nama_faskes, d.keluhan
                FROM tb_pasien a
                JOIN ms_gender b ON a.gender = b.id_gender
                JOIN ms_namafaskes c ON a.nama_faskes = c.id_namafaskes
                JOIN tb_berobat d ON a.nik = d.nik
                WHERE a.nik LIKE '%$keyword%' OR a.nama LIKE '%$keyword%'
                ORDER BY d.tglberobat DESC
                ";

    
    $pasien = query($query);



?>


<div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Berobat</th>
                                        <th>NIK Pasien</th>
                                        <th>Nama Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Nama Faskes</th>
                                        <th>Keluhan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php $i=1; ?>
                                    <?php foreach($pasien as $row) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row["tglberobat"] ?></td>
                                        <td><?php echo $row["nik"] ?></td>
                                        <td><?php echo $row["nama"] ?></td>
                                        <td><?php echo $row["nama_gender"] ?></td>
                                        <td><?php echo $row["alamat"] ?></td>
                                        <td><?php echo $row["nama_faskes"] ?></td>
                                        <td><?php echo $row["keluhan"] ?></td>
                                    </tr>
                                    <?php $i++;?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>