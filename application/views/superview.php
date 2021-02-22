<div class="container mb-3 mt-3 fadeInDown second">
        <h3> Supervisi Revisi Dokumen Produk </h3> 
        <br>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <td>Jenis Produk</td>
                    <td>Nama Produk</td>
                    <td>Dokumen Produk</td>
                    <td>Status</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewData as $s) : ?>
                    <tr>
                        <td><?php echo $s['Jenis_Produk'] ?></td>
                        <td><?php echo $s['Nama_Produk'] ?></td>
                        <td><a href="<?= base_url()."Asset/Revisi/".$s['Jenis_Produk']."/".$s['Nama_Produk']."/".$s['Dokumen_Produk']."_".$s['Nama_Produk'].".".$s['Format_Dokumen']?>"><?php echo $s['Dokumen_Produk'] ?></a></td>
                        <td><?php
                            $statusREVISI = "Revisi";
                            $statusACC = "ACC"; 
                            $fileName = "Asset/Revisi/".$s['Jenis_Produk']."/".$s['Nama_Produk']."/".$s['Dokumen_Produk']."_".$s['Nama_Produk'].".".$s['Format_Dokumen'];
                            if(file_exists($fileName) == true){
                                if ($s['Status'] == "ACC"){
                                    echo "<div class='alert alert-success' style='margin-bottom:0px; padding:0px; text-align: center'>OK</div>";
                                    
                                }
                                else if ($s['Status'] == "Revisi"){
                                    echo "<div class='alert alert-danger' style='margin-bottom:0px; padding:0px; text-align: center'>Revisi</div>"; 
                                }
                                else{
                                    echo "<div class='alert alert-primary' style='margin-bottom:0px; padding:0px; text-align: center'>Menunggu ACC</div>";
                                }
                            }
                            else{
                                echo "<div class='alert alert-secondary' style='margin-bottom:0px; padding:0px; text-align: center'>Tidak Tersedia</div>";
                            }
                        ?></td>
                        <td>
                            <a class="badge badge-success" href="<?=base_url('index.php/page/accdatabase/').$s['Jenis_Produk']."/".$s['Nama_Produk']."/".$s['Dokumen_Produk']."/".$statusACC?>">ACC</a>
                            <a class="badge badge-danger" href="<?=base_url('index.php/page/accdatabase/').$s['Jenis_Produk']."/".$s['Nama_Produk']."/".$s['Dokumen_Produk']."/".$statusREVISI?>">Revisi</a> 
                            <?php 
                                if ($s['Status'] == "ACC"){ 
                                    echo "<a class='badge badge-warning' href='#'>Pindah ke DC</a>";
                                }
                                else{
                                    echo "<a class='badge badge-light disabled' href='#'>Pindah ke DC</a>";
                                }
                            ?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var temp1 = $('#jenis').val();
            var temp2 = $('#nama').val();
            var temp3 = $('#dokumen').val();

            var table = $('#example').DataTable({
                lengthMenu: [
                    [19, 38, 50, -1],
                    [19, 38, 50, 'All']
                ],
            });
            
            var $jenis = $("#jenis"), $nama = $("#nama"),
            $options = $nama.find("option");

            $jenis.on("change", function () {
                $nama.html($options.filter('[class="' + this.value + '"]'));
            }).trigger("change");
        });
    </script>
</body>

</html>