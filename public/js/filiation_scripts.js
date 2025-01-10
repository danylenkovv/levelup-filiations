    //Load and change photo preview in forms
    function previewPhoto(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('photoPreview');
        const modalPhoto = document.getElementById('modalPhoto');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                modalPhoto.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
            modalPhoto.src = '';
        }
    }

    //Init custom input
    $(function() {
        bsCustomFileInput.init();
    });

    //Init summernote
    $(document).ready(function() {
        $('#info').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
