<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.shoplab
 * @copyright   Copyright (C) 2015 Linelab.org. All rights reserved.
 * @license     GNU General Public License version 3
 */
defined('_JEXEC') or die;
$doc = JFactory::getDocument();
$this->language  = $doc->language;
$this->direction = $doc->direction;
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.min.js'); 
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/tools.js'); 
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/selectnav.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/jquery.flexslider-min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/jquery.ui.totop.min.js');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.min.css');
$slide = $this->params->get('display_slideshow', 1);
$sitename = $this->params->get("sitetitle", "ћагазин строительных инструментов");
$frontpage = $this->params->get('frontpage', 0);
$app = JFactory::getApplication();
$menu = $app->getMenu();
$slidecontent1 = $this->params->get('slideshow1', ''); 
$slidecontent2 = $this->params->get('slideshow2', ''); 
$slidecontent3 = $this->params->get('slideshow3', '');
$description1 = $this->params->get('description1'); 
$description2 = $this->params->get('description2'); 
$description3 = $this->params->get('description3'); 
$slideimages=array();
if ($slidecontent1) $slideimages[]=array('img'=>$slidecontent1, 'desc'=>$description1);
if ($slidecontent2) $slideimages[]=array('img'=>$slidecontent2, 'desc'=>$description2);
if ($slidecontent3) $slideimages[]=array('img'=>$slidecontent3, 'desc'=>$description3);
?>

<!DOCTYPE html>
<html dir="<?php echo $this->direction; ?>" lang="<?php echo $this->language; ?>">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<jdoc:include type="head" />
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700&subset=latin,latin-ext" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
<![endif]-->
</head>
  <body>
	<div id="wrapper">	
	  <header class="headerlab">
	  <?php if ($this->countModules('topcenter or topleft or topright')) : ?>
        <nav class="top_panel">
          <div class="container">
            <div class="collapse navbar-collapse panel-top">
  <jdoc:include type="modules" name="topcenter" style="none"/> 
            </div> 
			         
            <div class="linelab-r">
              <div class="nleft">
<jdoc:include type="modules" name="topleft" style="none"/>
              </div> 
			       
              <div class="nright">
<jdoc:include type="modules" name="topright" style="none"/>
              </div>              
            </div>            
          </div>
        </nav><div class="modul hidden-xs"></div>
<?php endif; ?> 	  
        <div class="container headlab">
          <div class="header-col"> 
            <div class="labcol hidden-xs hidden-sm">
              <div class="labposition">              
                <div class="labcell">
                
                   <?php if ($this->countModules('banner')) : ?>
  <jdoc:include type="modules" name="banner" />
	   <?php endif; ?>   

			 </div>
            </div>
           </div>

            <div class="bcol hidden-xs">
              <div class="labposition">
                <div class="labcell">    
                <?php if ($this->countModules('cart')) : ?>
  <jdoc:include type="modules" name="cart" />
	   <?php endif; ?>
	   
  </div>
 </div>
</div>
 

<div class="acol">
  <div class="labposition">
    <div class="labcell">
    
      <a href="index.php" id="logolab" title="<?php echo $sitetitle ?>">
			<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/logo.png" alt="" /></a>
                 
  </div>
 </div>
</div>
</div>
</div>	  
 <nav>
          <div class="container navilab">
          <div id="header"><div class="supertop hidden-xs"><div class="left"></div><div class="arm"><jdoc:include type="modules" name="leftmenu" style="none"/></div><div class="clr"></div></div></div>
        <div id="navigace">
        
<div class="levy hidden-xs">
<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/levy.png" alt="" />
</div> 

<div class="pravy hidden-xs">
<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/pravy.png" alt="" />
</div>	
		    <jdoc:include type="modules" name="position-1" style="none"/>
			<jdoc:include type="modules" name="position-0" style="none"/>
			
</div>
 </div>    
  </nav>
	</header>
	 		
		<div id="message">
		    <jdoc:include type="message" />
		</div>
		
<?php if ($this->countModules('position-12')) : ?>
<section class="introlab" id="slide">
 <div class="container"> 
  <?php if ($slide == 1) { ?>
  <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/flexslider.css" rel="stylesheet" type="text/css"/>
  <div class="flexslider image-slider">
   <ul class="slides">
		<?php foreach ($slideimages as $i=>$si): ?>
		<li>
		<img src="<?php echo $this->baseurl . '/' . $si['img']; ?>" alt="" />
		<div class="flex-caption hidden-xs"><?php echo $si['desc'];?></div>
		</li>
		<?php endforeach; ?> 
      </ul>
       </div>
	  <?php } 
	  else 
	  { ?>
		<jdoc:include type="modules" name="position-12" style="none"/>
		<?php } ?>  
		 </div>  
		  </section> 		  	
 <?php endif; ?>      
