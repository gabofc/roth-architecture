function dofilter(){
	
	$('.nores').css('display','none')
	
	var arrTitulo = ["AZULIK Residences","AZULIK Siete Musas","AZULIK Tulum","Uh May Residence","Kin Toh","SFER-IK Tulum","SFER-IK Uh May","Tseen Ja","Zak Ik","Villa Holbox","Villa Holbox"];
	
	var arrType = ["Residential","Hospitality","Hotel","Residential","Restaurante","Cultural","Cultural","Cultural","Retail","Residential","Residential"]
	
	var arrLocation = ["Tulum, Quintana Roo","San José, Puerto Rico","Tulum, Quintana Roo","Uh May, Quintana Roo","Tulum, Quintana Roo","Tulum, Quintana Roo","Uh May, Quintana Roo","Tulum, Quintana Roo","Tulum, Quintana Roo","Holbox, Quintana Roo","Tulum, Quintana Roo"]

	var arrStatus = ["In design","In design","Completed","Completed","Completed","Completed","Completed","Completed","Completed","In progress","Under Construction"]

	var arrYear = ["2022-2024","Future","2014","2018","2014","2017","2018","2017","2017","2023","2020"]
		
	
		if($('.proy').is(':visible')){
			$('.proy').css("display","none"); 
		}
		
		
		var selectedType = $("#Type option:selected").val();
		var selectedLocation = $("#Location option:selected").val();
		var selectedStatus = $("#Status option:selected").val();
		var selectedYear = $("#Year option:selected").val();
		
		var inType = getAllIndexes(arrType,selectedType);
		var inLocation = getAllIndexes(arrLocation,selectedLocation)
		var inStatus = getAllIndexes(arrStatus,selectedStatus)
		var inYear = getAllIndexes(arrYear,selectedYear)
		
		var stot = 0;
		var sel = 4;
		
		var st = 1;
		var sl = 1;
		var ss = 1;
		var sy = 1;
		if (selectedType != "empty"){
			st = 0;
		}
		if (selectedLocation != "empty"){
			sl = 0;
		}
		if (selectedStatus != "empty"){
			ss = 0;
		}
		if (selectedYear != "empty"){
			sy = 0;
		}
		
		sel = st + sl + ss + sy;

		var arrResult = [4,4,4,4,4,4,4,4,4,4,4]
		
		
		for (let tindex = 0; tindex < arrResult.length; tindex++) {
			arrResult[inType[tindex]] -= 1
			arrResult[inLocation[tindex]] -= 1
			arrResult[inStatus[tindex]] -= 1
			arrResult[inYear[tindex]] -= 1
		}

		for (let rindex = 0; rindex < arrResult.length; rindex++) {
			if (arrResult[rindex] == sel){
				var elem = $('.proy');
				$(elem).each(function(e,v){
					if($(this).data('filter')==rindex){
						$(this).fadeIn(500); 
						stot ++;
						ScrollTrigger.refresh(true);
					}
				})
			}	
		}	
	 
	if (stot == 0){
		$('.nores').fadeIn(500); 		
	}
	
	
	}

function getAllIndexes(arr, val) {
    var indexes = [], i = -1;
    while ((i = arr.indexOf(val, i+1)) != -1){
        indexes.push(i);
    }
    return indexes;
}

function removeControls() {
  var video = document.querySelector('video');
  video.removeAttribute('controls');
}

function stoffm(){	
	if (ScrollTrigger.isTouch !== 1) {
  ScrollSmoother.create({
  content: "#smooth-content",
  wrapper: "#smooth-wrapper",
  smooth: 1, 
  effects: true, 
  normalizeScroll: false, 
  ignoreMobileResize: true 
});
}	
  $('#smooth-wrapper').css('overflow-x', 'hidden');
  ScrollTrigger.refresh(true);
	
}	

function stgonm(){	
  ScrollSmoother.create({
  content: "#smooth-content",
  wrapper: "#smooth-wrapper",
  smooth: 1, 
  effects: true, 
  normalizeScroll: false, 
  ignoreMobileResize: true 
});
	  gsap.to(window, {
    duration: 0,
    scrollTo: 0,
    ease: "none",
  });
	
}	

