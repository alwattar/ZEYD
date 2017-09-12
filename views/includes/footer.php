

<footer class="hidden-xs">
    <div class="container ">
        <div class="row ">
            <div class="col-md-4 pull-right col-xs-12">
                <div class="footer-social">
                    <h3><?php echo $ddlang->footer_Follow ;?> </h3>
                    <ul class="list-inline">
                        <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                        <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                        <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
                        <li><i class="fa fa-paper-plane" aria-hidden="true"></i></li>
                        <li><i class="fa fa-youtube" aria-hidden="true"></i></li>
                    </ul>
                </div>
                <div class="contact-us">
                    <h3><?php echo $ddlang->footer_contact ;?></h3>
                    <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span><?php echo $ddlang->footer_location ;?> </p>
                    <p><span><i class="fa fa-phone" aria-hidden="true"></i></span><?php echo $ddlang->footer_phone ;?></p>
                    <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span><?php echo $ddlang->footer_email ;?><span class="zaidemail">INFO@ZEYD.ORG</span></p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 text-center pull-right zlfooter">
                <img src="<?php echo PUBLIC_PATH ?>/img/logo/logozaid.png"/>
                <div>
                    <p>
			<?php echo $ddlang->footer_desc ;?>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 pull-right">
                <h3><?php echo $ddlang->footer_donatehead ;?></h3>
                <div class="donatebankdiv">
                    <h5><?php echo $ddlang->footer_bank ;?><span> Vakıf Katılım</span></h5>
                    <h5><?php echo $ddlang->footer_bankowner ;?><span> ZEYD BİN SABİT YARDIMLAŞMA</span></h5>
                    <div class="donatebank">
                        <img src="<?php echo PUBLIC_PATH ?>/img/logo/v.png" />
                        <p>
                            TR83 0021 0000 0000 2797 7000 01 TL<br />
                            TR02 0021 0000 0000 2797 7001 01 $<br />
                            TR72 0021 0000 0000 2797 7001 02 EU
                        </p>
                    </div>
                    <div class="clearfix"></div>
                    <h6><?php echo $ddlang->footer_bankswift ;?><span> VAKFRISXXX</span></h6>
                </div>
                <br />
                <div class="donatebankdiv">
                    <h5><?php echo $ddlang->footer_bank ;?><span> ALBARAKA</span></h5>
                    <h5><?php echo $ddlang->footer_bankowner ;?><span> ZEYD BİN SABİT YARDIMLAŞMA DERNĞİ</span></h5>
                    <div class="donatebank">
                        <img src="<?php echo PUBLIC_PATH ?>/img/logo/b.png" />
                        <p>
                            TR67 0020 3000 0366 3064 0000 01 TL<br />
                            TR40 0020 3000 0366 3064 0000 02 $<br />
                            TR13 0020 3000 0366 3064 0000 03 EU
                        </p>
                    </div>
                    <div class="clearfix"></div>
                    <h6><?php echo $ddlang->footer_bankswift ;?><span> BTFHTRISXXX</span></h6>
                </div>
            </div>
        </div>
        <div class="text-center copyrightfooter">
            ZEYD BİN SABİT DERNĞİ <span style="color:#828282;">© 2012 -  <?php echo date("Y"); ?></span>
        </div>
    </div>
    
    
</footer>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
</script>
<script src="<?php echo JS_PATH ?>/bootstrap.min.js"></script>
<script src="<?php echo JS_PATH ?>/bootstrap.min.js"></script>
<script src="<?php echo JS_PATH ?>/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo JS_PATH ?>/npm.js"></script>
<script src="<?php echo JS_PATH ?>/wow.min.js"></script>
<script src="<?php echo JS_PATH ?>/main.js"></script>
<script src="<?php echo JS_PATH ?>/raphael-min.js"></script>
<script src="<?php echo JS_PATH ?>/jquery.easing.js"></script>
<script src="<?php echo JS_PATH ?>/iview.js"></script>
<script>
 $(document).ready(function(){
     $('#iview').iView({
	 pauseTime: 3500,
	 directionNav: false,
	 controlNav: false,
	 tooltipY: -15
     });
 });
 
</script>


    </body>

</html>
