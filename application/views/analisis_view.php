    <div class="container mb-3 mt-3 fadeInDown second">
        <h3>Dokumen Analisis</h3> 
    
        <?php 
            echo "<h5> {$viewData['Jenis Analisis']}"." "."{$viewData['Nama Produk']}</h5>";
            $dir    = "Asset/Analisis/{$viewData['Jenis Produk']}/{$viewData['Nama Produk']}/{$viewData['Jenis Analisis']}/";
            if(!is_dir($dir))
                mkdir($dir, 0777, TRUE);

            $fileInside = scandir($dir);
            // echo "<br>";
            // print_r($fileInside);
        ?>
        
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <td>Dokumen Analisis</td>
                    <td>Tanggal</td>
                    <td>Remarks</td>
                    <td>Lihat</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $len = count($fileInside);
                    for ($i = 2; $i < $len; $i++) : ?>
                    <tr>
                        <td><?php  
                            echo $fileInside[$i];
                        ?></td>
                        <td>Tanggal</td>
                        <td>Remarks</td>
                        <td><a href="<?= base_url().$dir."{$fileInside[$i]}"?>"target = "_blank"><?php echo "{$fileInside[$i]}"?></a></td>
                    </tr>
                <?php endfor; ?>
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
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ]
            });
        });
    </script>
</body>

</html>