function rmenu() {

  fscrolls();
  $(".bsm1").click(function () {
    $(".sm1").slideToggle("slow", function () {
      var check = $(this).is(":hidden");
      if (check == true) {
        $(this).siblings(".arrow").animate({
          deg: 0
        }, {
          duration: 200,
          step: function (now) {
            $(this).css({
              transform: 'rotate(' + now + 'deg)'
            });
          }
        });
      } else {
        $(this).siblings(".arrow").animate({
          deg: 90
        }, {
          duration: 200,
          step: function (now) {
            $(this).css({
              transform: 'rotate(' + now + 'deg)'
            });
          }
        });
      }
    });
  });


  $(".bsm2").click(function () {
    $(".sm2").slideToggle("slow", function () {
      var check = $(this).is(":hidden");
      if (check == true) {
        $(this).siblings(".arrow").animate({
          deg: 0
        }, {
          duration: 200,
          step: function (now) {
            $(this).css({
              transform: 'rotate(' + now + 'deg)'
            });
          }
        });
      } else {
        $(this).siblings(".arrow").animate({
          deg: 90
        }, {
          duration: 200,
          step: function (now) {
            $(this).css({
              transform: 'rotate(' + now + 'deg)'
            });
          }
        });
      }


    });
  });
	
$(".bsm3").click(function () {
    $(".sm3").slideToggle("slow", function () {
      var check = $(this).is(":hidden");
      if (check == true) {
        $(this).siblings(".arrow").animate({
          deg: 0
        }, {
          duration: 200,
          step: function (now) {
            $(this).css({
              transform: 'rotate(' + now + 'deg)'
            });
          }
        });
      } else {
        $(this).siblings(".arrow").animate({
          deg: 90
        }, {
          duration: 200,
          step: function (now) {
            $(this).css({
              transform: 'rotate(' + now + 'deg)'
            });
          }
        });
      }


    });
  });	


  $(".menutrigger2").hover(function () {
    $(".menu-dot-hover", this).animate({
      opacity: 1
    }, {
      duration: 100,
      step: function (now) {
        $(this).css({
          transform: 'rotate(' + now + 'deg)'
        });
      }
    });

    $(".menudots", this).animate({
      deg: 90
    }, {
      duration: 100,
      step: function (now) {
        $(this).css({
          transform: 'rotate(' + now + 'deg)'
        });
      }
    });
  }, function () {
    $(".menu-dot-hover", this).animate({
      opacity: 0
    }, {
      duration: 200,
      step: function (now) {
        $(this).css({
          transform: 'rotate(' + now + 'deg)'
        });
      }
    });
    $(".menudots", this).animate({
      deg: 0
    }, {
      duration: 200,
      step: function (now) {
        $(this).css({
          transform: 'rotate(' + now + 'deg)'
        });
      }
    });
  });


  gsap.defaults({
    ease: "power3.out)",
  });
  // HEADER & MENU

  const menuopenb = document.querySelector('.menu-open-cont')
  const menucon = document.querySelector('.menu-open-slide')
  const menubots = document.querySelectorAll('.mainmenu li')
  const menuci = document.querySelectorAll('.cid')

  const TLMFADE = gsap.timeline();


  $(".menutrigger2").click(function () {

    TLMFADE
      .fromTo(menuopenb, {
        autoAlpha: 0
      }, {
        autoAlpha: 1,
        duration: .3
      })
      .fromTo(menucon, {
        x: '100%'
      }, {
        x: '0%',
        ease: "power2.out"
      }, '-=0.3')
      .fromTo(menubots, .5, {
        autoAlpha: 0,
        x: "-20%"
      }, {
        autoAlpha: 1,
        x: "0%",
        stagger: 0.2,
        ease: "power1.out"
      }, " -=.2")
      .fromTo(menuci, .5, {
        autoAlpha: 0
      }, {
        autoAlpha: 1,
        stagger: 0.2,
        ease: "power1.out"
      }, " +=.5")
  });

  document.querySelector('.menuclose').addEventListener("click", () => {
    TLMFADE
      .fromTo(menuci, .25, {
        autoAlpha: 1
      }, {
        autoAlpha: 0,
        stagger: 0.2,
        duration: .2,
        ease: "power1.in"
      })
      .fromTo(menubots, .25, {
        autoAlpha: 1,
        x: "0%"
      }, {
        autoAlpha: 0,
        x: "-20%",
        stagger: 0.1,
        duration: .5,
        ease: "power1.in"
      }, '-=0.5')
      .fromTo(menucon, {
        x: '0%'
      }, {
        x: '100%',
        duration: .2,
        ease: "power1.in"
      })
      .fromTo(menuopenb, {
        autoAlpha: 1
      }, {
        autoAlpha: 0,
        duration: .2
      })
  });

}

