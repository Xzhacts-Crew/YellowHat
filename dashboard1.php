<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard1.css">
    <link rel="stylesheet" href="input.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    <title >Password Manager</title>
    <style>
        /* Gaya CSS untuk popup dan tabel */
  
    </style>
</head>
<body>
    <!-- Tombol untuk memunculkan popup -->
    <button onclick="openPopup()" >Add Password</button>

    <!-- Tabel di luar popup -->
    <h2 style="color: #FF0000;">Password Manager</h2>
    
    <table id="outsideTable">
        <tr>
            <th>Website</th>
            <th>Email</th>
            <th>Password</th>
            <th><button type='button' class='show_button' data-toggle='modal' data-target='#myModal' onclick='showPassword(\"{$row['password']}\")'>Show</button></th>
            
        </tr>
        <?php include 'show_table.php'; ?>
        
        
        <!-- Data tabel dari popup akan ditambahkan di sini -->
        
        
    </table>


  
  <!-- Trigger the modal with a button -->

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Password</h4>
            </div>
            <div class="modal-body" id="">
                <!-- Password content will be dynamically set here -->
            <table>    
                <tr>
                    <th>Website</th>
                    <th>Email</th>
                    <th>Password</th>
                    
                </tr>
                <?php include 'dekripsi.php'; ?>
            </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showPassword($decryptedPassword) {
        document.getElementById("modal-password-content").innerHTML = "<p>Password: " + $decryptedPassword + "</p>";
    }
</script> 





    <!-- Popup -->

    <div class="popup-overlay" id="popup">
        <div class="popup-content">
            <h2>Data Mahasiswa</h2>
            <!-- Formulir untuk input -->
            <form action="add_passwd.php"  method="post">    
                <label for="input-field">Website:</label>          
                <input placeholder="Website" style="color: black" type="text" name="website" required>
                <br>
                <br>
                <label for="input-field">Email: </label>
                <input placeholder="Email" style="color: black" type="text" name="email" required>
                <br>
                <br>
                <label for="input-field">Password:</label>
                <input placeholder="Password" style="color: black" type="password" name="password" required>
                <br>
                <br>
                <button type="submit" >Tambah Data</button>
            </form>

            <!-- Tabel di dalam popup -->
            

            <button onclick="closePopup()">Tutup Popup</button>

        </div>
    </div>
    
  

<script>
    // Inisialisasi array untuk menyimpan data tabel di luar popup dan di dalam popup
    var outsideTableData = [];
    var popupTableData = [];

    // Inisialisasi tabel di luar popup
    var outsideTable = document.getElementById('outsideTable');

    function openPopup() {
        // Menampilkan popup
        document.getElementById('popup').style.display = 'flex';
    }

    function closePopup() {
        // Menutup popup
        document.getElementById('popup').style.display = 'none';

        // Menghapus data tabel di dalam popup
        var popupTable = document.getElementById('popupTable');
        while (popupTable.rows.length > 1) {
            popupTable.deleteRow(1);
        }
    }

</script>



<style>
   .popup-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    justify-content: center;
    align-items: center;
    
}

.popup-content {
    background: #fff;
    padding: 5 px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    max-width: 600px;
    margin: auto;
    text-align: center;
    height: 50%;
    width: 50%;
    position: relative;
    margin: 20px;
    background-color: #393E46;
    color: #ffffff;

}

.inputan{
    justify-items: center;
    justify-content: left;
    align-items: center;
}

table {
    width: 90%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 5px solid #ddd;
    padding: 10px;
    text-align: left;
    background-color: #ffffff;
}

th {
    background-color: #EEEEEE;
}

/* Gaya tambahan */
body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 5%;
    margin: 0;
    background-color: #0F0F0F;
}

button {
    padding: 10px;
    margin-top: 20px;
    cursor: pointer;
    background-color: #393E46;
    color: #ffffff;
}

.delete_table{
    width: 10px;
    height: 0;
}
.delete_button{
    background-color: #FF0000;
    margin: auto;
    height: 34px;
}
.show_button{
    background-color: #51e256;
    margin: auto;
    height: 34px;
    
}


</style>

    
    

</body>
</html>
