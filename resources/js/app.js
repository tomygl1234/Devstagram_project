import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Upload here your image",
    acceptedFiles: ".png,.jpg,.jpeg,.gif,.svg",
    addRemoveLinks: true,
    dictRemoveFiles: "Delete image",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name="image"]').value.trim()) {
            const postedImage = {};
            postedImage.size = 1234;
            postedImage.name = document.querySelector('[name="image"]').value;

            this.options.addedfile.call(this, postedImage);
            this.options.thumbnail.call(
                this,
                postedImage,
                `/uploads/${postedImage.name}`
            );

            postedImage.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

dropzone.on("success", function (file, response) {
    console.log(response.image);
    document.querySelector('[name="image"]').value = response.image;
});

dropzone.on("removedfile", function (file) {
    console.log("File removed:", file);
});

dropzone.on('removedfile', function(){
    document.querySelector('[name="image"]').value = "";
})