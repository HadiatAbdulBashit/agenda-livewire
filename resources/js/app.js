import './bootstrap';

import Swal from "sweetalert2";
window.Swal = Swal;
window.Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = window.Swal.stopTimer;
        toast.onmouseleave = window.Swal.resumeTimer;
    }
});