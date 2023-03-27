<!DOCTYPE html>
<html>

<head>
    <title>Deskripsi Akomodasi - Hotel Toba</title>
    <link rel="stylesheet" type="text/css" href="CSS/hotel.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="#penginapan">Penginapan</a></li>
                <li><a href="#hiburan">Tempat Hiburan</a></li>
            </ul>
        </nav>
        <div class="hero">
            <h1>Hotel Toba</h1>
            <p>Hotel Toba merupakan hotel mewah di tepi Danau Toba dengan pemandangan yang indah dan fasilitas lengkap.
            </p>
        </div>
    </header>

    <main>
        <section>
            <h2>Deskripsi Akomodasi</h2>
            <div class="grid-container">
                <div class="grid-item">
                    <img src="https://via.placeholder.com/400x300" alt="Foto Kamar">
                </div>
                <div class="grid-item">
                    <h3>Kamar Deluxe</h3>
                    <p>Kamar Deluxe memiliki fasilitas lengkap dengan pemandangan langsung ke Danau Toba.</p>
                    <ul>
                        <li>Luas kamar: 40 m<sup>2</sup></li>
                        <li>Tempat tidur: 1 King atau 2 Twin</li>
                        <li>Pemandangan: Danau Toba</li>
                        <li>Fasilitas: TV, AC, WiFi, Kulkas, Minibar</li>
                        <li>Harga: Rp 2.000.000/malam</li>
                    </ul>
                </div>
            </div>
        </section>

        <section>
            <h2>Lokasi</h2>
            <div id="map"></div>
            <div class="grid-container">
                <div class="grid-item">
                    <h3>Alamat</h3>
                    <p>Jalan Raya Tuktuk Siadong, Tuktuk Siadong, Samosir, Sumatera Utara</p>
                </div>
                <div class="grid-item">
                    <h3>Petunjuk Arah</h3>
                    <p>Masukkan lokasi awal Anda dan klik tombol "Dapatkan Petunjuk Arah" untuk mendapatkan rute ke
                        Hotel Toba.</p>
                    <form id="directions-form">
                        <label for="start-location">Lokasi Awal</label>
                        <input type="text" id="start-location" name="start-location" required>
                        <button type="submit">Dapatkan Petunjuk Arah</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Website Informasi Danau Toba</p>
    </footer>

    <script src="https://maps.googleapis.com/maps/api/js?key=API_KEY"></script>
    <script src="script.js"></script>
</body>

</html>