    <div class="container mb-3 mt-3 fadeInDown second">
        <h3> Analisis Produk </h3> 
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <td>Jenis Produk</td>
                    <td>Nama Produk</td>
                    <td>Jenis Analisis</td>
                    <td>Keterangan</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewData as $s) : ?>
                    <tr>
                        <td><?php echo $s['Jenis_Produk'] ?></td>
                        <td><?php echo $s['Nama_Produk'] ?></td>
                        <td><a href="/dokumenengineering/index.php/page/analisis_view/<?= $s['Id'] ?>"><?php echo $s['Jenis_Analisis'];?></a></td>
                        <td>
                            <?php
                                $dir = "Asset/Analisis/{$s['Jenis_Produk']}/{$s['Nama_Produk']}/{$s['Jenis_Analisis']}/";
                                if(!is_dir($dir)){
                                    mkdir($dir, 0777, TRUE);
                                    echo "Direktori Belum Ada";
                                }
                                else{
                                    $fileInside = scandir($dir);
                                    $len = (count($fileInside))-2;
                                    echo "{$len}"." "."Dokumen";
                                }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
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