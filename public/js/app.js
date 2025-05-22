function deleteModal(e) {
    let id = $(e).data('id');
    let name = $(e).data('name');
    let url = $(e).data('url');
    let form = $('#delete-form');
    form.find('input[name="id"]').val(id);
    $('#delete-modal-title-span').text(name);
    form.attr('action', url);
    form.removeClass('hidden');
}

function closeDeleteModal() {
    let form = $('#delete-form');
    form.attr('action', "");
    form.addClass('hidden');
    form.find('input[name="id"]').val("");
    $('#delete-modal-title-span').text();
}

function updateFileName(e) {
    console.log(e.files[0]);
    const file = e.files[0];
    if (file) {
        $('#selected-file-name').text(shortenFilename(e.files[0].name));
    } else {
        $('#selected-file-name').text('No file selected');
    }
}

function shortenFilename(filename, maxLength = 30) {
    const dotIndex = filename.lastIndexOf('.');
    const name = filename.substring(0, dotIndex);
    const ext = filename.substring(dotIndex);
    if (filename.length <= maxLength) return filename;
    const keepLength = maxLength - ext.length - 3;
    const startLength = Math.ceil(keepLength / 2);
    const endLength = Math.floor(keepLength / 2);
    const shortened = name.substring(0, startLength) + '...' + name.slice(-endLength);
    return shortened + ext;
}