document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger);

  var isMobile = window.innerWidth < 992;

  document.querySelectorAll(".about-section.benevole-block, .about-section.homepage-apropos").forEach(function (section) {
    if (section.querySelector(".quiz-container") || section.querySelector("form")) return;

    var isOrange = section.classList.contains("orange");
    var imageOnLeft = isOrange;

    var shape = section.querySelector(".image .shape");
    var illustration = section.querySelector(".image > img");
    var imageContainer = section.querySelector(".image");
    var textBlock = section.querySelector(".wraper > .right");

    if (!shape && !illustration && !textBlock) return;

    var imageFromX = imageOnLeft ? -200 : 200;
    var textFromX = imageOnLeft ? 200 : -200;

    if (isMobile) {
      // Mobile: always text from left, illustration from right
      var mobileTextX = -200;
      var mobileImageX = 200;

      // For homepage-apropos, use the mobile-only-illustration instead
      var mobileIllustration = section.querySelector(".mobile-only-illustration");
      if (mobileIllustration) {
        imageContainer = mobileIllustration;
        illustration = mobileIllustration.querySelector("img");
      }

      // Mobile: text animates on its own trigger
      if (textBlock) {
        gsap.from(textBlock, {
          opacity: 0,
          x: mobileTextX,
          duration: 0.7,
          ease: "power2.out",
          scrollTrigger: {
            trigger: textBlock,
            start: "top 85%",
            toggleActions: "play none none none"
          }
        });
      }

      // Mobile: illustration animates on its own trigger
      if (imageContainer && illustration) {
        gsap.from(illustration, {
          opacity: 0,
          x: mobileImageX,
          duration: 0.7,
          ease: "power2.out",
          scrollTrigger: {
            trigger: imageContainer,
            start: "top 85%",
            toggleActions: "play none none none"
          }
        });
      }
    } else {
      // Desktop: all together on one timeline
      var tl = gsap.timeline({
        scrollTrigger: {
          trigger: section,
          start: "top 75%",
          end: "bottom 25%",
          toggleActions: "play none none none"
        }
      });

      if (textBlock) {
        tl.from(textBlock, { opacity: 0, x: textFromX, duration: 0.7, ease: "power2.out" });
      }
      if (shape) {
        tl.from(shape, { opacity: 0, duration: 0.6, ease: "power2.out" }, "-=0.3");
      }
      if (illustration) {
        tl.from(illustration, { opacity: 0, x: imageFromX, duration: 0.7, ease: "power2.out" }, "-=0.3");
      }
    }
  });

  // Temoignages section
  document.querySelectorAll(".temoignages-section").forEach(function (section) {
    var shape = section.querySelector(".temoignages-image .shape");
    var illustration = section.querySelector(".temoignages-image > img");
    var imageContainer = section.querySelector(".temoignages-image");
    var textBlock = section.querySelector(".temoignages-slider");

    if (isMobile) {
      if (textBlock) {
        gsap.from(textBlock, {
          opacity: 0, x: 200, duration: 0.7, ease: "power2.out",
          scrollTrigger: { trigger: textBlock, start: "top 85%", toggleActions: "play none none none" }
        });
      }
      if (imageContainer) {
        var tlImg = gsap.timeline({
          scrollTrigger: { trigger: imageContainer, start: "top 85%", toggleActions: "play none none none" }
        });
        if (shape) tlImg.from(shape, { opacity: 0, duration: 0.6, ease: "power2.out" });
        if (illustration) tlImg.from(illustration, { opacity: 0, x: -200, duration: 0.7, ease: "power2.out" }, "-=0.3");
      }
    } else {
      var tl = gsap.timeline({
        scrollTrigger: { trigger: section, start: "top 75%", toggleActions: "play none none none" }
      });
      if (textBlock) tl.from(textBlock, { opacity: 0, x: 200, duration: 0.7, ease: "power2.out" });
      if (shape) tl.from(shape, { opacity: 0, duration: 0.6, ease: "power2.out" }, "-=0.3");
      if (illustration) tl.from(illustration, { opacity: 0, x: -200, duration: 0.7, ease: "power2.out" }, "-=0.3");
    }
  });

  // Zzz animation on sleeping cat (2_meow)
  var zzzStyle = document.createElement('style');
  zzzStyle.textContent =
    '.zzz-wrap { position: absolute; pointer-events: none; z-index: 10; }' +
    '.zzz-wrap.zzz-meow { top: 40%; left: 37%; }' +
    '.zzz-wrap.zzz-meaow { top: 5%; left: 75%; }' +
    '.zzz-wrap .z { position: absolute; font-family: "Fredoka One", sans-serif; color: #f5a623; opacity: 0; }' +
    '.zzz-wrap .z1 { font-size: 16px; }' +
    '.zzz-wrap .z2 { font-size: 22px; }' +
    '.zzz-wrap .z3 { font-size: 30px; }';
  document.head.appendChild(zzzStyle);

  document.querySelectorAll('img[src*="2_meow"], img[src*="8_meaow"]').forEach(function (img) {
    var parent = img.parentElement;
    if (getComputedStyle(parent).position === 'static') {
      parent.style.position = 'relative';
    }

    var isMeaow = img.src.indexOf('8_meaow') !== -1;
    var wrap = document.createElement('div');
    wrap.className = 'zzz-wrap ' + (isMeaow ? 'zzz-meaow' : 'zzz-meow');
    wrap.innerHTML = '<span class="z z1">z</span><span class="z z2">z</span><span class="z z3">Z</span>';
    parent.appendChild(wrap);

    function animateZzz() {
      var zSpans = wrap.querySelectorAll('.z');
      var tl = gsap.timeline({ onComplete: animateZzz });
      tl.set(zSpans, { opacity: 0, x: 0, y: 0 });
      tl.to(zSpans[0], { opacity: 1, x: -5, y: -18, duration: 0.6, ease: 'power1.out' }, 0);
      tl.to(zSpans[0], { opacity: 0, y: -28, duration: 0.5, ease: 'power1.in' }, 0.8);
      tl.to(zSpans[1], { opacity: 1, x: -12, y: -38, duration: 0.6, ease: 'power1.out' }, 0.4);
      tl.to(zSpans[1], { opacity: 0, y: -50, duration: 0.5, ease: 'power1.in' }, 1.2);
      tl.to(zSpans[2], { opacity: 1, x: -18, y: -58, duration: 0.6, ease: 'power1.out' }, 0.8);
      tl.to(zSpans[2], { opacity: 0, y: -72, duration: 0.5, ease: 'power1.in' }, 1.6);
    }

    // Wait for the illustration's scroll animation to finish before starting zzz
    ScrollTrigger.create({
      trigger: img,
      start: "top 85%",
      onEnter: function () {
        gsap.delayedCall(1.5, animateZzz);
      },
      once: true
    });
  });
});
