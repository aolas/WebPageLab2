ClassicEditor
    .create( document.querySelector( '#editor' ), {

        toolbar: {
        items: [
        'heading',
        'CKFinder',
        '|',
        'bold',
        'italic',
        'link',
        'bulletedList',
        'numberedList',
        '|',
        'indent',
        'outdent',
        '|',
        'imageUpload',
        'blockQuote',
        'insertTable',
        'mediaEmbed',
        '|',
        'undo',
        'redo'
        ]
    },
        language: 'en',
        image: {
        toolbar: [
        'imageTextAlternative',
        'imageStyle:full',
        'imageStyle:side'
        ]
    },
        table: {
        contentToolbar: [
        'tableColumn',
        'tableRow',
        'mergeTableCells'
        ]
    },
        licenseKey: '',

    } )
    .then( editor => {
        window.editor = editor;








    } )
    .catch( error => {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: k2i30chx32nf-w6h2v5o1m55c' );
        console.error( error );
    } );
