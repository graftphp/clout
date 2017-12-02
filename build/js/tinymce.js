function initWysiwyg() {
	tinyMCE.baseURL = '/clout/_/tinymce';
	tinymce.init({
		height: 400,
		menubar: false,
		plugins: "link lists paste table",
		paste_as_text: true,
		selector: '.wysiwyg',
		toolbar: 'undo redo | bold italic underline | link | alignleft aligncenter alignright | bullist numlist | table',
	});
}

initWysiwyg();
