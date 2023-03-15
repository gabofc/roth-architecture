
function fscrolls(){
gsap.registerPlugin(ScrollTrigger, SplitText, DrawSVGPlugin);
//ScrollTrigger.normalizeScroll(true);
ScrollTrigger.config({ ignoreMobileResize: true });


	
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
	


}

////******////
// propiedad de Blur
////******////
(function () {
  const blurProperty = gsap.utils.checkPrefix("filter"),
    blurExp = /blur\((.+)?px\)/,
    getBlurMatch = target => (gsap.getProperty(target, blurProperty) || "").match(blurExp) || [];

  gsap.registerPlugin({
    name: "blur",
    get(target) {
      return +(getBlurMatch(target)[1]) || 0;
    },
    init(target, endValue) {
      let data = this,
        filter = gsap.getProperty(target, blurProperty),
        endBlur = "blur(" + endValue + "px)",
        match = getBlurMatch(target)[0],
        index;
      if (filter === "none") {
        filter = "";
      }
      if (match) {
        index = filter.indexOf(match);
        endValue = filter.substr(0, index) + endBlur + filter.substr(index + match.length);
      } else {
        endValue = filter + endBlur;
        filter += filter ? " blur(0px)" : "blur(0px)";
      }
      data.target = target;
      data.interp = gsap.utils.interpolate(filter, endValue);
    },
    render(progress, data) {
      data.target.style[blurProperty] = data.interp(progress);
    }
  });
})();





////******////
// boton back to top
////******////
function bottop(){
$(".bot-backtotop").click(function () {
  gsap.to(window, {
    duration: 2,
    scrollTo: 0,
    ease: "Power3.easingInOut",
  });
});
}

////******////
// funcion letra por letra sin delay con scrolltroger
// (".clase")
////******////
function SplitLet(hobj) {
  const targets = gsap.utils.toArray(hobj);
  targets.forEach((target) => {
    let SplitClient = new SplitText(target, {
      type: "words,chars"
    });
    let chars = SplitClient.chars; 
    gsap.from(chars, {
		autoAlpha:0,
      duration: 0.8,
      opacity: 0,
      y: 10,
      ease: "Power3.easingInOut",
      stagger: 0.2,
      blur: 8,
      scrollTrigger: {
        trigger: target,
        //markers: true,
        start: "top 90%",
        end: "bottom 70%",
        scrub: true
      }
    });
  });
}


////******////
// funcion letra por letra con delay
// (".clase", delay)
////******////

function SplitLed(hobj, eldel) {
  const targets = gsap.utils.toArray(hobj);
  targets.forEach((target) => {
    let SplitClient = new SplitText(target, {
      type: "words,chars"
    });
    let chars = SplitClient.chars; 
    gsap.from(chars, {
		autoAlpha:0,
      duration: 0.4,
      opacity: 0,
      y: 10,
      ease: "Power3.easingInOut",
      stagger: 0.1,
      blur: 8,
      delay: eldel,

    });
  });
}

////******////
// funcion linea por linea con dalay (titulos y otros)
// (".clase", delay)
////******////

function SplitLid(objlid, dellid) {
  const splitLines = new SplitText(objlid, {
    type: "lines",
    linesClass: "linei linei++"
  });
  var lacll = objlid+" .linei";
  jQuery(lacll).wrap('<div class="linei-wrapper">');
  const hlinel = gsap.utils.toArray(".linei")
  gsap.from(hlinel, {
    yPercent: 200,
    duration: 1,
    stagger: 0.4,
    blur: 8,
	opacity:0,
    ease: "Power3.easingInOut",
    delay: dellid,

  });
}


////******////
// funcion linea por linea con scrollTrigger (titulos y otros)
// (".clase")
////******////

function SplitLit(objlit) {
  const splitLinest = new SplitText(objlit, {
    type: "lines",
    linesClass: "linet linet++"
  });
  var laclt = objlit+" .linet";
  jQuery(laclt).wrap('<div class="linet-wrapper">');
  const hlinet = gsap.utils.toArray(".linet")
  gsap.from(hlinet, {
    yPercent: 200,
    duration: 1,
    stagger: 0.4,
    blur: 8,
	opacity:0,
    ease: "Power3.easingInOut",
    scrollTrigger: {
      trigger: hlinet,
      //markers: true,
      start: "90% 100%",
	end: "90% 70%",
      scrub: true,
      // uncomment the next line if you want the animation to reverse when scrolling backwards. Or set scrub: true to have it sync with the scrollbar position
      //toggleActions: "play complete  complete complete"
    }
  });
}

