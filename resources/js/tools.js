const setTinyMCE = (selector) =>{
  tinymce.init({
    selector: selector,
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    toolbar: 'insert a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table imageupload',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    file_picker_types: 'file image media',
    height: 480,
    block_unsupported_drop: false,
    setup: function(editor) {
        let uploader = $('<input id="tinymce-uploader" type="file" accept="image/*" style="display:none">');
        uploader.on("change",function(){
            let input = uploader.get(0);
            let file = input.files[0];
            let fr = new FileReader();
            fr.onload = function() {
                let img = new Image();
                img.src = fr.result;
                editor.insertContent(`<img src="${img.src}"/>`);
                uploader.val('');
            }
            fr.readAsDataURL(file);
        });
        editor.ui.registry.addButton('insert', {
            icon: 'image',
            tooltip: 'Insert',
            onAction: function (e){
                uploader.trigger('click');
            }
        });
    }
  });
}

module.exports = setTinyMCE