function backn() {
	  gsap.to(window, {
    duration: 0,
    scrollTo: 0,
    ease: "Power3.easingInOut",
  });

	  $(".menu-open-cont").css('z-index', '9999999');
  $('body').css('background-color', '#000');
}

function backb() {
	  gsap.to(window, {
    duration: 0,
    scrollTo: 0,
    ease: "Power3.easingInOut",
  });

	  $(".menu-open-cont").css('z-index', '9999999');
  $('body').css('background-color', '#fff');

}

function contactInit() {
  fscrolls()
  rmenu();
  bottop()
  ScrollTrigger.refresh(true);


  SplitLed(".thtit", .3);
  SplitLed(".h11", 1);

  topheader();
  animFade(".thtit", .3, 0);
  animFade(".h11", 1, 0);
  animFade(".map-pin", .5, 0);
  animFadeY(".map-pin", .5, .5, 50);
  animFade(".con-img1", 0, 0);
  animFadeY(".con-img1", 0, 1, 30);
  animFadeY("p", 0, 1,10);
  //animFadeY(".forma-contacto",2.5,1,30);


  const chbgc = document.querySelector('.contact');

  gsap.fromTo(
    chbgc, {
      backgroundColor: '#FFF',
    }, {
      backgroundColor: '#fff',
      scrollTrigger: {
        trigger: chbgc,
        scrub: true,
        start: "top center -=30%",
        end: "top center-=40%",
      }
    }
  );

  $('#contact-form').validator();


  // when the form is submitted
  $('#contact-form').on('submit', function (e) {

    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      var url = "contactf.php";

      // POST values in the background the the script URL
      $.ajax({
        type: "POST",
        url: url,
        data: $(this).serialize(),
        success: function (data) {
          // data = JSON object that contact.php returns

          // we recieve the type of the message: success x danger and apply it to the 
          var messageAlert = 'alert-' + data.type;
          var messageText = data.message;

          // let's compose Bootstrap alert box HTML
          var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';

          // If we have messageAlert and messageText
          if (messageAlert && messageText) {
            // inject the alert to .messages div in our form
            $('#contact-form').find('.messages').html(alertBox);
            // empty the form
            $('#contact-form')[0].reset();
          }
        }
      });
      return false;
    }
  })


}

function innovationInit() {

  fscrolls()
  rmenu();
  bottop()
  ScrollTrigger.refresh(true);
  animFade(".split-titulo2", 0, 0);
  SplitLid(".split-titulo2", 1);
  SplitLet(".titulo1l", 0);
  SplitLit(".split-tituloi");

  animFadeY(".phil-quote", 1, 1, 0);
  animFade(".quote-author", 0, 0);
  animFadeYpst(".quote-author", 3, .5, 10);
  animFade("p", 0, 0);
  animp("p", 20);
  animFade(".imgzorg1", 0, 0);

  topheader();

  imgzoom(".imgzorg1");
  imgzoom(".imgo2");
  animFade(".img-wrapor1", 0, 0)
  animFadeY(".img-wrapor1", 0, 1, 50);
  animFade(".img-wrapor2", 0, 0)
  animFadeYp(".img-wrapor2", 0, 1, 50);
	



}

function expertiseInit() {
	
	function removeControls() {
  var video = document.querySelector('video');
  video.removeAttribute('controls');
}

if (navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)) {
  removeControls();
}
	
  fscrolls()
  rmenu();
  bottop()
  ScrollTrigger.refresh(true);

  $('video').trigger('play');

  SplitLed(".h11", 1.5);
  SplitLet(".h1h", 0);
  SplitLed(".thtit", 1);

  topheader();
  animFade(".h11", 1.5, 0);
  animFade(".thtit", 1, 0);
  animp("p", 20);
  animp(".vidanim", 0);

}

