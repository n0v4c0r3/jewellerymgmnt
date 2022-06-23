<?php 
include('common/header.php');
include('common/navbar.php');
include('pages/allproduct.php');
include('common/footer.php');
?>
<script>
$( document ).ready(function() {
    console.log( "ready!" );
    var element = document.getElementById("product");
    var element2 = document.getElementById("openprod");
    element2.classList.add("menu-open");
    element.classList.add("active");
});
</script>