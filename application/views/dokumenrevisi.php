    <div class="container mb-3 mt-3 fadeInDown second">
        <h3> Revisi Dokumen Produk </h3> 
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
                        <td><?php echo $s['Dokumen_Produk'] ?></td>
                        <td><?php 
                            $fileName = "Asset/Revisi/".$s['Jenis_Produk']."/".$s['Nama_Produk']."/".$s['Dokumen_Produk']."_".$s['Nama_Produk'].".".$s['Format_Dokumen'];
                            if(file_exists($fileName) == true){
                                if ($s['Status'] == "ACC"){
                                    echo "<div class='alert alert-success' style='margin-bottom:0px; padding:0px; text-align: center'>OK</div>";
                                    
                                }
                                else if ($s['Status'] == "Revisi"){
                                    echo "<div class='alert alert-danger' style='margin-bottom:0px; padding:0px; text-align: center'>Revisi</div>"; 
                                }
                                else{
                                    echo "<div class='alert alert-primary' style='margin-bottom:0px; padding:0px; text-align: center'>Tunggu ACC</div>";
                                }
                            }
                            else{
                                echo "<div class='alert alert-secondary' style='margin-bottom:0px; padding:0px; text-align: center'>Tidak Tersedia</div>";
                            }
                        ?></td>
                        <td>
                            <a class="badge badge-success" href="<?= base_url().$fileName?>" target = "_blank">Buka</a>
                            <a class="badge badge-danger" data-toggle="modal" data-target="#modalHapusDc" style="color:white" href="">Hapus</a>
                            <div class="modal fade" id="modalHapusDc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Awas!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Anda akan menghapus file analisis. Lanjutkan?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-dismiss="modal">Batalkan</button>
                                            <a href="<?= base_url('index.php/page/hapus_revisi/').$s['Jenis_Produk']."/".$s['Nama_Produk']."/".$s['Dokumen_Produk']."/".$s['Format_Dokumen']?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>  
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