<section class="contentblock">
	<div class="container clearfix">
		 <?php if ($this->countModules('vmrandom or vmfeatured or vmlatest or vmbest or vmrecently')) : ?>
          <div class="product-tabs">
           <ul class="nav nav-tabs sortbylabs" role="tablist">
           	<?php endif; ?>
           	<?php if ($this->countModules('vmrandom')) : ?>	
              <li class="active"><a href="#random" data-toggle="tab"><?php echo JText::_('TPL_SHOPLAB_RANDOM'); ?></a></li>
                	<?php endif; ?>
               <?php if ($this->countModules('vmfeatured')) : ?>
              <li><a href="#featured" data-toggle="tab"><?php echo JText::_('TPL_SHOPLAB_FEATURED'); ?></a></li>
                	<?php endif; ?>
              <?php if ($this->countModules('vmlatest')) : ?>
              <li><a href="#latest" data-toggle="tab"><?php echo JText::_('TPL_SHOPLAB_LATEST'); ?></a></li>
                  	<?php endif; ?>
               <?php if ($this->countModules('vmbest')) : ?>  
              <li><a href="#best" data-toggle="tab"><?php echo JText::_('TPL_SHOPLAB_BEST'); ?></a></li>
                   	<?php endif; ?>
              <?php if ($this->countModules('vmrecently')) : ?>
              <li><a href="#recently" data-toggle="tab"><?php echo JText::_('TPL_SHOPLAB_RECENT'); ?></a></li>
                    	<?php endif; ?>
        <?php if ($this->countModules('vmrandom or vmfeatured or vmlatest or vmbest or vmrecently')) : ?>
            </ul>	  
            <div class="tab-content nbtabs">
            			<?php endif; ?>
            			
            <?php if ($this->countModules('vmrandom')) : ?>			
              <div class="tab-pane active" id="random">
                <div class="row">
				  <jdoc:include type="modules" name="vmrandom" style="none"/>
                </div>
              </div>
                	<?php endif; ?>
                	 <?php if ($this->countModules('vmfeatured')) : ?>
                   <div class="tab-pane" id="featured">
                <div class="row">
				  <jdoc:include type="modules" name="vmfeatured" style="none"/>
                </div>
              </div>
                  <?php endif; ?>
                  
                   <?php if ($this->countModules('vmlatest')) : ?>
                   <div class="tab-pane" id="latest">
                <div class="row">
				  <jdoc:include type="modules" name="vmlatest" style="none"/>
                </div>
              </div>
                   <?php endif; ?>
                   
                 <?php if ($this->countModules('vmbest')) : ?>  
                 <div class="tab-pane" id="best">
                <div class="row">
				  <jdoc:include type="modules" name="vmbest" style="none"/>
                </div>
              </div>
              <?php endif; ?>
              
			       <?php if ($this->countModules('vmrecently')) : ?>
			       <div class="tab-pane" id="recently">
                <div class="row">
				  <jdoc:include type="modules" name="vmrecently" style="none"/>
                </div>
              </div>  
                	<?php endif; ?>
                	
     <?php if ($this->countModules('vmrandom or vmfeatured or vmlatest or vmbest or vmrecently')) : ?>          
            </div>
          </div>
  <?php endif; ?>        

	
     <div class="row">
       <div class="relab">
<?php 
$modules_no = 0;
$modules_no += $this->countModules('position-3')?1:0;
$modules_no += $this->countModules('position-4')?1:0;
$modules_no += $this->countModules('position-5')?1:0;
switch ($modules_no) {
  case 1:  $span_class="12"; break;
  case 2:  $span_class="6"; break;
  case 3:  $span_class="4"; break;
}
?>             
<?php if ($this->countModules('position-3')) : ?>
                             <div class="col-xs-12 col-sm-<?php echo $span_class;?> col-md-<?php echo $span_class;?>">
                        	    <jdoc:include type="modules" name="position-3" style="xhtml"/>
                                  </div>
						<?php endif; ?>
<?php if ($this->countModules('position-4')) : ?>
                             <div class="col-xs-12 col-sm-<?php echo $span_class;?> col-md-<?php echo $span_class;?>">
                        	    <jdoc:include type="modules" name="position-4" style="xhtml"/>
                                  </div>
						<?php endif; ?>
<?php if ($this->countModules('position-5')) : ?>
                             <div class="col-xs-12 col-sm-<?php echo $span_class;?> col-md-<?php echo $span_class;?>">
                        	    <jdoc:include type="modules" name="position-5" style="xhtml"/>
                                  </div>
						<?php endif; ?>
    </div>
   </div>
  </div>
  
 <div class="container mainblock">
   <div class="row">    
   <?php if ($this->countModules('position-2')) : ?>
<div class="breadcrumbs-pad">
  <jdoc:include type="modules" name="position-2" />
     </div>
	   <?php endif; ?>
	    
