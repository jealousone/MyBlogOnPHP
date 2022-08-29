var editor = CKEDITOR.replace('text', {
    language: 'en',
    extraPlugins: 'notification'
});

editor.on('required', function (evt) {
    editor.showNotification('Please, fill this field.', 'warning');
    evt.cancel();
});