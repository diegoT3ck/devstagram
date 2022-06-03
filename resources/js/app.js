import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dicDefaultMessage: 'Sube aqui tu imagen'
})