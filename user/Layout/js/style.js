// Google Tag Manager
// End Google Tag Manager
(function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0]
      , j = d.createElement(s)
      , dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
} (window, document, 'script', 'dataLayer', 'GTM-XXXXXX'));

(function() {
    window.mc4wp = window.mc4wp || {
        listeners: [],
        forms: {
            on: function(evt, cb) {
                window.mc4wp.listeners.push({
                    event: evt,
                    callback: cb
                });
            }
        }
    }
}
)();

(function() {
    function maybePrefixUrlField() {
        const value = this.value.trim()
        if (value !== '' && value.indexOf('http') !== 0) {
            this.value = 'http://' + value
        }
    }

    const urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]')
    for (let j = 0; j < urlFields.length; j++) {
        urlFields[j].addEventListener('blur', maybePrefixUrlField)
    }
}
)();

document.addEventListener('DOMContentLoaded', function() {

    const popup_vi = document.querySelector(".vi");
    const popup_en = document.querySelector(".en");

    const currentUrl = window.location.href;

    if (currentUrl.match(/https?:\/\/[^\/]+\/vi($|\/)/)) {
        popup_en.style.display = 'none';
    } else {
        popup_vi.style.display = 'none';

    }
});

const lazyloadRunObserver = () => {
    const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
    const lazyloadBackgroundObserver = new IntersectionObserver( (entries) => {
        entries.forEach( (entry) => {
            if (entry.isIntersecting) {
                let lazyloadBackground = entry.target;
                if (lazyloadBackground) {
                    lazyloadBackground.classList.add('e-lazyloaded');
                }
                lazyloadBackgroundObserver.unobserve(entry.target);
            }
        }
        );
    }
    ,{
        rootMargin: '200px 0px 200px 0px'
    });
    lazyloadBackgrounds.forEach( (lazyloadBackground) => {
        lazyloadBackgroundObserver.observe(lazyloadBackground);
    }
    );
}
;
const events = ['DOMContentLoaded', 'elementor/lazyload/observe', ];
events.forEach( (event) => {
    document.addEventListener(event, lazyloadRunObserver);
}
);

