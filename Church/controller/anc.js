app.controller("ANCCont", function ($scope, $http, $routeParams) {
    // -------------------- INITIAL STATE --------------------
    $scope.contents = []; // Holds announcements/content
    $scope.loading = false;
    $scope.errorMessage = "";

    // Pagination (optional, if you want to expand later)
    $scope.pagination = { page: 1, limit: 5, total: 0, pages: 0 };

    // -------------------- LOAD RECENT CONTENT --------------------
    $scope.loadRecentContent = function () {
        $scope.loading = true;
        $scope.errorMessage = "";

        // Call the PHP backend
        let url = "../anc.php?action=getRecentContent";

        $http.get(url).then(
            function (response) {
                let res = response.data;
                $scope.loading = false;

                if (res.status === "success") {
                    $scope.contents = res.data || [];
                } else {
                    $scope.errorMessage = res.message || "Failed to fetch content.";
                }
            },
            function (error) {
                console.error("Error fetching announcements:", error);
                $scope.loading = false;
                $scope.errorMessage = "Server error while fetching announcements.";
            }
        );
    };

    // -------------------- INITIAL LOAD --------------------
    $scope.loadRecentContent();
});
