var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider, $locationProvider) {
    $routeProvider
        .when("/", {
            redirectTo: "/home",
            title: "Church"
        })
        .when("/home", {
            templateUrl: "home.html",
            title: "Church"
        })
        .when("/ImNew", {
            templateUrl: "ImNew.html",
            title: "I'm New"
        })
        .when("/OurServices", {
            templateUrl: "OurServices.html",
            title: "Services"
        })
        .when("/contactUs", {
            templateUrl: "contactUs.html",
            title: "Contract Us"
        })
        .when("/Corramdeo", {
            templateUrl: "Corramdeo.html",
            title: "Coram Deo"
        })
        .when("/Grow", {
            templateUrl: "Grow.html",
            title: "Grow"

        })
        .when("/LifeGroup", {
            templateUrl: "LifeGroup.html",
            title: "Lifegroup"
        })
        .when("/Location", {
            templateUrl: "Location.html",
            title: "Location"
        })
        .when("/MeetTheTeam", {
            templateUrl: "MeetTheTeam.html",
            title: "Meet The Team"
        })
        .when("/MWF", {
            templateUrl: "MWF.html",
            title: "Men and Women"
        })
        .when("/PrayerWarriors", {
            templateUrl: "PrayerWarriors.html",
            title: "Prayer Warriors"
        })
        .when("/Remnant", {
            templateUrl: "Remnant.html",
            title: "Remant"
        })
        .when("/SaltAndLightKids", {
            templateUrl: "SaltAndLightKids.html",
            title: "Salt and Light Kids"
        })
        .when("/SundayWorship", {
            templateUrl: "SundayWorship.html"
        })
        .when("/tithes", {
            templateUrl: "tithes.html",
            title: "Tithes"
        })
        .when("/Volunteer", {
            templateUrl: "Volunteer.html",
            title: "Volunteer"
        })
        .when("/VolunteerForm", {
            templateUrl: "VolunteerForm.html",
            title: "Volunteer Form"
        })
        .when("/WednesdayWorship", {
            templateUrl: "WednesdayWorship.html"
        })
        .when("/whoweare", {
            templateUrl: "whoweare.html",
            title: "Who we are"
        })
        .when("/YAFC", {
            templateUrl: "YAFC.html",
            title: "YAFC"
        })
        .when("/ANC", {
            templateUrl: "announcement.html",
            title: "Announcement",
            controller: "ContentCont"

        })
        .when("/admin", {
            templateUrl: "admin.html",
            title: "Announcement",
            controller: "AdminCont"
        })
        .otherwise({
            redirectTo: "/home"
        });

    // Optional: enable clean URLs (requires server-side support)
    // $locationProvider.html5Mode(true);
});

app.directive('navReady', function () {
    return {
        restrict: 'A',
        link: function (scope, element) {
            const sidenav = document.getElementById("mySidenav");
            const menuWrapper = document.getElementById("myMenuWrapper");

            if (sidenav && menuWrapper) {
                sidenav.addEventListener("click", function (e) {
                    if (e.target === this) {
                        menuWrapper.classList.remove("open");
                        sidenav.style.width = "0";
                    }
                });
            }
        }
    };
});

app.run(function ($rootScope, $route) {
    $rootScope.$on('$routeChangeSuccess', function () {
        if ($route.current && $route.current.title) {
            document.title = $route.current.title;
        } else {
            document.title = "Salt and Light Church"; // default title
        }
    });
});

app.run(function ($rootScope, $timeout) {
    $rootScope.$on('$viewContentLoaded', function () {
        $timeout(function () {
            var $carousel = $('#carouselExampleIndicators');
            if ($carousel.length) {
                $carousel.carousel({
                    interval: 5000,
                    ride: 'carousel'
                });

                // Manually bind control buttons
                $('.carousel-control-next').off('click').on('click', function (e) {
                    e.preventDefault();
                    $carousel.carousel('next');
                });

                $('.carousel-control-prev').off('click').on('click', function (e) {
                    e.preventDefault();
                    $carousel.carousel('prev');
                });
            }
        }, 300);
    });
});



app.run(function ($rootScope, $timeout) {
    const footerId = 'footer';
    const modalId = 'loadingModal';
    const backdropId = 'loadingBackdrop';
    const MAX_WAIT = 5000; // fallback timeout in ms

    function showModal() {
        const modalEl = document.getElementById(modalId);
        const footer = document.getElementById(footerId);
        if (!modalEl) return;

        modalEl.classList.add('show');
        modalEl.style.display = 'block';
        document.body.classList.add('modal-open');
        if (footer) footer.style.display = 'none';

        if (!document.getElementById(backdropId)) {
            const backdrop = document.createElement('div');
            backdrop.classList.add('modal-backdrop', 'fade', 'show');
            backdrop.id = backdropId;
            document.body.appendChild(backdrop);
        }
    }

    function hideModal() {
        const modalEl = document.getElementById(modalId);
        const footer = document.getElementById(footerId);
        if (!modalEl) return;

        modalEl.classList.remove('show');
        modalEl.setAttribute('aria-hidden', 'true');

        setTimeout(() => {
            modalEl.style.display = 'none';
            document.body.classList.remove('modal-open');

            const backdrop = document.getElementById(backdropId);
            if (backdrop) backdrop.remove();
            if (footer) footer.style.display = 'block';
        }, 200); // matches Bootstrap fade timing
    }

    function waitForImagesToLoad(images) {
        const promises = Array.from(images).map(img => {
            return new Promise(resolve => {
                if (img.complete) {
                    resolve();
                } else {
                    img.addEventListener('load', resolve);
                    img.addEventListener('error', resolve);
                }
            });
        });
        return Promise.all(promises);
    }

    $rootScope.$on('$routeChangeStart', () => {
        showModal();
    });

    $rootScope.$on('$viewContentLoaded', () => {
        $timeout(() => {
            const images = document.querySelectorAll('img');
            if (images.length === 0) {
                hideModal();
            } else {
                Promise.race([
                    waitForImagesToLoad(images),
                    new Promise(resolve => setTimeout(resolve, MAX_WAIT))
                ]).then(hideModal);
            }
        }, 300); // allow AngularJS to finish rendering
    });
});

