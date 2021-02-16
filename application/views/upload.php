   <div class="container-fluid">       
        <br>
        <div class="card">
            <h5 class="card-header">Unggah Dokumen Kontrol</h5>
            <div class="card-body">
                <!-- class/function -->
                <?php echo form_open_multipart('page/do_upload');?> 

                <p class="card-title" style="padding:0px; margin-bottom:15px;">Unggah file berdasarkan jenis, nama, dan dokumen produk.</p>
                <p class="card-text" style="padding:0px; margin-bottom:0px;">Jenis Produk</p> 
                <div class="col-xs-6">
                    <select class='form-control' name="select1" id=select1>
                        <?php 
                            $before = '';
                            foreach($viewData as $data){
                                if ($before != $data['Jenis Produk']){
                                    $temp = $data['Jenis Produk'];
                                    echo "<option value='{$temp}'>".$temp."</option>";
                                    $before = $temp;
                                }
                            }
                        ?>  
                    </select>
                </div>
                <br>
                <p class="card-text" style="padding:0px; margin-bottom:0px;">Nama Produk</p> 
                <div class="col-xs-6">
                    <select class="form-control" name="select2" id=select2>
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
                </div>
                <br>
                <p class="card-text" style="padding:0px; margin-bottom:0px;">Dokumen Produk</p> 
                <div class="col-xs-6">
                    <select class="form-control" name="select3" id=select3>
                        <?php 
                            $i = 0;
                            while($i < 19){
                                $temp = $viewData[$i]['Dokumen Produk'];
                                echo "<option value='{$temp}'>".$temp."</option>";
                                $i++;
                            }
                        ?>               
                    </select>
                </div>
                <br>
            
                <!-- <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p style="padding:0px;"><?php //echo $error;?></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div style="color:red;">
                    <p><?php  echo $error?></p>
                </div>
                <input type="file" name="userfile" size="20" />
            
                <br /><br />
                <input id="submit" type="submit" value="Upload"/>
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
            $select2.html($options.filter('[class="' + this.value + '"]'));
        }).trigger("change");
    </script>
</body>

</html>