function innovation2Init() {
	
  fscrolls()
  rmenu();
  bottop()
  ScrollTrigger.refresh(true);
	
	  $('video').trigger('play');

  SplitLed(".h11", 1.5);
  SplitLet(".h1h", 0);
  SplitLed(".thtit", 1);

  topheader();
  animFade(".h11", 1.5, 0);
  animFade(".thtit", 1, 0);
  animp("p", 20);
  animp(".vidanim", 0);
	


	
/*	

$('#playbutton').click(function(){
	 $('.vidinn').trigger( "click" );
});
	
$('.vidinn').click(function() {
        this.paused ? this.play() : this.pause();
	 if (this.paused) {
           $('#playbutton').fadeIn(300) 
        } else {
            $('#playbutton').fadeOut(300) 
        }
    });
*/
	

}

function tribeInit() {
  fscrolls()
  rmenu();
  bottop()
  ScrollTrigger.refresh(true);

  $(".team-member .team-name ").hover(function () {
    $(this).parent().animate({
      fontSize: "20px",
    }, 500);
    $(this).children(".togglearrow").animate({
      opacity: 1
    }, 500);
  }, function () {
    $(this).parent().animate({
      fontSize: "18px",
    }, 500);
    $(this).children(".togglearrow").animate({
      opacity: 0
    }, 500);
  });

  var vcual = "";
  var vcuala = "";
  var donde = "";

  $(".team-member .team-name").click(function () {
    vopen = true;
    vcuala = vcual
    vcual = $(this).data('quien');

    donde = $(this).parent().find(".trcont");

    if ($(window).width() > 767) {
      $(".bio-cont").animate({
        opacity: 1
      }, 500);
    }


    if (vcuala === $(this).data('quien')) {

      if ($(window).width() > 767) {
        $(".bio-cont").animate({
          opacity: 0
        }, 500);
        $(".rnames").animate({
          width: '100%'
        }, 500);


      } else {

        $(".bio-cont").animate({
          opacity: 0
        }, 500);

        $("." + vcual).fadeOut(500, function () {

          ScrollTrigger.refresh();
        });

      }

      vcual = "";


    } else {

      if ($(window).width() > 767) {
        $('.team-info').fadeOut(1);


        $(".rnames").animate({
          width: '55%'
        }, 500, function () {

          $(".bio-cont").animate({
            opacity: 1
          }, 100, function () {
            $("." + vcual).css('display', 'block');
            $("." + vcual).css('width', '400px');
            $("." + vcual).css('opacity', '0');
            $("." + vcual).animate({
              opacity: 1
            }, 500, function () {

              ScrollTrigger.refresh();
            });
          });
        });


      } else {

        $(".bio-cont").animate({
          opacity: 1
        }, 500);
        $('.team-info').fadeOut(1);
        $("." + vcual).appendTo(donde);
        $("." + vcual).fadeIn(500, function () {

          ScrollTrigger.refresh();
        });


      }
    }
  });


  animFade(".h1h", 0, 1);
  animFade(".topheaderi", 0, 1);

  var secs = gsap.utils.toArray(".sections");

  secs.forEach(function (section, index) {
    if (index === 0) {

      gsap.fromTo(
        section.querySelector(".team-pic"), {
          autoAlpha: 0,
          blur: 8,
        }, {
          autoAlpha: 1,
          blur: 0,
          duration: .5,
          delay: .5,
        }
      );


      gsap.fromTo(
        section.querySelector(".topheader"), {
          autoAlpha: 0,
        }, {
          autoAlpha: 1,
          duration: .5,
          delay: 2,
        }
      );

      gsap.fromTo(
        section.querySelector(".topheaderi"), {
          autoAlpha: 0,
          scaleX: 0
        }, {
          autoAlpha: 1,
          scaleX: 1,
          delay: 2.5,

        }
      );

      SplitLed(".h1h", 2);

      gsap.fromTo(
        section.querySelector(".h3h"), {
          autoAlpha: 0,
          y: -10
        }, {
          autoAlpha: 1,
          y: 0,
          delay: .5,
          duration: .5,
        }, '-=1.8'
      );


      return;
    }


  });
  if ($(window).width() > 767) {
    gsap.utils.toArray(".containertm").forEach((cont, index) => {

      let sticky = cont.querySelector('.element_stickytm')
      let noSticky = cont.querySelector('.element_nostickytm')


      gsap.to(sticky, {
        scrollTrigger: {
          trigger: sticky,
          start: "top top",
          end: `+=${noSticky.offsetHeight - sticky.offsetHeight - 650}px`,
          //markers: true, 
          // markers:{indent: 400},  
          id: index,
          pin: true,
          scrub: false,
        },
      });
    });
  }
}

