<?php
// Data tempat hiburan
$hiburans = array(
	array(
		'nama' => 'Pantai Parbaba',
		'lokasi' => 'Parbaba, Samosir',
		'keterangan' => 'Pantai yang indah dengan air yang jernih'
	),
	array(
		'nama' => 'Air Terjun Sipiso-piso',
		'lokasi' => 'Tiga Pancur, Sibolangit',
		'keterangan' => 'Air terjun setinggi 120 meter yang sangat indah'
	),
	array(
		'nama' => 'Desa Wisata Tomok',
		'lokasi' => 'Tomok, Samosir',
		'keterangan' => 'Desa tradisional yang indah dengan bangunan-bangunan kuno'
	)
);
?>

<div class="grid-container">
    <?php foreach ($hiburans as $hiburan) { ?>
    <div class="grid-item">
        <h3><?php echo $hiburan['nama']; ?></h3>
        <p><?php echo $hiburan['lokasi']; ?></p>
        <p><?php echo $hiburan['keterangan']; ?></p>
    </div>
    <?php } ?>
</div>