////******////
// funcion parrafos por parafo o clase por clase 
// (".clase", y)
////******////

function animp(objcl, ely) {
gsap.set(objcl, {autoAlpha:0, y:ely });	
	
ScrollTrigger.batch(objcl, {
  //interval: 0.1, // time window (in seconds) for batching to occur. 
  //batchMax: 3,   // maximum batch size (targets)
  onEnter: batch => gsap.to(batch, {autoAlpha: 1, y: 0,   stagger:.15, overwrite: true}),
  onLeave: batch => gsap.to(batch, {autoAlpha: 0, y: ely,  overwrite: true}),
  onEnterBack: batch => gsap.to(batch, {autoAlpha: 1, y: 0,   stagger: 0.15, overwrite: true}),
  onLeaveBack: batch => gsap.to(batch, {autoAlpha: 0, y: ely,  overwrite: true})
  // you can also define things like start, end, etc.
});

}

function animph(objcl, ely) {
gsap.set(objcl, {autoAlpha:0, y:ely });	
	
ScrollTrigger.batch(objcl, {
  //interval: 0.1, // time window (in seconds) for batching to occur. 
  //batchMax: 3,   // maximum batch size (targets)
  onEnter: batch => gsap.to(batch, {autoAlpha: 1, y: 0,   stagger:.15, overwrite: true}),
  //onLeave: batch => gsap.to(batch, {autoAlpha: 1, y: 0,  overwrite: true}),
  //onEnterBack: batch => gsap.to(batch, {autoAlpha: 1, y: 0,   stagger: 0.15, overwrite: true}),
  //onLeaveBack: batch => gsap.to(batch, {autoAlpha: 0, y: ely,  overwrite: true})
  // you can also define things like start, end, etc.
});

}


////******////
// funcion fadein elementos en general
// (".clase", delay, duacion)
// se puede usar tambien para manipular la visibildad de un objeto, junta con la clase ".vish"
////******////
function animFade(objcl, eldel, dura) {
const hlinef = gsap.utils.toArray(objcl);	
  gsap.fromTo(hlinef, {
      autoAlpha: 0,
    },{
    duration:dura,
    stagger: 0.5,
	autoAlpha:1,
    ease: "Power3.easingInOut",
    scrollTrigger: {
	  delay: eldel,
      trigger: hlinef,
      //markers: true,s
      start: "top bottom",
      // uncomment the next line if you want the animation to reverse when scrolling backwards. Or set scrub: true to have it sync with the scrollbar position
      //toggleActions: "play complete  complete complete"
    }
  });
}

////******////
// funcion linea de header
////******////
function topheader() {
	const hline = gsap.utils.toArray(".topheader");
	const hlinei = gsap.utils.toArray(".topheaderi");
	//gsap.set(hline, {autoAlpha:0});	
	
	gsap.defaults({ease: "Power3.easingInOut"});
gsap.set(".topheader", {autoAlpha: 0});
gsap.set(".topheaderi", {scaleX: 0});
	
ScrollTrigger.batch(".topheader", {
  //interval: 0.1, // time window (in seconds) for batching to occur. 
  //batchMax: 3,   // maximum batch size (targets)
  onEnter: batch => gsap.to(batch, {autoAlpha: 1,  stagger:.15, overwrite: true}),
  onLeave: batch => gsap.set(batch, {autoAlpha: 0,  overwrite: true}),
  onEnterBack: batch => gsap.to(batch, {autoAlpha: 1,  stagger: 0.15, overwrite: true}),
  onLeaveBack: batch => gsap.set(batch, {autoAlpha: 0,  overwrite: true})
  // you can also define things like start, end, etc.
});
	ScrollTrigger.batch(".topheaderi", {
  //interval: 0.1, // time window (in seconds) for batching to occur. 
  //batchMax: 3,   // maximum batch size (targets)
  onEnter: batch => gsap.to(batch, {scaleX: 1,  stagger: .15, overwrite: true}),
  onLeave: batch => gsap.set(batch, {scaleX: 0,  overwrite: true}),
  onEnterBack: batch => gsap.to(batch, {scaleX: 1,  stagger: 0.15, overwrite: true}),
  onLeaveBack: batch => gsap.set(batch, {scaleX: 0,  overwrite: true})
	,start: "top 70%",
  // you can also define things like start, end, etc.
});
	
	
/*ScrollTrigger.batch(hline, {
    onEnter: (elements1, triggers1) => {
      gsap.from(elements1, {
     autoAlpha:0,
      delay:  .5,
        stagger: 0.15
      });
    },
  
  start: "top 70%",

  });
	
	
	  ScrollTrigger.batch(hlinei, {
    onEnter: (elements, triggers) => {
      gsap.from(elements, {
      scaleX: 0,
      delay:  .5,
        stagger: 0.15
      });
    },
  
  start: "top 70%",

  });*/




}


