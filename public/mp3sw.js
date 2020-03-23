/*Cache meta information*/
const CACHE_NAME = 'MP3Tager-CACHE V2'

/*assets to cache before service worker is installed*/
const CACHE_URLS = [
     '/css/style.css',
	 '/css/download.css',
	 '/css/upload.css',
	 '/css/tags.css',
	 '/css/responsive.css',
	 '/css/policy.css',
	 '/css/notfound.css',
	 '/css/formStyle.css',
	 '/css/font.css',
	 '/css/error.css',
	 '/css/donate.css',
	 '/css/contact.css',
	'/script/script.js',
	'/errors/waitingConnection.svg',
    '/offline'
]

/*function to install service worker
cache all assets before installing*/

const cacheManger = (cacheName, whitelist) => {
    caches.open(cacheName).then(
        cache => {
            cache.keys().then(
                request => {
                    request.forEach(
                        req => {
                            for (let h in req.headers.entries()) {
                                console.log(h)
                                h.next()
                            }
                        }
                    )
                }
            )
        }
    )

}

/*function to install service worker
cache all assets before installing*/
const installSw = event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(
            cache => {
                return cache.addAll(CACHE_URLS);
            }
        ).catch(
            err => {
                console.log(err)
            }
        )
    );
}

/*function to activate Service worker*/
const activateSW = event => {
    event.waitUntil(
        caches.keys().then(
            cacheName => {
                /*Check if cache storage contains any cache*/
                if (cacheName.length > 0) {
                    return Promise.all(
                        cacheName.forEach(
                            currentCache => {
                                /*Current cache in browser if not same as our cache version at the top,
                                then it's outdated and needs to be deleted */
                                if (currentCache != CACHE_NAME) {
                                    caches.delete(currentCache)
                                }
                            }
                        )
                    );
                }
            }
        )
    );
}

/*Intercept and handle requests*/
const fetchSW = event => {
    let url = event.request.url
    const staticFilesPattern = /.css$|.js$|.jpg$|.png$|.webp$|.svg$/;


    /*Only work for GET requests, Ignore other request methods*/
    if (event.request.method != 'GET') {
        return false;
    }

    if (staticFilesPattern.test(url)) {
        event.respondWith(
            caches.match(event.request).then(
                response => {
                    if (response) {
                        console.log(response.headers.get('Date'));
                        return response;
                    }
                    return fetch(event.request).then(
                        response => {

                            if (!response || response.status != 200 || response.type != 'basic') {
                                return response;
                            }
                            let cloneResponse = response.clone()
                            caches.open(CACHE_NAME).then(
                                cache => {
                                    cache.put(event.request, cloneResponse);
                                }
                            )
                            return response;
                        }
                    )
                }

            )
        )

    } else {
        event.respondWith(
            fetch(event.request).then(
                response => {

                    if (!response || (response.status != 200 && response.status != 404) || response.type != 'basic') {
                        return response;
                    }
                  
                    let cloneResponse = response.clone()
                    caches.open(CACHE_NAME).then(
                        cache => {
                            cache.put(event.request, cloneResponse);
                        }
                    )
                    return response;
                }
            ).catch(
                /*Check if request is cached*/

                () => {
                    return caches.match(event.request).then(
                        response => {
                            if (response) {
                                return response
                            } else {
                                /*Offline page if request is not in cache */
                                return caches.match('/offline').then(
                                    response => {
                                        return response;
                                    }
                                );
                            }
                        }

                    )
                }
            )
        );
    }

}

//event handlers
self.addEventListener('install', installSw)
self.addEventListener('activate', activateSW)
self.addEventListener('fetch', fetchSW)