function projectinInit() {

  fscrolls()
  rmenu();
  bottop()
  ScrollTrigger.refresh(true);
  animFade(".h1h", 0, 0);
  SplitLed(".h1h", 1);
  SplitLet(".pb-2", 1);

  animp("p", 20);
  topheader();
  animFadeY(".social-share", 0, 1, 10);
  imgzoomT(".imgzorg1");
  animFadeY(".img-wrap-cover-fullw", 0, 1, 30);
  imgzoomT(".imgo2");
  animFadeY(".fichatec-item", 0, .5, 0)
  animFade(".img-wrapor1", 0, 0)
  animFadeY(".img-wrapor1", 0, 1, 50);
  animFade(".fadess", 0, 0)
  animFadeY(".fadess", 0, 1, 50);


  $('.fadess').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 5000,
    cssEase: 'ease-in-out'


  });

  $('.fadess').on('afterChange', function (event, slick, currentSlide, nextSlide) {
    ScrollTrigger.refresh(true);
  });

  const st = window.__sharethis__
  if (!st) {
    conole.log("shareeeeee")
    const script = document.createElement('script')
    script.src =
      'https://platform-api.sharethis.com/js/sharethis.js#property=<your_property_id>&product=sop'
    document.body.appendChild(script)
  } else if (typeof st.initialize === 'function') {
    st.href = window.location.href
    st.initialize()
  }


}

function projectsInit() {
  fscrolls()
  rmenu();
  bottop()

  animFade(".imghproygrid", 0, 0);
  animFadeYppr(".imghproygrid", .8, .8, 20);

  ScrollTrigger.refresh(true);
	
	
	

	
	

}

function philosophyInit() {


if (navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)) {
  removeControls();
}
	
	
  fscrolls()
  rmenu();
  bottop()
  ScrollTrigger.refresh(true);
  $('video').trigger('play');

  SplitLed(".thtit", 1);
  SplitLet(".philh1", 4);
  SplitLed(".ances", 1);
  SplitLid(".pances", 3);

  topheader();
  animFade(".thtit", 1, 0);
  animph("p", 20);
  animph("li", 20);
  animFadeY(".imgsph", 0, 1, 30);
  animph(".tcenter", 20);
  animFadeY(".imgg", 0, 1, 50);


  gsap.registerPlugin(ScrollTrigger);

  const timeline = gsap.timeline();

  timeline.to("svg", {
    scrollTrigger: {
      id: "Cover",
      trigger: ".hero",
      scrub: true,
      pin: ".hero",
      start: "top top",
    },
    scale: 10,
    autoAlpha: 0
  }).to(".hero__content", {
    scrollTrigger: {
      trigger: ".hero",
      start: "top -1%",
      end: "+=100% 50px",
      toggleClass: "content-active",
    },
  })
  ScrollTrigger.refresh(true);

}

function originsInit() {

  fscrolls()
  rmenu();
  bottop()
  ScrollTrigger.refresh(true);
  animFade(".split-titulo2", 0, 0);
  SplitLid(".split-titulo2", 1);
  SplitLet(".titulo1l", 0);
  SplitLit(".split-tituloi");

  animFadeY(".phil-quote", 1, 1, 0);
  animFade(".quote-author", 0, 0);
  animFadeYpst(".quote-author", 3, .5, 10);
  animFade("p", 0, 0);
  animp("p", 20);
  animFade(".imgzorg1", 0, 0);

  topheader();

  imgzoom(".imgzorg1");
  imgzoom(".imgo2");
  animFade(".img-wrapor1", 0, 0)
  animFadeY(".img-wrapor1", 0, 1, 50);
  animFade(".img-wrapor2", 0, 0)
  animFadeYp(".img-wrapor2", 0, 1, 50);


}

