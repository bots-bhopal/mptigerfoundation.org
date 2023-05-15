var total_photos_counter = 0;

Dropzone.options.myDropzone = {
    uploadMultiple: true,
    parallelUploads: 2,
    maxFilesize: 40,
    acceptedFiles: '.jpeg,.jpg,.png',
    previewTemplate: document.querySelector('#preview').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Remove File',
    dictFileTooBig: 'Image is larger than 40 MB.',
    timeout: 60000,

    error: function () {
        this.on("error", function (file, response) {
            toastr['error'](response);
        });
    },

    success: function (file, resposne) {
        total_photos_counter++;
        $("#counter").text("# " + total_photos_counter);
        toastr['success'](resposne.success);
    }
};
