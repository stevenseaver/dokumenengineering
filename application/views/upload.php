   <div class="container-fluid">       
        <br>
        <div class="card">
            <h5 class="card-header">Upload File</h5>
            <div class="card-body">
                <p class="card-text">Unggah file berdasarkan jenis, nama, dan dokumen produk.</p> 
                <div class="col-xs-6">
                    <select class='form-control' name="select1" id=select1>
                        <?php 
                            $before = '';
                            foreach($viewData as $data)
                            {
                                if ($before != $data['Jenis Produk'])
                                {
                                    $temp = $data['Jenis Produk'];
                                    echo "<option value=".$temp.">".$temp."</option>";
                                    $before = $temp;
                                }
                            }
                        ?>  
                    </select>
                </div>
                <br>
                <div class="col-xs-6">
                    <select class="form-control" name="select2" id="select2">
                        <?php 
                            $before = '';
                            foreach($viewData as $data)
                            {
                                $temp1 = $data['Jenis Produk'];
                                $temp2 = $data['Nama Produk'];
                                if ($before != $temp2)
                                {
                                    echo "<option value=".$temp1.">".$temp2."</option>"; 
                                    $before = $temp2;
                                }
                            }
                        ?>
                    </select>
                </div>
                <br>
                <div class="col-xs-6">
                    <select class="form-control" name="select3" id="select3">
                        <?php 
                            $i = 0;
                            $dropdownIndex3 = 1;
                            $dbLength = count($viewData);
                            $before = '';
                            while($i < 19)
                            {
                                echo "<option value='$dropdownIndex3'>".$viewData[$i]['Dokumen Produk']."</option>";
                                $before = $viewData[$i]['Dokumen Produk'];
                                $i++;
                                $dropdownIndex3++;
                            }
                            $j = 0;
                            $anLength = count($viewDataAnalisis);
                            $beforeAn = '';
                            while($j < 4)
                            {
                                echo "<option value='$dropdownIndex3'>".$viewDataAnalisis[$j]['Jenis Analisis']."</option>";
                                $beforeAn = $viewDataAnalisis[$j]['Jenis Analisis'];    
                                $j++;  
                                $dropdownIndex3++; 
                            }
                        ?>               
                    </select>
                </div>
                <br>

                <?php echo $error;?>
                <?php echo form_open_multipart('page/do_upload');?>  <!--class/function -->

                <input type="file" name="userfile" size="20" />

                <br /><br />

                <input type="submit" value="Upload"/>
                </form>
            </div>
        </div>
    </div>        

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        var $select1 = $("#select1"), $select2 = $("#select2"),
        $options = $select2.find("option");

        $select1.on("change", function () {
            $select2.html($options.filter('[value="' + this.value + '"]'));
        }).trigger("change");

    </script>
</body>

</html>