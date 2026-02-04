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
})();
