<?php

include 'baglanti.php';

$kisisor = $db->prepare('SELECT * FROM kisiler WHERE id=:id');
$kisisor->execute([
    'id' => $_GET['id']
]);

$kisi_cek = $kisisor->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siparis Düzenleme</title>
</head>
<body background="background.jpeg">

<form action="islem.php" method="post">
    <input type="text" name="isim" placeholder="<?php echo $kisi_cek['isim']; ?>"> <br> <br>
    <input type="text" name="soyisim" placeholder="<?php echo $kisi_cek['soyisim']; ?>"> <br> <br>
    <input type="text" name="adres" placeholder="<?php echo $kisi_cek['adres']; ?>"> <br> <br>
    <input type="text" name="kitapismi" placeholder="<?php echo $kisi_cek['kitapismi']; ?>"> <br> <br>
    <input type="text" name="miktar" placeholder="<?php echo $kisi_cek['miktar']; ?>"> <br> <br>

    <input type="hidden" name="id" value="<?php echo $kisi_cek['id'] ?>">
    <button type="onayla" name="guncelle">Güncelle</button>

</form>


</body>
</html>