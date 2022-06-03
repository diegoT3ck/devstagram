import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dicDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".jpg, .png, jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrrar archivo",
    maxFiles: 1,
    uploadMultiple: false,
})
dropzone.on('sending', function(file, xhr,FormData) {
    console.log(file);
})
dropzone.on('success', function(file, response) {
    console.log(response);
});
dropzone.on('error', function(file, message) {
    console.log(message);
});
dropzone.on('removedfile', function() {
    console.log('Archivo eliminado');
});