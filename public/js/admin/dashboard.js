jQuery(document).ready(function () {

    var pagineApiURL = $('meta[name="url-api-get-gallery"]').attr('content'),
        $table = $('#table'),
        $btnDelete = $('#btn-delete'),
        $pagination = $('.pagination'),
        userData = JSON.parse(localStorage.getItem('user')),
        token = userData.token,
        generatePagination = function (pageCount, itemActive = 1) {
            $pagination.empty().bootpag({
                total: pageCount,
                page: itemActive,
                href: pagineApiURL + "?page={{number}}"
            }).on('page', function (event, num) {
                paginateCategories(pagineApiURL + '?page=' + num);
            });;
        },
        paginateCategories = function (url) {
            $table.DataTable({

                "ajax": {
                    "url": url,
                    "dataType": 'json',
                    "headers": {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': token
                    },
                    "dataSrc": function (result) {
                        if (result.code === 200) {
                            var requestedPage = (new URL(url)).searchParams.get('page'),
                                pageCount = result.last_page,
                                $paginationItems = $('.pagination a');

                            if (requestedPage === null) {
                                requestedPage = 1;
                            } else {
                                requestedPage = parseInt(requestedPage);
                            }

                            generatePagination(pageCount, requestedPage);

                            urlToSet = $('meta[name="url-admin-dashboard"]').attr('content') + (requestedPage > 1 ? '?page='+requestedPage : '');

                            history.replaceState({}, 'Dashboard', urlToSet);

                            $('#indicator').text(`Page ${requestedPage} of ${pageCount}`);
                        }
                        return result.data;
                    }
                },
                "columnDefs": [{
                        render: function (result, type, row) {
                            return `<a class="btn btn-default btn-update" data-id="${row.id}"><em class="fa fa-pencil"></em></a>
        <a class="btn btn-danger btn-delete" data-id="${row.id}" data-name="${row.name}"><em class="fa fa-trash"></em></a>`;
                        },
                        targets: 0,
                        className: "action_row"
                    },
                    {
                        "render": function (result, type, row) {
                            return row.id;
                        },
                        targets: 1,
                        className: "id_row"
                    },
                    {
                        "render": function (result, type, row) {
                            return row.name;
                        },
                        targets: 2,
                        className: "name_row"
                    },
                    {
                        render: function (result, type, row) {
                            var pictures = JSON.parse(row.pictures);
                            return pictures.length;
                        },
                        targets: 3,
                        className: "picture_row"
                    }
                ],
                'language': {
                    'loadingRecords': 'Loading...',
                    'zeroRecords': 'No records'
                },
                "destroy": true,
                "searching": false,
                "paging": false,
                "info": false,
                "ordering": false,
                "responsive": true,
                "scrollY": true
            });
        },
        showModalCat = function (e) {
            e.preventDefault();
            var $this = $(e.target);
            $('#galleryId').val($this.data('id'));
            $('#modal-header').text('Delete the gallery ' + $this.data('name') + ' ?');
            $('#modalDeleteGallery').modal('show');
        },
        initPage = function () {
            var currentURL = window.location.href,
                currentURLParsed = new URL(currentURL),
                page = currentURLParsed.searchParams.get('page');

                if (page === null) {
                    paginateCategories(pagineApiURL);
                } else {
                    paginateCategories(pagineApiURL + '?page=' + parseInt(page));
                }
        };

    $('.username').text(userData.username);

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
    });

    $table.on('click', 'tbody tr', function (e) {
        $this = $(e.currentTarget);
        $('#touch').removeAttr('id');
        $this.attr('id', 'touch');
    });
    
    $table.on('click', 'tbody .btn-delete', function (event) {
        showModalCat(event);
    });

    $btnDelete.on('click', function () {
        var galleryId = $('#galleryId').val(),
            $this = $(this),
            $cancelButton = $this.prev();
        $.ajax({
            url: pagineApiURL + '/' + galleryId,
            type: 'DELETE',
            dataType: 'json',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': token
            },
            beforeSend: function () {
                $this.attr('disabled', true).addClass('running');
                $cancelButton.attr('disabled', true);
            },
            success: function (result) {
                if (result.code === 200) {
                    $('#modalDeleteGallery').modal('hide');
                    $('#touch').remove();
                } else {
                    console.log(result);
                }
            },
            error: function (result, status, error) {
                var response = JSON.parse(result.responseText),
                    $deleteAlert = $('#delete-alert');
                if (response.code === 4003) {
                    $deleteAlert.text(response.description).removeClass('d-none');
                    $('#touch').remove();
                } else {
                    console.log(response);
                }
            },
            complete: function () {
                $this.removeAttr('disabled', true).removeClass('running');
                $cancelButton.removeAttr('disabled', true);
            }
        });
    });

    $('#btn-logout').on('click', function(e) {
        e.preventDefault();

        localStorage.removeItem('user');

        $.ajax({
            url: $('meta[name="url-admin-logout"]').attr('content'),
            type: 'GET',
            dataType: 'json',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            success: function (result) {
                if (result.code === 200) {
                    window.location.href = $('meta[name="url-admin-login"]').attr('content');
                }
            },
            error: function (xhr,status,error) {
                console.log(JSON.parse(xhr.responseText));
            }
        });
    });

    initPage();

});
