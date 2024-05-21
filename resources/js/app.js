import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

const deleteSubmitButton = document.querySelectorAll(
    'delete_comic_form button[type="submit"]'
);

deleteSubmitButton.forEach((elem) => {
    elem.addEventListener("click", function (event) {
        event.preventDefault();

        const title = elem.getAttribute("data-comic-title");

        const modal = document.getElementById("delete_modal");

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modal_title = modal.querySelector("#modal-item-title");
        modal_title.textContent = title;

        const delete_button = modal.querySelector("button.delete_button");
        delete_button.addEventListener("click", function () {
            elem.parentElement.submit();
        });
    });
});
