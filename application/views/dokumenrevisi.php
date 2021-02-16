<div class="container mb-3 mt-3 fadeInDown second">
        <h3> Revisi Dokumen  Produk </h3> 
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
                        <td><?php echo $s['Jenis Produk'] ?></td>
                        <td><?php echo $s['Nama Produk'] ?></td>
                        <td><a href="<?= base_url()."Asset/Revisi/".$s['Jenis Produk']."/".$s['Nama Produk']."/".$s['Dokumen Produk']."_".$s['Nama Produk'].".".$s['Format Dokumen']?>"><?php echo $s['Dokumen Produk'] ?></a></td>
                        <td><?php 
                            $fileName = "Asset/Revisi/".$s['Jenis Produk']."/".$s['Nama Produk']."/".$s['Dokumen Produk']."_".$s['Nama Produk'].".".$s['Format Dokumen'];
                            if(file_exists($fileName) == true){
                                echo "<div class='alert alert-primary' style='margin-bottom:0px; padding:0px; text-align: center'>OK</div>";
                            }
                            else{
                                echo "<div class='alert alert-danger' style='margin-bottom:0px; padding:0px; text-align: center'>Not Available</div>";
                            }
                        ?></td>
                        <td>ACC/TIDAK</td>
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