function indexInit() {
	


if (navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)) {
  removeControls();
}
	
	
	  ScrollTrigger.refresh(true);
	var viewo = true;

  rmenu();
$(".menu-open-cont").css('z-index', '9999999');

  //$('body').css('background-color','#000');	
 var video1 = $('#video1')[0];

  if (window.innerHeight < window.innerWidth) {
    video1.src = "images/roth-intro.mp4";
    video1.load();
	viewo = true;
  } else {
    video1.src = "images/roth-intro.m.mp4";
    video1.load();
    viewo = false;
  }
	
video1.onended = function (e) {
	$('.text5in').fadeIn(1000)
    video1.pause();
  }

	video1.addEventListener("timeupdate", function() {
        if (this.currentTime >= 5.000 && this.currentTime <= 10.000){
			$('.head').css('display','flex')
			 $('.taglineh').css('display','block')
			$('.taglineh2').css('display','block')
          $('.text1').fadeIn(1000)
        } else if (this.currentTime >= 9.500 && this.currentTime <= 15.000){
		  $('.text1').fadeOut(500,function(){
			  $('.text2').fadeIn(1000)  
		  })
        } else if (this.currentTime >= 14.500 && this.currentTime <= 20.000){
		  $('.text2').fadeOut(500, function(){
			   $('.text3').fadeIn(1000)
		  })
        } else if (this.currentTime >= 31.000 && this.currentTime <= 36.000){
          $('.text4').fadeIn(1000)
        } else if (this.currentTime >= 36.000){
		  $('.text4').fadeOut(500)
		} else if (this.currentTime >= 20.000){
		  $('.text3').fadeOut(500)
		} 
    }, false);

	
  //});

  const menuopenb = document.querySelector('.menu-open-cont')
  const menucon = document.querySelector('.menu-open-slide')
  const menubots = document.querySelectorAll('.mainmenu li')
  const menuci = document.querySelectorAll('.cid')

  const TLMFADE = gsap.timeline();

 $(".cierrreintro").click(function () {

    TLMFADE
      .fromTo(menuopenb, {
        autoAlpha: 0
      }, {
        autoAlpha: 1,
        duration: .3
      })
      .fromTo(menucon, {
        x: '100%'
      }, {
        x: '0%',
        ease: "power2.out"
      }, '-=0.3')
      .fromTo(menubots, .5, {
        autoAlpha: 0,
        x: "-20%"
      }, {
        autoAlpha: 1,
        x: "0%",
        stagger: 0.2,
        ease: "power1.out"
      }, " -=.2")
      .fromTo(menuci, .5, {
        autoAlpha: 0
      }, {
        autoAlpha: 1,
        stagger: 0.2,
        ease: "power1.out"
      }, " +=.5")
  });

	

Object.defineProperty(HTMLMediaElement.prototype, 'playing', {
    get: function () {
        return !!(this.currentTime > 0 && !this.paused && !this.ended && this.readyState > 2);
    }
});	
	
	const videoElement = document.getElementById('#video1');
        videoElement.addEventListener('suspend', () => {
            // suspend invoked
            // show play button
        });

        videoElement.addEventListener('play', () => {
            // video is played
            // remove play button UI
        });

	$('body').on('touchstart', function () {
            const videoElement = document.getElementById('video1');
            if (videoElement.playing) {
            }
            else {
                videoElement.play();
            }
    });
	

 	



}




const loadingScreen = document.querySelector('.loading-screen')
const mainNavigation = document.querySelector('.main-navigation')

function pageTransitionIn() {
  return gsap
    .to(loadingScreen, {
      duration: .5,
      scaleY: 1,
      transformOrigin: 'bottom left'
    })
}

function pageTransitionOut(container) {
  return gsap
    .timeline({
      delay: 1
    })
    .add('start')
    .to(loadingScreen, {
      duration: 0.5,
      scaleY: 0,
      skewX: 0,
      transformOrigin: 'top left',
      ease: 'power1.out'
    }, 'start');
	



}

