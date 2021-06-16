<?php

    include 'baglanti.php';

    $kisisor = $db->prepare('SELECT * FROM kisiler');
    $kisisor->execute(); 

?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Siparis Islemleri</title>
    </head>
    
    <body>

        <form action="islem.php" method="post">


            <input type="text" name="isim" placeholder="İsim"> <br> <br>
            <input type="text" name="soyisim" placeholder="Soyisim"> <br> <br>
            <input type="text" name="adres" placeholder="Adres"> <br> <br>
            <input type="text" name="kitapismi" placeholder="Kitap İsmi"> <br> <br>
            <input type="text" name="miktar" placeholder="Miktar"> <br> <br>


        <label style="padding-top: 20px;"></label> <br /> <button type="onayla" name="ekle">Onayla</button>

        </form>

    <table>
        <tr>
        <th>İsim</th>
        <th>Soyisim</th>
        <th>Adres</th>
        <th>Kitap ismi</th>
        <th>Miktar</th>

        <th>Durum</th>
        <th>Durum</th>

        </tr>

    <?php
    while($kisi_cek = $kisisor->fetch(PDO::FETCH_ASSOC)) {?>


    <tr>
        <td><?php echo $kisi_cek['isim']; ?></td>
        <td><?php echo $kisi_cek['soyisim']; ?></td>
        <td><?php echo $kisi_cek['adres']; ?></td>
        <td><?php echo $kisi_cek['kitapismi']; ?></td>
        <td><?php echo $kisi_cek['miktar']; ?></td>
        <td><a href="siparis-duzenle.php?id=<?php echo $kisi_cek['id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></td>
        <td><a href="islem.php?id=<?php echo $kisi_cek['id']; ?>&kisisil=ok"><button class="btn btn-primary btn-xs">Sil</button></a></td>
    </tr>

<?php }?>


    </table>


    <style>
table{
    font-family: arial, sans-serif; 
    border-collapse: collapse;
    width: 100%
}

th, td{
border: 1px solid red;
text-align: center;
padding: 8px;
}

tr:nth-child(even){
    background-color: red;
}

body {
    text-align: center;
}
form {
    padding: 50px;
    display: inline-block;
}
input {
  width: 100%;
}
    </style>


    </body>
</html>

