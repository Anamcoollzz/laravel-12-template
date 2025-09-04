@if ($isDetail)
  <script>
    $(function() {
      $('input[type="password"]').parent().parent().hide();
      disableForm()
    });
  </script>
@endif
