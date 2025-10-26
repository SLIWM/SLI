app.controller("AdminCont", function ($scope, $http) {

    // -------------------- INITIAL STATE --------------------
    $scope.contents = [];
    $scope.content = {};
    $scope.IdForDelete = null;
    $scope.titleForDelete = null;
    $scope.pageSize = 5;

    $scope.pagination = {
        page: 1,
        totalPages: 1
    };

    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');

    imageInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const imageURL = URL.createObjectURL(file);
            previewImage.src = imageURL;
            previewImage.style.display = 'block';
        } else {
            clearPreview();
        }
    });

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

    // -------------------- LOAD CONTENT --------------------
    function getAllContents(page = 1, limit = $scope.pageSize) {
        $http.get(`../church/php/anc.php?action=readAll&page=${page}&limit=${limit}`)
            .then(function (response) {
                $scope.contents = response.data.data;
                $scope.pagination.page = response.data.page;
                $scope.pagination.limit = response.data.limit;
                $scope.pagination.totalPages = Math.ceil(response.data.total / response.data.limit);
            }, function (error) {
                console.error("Error fetching content:", error);
            });
        console.log("test");
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

    // -------------------- SUBMIT --------------------
    $scope.submit = function () {
        $scope.validateTitle();
        $scope.validateAnnouncementTitle();
        $scope.validateExpDate();

        const isValid = (!$scope.titleHasError && !$scope.announcementHasError && !$scope.expDateHasError);

        if (isValid) {
            if (!$scope.content.id) {
                createContent();
            } else {
                updateContent();
            }
        }
    };

    // -------------------- CREATE --------------------
    $scope.createContent = function () {
        const fileInput = document.getElementById('imageInput');
        const files = fileInput.files;
        console.log("test");
        if (files && files.length > 0) {
            const uploadedFile = files[0];
            if (!uploadedFile.type.startsWith('image/')) {
                alert('Please upload a valid image file.');
                return;
            }
        }

        $scope.content.upload_date = new Date().toISOString().slice(0, 19).replace('T', ' ');

        $http.post("../church/php/anc.php?action=create", $scope.content)
            .then(function (response) {
                if (response.data.status === "success") {
                    if (files && files.length > 0) {
                        $scope.formData.append('content_id', response.data.id);
                        $http.post('../church/php/anc.php?action=uploadImage', $scope.formData, {
                            headers: { 'Content-Type': undefined }
                        }).then(function (uploadRes) {
                            console.log('Upload success:', uploadRes.data);
                        }, function (error) {
                            console.error('Upload failed:', error);
                        });
                    }

                    $('#ANCModal').modal('hide');
                    $scope.updateContentFields();
                    getAllContents();
                }
            }, function (error) {
                console.error("Error creating content:", error);
            });
    }

    // -------------------- UPDATE --------------------
    function updateContent() {
        const fileInput = document.getElementById('imageInput');
        const files = fileInput.files;

        if (files && files.length > 0) {
            const uploadedFile = files[0];
            if (uploadedFile.type.startsWith('image/')) {
                $scope.formData.append('content_id', $scope.content.id);
                $scope.formData.append('image_location', uploadedFile.name);

                $http.post('../church/php/anc.php?action=uploadImage', $scope.formData, {
                    headers: { 'Content-Type': undefined }
                }).then(function () {
                    $('#ANCModal').modal('hide');
                }, function () {
                    $('#ANCModal').modal('hide');
                });
            } else {
                alert('Please upload a valid image file.');
                return;
            }
        }

        $http.post("../church/php/anc.php?action=update&id=" + $scope.content.id, $scope.content)
            .then(function (response) {
                if (response.data.status === "success") {
                    $('#ANCModal').modal('hide');
                    $scope.updateContentFields();
                    getAllContents();
                }
            }, function (error) {
                console.error("Error updating content:", error);
            });
    }

    // -------------------- DELETE --------------------
    $scope.deleteContentOnClick = function (content) {
        $scope.content = angular.copy(content);
        $scope.IdForDelete = $scope.content.id;
        $scope.titleForDelete = $scope.content.content_title;
    };

    $scope.deleteContentById = function () {
        $http.post("../church/php/anc.php?action=delete&id=" + $scope.IdForDelete)
            .then(function (response) {
                if (response.data.status === "success") {
                    $('#deleteANCModal').modal('hide');
                    getAllContents();
                } else {
                    $('#deleteANCModal').modal('hide');
                }
            }, function (error) {
                $('#deleteANCModal').modal('hide');
            });
    };

    // -------------------- UTIL --------------------
    $scope.updateContentFields = function (id = null, content_title = null, announcement_title = null, details = null, upload_date = null, exp_date = null, photo_path = null) {
        clearError();
        clearPreview();

        $scope.content.id = id;
        $scope.content.content_title = content_title;
        $scope.content.announcement_title = announcement_title;
        $scope.content.details = details;
        $scope.content.upload_date = upload_date;
        $scope.content.exp_date = exp_date;
        $scope.content.photo_path = photo_path;
    };

    // -------------------- INITIAL LOAD --------------------
    getAllContents();

    // -------------------- PAGINATION --------------------
    $scope.changePageSize = function () {
        getAllContents(1, $scope.pageSize);
    };

    $scope.loadPage = function (page) {
        getAllContents(page, $scope.pageSize);
    };

});
