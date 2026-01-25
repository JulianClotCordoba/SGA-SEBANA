<div class="carnet-container">
    <img src="<?= $afiliado->carnet_digital ?>"  
         alt="Carné digital"  
         id="carnet-img"  
         class="carnet-img">


      <!-- QR de validación -->
<img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://sga-sebana.org/validar.php?id=<?= $afiliado->id ?>" 
     alt="QR de validación">


</div>


 <!--Para hacer zoom a la pantalla -->
<!-- Bootstrap JS -->
<script src="/SGA-SEBANA/public/assets/vendor/bootstrap-5.3.8.bundle.min.js"></script>

<!-- Script para zoom -->
<script src="https://unpkg.com/@panzoom/panzoom/dist/panzoom.min.js"></script>
<script>
  const elem = document.getElementById('carnet-img');
  const panzoom = Panzoom(elem, {
    maxScale: 5,
    minScale: 1,
    contain: 'outside'
  });
  elem.parentElement.addEventListener('wheel', panzoom.zoomWithWheel);



</script>

   




