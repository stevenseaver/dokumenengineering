    <div class="container mb-3 mt-3 fadeInDown second">
        <h3> Cari Dokumen Produk </h3> 
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <td>Jenis Produk</td>
                    <td>Nama Produk</td>
                    <td>Dokumen Produk</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewData as $s) : ?>
                    <tr>
                        <td><?php echo $s['Jenis Produk'] ?></td>
                        <td><?php echo $s['Nama Produk'] ?></td>
                        <td><a href="<?= base_url()."Asset/".$s['Jenis Produk']."/".$s['Nama Produk']."/".$s['Dokumen Produk'].".pdf"?>" target = "_blank"><?php echo $s['Dokumen Produk'] ?></a></td>
                        <td><?php 
                            $fileName = "Asset/".$s['Jenis Produk']."/".$s['Nama Produk']."/".$s['Dokumen Produk'].".pdf";
                            if(file_exists($fileName) == true){
                                echo "<div class='alert alert-success' style='margin-bottom:0px; padding:0px; text-align: center'>OK</div>";
                            }
                            else{
                                echo "<div class='alert alert-danger' style='margin-bottom:0px; padding:0px; text-align: center'>Not Available</div>";
                            }
                        ?></td>
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
            $('#example').DataTable({
                lengthMenu: [
                    [19, 38, 50, -1],
                    [19, 38, 50, 'All']
                ]
            });
        });
    </script>
</body>

</html>