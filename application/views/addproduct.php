    <div class="container-fluid">       
        <br>
        <div class="card">
            <h5 class="card-header">Tambah Produk Baru</h5>
            <div class="card-body">
                <!-- class/function -->
                <?php 
                    $temp = validation_errors();
                    if ($temp != null){
                        echo "<div class='alert alert-danger' role='alert'>$temp</div>";
                    }
                    else{
                        
                    }
                ?>
                <?php echo form_open('page/tambahProduk');?> 

                <p class="card-title" style="padding:0px; margin-bottom:15px;">Tambah produk baru dengan memilih jenis dan nama produk yang akan ditambahkan.</p>
                <p class="card-text" style="padding:0px; margin-bottom:0px;">Jenis Produk</p> 
                <div class="row">
                    <div class="col">
                        <div class="col-xs-6">
                            <select class='form-control' name="select1" id="select1">
                                <?php 
                                    $before = '';
                                    foreach($viewData as $data){
                                        if ($before != $data['Jenis_Produk']){
                                            $temp = $data['Jenis_Produk'];
                                            echo "<option value='{$temp}'>".$temp."</option>";
                                            $before = $temp;
                                        }
                                    }
                                ?>  
                            </select>
                        </div>
                        <small id="Help" class="form-text text-muted">Jika tidak tersedia, silahkan isi manual!</small>
                    </div>
                    <div class="col">
                        <input type="text" name="select1man" class="form-control" placeholder="Isi Manual">
                        <div class="form-check">
                        <input name="checkbox" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Gunakan masukan manual.
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <p class="card-text" style="padding:0px; margin-bottom:0px;">Nama Produk</p> 
                <input class="form-control" name = "namaProduk" id="namaProduk" type="text" placeholder="Masukkan nama produk baru">
                <small id="Help" class="form-text text-muted">Pastikan nama produk sudah benar sebelum submit!</small>
                <br>
                <input class="btn btn-primary" id="submit" type="submit" value="Submit"/>
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