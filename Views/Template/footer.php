<!-- Essential javascripts for application to work-->
    <script src="<?= baseMedia(); ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= baseMedia(); ?>js/popper.min.js"></script>
    <script src="<?= baseMedia(); ?>js/bootstrap.min.js"></script>
    <script src="<?= baseMedia(); ?>js/main.js"></script>
    <script src="<?= baseMedia(); ?>js/fontawesome.js"></script>
    <script src="<?= baseMedia(); ?>js/plugins/sweetalert.min.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= baseMedia(); ?>js/plugins/pace.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?= baseMedia(); ?>js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= baseMedia(); ?>js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- JS Custom -->
    <script src="<?= baseMedia(); ?>js/login.js"></script>
    <script src="<?= baseMedia(); ?>js/functions_users.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
      const baseUrl = "<?= baseUrl() ?>";
    </script>
  </body>
</html>