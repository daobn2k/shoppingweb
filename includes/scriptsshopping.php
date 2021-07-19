 <!-- JavaScript Libraries -->
 <script src="jquery/jquery.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
<script>

       function addCart(id){
          num = $("#num").val();
          $.post('addcart.php', {'id': id,'num': num}, function(data){
              item = data.split("-");
     $("#qty").text(item[0]);
     $("#total").text(item[1]);
  });
       }

       function tangSoluong(id){
              num = parseInt($("#num_"+id).val()) + 1;
              $.post('updateCart.php', {'id':id,'num':num}, function(data){

              $("#listCart").load("cart.php #listCart", function() {

              })
       });
              
       }
function giamSoluong(id){
       num = parseInt($("#num_"+id).val()) - 1;
       $.post('updateCart.php', {'id':id,'num':num}, function(data){
              $("#listCart").load("cart.php #listCart", function() {

              })
       });
}


function remove(id){
       $.post('updateCart.php', {'id':id,'num':0}, function(data){
              $("#listCart").load("cart.php #listCart", function() {

              })
       });
}

</script>

