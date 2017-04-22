<footer id='footer' class="fullwidth">
    
<div class="row">    
   
    
    
    
     
     <div class="social-holder">
     
     <?php if($pages->get('template=settings')->yt_url): ?>
     <a href="<?php echo $pages->get('template=settings')->yt_url; ?>" class="social" id="yt" target="_blank"><span class="fa fa-youtube-play"></span></a>
     <?php endif; ?>
     
     <?php if($pages->get('template=settings')->fb_url): ?>
     <a href="<?php echo $pages->get('template=settings')->fb_url; ?>" class="social" id="fb" target="_blank"><span class="fa fa-facebook"></span></a>
     <?php endif; ?>
     
     <?php if($pages->get('template=settings')->tw_url): ?>
     <a href="<?php echo $pages->get('template=settings')->tw_url; ?>" class="social" id="tw" target="_blank"><span class="fa fa-twitter"></span></a>
     <?php endif; ?>
     
     <?php if($pages->get('template=settings')->li_url): ?>
     <a href="<?php echo $pages->get('template=settings')->li_url; ?>" class="social" id="li" target="_blank"><span class="fa fa-linkedin"></span></a>
     <?php endif; ?>
     
     <?php if($pages->get('template=settings')->inst_url): ?>
     <a href="<?php echo $pages->get('template=settings')->inst_url; ?>" class="social" id="inst" target="_blank"><span class="fa fa-instagram"></span></a>
     <?php endif; ?>
     </div>
     
     <?php if($user->isLoggedin()): ?>
  
        <span class="login"><?php echo "<a href='{$config->urls->admin}login/logout/'>Logout ($user->name)</a>"; ?></span>
        
     <?php endif; ?>
     
     <div class="logo"><img src="<?php echo $config->urls->templates?>img/fontys_sec_purple.png" alt="Fontys Hogeschool ICT"/><span class="copyright">
     
     
     	<?php echo __('Hogeschool ICT');?> &copy; <?php echo date("Y");?></span>
     </div>
     
</div>
<?php if($page->disclaimer): ?>
<div class="row">
<div class="disclaimer">
<span class="text">
<?php echo $page->disclaimer; ?>
</span>

</div>
<?php endif; ?>
</div>

</footer>


