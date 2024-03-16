import './bootstrap';
import changeFormUrlWithId from "./utils/replace-form-url-with-id.js";
import jQuery from "jquery";

window.$ = jQuery
$(document).ready(function () {
    let defaultDeleteUrl = $("#form-delete").attr("action");
    $(".btn-delete").on("click", function () {
        console.log("haha")
        const id = $(this).data("id");
        console.log(id)
        changeFormUrlWithId(id, defaultDeleteUrl, "#form-delete")
    })
});
