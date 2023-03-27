<?php
// Data penginapan
$penginapans = array(
	array(
		'nama' => 'Samosir Villa Resort',
		'alamat' => 'Jl. Raya Tuktuk Siadong, Samosir',
		'tarif' => 'Rp 700.000/malam',
		'gambar' => 'samosir-villa.jpg'
	),
	array(
		'nama' => 'Tabo Cottages',
		'alamat' => 'Jl. Tuktuk Siadong, Samosir',
		'tarif' => 'Rp 400.000/malam',
		'gambar' => 'tabo-cottages.jpg'
	),
	array(
		'nama' => 'Toledo Inn',
		'alamat' => 'Jl. Sisingamangaraja, Balige',
		'tarif' => 'Rp 250.000/malam',
		'gambar' => 'toledo-inn.jpg'
	)
);
?>

<div class="grid-container">
    <?php foreach ($penginapans as $penginapan) { ?>
    <div class="grid-item">
        <img src="<?php echo $penginapan['gambar']; ?>" alt="<?php echo $penginapan['nama']; ?>">
        <h3><?php echo $penginapan['nama']; ?></h3>
        <p><?php echo $penginapan['alamat']; ?></p>
        <p><?php echo $penginapan['tarif']; ?></p>
    </div>
    <?php } ?>
</div>