// -------- FOOTER -------- //

let copyright = document.querySelector('.copyright');

const dateFooter = new Date();
let dateCopyright=dateFooter.getFullYear();

copyright.textContent = " © " +dateCopyright+ " Copyright:";

// --------- HOME MODAL --------- //

let modals = document.querySelectorAll('.modal');
for (var i = 0, len = modals.length; i < len; i++) {
    modals[i].addEventListener('show.bs.modal', function (event) {
        console.log('Modal opened: ', event.target.id);
    });
}

