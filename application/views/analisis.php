    <div class="container mb-3 mt-3 fadeInDown second">
        <h3> Analisis Produk </h3> 
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <td>Jenis Produk</td>
                    <td>Nama Produk</td>
                    <td>Jenis Analisis</td>
                    <td>Tanggal</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewData as $s) : ?>
                    <tr>
                        <td><?php echo $s['Jenis Produk'] ?></td>
                        <td><?php echo $s['Nama Produk'] ?></td>
                        <td><a href="/dokumenengineering/index.php/page/analisis_view"><?php echo $s['Jenis Analisis'];?></a></td>
                        <td></td>
                        <td><?php 
                            $fileName = "Asset/Analisis/".$s['Jenis Produk']."/".$s['Nama Produk']."/".$s['Jenis Analisis'].".pdf";
                            if(file_exists($fileName) == true){
                                echo "<div class='alert alert-success' style='margin-bottom:0px; padding:0px; text-align: center'>OK</div>";
                            }
                            else{
                                echo "<div class='alert alert-danger' style='margin-bottom:0px; padding:0px; text-align: center'>Not Available</div>";
                            }
                        ?></td>
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