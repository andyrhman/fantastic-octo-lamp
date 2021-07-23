<!-- Pesan kalo sudah login -->
<?php if(isset($_SESSION['pesan'])): ?>
    <script src="blog/js/sweetalert.min.js"></script> 
    <script>
        swal({
            title: "Selamat datang <?php echo $_SESSION['pesan'];?>",
            text: "Tekan oke untuk keluar...",
            icon: "success",
            button: "Oke",
        });
    </script>
    <?php unset($_SESSION['pesan'])?>
<?php endif;?>