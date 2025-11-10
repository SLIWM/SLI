app.controller("ContentCont", function ($scope, $http) {

    // -------------------- INITIAL STATE --------------------
    $scope.contents = [];
    $scope.content = {};
    $scope.pageSize = 5;
    $scope.pagination = { page: 1, totalPages: 1 };
    $scope.formData = new FormData();

    // For delete confirmation modal
    $scope.IdForDelete = null;
    $scope.TitleForDelete = null;

    // Image preview setup
    //  const imageInput = document.getElementById('imageInput');
   
    function clearPreview() {
        previewImage.src = '#';
        previewImage.style.display = 'none';
        imageInput.value = '';
    }

    $scope.triggerUpload = function () {
        document.getElementById('imageInput').click();
    };

    $scope.uploadImage = function (files) {
        $scope.formData = new FormData();
        $scope.formData.append('image', files[0]);
    };

    // -------------------- LOAD ALL CONTENT --------------------
    function getAllContents(page = 1, limit = 1) {
      
        $http.get('../church/php/content.php?action=readAll&page=1&limit=1')
            .then(function (response) {
                $scope.contents = response.data.data;
          
            }, function (error) {
                console.error("Error fetching content:", error);
            });
    }

    // -------------------- VALIDATION --------------------
    function clearError() {
        $scope.titleHasError = false;
        $scope.announcementHasError = false;
        $scope.expDateHasError = false;
    }

    $scope.validateTitle = function () {
        $scope.titleHasError = !$scope.content.content_title;
        $scope.titleError = "Content title is required.";
    };

    $scope.validateAnnouncementTitle = function () {
        $scope.announcementHasError = !$scope.content.announcement_title;
        $scope.announcementError = "Announcement title is required.";
    };

    $scope.validateExpDate = function () {
        $scope.expDateHasError = !$scope.content.exp_date;
        $scope.expDateError = "Expiration date is required.";
    };

    // -------------------- SUBMIT HANDLER --------------------
    $scope.submit = function () {
        $scope.validateTitle();
        $scope.validateAnnouncementTitle();
        $scope.validateExpDate();

        const isValid = (!$scope.titleHasError && !$scope.announcementHasError && !$scope.expDateHasError);

        if (isValid) {
            if (!$scope.content.id) {
                $scope.createContent();
            } else {
                $scope.updateContent();
            }
        }
    };

    // -------------------- CREATE CONTENT --------------------
    $scope.createContent = function () {
        const files = imageInput.files;
        if (files && files.length > 0 && !files[0].type.startsWith('image/')) {
            alert('Please upload a valid image file.');
            return;
        }

        $scope.content.upload_date = new Date().toISOString().slice(0, 19).replace('T', ' ');

        $http.post("../church/php/content.php?action=create", $scope.content)
            .then(function (response) {
                if (response.data.status === "success") {
                    if (files && files.length > 0) {
                        $scope.formData.append('content_id', response.data.id);
                        $http.post('../church/php/content.php?action=uploadImage', $scope.formData, {
                            headers: { 'Content-Type': undefined }
                        }).then(function (uploadRes) {
                            console.log('Image uploaded:', uploadRes.data);
                        });
                    }
                    $('#contentModal').modal('hide');
                    $scope.updateContentFields();
                    getAllContents();
                }
            }, function (error) {
                console.error("Error creating content:", error);
            });
    };

    // // -------------------- UPDATE CONTENT --------------------
    // $scope.updateContent = function () {
    //     const files = imageInput.files;

    //     if (files && files.length > 0 && files[0].type.startsWith('image/')) {
    //         $scope.formData.append('content_id', $scope.content.id);
    //         $scope.formData.append('image', files[0]);

    //         $http.post('../church/php/content.php?action=uploadImage', $scope.formData, {
    //             headers: { 'Content-Type': undefined }
    //         }).then(function (uploadRes) {
    //             console.log('Image updated:', uploadRes.data);
    //         });
    //     }

    //     $http.post("../church/php/content.php?action=update&id=" + $scope.content.id, $scope.content)
    //         .then(function (response) {
    //             if (response.data.status === "success") {
    //                 $('#contentModal').modal('hide');
    //                 $scope.updateContentFields();
    //                 getAllContents();
    //             }
    //         }, function (error) {
    //             console.error("Error updating content:", error);
    //         });
    // };

    // -------------------- DELETE CONTENT --------------------
    $scope.deleteContentOnClick = function (content) {
        $scope.content = angular.copy(content);
        $scope.IdForDelete = $scope.content.id;
        $scope.TitleForDelete = $scope.content.content_title;
    };

    $scope.deleteContentById = function () {
        $http.post("../church/php/content.php?action=delete&id=" + $scope.IdForDelete)
            .then(function (response) {
                if (response.data.status === "success") {
                    $('#deleteContentModal').modal('hide');
                    getAllContents();
                }
            }, function (error) {
                console.error("Error deleting content:", error);
            });
    };

    // -------------------- RESET / CLEAR FORM --------------------
    $scope.updateContentFields = function (id = null, content_title = null, announcement_title = null, Details = null, upload_date = null, exp_date = null, photo_path = null) {
        clearError();
        clearPreview();

        $scope.content.id = id;
        $scope.content.content_title = content_title;
        $scope.content.announcement_title = announcement_title;
        $scope.content.Details = Details;
        $scope.content.upload_date = upload_date;
        $scope.content.exp_date = exp_date;
        $scope.content.photo_path = photo_path;
    };

    // -------------------- PAGINATION --------------------
    // $scope.changePageSize = function () {
    //     getAllContents(1, $scope.pageSize);
    // };

    // $scope.loadPage = function (page) {
    //     getAllContents(page, $scope.pageSize);
    // };

    // -------------------- INITIAL LOAD --------------------
    getAllContents(2,2);
});
