<!-- Optional JavaScript -->
<footer>


</footer>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../js/sweetalert.js"></script>
</body>
<script>
  var privadas = {
    2: ["CARMESI", "MAGNOLIA", "MAGENTA"],
    3: ["BOREAL"]
  }

  $(function() {
    var fillSecondary = function() {
      var selected = $('#etapa').val();
      $('#privada').empty();
      privadas[selected].forEach(function(element, index) {
        $('#privada').append('<option value="' + element + '">' + element + '</option>');
      });
    }
    $('#etapa').change(fillSecondary);
    fillSecondary();
  });
</script>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<script type="text/javascript">
 function confirmacionDelete(){
   var respuesta = confirm("Deseas eliminar este usuario?");

   if (respuesta==true) {
     return  true;
   }else{
     return false;
   }
 }

</script>
</html>