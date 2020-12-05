
</div>
<div class="lineBlack">
  <div class="container">
    <div class="row downLine">
      <div class="col-md-12 text-right">
        <!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
        <input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
      </div>
      <div class="col-md-6 text-left copy">
        <p>Copyright &copy; 2016 Sri. All right Reserved. </p>
      </div>
      <div class="col-md-6 text-right dm">
        <ul id="downMenu">
          <li class="active"><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#project1">Projects</a></li>
          <li><a href="#news">News</a></li>
          <li class="last"><a href="#contact">Contact</a></li>
          <!--li><a href="#features">Features</a></li-->
        </ul>
      </div>
    </div>
  </div>
</div>


<script src="<?php echo base_url(); ?>gudang/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>gudang/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>gudang/js/jquery.slicknav.js"></script>
<script>
  $(document).ready(function(){
  $(".bhide").click(function(){
    $(".hideObj").slideDown();
    $(this).hide(); //.attr()
    return false;
  });
  $(".bhide2").click(function(){
    $(".container.hideObj2").slideDown();
    $(this).hide(); // .attr()
    return false;
  });

  $('.heart').mouseover(function(){
      $(this).find('i').removeClass('fa-heart-o').addClass('fa-heart');
    }).mouseout(function(){
      $(this).find('i').removeClass('fa-heart').addClass('fa-heart-o');
    });

    function sdf_FTS(_number,_decimal,_separator)
    {
    var decimal=(typeof(_decimal)!='undefined')?_decimal:2;
    var separator=(typeof(_separator)!='undefined')?_separator:'';
    var r=parseFloat(_number)
    var exp10=Math.pow(10,decimal);
    r=Math.round(r*exp10)/exp10;
    rr=Number(r).toFixed(decimal).toString().split('.');
    b=rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1"+separator);
    r=(rr[1]?b+'.'+rr[1]:b);

    return r;
}

  setTimeout(function(){
      $('#counter').text('0');
      $('#counter1').text('0');
      $('#counter2').text('0');
      setInterval(function(){

        var curval=parseInt($('#counter').text());
        var curval1=parseInt($('#counter1').text().replace(' ',''));
        var curval2=parseInt($('#counter2').text());
        if(curval<=707){
          $('#counter').text(curval+1);
        }
        if(curval1<=12280){
          $('#counter1').text(sdf_FTS((curval1+20),0,' '));
        }
        if(curval2<=245){
          $('#counter2').text(curval2+1);
        }
      }, 2);

    }, 500);
  });
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery('#menu').slicknav();

});
</script>

<script type="text/javascript">
$(document).ready(function(){

    var $menu = $("#menuF");

    $(window).scroll(function(){
        if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
            $menu.fadeOut('fast',function(){
                $(this).removeClass("default")
                       .addClass("fixed transbg")
                       .fadeIn('fast');
            });
        } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
            $menu.fadeOut('fast',function(){
                $(this).removeClass("fixed transbg")
                       .addClass("default")
                       .fadeIn('fast');
            });
        }
    });
});
//jQuery
</script>
<script>
/*menu*/
function calculateScroll() {
  var contentTop      =   [];
  var contentBottom   =   [];
  var winTop      =   $(window).scrollTop();
  var rangeTop    =   200;
  var rangeBottom =   500;
  $('.navmenu').find('a').each(function(){
    contentTop.push( $( $(this).attr('href') ).offset().top );
    contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
  })
  $.each( contentTop, function(i){
    if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
      $('.navmenu li')
      .removeClass('active')
      .eq(i).addClass('active');
    }
  })
};

$(document).ready(function(){
  calculateScroll();
  $(window).scroll(function(event) {
    calculateScroll();
  });
  $('.navmenu ul li a').click(function() {
    $('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 800);
    return false;
  });
});
</script>
<script type="text/javascript" charset="utf-8">

jQuery(document).ready(function(){
  jQuery(".pretty a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true, social_tools: ''});

});

jQuery(function($) {
     var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
     $('ul a').each(function() {
      if (this.href === path) {
       $(this).addClass('active');
      }
     });
    });
</script>
</body>

</html>
