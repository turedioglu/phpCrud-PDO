<?php

include 'baglanti.php';

if(isset($_POST['ekle'])){

    $isim=$_POST['isim'];
    $soyisim=$_POST['soyisim'];
    $adres=$_POST['adres'];
    $kitapismi=$_POST['kitapismi'];
    $miktar=$_POST['miktar'];

    $sorgu = $db->prepare('INSERT INTO kisiler SET
    isim = ?,
    soyisim = ?,
    adres = ?,
    kitapismi = ?,
    miktar = ?');

    $ekle = $sorgu->execute([
        $isim,$soyisim,$adres,$kitapismi,$miktar
    ]);
    if($ekle){
        header('location: index.php?durum=başarılı');
    } else
    $hata = $sorgu->errorInfo();    
    echo 'mysql hatası' .$hata[2];
}


if($_GET['kisisil']=="ok"){
    $sil=$db->prepare('DELETE FROM kisiler WHERE id=:id');
    $kontrol = $sil->execute([
        'id' => $_GET['id']
    ]);
    if($kontrol){
        header('location: index.php?sil=ok');
    }else
    header('location: index.php?sil=no');
}

if(isset($_POST['guncelle'])){
    $isim=$_POST['isim'];
    $soyisim=$_POST['soyisim'];
    $adres=$_POST['adres'];
    $kitapismi=$_POST['kitapismi'];
    $miktar=$_POST['miktar'];
    $id=$_POST['id'];

    $kaydet = $db->prepare("UPDATE kisiler SET
        isim = ?,
        soyisim = ?,
        adres = ?,
        kitapismi = ?,
        miktar = ?
        WHERE id={$_POST['id']}");
        $update = $kaydet->execute([
            $isim,$soyisim,$adres,$kitapismi,$miktar
        ]);
            
    if($update){
        header("location: index.php?id=id&durum=ok");
    }else{
        header("location: index.php?id=id&durum=no");
    }
}

?>