var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider, $locationProvider) {
    $routeProvider
        .when("/", {
            redirectTo: "/home"
        })
        .when("/home", {
            templateUrl: "home.html",
            reloadOnSearch: false
        })
        .otherwise({
            redirectTo: "/home"
        });

    // Optional: enable clean URLs (requires server-side support)
    // $locationProvider.html5Mode(true);
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



// Custom directive for nav behavior
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
