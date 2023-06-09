<?php
$string = "1)Fasilitas Publik\r\n-Area parkir\r\n-Kafe\r\n-Restoran\r\n-Layanan kamar\r\n-WiFi di area umum, \r\n2)Fasilitas Kamar\r\n-TV kabel\r\n-Meja\r\n-Pengering rambut\r\n-Pancuran\r\n-TV,\r\n3)Servis Hotel\r\n-Concierge/layanan tamu\r\n-Keamanan 24 jam\r\n-Laundry\r\n-Resepsionis 24 jam,\r\n4)Umum\r\n-Area bebas asap rokok\r\n-Kolam renang\r\n-Area merokok,\r\n5)Kegiatan Lainnya\r\n-Layanan pijat\r\n-Kolam renang outdoor,\r\n6)Konektivitas\r\n-Internet Kamar,\r\n7)Jasa Antar Jemput\r\n-Antar-jemput bandara berbiaya";

$items = explode("\r\n", $string);

$previous_item = '';
foreach ($items as $item) {
    if ($item[0] === '-') {
        echo trim($item) . "<br>";
    } else {
        if (!empty($previous_item)) {
            echo "<br>";
        }
        echo trim($item) . "<br>";
    }
    $previous_item = $item;
}
?>