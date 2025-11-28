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

app.directive("fadeInOnScroll", function () {
  return {
    restrict: "A",
    link: function (scope, element) {
      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            element.addClass("show");
            observer.unobserve(entry.target); // animate once
          }
        });
      });
      observer.observe(element[0]);
    }
  };
});
