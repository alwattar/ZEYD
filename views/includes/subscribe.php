
<section class="subscribe text-center">
    
    <div class="container">
	<h1>للاشتراك في النشرة البريدية</h1>
	<form action="<?php echo URL ?>/index" method="post">
	    <input name="subemail" type="text" placeholder="أدخل البريد الإلكتروني"><br>
	    <input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
	    <button class="btn btn-lg btn-danger mt-md">اشتراك </button>
	</form>
	
    </div>
</section>
<section class="hidden-xs">
    <div class="container ftfooter text-center">
	<div class="fb-page" data-href="https://www.facebook.com/zaid.institution" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
            <blockquote cite="https://www.facebook.com/zaid.institution" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/zaid.institution"><?php echo $ddlang->orga ?>‎</a></blockquote>
	</div>
	<div class="tw-page">
            <a class="twitter-timeline" data-width="400" data-height="500" href="https://twitter.com/ZaidInstitution">Tweets by ZaidInstitution</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	</div>
    </div>
    
</section>
