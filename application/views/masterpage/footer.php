    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
<!--    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>-->
    <script type='text/javascript'>
        var baseURL= "<?php echo base_url();?>";
    </script>
    <script src="<?php echo base_url(); ?>assets/js/colorpicker.js"></script>
    <script>
        $('#inputColor').ColorPicker({
            onChange: function(hsb, hex, rgb){
                $("#inputColor").val('#'+hex);
                var a = $('.mobile-inner p.selected').has('input');
                if(a.length == 0){
                    $('.mobile-inner p.selected').css('color', '#'+hex);
                }else{
                    $('.mobile-inner p.selected input').css('color', '#'+hex);
                }
            }
        });

        $('#inputBgColor').ColorPicker({
            onChange: function(hsb, hex, rgb){
                $("#inputBgColor").val('#'+hex);
                var a = $('.mobile-inner p.selected').has('input');
                if(a.length == 0){
                    $('.mobile-inner p.selected').css('backgroundColor', '#'+hex);
                }else{
                    $('.mobile-inner p.selected input').css('backgroundColor', '#'+hex);
                }
                $('.mobile-inner.selected').css('backgroundColor', '#'+hex);
            }
        });
    </script>
</body>
</html>
