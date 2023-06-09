<script type="text/javascript">
  ////////////////////////////Sub Messages Controller ///////////////////////////
  //////////////////// load Messages on load //////////////////////////////////////
  load_messages();

  function load_messages() {
    $.ajax({
      url: "../Controller/view_messages.php",
      method: "GET",
      success: function(data) {
        $('#display_messages').html($.trim(data));

      }
    }) 
  }

</script>