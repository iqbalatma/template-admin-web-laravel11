import './bootstrap';
import changeFormUrlWithId from "./utils/replace-form-url-with-id.js";
import jQuery from "jquery";
import DataTable from "datatables.net-bs5";

window.$ = jQuery
window.DataTable = DataTable

$(document).ready(function () {
    let defaultDeleteUrl = $("#form-delete").attr("action");
    $(document).on("click", ".btn-delete", function () {
        const id = $(this).data("id");
        changeFormUrlWithId(id, defaultDeleteUrl, "#form-delete")
    })
});
