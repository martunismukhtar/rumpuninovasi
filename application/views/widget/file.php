<div id="project">

  <div class="container">

    <div class="row">
      <!-- filter_block -->
      <div id="options" class="col-md-12" style="text-align: center;">
        <ul id="filter" class="option-set" data-option-key="filter">
          <li><a class="selected" href="#filter" data-option-value="*" class="current">Files</a></li>
          <li><a href="#filter" data-option-value=".sistem">Sistem Informasi</a></li>
          <li><a href="#filter" data-option-value=".video">Video</a></li>
          <li><a href="#filter" data-option-value=".foto">Foto</a></li>
          <li><a href="#filter" data-option-value=".dokumen">Dokumen</a></li>
        </ul>
      </div><!-- //filter_block -->



      <div class="portfolio_block columns3   pretty" data-animated="fadeIn">
        <div class="element col-sm-4   gall video">
          <a class="plS" href="https://www.youtube.com/watch?v=HyNM10oSlHk" rel="prettyPhoto[gallery2]">
            <img class="img-responsive picsGall" src="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/thumb_pic1.jpg" alt="pic1 Gallery"/>
          </a>
          <div class="view project_descr ">
            <h3><a href="#">Recycled Paper - Business Card Mock Up</a></h3>
          </div>
        </div>
        <div class="element col-sm-4  gall video">
          <a class="plS" href="https://www.youtube.com/watch?v=pghjFBq5vnw" rel="prettyPhoto[gallery2]">
            <img class="img-responsive picsGall" src="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/thumb_pic2.jpg" alt="pic2 Gallery"/>
          </a>
          <div class="view project_descr center">
            <h3><a href="#">Environment Logos Set</a></h3>
          </div>
        </div>
        <div class="element col-sm-4  gall foto">
          <a class="plS" href="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/pic3.jpg" rel="prettyPhoto[gallery2]">
            <img class="img-responsive picsGall" src="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/thumb_pic3.jpg" alt="pic3 Gallery"/>
          </a>
          <div class="view project_descr ">
            <h3><a href="#">Beag Simple foto UI</a></h3>
          </div>
        </div>



        <div class="element col-sm-4  gall  dokumen">
          <a class="plS" href="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/pic4.jpg" target="_blank">
            <img class="img-responsive picsGall" src="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/thumb_pic4.jpg" alt="pic1 Gallery"/>
          </a>
          <div class="view project_descr ">
            <h3><a href="#">Pop Candy Text Effect</a></h3>
          </div>
        </div>
        <div class="element col-sm-4  gall  foto">
          <a class="plS" href="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/pic5.jpg" rel="prettyPhoto[gallery2]">
            <img class="img-responsive picsGall" src="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/thumb_pic5.jpg" alt="pic1 Gallery"/>
          </a>
          <div class="view project_descr center">
            <h3><a href="#">User Interface Elements</a></h3>
          </div>
        </div>
        <div class="element col-sm-4  gall  sistem">
          <a class="plS" href="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/pic6.jpg" rel="prettyPhoto[gallery2]">
            <img class="img-responsive picsGall" src="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/thumb_pic6.jpg" alt="pic1 Gallery"/>
          </a>
          <div class="view project_descr ">
            <h3><a href="#">Stationery video Mock Up</a></h3>
          </div>
        </div>
        <div class="element col-sm-4   gall video">
          <a class="plS" href="https://www.youtube.com/watch?v=SpXBlhnVSKY" rel="prettyPhoto[gallery2]">
            <img class="img-responsive picsGall" src="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/thumb_pic7.jpg" alt="pic1 Gallery"/>
          </a>
          <div class="view project_descr ">
            <h3><a href="#">Darko - Business Card Mock Up</a></h3>
          </div>
        </div>

        <div class="element col-sm-4  gall dokumen">
          <a class="plS" href="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/pic8.jpg" target="_blank">
            <img class="img-responsive picsGall" src="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/thumb_pic8.jpg" alt="pic1 Gallery"/>
          </a>
          <div class="view project_descr ">
            <h3><a href="#">Foil Mini Badges</a></h3>
          </div>
        </div>

        <div class="element col-sm-4  gall sistem">
          <a class="plS" href="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/pic9.jpg" rel="prettyPhoto[gallery2]">
            <img class="img-responsive picsGall" src="<?php echo base_url(); ?>gudang/images/prettyPhotoImages/thumb_pic9.jpg" alt="pic1 Gallery"/>
          </a>
          <div class="view project_descr ">
            <h3><a href="#">Woody Poster Text Effect</a></h3>
          </div>
        </div>
      </div>





    </div>

    <script type="text/javascript">
    jQuery(window).load(function(){
      $('#container').isotope({
        animationOptions: {
          duration: 900,
          queue: false
        }
      });
    });
    </script>
    <script type="text/javascript" charset="utf-8">

    jQuery(document).ready(function(){
      jQuery(".pretty a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false, social_tools: ''});
    });
    </script>
  </div>
</div>
