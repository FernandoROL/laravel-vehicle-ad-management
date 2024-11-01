async function deletePagingRegistry(routeUrl, registryID) {
    if (confirm('Confirm deletion')) {
        $.ajax({
            url: routeUrl,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: registryID,
            },
            beforeSend: function () {
                $.blockUI({
                    message: 'Loading...',
                    timeout: 4000,
                });
            },
        }).done(function (data) {
            $.unblockUI();
            if (data.success) {
                window.location.reload();
            } else {
                alert('Could not delete data')
            }
        }).fail(function (data) {
            $.unblockUI();
            alert('Could not start the search');
        });
    }
}