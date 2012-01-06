		<!--<div id="modal-plus" class="modal hide fade in" style="display: none; ">
            <div class="modal-header">
              <a href="#" class="close">×</a>
              <h3>Ajouter un film</h3>
            </div>
            <div class="modal-body">
              <form action="#" onsubmit="return add_movie();">
              <div class="clearfix add-form" id="add-form-titre">
	              <label for="add-titre">Titre : </label>
	              <input class="xlarge" id="add-titre" name="add-titre" size="30" type="text">
	          </div>
              </form>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn primary" id="add-trigger" onclick="add_movie();" >Suivant ></a>
              <a href="#" class="btn primary" id="add-trigger" onclick="retour();" >&lt; Précédent</a>
            </div>
          </div>
		</div>
    </div>
    <nav id="page_nav" style="display:none;">
    <a href="<?php echo base_url();?>index.php/stream/page/4/2"></a>
    </nav>-->
    <footer>
    <!-- Texte du Footer -->
    </footer>
  </div> <!--! end of #container -->


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo base_url();?>js/libs/jquery-1.6.2.min.js"><\/script>')</script>
  <script src="<?php echo base_url();?>js/libs/jquery.isotope.min.js"></script>
  <script src="<?php echo base_url();?>js/libs/bootstrap-modal.js"></script>
  <script src="<?php echo base_url();?>js/libs/bootstrap-buttons.js"></script>
  <script src="<?php echo base_url();?>js/libs/jquery.infinitescroll.min.js"></script>
  <script defer src="<?php echo base_url();?>js/plugins.js"></script>
  <script defer src="<?php echo base_url();?>js/script.js"></script>
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  <script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23438504-1']);
  _gaq.push(['_setDomainName', '.geekuillau.me']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>
</body>
</html>
