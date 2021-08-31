 

<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/js/select2.full.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script>


</script>
<script type="text/javascript">
  $('input[type="file"]').change(function(e){
    var fileName = e.target.files[0].name;
    $('.custom-file-label').html(fileName);
  });
      // close message alert
      $(function() {
        setTimeout(function() {
          $( "#message" ).hide( "drop", { direction: "up" }, "slow" );
        }, 2000);
      });

      CKEDITOR.replace( 'body_post' );

    </script>

    <script>
      $(function(){
 //Initialize Select2 Elements
 $('.select2').select2()
 
});
</script>

</body>
</html>

