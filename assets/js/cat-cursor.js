(function () {
  // Find all 2_meow images
  var imgs = document.querySelectorAll('img[src*="2_meow"]');
  if (!imgs.length) return;

  var style = document.createElement('style');
  style.textContent =
    '.zzz-wrap { position: absolute; top: 40%; left: 30%; pointer-events: none; z-index: 10; }' +
    '.zzz-wrap .z { position: absolute; font-family: "Fredoka One", sans-serif; color: #f5a623; opacity: 0; }' +
    '.zzz-wrap .z1 { font-size: 16px; }' +
    '.zzz-wrap .z2 { font-size: 22px; }' +
    '.zzz-wrap .z3 { font-size: 30px; }';
  document.head.appendChild(style);

  imgs.forEach(function (img) {
    // Make sure parent is positioned
    var parent = img.parentElement;
    if (getComputedStyle(parent).position === 'static') {
      parent.style.position = 'relative';
    }

    // Create zzz container
    var wrap = document.createElement('div');
    wrap.className = 'zzz-wrap';
    wrap.innerHTML = '<span class="z z1">z</span><span class="z z2">z</span><span class="z z3">Z</span>';
    parent.appendChild(wrap);

    // Animate loop
    function animateZzz() {
      var zSpans = wrap.querySelectorAll('.z');
      var tl = gsap.timeline({ onComplete: animateZzz });

      tl.set(zSpans, { opacity: 0, x: 0, y: 0 });

      // z1
      tl.to(zSpans[0], { opacity: 1, x: -5, y: -18, duration: 0.6, ease: 'power1.out' }, 0);
      tl.to(zSpans[0], { opacity: 0, y: -28, duration: 0.5, ease: 'power1.in' }, 0.8);

      // z2
      tl.to(zSpans[1], { opacity: 1, x: -12, y: -38, duration: 0.6, ease: 'power1.out' }, 0.4);
      tl.to(zSpans[1], { opacity: 0, y: -50, duration: 0.5, ease: 'power1.in' }, 1.2);

      // Z3
      tl.to(zSpans[2], { opacity: 1, x: -18, y: -58, duration: 0.6, ease: 'power1.out' }, 0.8);
      tl.to(zSpans[2], { opacity: 0, y: -72, duration: 0.5, ease: 'power1.in' }, 1.6);
    }

    animateZzz();
  });
})();
