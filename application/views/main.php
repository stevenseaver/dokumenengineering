    <div class="container mb-3 mt-3 fadeInDown second">
        <h3> Cari Dokumen Produk </h3> 
        <br>
        <!-- <div class="card">
            <h5 class="card-header">Filter Pencarian</h5>
            <div class="card-body">
                <p class="card-text">Gunakan filter otomatis untuk pencarian lebih mudah (belum bisa!!)</p>
                <p class="card-text" style="margin-bottom:0px;">Jenis Produk</p>
                <div class="col-xs-6">
                    <select class='form-control' name='jenis' id=jenis>
                        <option value='0'>SEMUA JENIS</option>
                        <?php
                            $before = '';
                            foreach($viewData as $data){
                                if($before != $data['Jenis Produk']){
                                    $temp = $data['Jenis Produk'];
                                    echo "<option value='{$temp}'>".$temp."</option>";
                                    $before = $temp;
                                }
                            }
                        ?>
                    </select>
                </div><br>
                <p class="card-text" style="margin-bottom:0px;">Nama Produk</p>
                <div class="col-xs-6">
                    <select class='form-control' name='nama' id=nama>
                        <option class='0'>SEMUA TIPE</option>
                        <?php 
                            $before = '';
                            foreach($viewData as $data){
                                $temp1 = $data['Jenis Produk'];
                                $temp2 = $data['Nama Produk'];
                                if ($before != $temp2){
                                    echo "<option value='{$temp2}' class='{$temp1}'>".$temp2."</option>"; 
                                    $before = $temp2;
                                }
                            }
                        ?>
                    </select>
                </div><br>
                <p class="card-text" style="margin-bottom:0px;">Dokumen Produk</p>
                <div class="col-xs-6">
                    <select class='form-control' name='dokumen' id=dokumen>
                        <?php
                            $i = 0;
                            while($i<19){
                                $temp = $viewData[$i]['Dokumen Produk'];
                                echo "<option value='{$temp}'>".$temp."</option>";
                                $before = $viewData[$i]['Dokumen Produk'];
                                $i++;
                            }
                            $j = 0;
                            while($j<4){
                                $temp = $viewDataAnalisis[$j]['Jenis Analisis'];
                                echo "<option value='{$temp}'>".$temp."</option>";
                                $j++;
                            }
                        ?>            
                    </select>
                </div>
            </div>
        </div> -->
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
                        <td><?php echo $s['Dokumen_Produk'] ?></td>
                        <td><?php 
                            $fileName = "Asset/Live/".$s['Jenis_Produk']."/".$s['Nama_Produk']."/".$s['Dokumen_Produk']."_".$s['Nama_Produk'].".pdf";
                            if(file_exists($fileName) == true){
                                echo "<div class='alert alert-success' style='margin-bottom:0px; padding:0px; text-align: center'>OK</div>";
                            }
                            else{
                                echo "<div class='alert alert-danger' style='margin-bottom:0px; padding:0px; text-align: center'>Tidak Tersedia</div>";
                            }
                        ?></td>
                        <td>
                            <a class="badge badge-success disabled" href="<?= base_url().$fileName?>" target = "_blank">Buka</a>
                            <?php 
                                $temp = base_url('index.php/page/hapus_dc/').$s['Jenis_Produk']."/".$s['Nama_Produk']."/".$s['Dokumen_Produk']; 
                            ?>
                            <a class="badge badge-danger" href="<?=urldecode($temp)?>">Hapus</a>
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