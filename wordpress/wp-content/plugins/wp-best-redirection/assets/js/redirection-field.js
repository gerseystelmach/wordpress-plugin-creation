console.log("Script loaded")

const $ = jQuery;

jQuery(document).ready(($) => {

    const deleteRedirection = (id, deleteBtn) => {

        $.post(wp_best_redirection_manage_field.ajax_url, {
            _ajax_nonce: wp_best_redirection_manage_field.nonce,
            action: 'wp_best_redirection_manage_field_delete',
            id: id
        }).then(() => {
            console.log('Success');
            deleteBtn.parentNode.parentNode.removeChild(deleteBtn.parentNode);
        }).catch(() => {
            console.log('Error');
        });
    }

    const deleteBtnList = document.querySelectorAll('.redirection-delete').forEach((deleteBtn) => {
        const redirectionId = deleteBtn.getAttribute('data-redirection-id');
        deleteBtn.addEventListener('click', () => deleteRedirection(redirectionId, deleteBtn))
    })
});

/*
jQuery(document).ready(($) => {
    const deleteRedirection = (id) => {
        console.log(id);
    }

    const deleteBtnList = document.querySelectorAll('.redirection-delete').forEach((deleteBtn) => {
        const redirectionId = deleteBtn.getAttribute('data-redirection-id');
        deleteBtn.addEventListener('click',() => deleteRedirection(redirectionId))
    })

})

$.post(wp_best_redirection_manage_field.ajax_url, {

    _ajax_nonce: wp_best_redirection_manage_field.nonce,
    action: 'wp_best_redirection_manage_field_delete',
    id: 7
}).then(() => {
    console.log('Success');
}).catch(() => {
    console.log('Error');
});*/
