<!-- Footer -->
  <footer id="footer">
    <ul class="icons">
      <li><a href="https://www.facebook.com/2015北一女中制服日-1055328207832585/" class="icon fa-facebook" target="_blank"><span class="label">2015北一女中制服日</span></a></li>
      <li><a href="mailto:christinesfkao@gmail.com" class="icon fa-envelope-o" target="_blank"><span class="label">錯誤回報</span></a></li>
    </ul>
    <ul class="copyright">
      <li>&copy; <a href="http://christinesfkao.tw">Christine Kao</a> 2015</li>
      <li><a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a></li>
      <li><a href="https://opensource.org/licenses/BSD-3-Clause">BSD New</a></li>
      <li><a href="https://github.com/christinesfkao/tfg-profile-pic">Source Code</a></li>
    </ul>
  </footer>

</div>

<!-- Scripts -->
<!--[if lte IE 8]><script src="javascript/respond.min.js"></script><![endif]-->
<script>
if ('addEventListener' in window) {
window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
}
</script>
<script src="//code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="vender/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="vender/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
<script src="vender/jquery.ui.rotatable.min.js" type="text/javascript"></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-59778322-4', 'auto');
ga('send', 'pageview');

<?php
if(isset($_GET['finish'])){
  echo "ga('send', 'event', 'Image', 'share', 'view');";
}
?>
$(document).ready(function(){
  $("#one-more").click(function(){
    ga('send', 'event', 'Button', 'click', 'one-more');
  });
  $("#fb-share").click(function(){
    ga('send', 'event', 'Button', 'click', 'facebook-share');
  })
});
</script>
</body>
</html>
