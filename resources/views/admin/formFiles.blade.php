<!--
<div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
<br />

<div id="container">
    <a id="pickfiles" href="javascript:;">[Select files]</a> 
    <a id="uploadfiles" href="javascript:;">[Upload files]</a>
</div>

<br />
<pre id="console"></pre>
-->

	
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/smoothness/jquery-ui.min.css" media="screen" />
<link type="text/css" rel="stylesheet" href="http://www.plupload.com/plupload/js/jquery.ui.plupload/css/jquery.ui.plupload.css" media="screen" />
    

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/plupload.full.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/jquery.ui.plupload/jquery.ui.plupload.min.js" charset="UTF-8"></script>

<script type="text/javascript">
// Custom example logic
/*
var uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',
	browse_button : 'pickfiles', // you can pass in id...
	container: document.getElementById('container'), // ... or DOM Element itself
	url : '/admin/article/upload',
	flash_swf_url : '/js/Moxie.swf',
	silverlight_xap_url : '/js/Moxie.xap',
	 headers: {
         'X-CSRF-TOKEN':$( "input[name*='_token']" ).val()
     },
	filters : {
		max_file_size : '10mb',
		mime_types: [
			{title : "Image files", extensions : "jpg,gif,png"},
			{title : "Zip files", extensions : "zip"}
		]
	},

	init: {
		PostInit: function() {
			document.getElementById('filelist').innerHTML = '';

			document.getElementById('uploadfiles').onclick = function() {
				uploader.start();
				return false;
			};
		},

		FilesAdded: function(up, files) {
			plupload.each(files, function(file) {
				document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
			});
		},

		UploadProgress: function(up, file) {
			document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
		},

		Error: function(up, err) {
			document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
		}
	}
});

uploader.init();

*/
</script>
<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(document).ready(function() {
	$("#uploader").plupload({
		// General settings
		runtimes: 'html5,flash,silverlight,html4',
		
		// Fake server response here 
		// url : '../upload.php',
		url: "/admin/article/upload",

		// Maximum file size
		max_file_size: '1000mb',

		// User can upload no more then 20 files in one go (sets multiple_queues to false)
		max_file_count: 20,
		
		chunk_size: '1mb',
		headers: {
         'X-CSRF-TOKEN':$( "input[name*='_token']" ).val()
     	},
		// Resize images on clientside if we can
		resize : {
			width: 200, 
			height: 200, 
			quality: 90,
			crop: true // crop to exact dimensions
		},

		// Specify what files to browse for
		filters: [
			{ title: "Image files", extensions: "jpg,gif,png" },
			{ title: "Zip files", extensions:  "zip,avi" }
		],

		// Rename files by clicking on their titles
		rename: true,
		
		// Sort files
		sortable: true,

		// Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
		dragdrop: true,

		// Views to activate
		views: {
			list: true,
			thumbs: true, // Show thumbs
			active: 'thumbs'
		},

		// Flash settings
		flash_swf_url : 'js/Moxie.swf',

		// Silverlight settings
		silverlight_xap_url : '/js/Moxie.xap'
	})
})



</script>
<div id="uploader">
    <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
</div>