<?php  if ($frontpage != 1) {  
 if ($menu->getActive() !== $menu->getDefault()) { 
switch (($this->countModules('position-6')?1:0) + ($this->countModules('position-7')?1:0)) {
	case 0:$span_class_component=12; break;
	case 1:$span_class_component=9; break;
	case 2:$span_class_component=6; break;
}?>      	
<?php if ($this->countModules('position-6')) : ?>
                              <div class="sidecol col-sm-3 col-md-3">
                        	    <jdoc:include type="modules" name="position-6" style="rest"/>
                                  </div>
									<?php endif; ?>	
          <div class="mainlab col-sm-<?php echo $span_class_component;?> col-md-<?php echo $span_class_component;?>">
			<jdoc:include type="component" />
				</div>
				  <?php if ($this->countModules('position-7')) : ?>
                    <div class="sidecol col-sm-3 col-md-3">
                      <jdoc:include type="modules" name="position-7" style="rest"/>
                        </div> 
						 <?php endif; ?>											
             <?php }
                  } else {
switch (($this->countModules('position-6')?1:0) + ($this->countModules('position-7')?1:0)) {
	case 0:$span_class_component=12; break;
	case 1:$span_class_component=9; break;
	case 2:$span_class_component=6; break;
} ?>  							
<?php if ($this->countModules('position-6')) : ?>
                              <div class="sidecol col-sm-3 col-md-3">
                        	    <jdoc:include type="modules" name="position-6" style="rest"/>
                                  </div>
						<?php endif; ?>
          <div class="mainlab col-sm-<?php echo $span_class_component;?> col-md-<?php echo $span_class_component;?>">
			<jdoc:include type="component" />
				</div>
				  <?php if ($this->countModules('position-7')) : ?>
                    <div class="sidecol col-sm-3 col-md-3">
                      <jdoc:include type="modules" name="position-7" style="rest"/>
                        </div> 
						 <?php endif; ?>
						  <?php } ?>
       </div>
     </div>
   </section> 
   
<?php if ($this->countModules('bottom1')) : ?>   
<div class="bottomblock">
<div class="container">
<jdoc:include type="modules" name="bottom1" style="rest"/>
</div>
</div>
<?php endif; ?>

<?php if ($this->countModules('newslab')) : ?>
    <div class="newslab">
          <jdoc:include type="modules" name="newslab" style="none"/>
			  </div>
              	<?php endif; ?>
<footer class="footerlab">
  <div class="container clearfix">
     <div class="row">
       <div class="col-md-12">
<?php 
$modules_no = 0;
$modules_no += $this->countModules('position-9')?1:0;
$modules_no += $this->countModules('position-10')?1:0;
$modules_no += $this->countModules('position-11')?1:0;
$modules_no += $this->countModules('position-13')?1:0;
switch ($modules_no) {
  case 1:  $span_class="12"; break;
  case 2:  $span_class="6"; break;
  case 3:  $span_class="4"; break;
  case 4:  $span_class="3"; break;
}
?>             
<?php if ($this->countModules('position-9')) : ?>
                             <div class="col-xs-6 col-sm-<?php echo $span_class;?> col-md-<?php echo $span_class;?>">
                        	    <jdoc:include type="modules" name="position-9" style="xhtml"/>
                                  </div>
						<?php endif; ?>
<?php if ($this->countModules('position-10')) : ?>
                             <div class="col-xs-6 col-sm-<?php echo $span_class;?> col-md-<?php echo $span_class;?>">
                        	    <jdoc:include type="modules" name="position-10" style="xhtml"/>
                                  </div>
						<?php endif; ?>
<?php if ($this->countModules('position-11')) : ?>
                             <div class="col-xs-6 col-sm-<?php echo $span_class;?> col-md-<?php echo $span_class;?>">
                        	    <jdoc:include type="modules" name="position-11" style="xhtml"/>
                                  </div>
						<?php endif; ?>
<?php if ($this->countModules('position-13')) : ?>
                             <div class="col-xs-6 col-sm-<?php echo $span_class;?> col-md-<?php echo $span_class;?>">
                        	    <jdoc:include type="modules" name="position-13" style="xhtml"/>
                                  </div>
						<?php endif; ?>
	</div>
  </div>  
</div>

       <div class="patblock">
          <div class="container">
            <div class="pull-left"><span class="copyright">&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>.</span>             <!-- Do not remove this line! Read more http://www.linelabox.com/pricing -->
					  <?php echo base64_decode('PGEgY2xhc3M9ImZib3huYW1lIGNvcHkiIGhyZWY9Imh0dHA6Ly93d3cubGluZWxhYm94LmNvbSIgdGFyZ2V0PSJfYmxhbmsiIHRpdGxlPSJKb29tbGEhIHRlbXBsYXRlIGNyZWF0ZWQgd2l0aCBMaW5lbGFib3giPkNyZWF0ZWQgd2l0aCA8c3Ryb25nPkxpbmVsYWJveDwvc3Ryb25nPjwvYT48L2Rpdj4='); ?> 
<?php if ($this->countModules('footer')) : ?>
<div class="pull-right hidden-xs">
                        	    <jdoc:include type="modules" name="footer" style="none"/>
                        	    </div>
						<?php endif; ?>
			</div>
          </div> 
      </footer>     						
	  </div>
	   <jdoc:include type="modules" name="debug" style="none"/>	 
   </body>
  </html>