$(document).ready(function () {
    $.extend($.fn.dataTable.defaults, {
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
        }
    });
});

function carregarTabela({ url, tbodySelector, colunas }) {
    Swal.fire({
        title: 'Carregando...',
        text: 'Aguarde enquanto os dados são carregados.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    fetch(url)
        .then(res => res.json())
        .then(data => {
            console.log(data);
            Swal.close();
            if (data.length === 0) {
                Swal.fire({
                    icon: 'info',
                    title: 'Nenhum registro encontrado',
                    text: 'Não há dados disponíveis no momento.'
                });
            } else {
                $(document).ready(function() {
                    $(tbodySelector).closest('table').DataTable({
                        data: data,
                        columns: colunas,
                        responsive: true,
                        pageLength: 10,
                        lengthMenu: [10, 25, 50, 100],
                        order: [
                            [0, 'asc']
                        ]
                    });
                });
            }
        })
        .catch(err => {
            Swal.close();
            console.error(err);
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Ocorreu um erro ao carregar os dados. Tente novamente mais tarde.'
            });
        });
}