////******////
// funcion zoom imagen
// (".clase")
////******////
function imgzoom(laclase) {
	const hline = gsap.utils.toArray(laclase);
	gsap.fromTo(hline, {
      autoAlpha: 0,
    }, {
      autoAlpha: 1,
			   stagger: .5,
    }
  );
   gsap.fromTo(hline, {
      scaleX: 1,
      scaleY: 1
    }, {
      scaleX: 1.05,
      scaleY: 1.05,
      duration: 15,
		repeat: -1,
		yoyo: true, 
		transformOrigin: 'center center'}
  );
}


////******////
// funcion zoom imagen con scrolltriger
// (".clase")
////******////
function imgzoomT(laclase) {
	const hline = gsap.utils.toArray(laclase);
	gsap.fromTo(hline, {
      autoAlpha: 0,
    }, {
      autoAlpha: 1,
	  scrollTrigger: {
      trigger: hline,
		  //markers:true,
      start: "top center",
    }
    }
  );
   gsap.fromTo(hline, {
      scaleX: 1,
      scaleY: 1
    }, {
      scaleX: 1.05,
      scaleY: 1.05,
      duration: 15,
		repeat: -1,
		yoyo: true, 
		transformOrigin: 'center center'
   }
)
}

////******////
// funcion fadein y sube elementos en general
// (".clase", delay, duacion, y)
////******////
function animFadeY(objcl, eldel, dura, ely) {

gsap.set(objcl, {autoAlpha:0, y:ely });	
	
  ScrollTrigger.batch(objcl, {
    onEnter: (elements, triggers) => {
      gsap.to(elements, {
        duration:dura,
	y:0,  
    stagger: 0.5,
	autoAlpha:1,
    ease: "Power3.easingInOut",
    delay: eldel,
		  
      });
    },
    onEnterBack: (elements, triggers) => {
       gsap.from(elements, {
       duration:dura,
	y:ely,  
    stagger: 0.5,
	autoAlpha:0,
    ease: "Power3.easingInOut",
    delay: eldel,
      });
    },
  start: "top 70%",
toggleActions: "play complete  complete  play",	

	
}
)}


function animFadeYp(objcl, eldel, dura, ely) {

gsap.set(objcl, {autoAlpha:0, y:ely });	
	
  ScrollTrigger.batch(objcl, {
    onEnter: (elements, triggers) => {
      gsap.to(elements, {
        duration:dura,
	y:0,  
    stagger: 0.5,
	autoAlpha:1,
    ease: "Power3.easingInOut",
    delay: eldel,
		  
      });
    },
  start: "center bottom",
toggleActions: "play complete  complete  play",	

	
}
)}


function animFadeYppr(objcl, eldel, dura, ely) {

gsap.set(objcl, {autoAlpha:0, y:ely });	
	
  ScrollTrigger.batch(objcl, {
    onEnter: (elements, triggers) => {
      gsap.to(elements, {
        duration:dura,
	y:0,  
    stagger: 0.5,
	autoAlpha:1,
    ease: "Power3.easingInOut",
    delay: eldel,
		  
      });
    },
  start: "botom bottom",
toggleActions: "play complete  complete  play",	

	
}
)}

function animFadeYpst(objcl, eldel, dura, ely) {

gsap.set(objcl, {autoAlpha:0, y:ely });	
  ScrollTrigger.batch(objcl, {
    onEnter: (elements, triggers) => {
      gsap.to(elements, {
        duration:dura,
	y:0,  
    stagger: 0.5,
	autoAlpha:1,
    ease: "Power3.easingInOut",
    delay: eldel,
		  
      });
}
	   });
}


