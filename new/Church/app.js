var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider, $locationProvider) {
    $routeProvider
        .when("/", {
            redirectTo: "/home"
        })
        .when("/home", {
            templateUrl: "home.html"
        })
        .when("/ImNew", {
            templateUrl: "ImNew.html"
        })
        .when("/OurServices", {
            templateUrl: "OurServices.html"
        })
        .when("/contactUs", {
            templateUrl: "contactUs.html"
        })
        .when("/Corramdeo", {
            templateUrl: "Corramdeo.html"
        })
        .when("/Grow", {
            templateUrl: "Grow.html"
        })
        .when("/LifeGroup", {
            templateUrl: "LifeGroup.html"
        })
        .when("/Location", {
            templateUrl: "Location.html"
        })
        .when("/MeetTheTeam", {
            templateUrl: "MeetTheTeam.html"
        })
        .when("/MWF", {
            templateUrl: "MWF.html"
        })
        .when("/PrayerWarriors", {
            templateUrl: "PrayerWarriors.html"
        })
        .when("/Remnant", {
            templateUrl: "Remnant.html"
        })
        .when("/SaltAndLightKids", {
            templateUrl: "SaltAndLightKids.html"
        })
        .when("/SundayWorship", {
            templateUrl: "SundayWorship.html"
        })
        .when("/tithes", {
            templateUrl: "tithes.html"
        })
        .when("/Volunteer", {
            templateUrl: "Volunteer.html"
        })
        .when("/WednesdayWorship", {
            templateUrl: "WednesdayWorship.html"
        })
        .when("/whoweare", {
            templateUrl: "whoweare.html"
        })
        .when("/YAFC", {
            templateUrl: "YAFC.html"
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
