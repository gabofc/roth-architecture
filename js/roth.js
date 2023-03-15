function rmenu(){

$( ".bsm1" ).click(function() {
$( ".sm1" ).slideToggle("slow", function () {
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
	

$( ".bsm2" ).click(function() {
$( ".sm2" ).slideToggle("slow", function () {
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
	
	$( ".bsm3" ).click(function() {
$( ".sm3" ).slideToggle("slow", function () {
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


$(".menutrigger2").hover(function() {

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
const menuci = document.querySelectorAll('.contactinfo div')

const TLMFADE = gsap.timeline();


$( ".menutrigger2" ).click(function() {
	
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
rmenu();