// importScripts('/cache-polyfill.js');

self.addEventListener('install', function(e){
    e.waitUntil(caches.open('PTBA-v1').then(function(cache){
        return cache.addAll([
            '/',
            'ptba.php',
            'logo1.png',
            '../assets/cru.webp',
            '../assets/illus.webp',
            '../assets/illus2.webp',
            '../assets/ptba.webp',
            '../assets/singleline.webp',
            '../assets/ssu.webp',
            '../assets/tsu.webp',
            '../assets/logo.png',
            '../assets/css/style.css',
            '../assets/css/responsive.css',
        ]);
    }))
})
self.addEventListener('active', function(e){
    e.waitUntil(caches.keys().then(function(cacheNames){
        return Promise.all(
            cacheNames.map(function(cacheName){
                if(cacheName != 'PTBA-v1'){
                    return caches.delete(cacheName);
                }
            })
        )
    }))
})
self.addEventListener('fetch', function(e){
    e.respondWith(caches.match(e.request).then(function(response){
        return response || fetch(e.request);
    }))
})