<script type="text/javascript">
  $(document).ready(function() {
    $('input').keypress(function(key) {
      if(key.charCode == 60 || key.charCode == 62)
      {
        return false;
      }
    });
    $("input").on("focusout", function(e) {
      var str = $(this).val();
      var res = str.replace("<", "");
      res = res.replace(">", "");
      $(this).val(res);
    });
    $( "input" ).keydown(function() {
      var str = $(this).val();
      var res = str.replace("<", "");
      res = res.replace(">", "");
      $(this).val(res);  
    });

    $('textarea').keypress(function(key) {
      if(key.charCode == 60 || key.charCode == 62)
      {
        return false;
      }
    });
    $("textarea").on("focusout", function(e) {
      var str = $(this).val();
      var res = str.replace("<", "");
      res = res.replace(">", "");
      $(this).val(res);
    });
    $( "textarea" ).keydown(function() {
      var str = $(this).val();
      var res = str.replace("<", "");
      res = res.replace(">", "");
      $(this).val(res);  
    });
  });
</script>