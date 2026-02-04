(function(){
    var btn = document.getElementById('mobile-menu-toggle');
    if (!btn) return;
    btn.addEventListener('click', function(){
        var menu = document.querySelector('.menu');
        if (!menu) return;
        var expanded = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', !expanded);
        menu.style.display = expanded ? 'none' : 'flex';
    });
    
    // Add mobile submenu toggles
    var submenuParents = document.querySelectorAll('.menu li:has(.sub-menu)');
    submenuParents.forEach(function(li){
        var toggle = document.createElement('button');
        toggle.className = 'submenu-toggle';
        toggle.innerHTML = '+';
        toggle.setAttribute('aria-expanded','false');
        li.insertBefore(toggle, li.firstChild.nextSibling);
        var sub = li.querySelector('.sub-menu');
        toggle.addEventListener('click', function(e){
            e.preventDefault();
            var open = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', !open);
            if (!open) { sub.style.display = 'block'; toggle.innerHTML = '—'; }
            else { sub.style.display = 'none'; toggle.innerHTML = '+'; }
        });
    });

    // Scroll reveal for elements with data-reveal attribute
    var revealElems = [].slice.call(document.querySelectorAll('[data-reveal]'));
    if ('IntersectionObserver' in window && revealElems.length) {
        var revealObserver = new IntersectionObserver(function(entries){
            entries.forEach(function(entry){
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    // once visible, unobserve to avoid re-trigger
                    revealObserver.unobserve(entry.target);
                }
            });
        },{root:null,rootMargin:'0px 0px -8% 0px',threshold:0.08});

        revealElems.forEach(function(el){ revealObserver.observe(el); });
    } else {
        // Fallback: reveal immediately
        revealElems.forEach(function(el){ el.classList.add('is-visible'); });
    }

    // Hero parallax (requestAnimationFrame throttled)
    (function(){
        var hero = document.querySelector('.hero');
        if (!hero) return;
        var heroWrap = hero.querySelector('.wrap') || hero;
        var latestKnownScrollY = 0;
        var ticking = false;

        function onScroll(){
            latestKnownScrollY = window.scrollY || window.pageYOffset;
            requestTick();
        }

        function requestTick(){
            if (!ticking) { requestAnimationFrame(update); }
            ticking = true;
        }

        function update(){
            ticking = false;
            var rect = hero.getBoundingClientRect();
            // compute offset relative to viewport — smaller movement for subtle parallax
            var offset = Math.round((rect.top) * 0.12);
            heroWrap.style.transform = 'translateY(' + (offset) + 'px)';
        }

        window.addEventListener('scroll', onScroll, {passive:true});
        // initial position
        update();
    })();

    // Card tilt effect on mousemove
    (function(){
        var cards = [].slice.call(document.querySelectorAll('.card'));
        if (!cards.length) return;

        cards.forEach(function(card){
            var rect = null;
            var halfWidth = 0, halfHeight = 0;
            function onEnter(){ rect = card.getBoundingClientRect(); halfWidth = rect.width/2; halfHeight = rect.height/2; card.classList.add('tilt'); }
            function onLeave(){ card.style.transform = ''; card.classList.remove('tilt'); }
            function onMove(e){
                if (!rect) rect = card.getBoundingClientRect();
                var x = (e.clientX - rect.left) - halfWidth;
                var y = (e.clientY - rect.top) - halfHeight;
                var rotateX = ( (y / halfHeight) * 4 ).toFixed(2);
                var rotateY = ( (x / halfWidth) * -4 ).toFixed(2);
                card.style.transform = 'perspective(800px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg) translateZ(0)';
            }
            card.addEventListener('mouseenter', onEnter);
            card.addEventListener('mousemove', onMove);
            card.addEventListener('mouseleave', onLeave);
        });
    })();
})();
