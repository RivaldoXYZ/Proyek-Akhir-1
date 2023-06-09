<!-- //Summernote JS - CDN Link -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js""></script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Summernote JS - CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {
        // $("#fasilitas").summernote();
        // $('#fasilitas').summernote({
        //     placeholder: 'Masukkan Fasilitas Hotel/Penginapan',
        //     tabsize: 2,
        //     height: 100
        // });
        $("#deskripsi").summernote();
        $('#deskripsi').summernote({
            placeholder: 'Masukkan Fasilitas Hotel/Penginapan',
            tabsize: 2,
            height: 100
        });
        $('.dropdown-toggle').dropdown();
    });
</script>
<!-- //Summernote JS - CDN Link -->