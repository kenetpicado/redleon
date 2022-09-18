
$(document).ready(function () {
    $("#dataTable").DataTable({
        ordering: false,
        responsive: true,
        pageLength: 50,
        bLengthChange: false,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Buscar",
            paginate: {
                first: "<",
                previous: "‹",
                next: "›",
                last: ">",
            },
        },
    });
});

function setNewdDate() {
    var periodo = document.getElementById("periodo");
    var periodo_inicio = document.getElementById("periodo_inicio");
    var periodo_fin = document.getElementById("periodo_fin");
    date = new Date(periodo_inicio.value);

    switch (periodo.value) {
        case "1-MES":
            var newDate = date.setMonth(date.getMonth() + 1);
            periodo_fin.value = new Date(newDate).toISOString().slice(0, 10);
            break;
        case "3-MESES":
            var newDate = date.setMonth(date.getMonth() + 3);
            periodo_fin.value = new Date(newDate).toISOString().slice(0, 10);
            break;
        case "6-MESES":
            var newDate = date.setMonth(date.getMonth() + 6);
            periodo_fin.value = new Date(newDate).toISOString().slice(0, 10);
            break;
        default:
            var newDate = date.setMonth(date.getMonth() + 12);
            periodo_fin.value = new Date(newDate).toISOString().slice(0, 10);
            break;
    }
}

setNewdDate();

periodo.addEventListener("change", function () {
    setNewdDate();
});

periodo_inicio.addEventListener("change", function () {
    setNewdDate();
});

