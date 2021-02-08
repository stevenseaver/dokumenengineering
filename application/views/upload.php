   <div class="container-fluid">       
        <br>
        <div class="card">
            <h5 class="card-header">Upload File</h5>
            <div class="card-body">
                <p class="card-text">Unggah file berdasarkan jenis, nama, dan dokumen produk.</p> 
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Jenis Produk
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item" type="button">USG</button>
                        <button class="dropdown-item" type="button">PM</button>
                        <button class="dropdown-item" type="button">Something else here</button>
                    </div>
                </div>
                <br>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nama Produk
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item" type="button">PM Pro 1</button>
                        <button class="dropdown-item" type="button">PM Pro 2</button>
                        <button class="dropdown-item" type="button">PM Pro 3</button>
                    </div>
                </div>
                <br>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dokumen Produk
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item" type="button">SOP</button>
                        <button class="dropdown-item" type="button">Packing List</button>
                        <button class="dropdown-item" type="button">...</button>
                    </div>
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
</body>

</html>