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
            title: "Announcement"
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


