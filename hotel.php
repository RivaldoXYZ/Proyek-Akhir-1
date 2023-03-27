<?php
// Data hotel
$hotels = array(
	array(
		'nama' => 'LABERSA TOBA HOTEL & CONVENTION CENTER',
		'alamat' => 'Jalan Raya Pematangsiantar- Balige Toba  Samosir, Balige, Danau Toba, Sumatera Utara, Indonesia, 22312',
		'tarif' => 'Rp 700.000/malam',
		'gambar' => 'IMG/Labersa-1.jpg'
	),
	array(
		'nama' => 'Niagara Hotel Lake Toba & Resorts',
		'alamat' => 'Jalan Pembangunan No. 1 Parapat, Parapat, Danau Toba, Sumatera Utara, Indonesia, 21174',
		'tarif' => 'Rp 400.000/malam',
		'gambar' => 'IMG/Niagara-2.jpg'
	),
	array(
		'nama' => 'Parapat View Hotel',
		'alamat' => 'Jl. Sidaha Pinto No. 7 Parapat, Girsang Sipangan Bolon Simalungun, Parapat, Danau Toba, Sumatera Utara, Indonesia, 21174',
		'tarif' => 'Rp 250.000/malam',
		'gambar' => 'Img/Hotel-1.jpg'
	)
);
?>

<div class="grid-container">
    <?php foreach ($hotels as $hotel) { ?>
    <div class="grid-item">
        <img src="<?php echo $hotel['gambar']; ?>" alt="<?php echo $hotel['nama']; ?>">
        <h3><?php echo $hotel['nama']; ?></h3>
        <p><?php echo $hotel['alamat']; ?></p>
        <p><?php echo $hotel['tarif']; ?></p>
    </div>
    <?php } ?>
</div>