$(function () {

  function byescripts() {
    $('script').each(function () {
      if (this.src === 'https://apps.elfsight.com/p/platform.js' || this.src === 'https://widgets.sociablekit.com/linkedin-page-jobs/widget.js' || this.src === 'https://platform-api.sharethis.com/js/sharethis.js#property=63a60f2f65735e001232db71&product=sop') {
        this.parentNode.removeChild(this);
      }
    });
  }


  barba.use(barbaPrefetch);

  barba.init({
	prevent: ({ el }) => el.classList && el.classList.contains('prevent-barba'),
    transitions: [{
      async leave(data) {
        await pageTransitionIn()
        data.current.container.remove()
        ScrollTrigger.refresh();
         $('.menu-open-cont').css('z-index','-1')
		
        backb();
        let triggers = ScrollTrigger.getAll();
        triggers.forEach(trigger => {
          trigger.kill();
        });
      },
      async enter(data) {
		  window.scrollTo(0, 0);
setTimeout(() => { window.scrollTo(0, 0); }, 100);
		  
		  $('.menu-open-cont').css('z-index','9999999')
        await pageTransitionOut(data.next.container)
      },  
		
		

		
		
		
    }],
    views: [{
      namespace: 'index',
      afterEnter(data) {
        backn();
        indexInit();
      }
    }, {
      namespace: 'origins',
      afterEnter(data) {
        originsInit();
      }
    }, {
      namespace: 'philosophy',
      afterEnter(data) {
        philosophyInit();
      }
    }, {
      namespace: 'projects',
      afterEnter(data) {
        projectsInit();
      }
    }, {
      namespace: 'azuliktulum',
      afterEnter(data) {
        projectinInit();
      }
    }, {
      namespace: 'azuliksiete',
      afterEnter(data) {
        loonce = false;
        projectinInit();
      }
    }, {
      namespace: 'uhmay',
      afterEnter(data) {
        loonce = false;
        projectinInit();
      }
    }, {
      namespace: 'azulikresi',
      afterEnter(data) {
        loonce = false;
        projectinInit();
      }
    }, {
      namespace: 'kintoh',
      afterEnter(data) {

        projectinInit();
      }
    }, {
      namespace: 'sferikt',
      afterEnter(data) {

        projectinInit();
      }
    }, {
      namespace: 'sferikm',
      afterEnter(data) {

        projectinInit();
      }
    }, {
      namespace: 'tseenja',
      afterEnter(data) {

        projectinInit();
      }
    }, {
      namespace: 'zakik',
      afterEnter(data) {
        loonce = false;
        projectinInit();
      }
    }, {
      namespace: 'neom',
      afterEnter(data) {
        loonce = false;
        projectinInit();
      }
    }, {
      namespace: 'casamax',
      afterEnter(data) {
        loonce = false;
        projectinInit();
      }
    }, {
      namespace: 'villaholbox',
      afterEnter(data) {
        loonce = false;
        projectinInit();
      }
    }, {
      namespace: 'tribe',
      afterEnter(data) {
        tribeInit();
      }
    }, {
      namespace: 'expertise',
      afterEnter(data) {
        expertiseInit();
      }
    }, {
      namespace: 'innovation',
      afterEnter(data) {
        innovationInit();
      }
    }, {
      namespace: 'innovation2',
      afterEnter(data) {
        innovation2Init();
      }
    }, {
      namespace: 'contact',
      afterEnter(data) {
        contactInit();
      }
    }, ]
  });
	
	
	
	
  barba.hooks.enter((data) => {
  gsap.to(window, {
    duration: 0,
    scrollTo: 0,
    ease: "none",
  });

    if (data.next.namespace === 'origins') {

      const script = document.createElement('script');
      script.src =
        'https://apps.elfsight.com/p/platform.js';
      script.async = true;

      document.body.appendChild(script);

      ScrollTrigger.refresh(true);

    } else if (data.next.namespace === 'tribe') {

      const script = document.createElement('script');
      script.src =
        'https://widgets.sociablekit.com/linkedin-page-jobs/widget.js';
      script.async = true;

      document.body.appendChild(script);

      ScrollTrigger.refresh(true);
    }
	  


  });


	
  barba.hooks.after(() => {
    gtag('set', 'page_path', window.location.pathname);
    gtag('event', 'page_view');
  });
	
	
	
  barba.hooks.beforeEnter(() => {
   stgonm();
   stgoffm();
  });
	
	



});
