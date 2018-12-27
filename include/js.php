<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--<script src="js/bootstrap.min.js"></script>-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- Following JavaScript activates current page in navbar -->
<script>
$(document).ready(function() {
    $('a[href="' + this.location.pathname + '"]').parent().addClass('active');
});
</script>
<!-- Trigger reCAPTCHA Javascript -->
<script>
grecaptcha.ready(function() {
  grecaptcha.execute('6Ld6T4QUAAAAAM6g71ghfo3yWRpGyOgyWsqi3X3S', {action: 'page_load'})
  .then(function(token) {
    // Verify the token on the server.
  });
});
</script>
<!-- Google Analytics tracking -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54476861-1', 'auto');
  ga('send', 'pageview');

</script>
