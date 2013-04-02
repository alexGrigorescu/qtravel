function getBaseURL () {
    return location.protocol + "//" + location.hostname +
        (location.port && ":" + location.port) + "/";
}

function getFileName(path) {
    return path.match(/[-_\w]+[.][\w]+$/i)[0];
}

function getUploadPath(path){
    var indexOf = path.indexOf("images/");
    return path.substr(indexOf + 7);
}

// returns the first form that contains element, on the path to the root
function getEmbeddingForm(element) {
	var node = element.parent();
	while (node && !node.is("form")) {
		node = node.parent();
	}
	return node;
}

// default action for submit buttons
$(".submit").live("click",function(){
	var form = getEmbeddingForm($(this));
	if(validate(form))
		form.submit();
});

$("#dropzone").live("click", function(){
    window.KCFinder = {
        callBackMultiple: function(files) {
            window.KCFinder = null;
            gallery = $('#gallery');
            gallery.val("");
            $('#previewImages').empty();
            var pathToThumbs = '/public/upload/thumbs/images/';

            for (var i = 0; i < files.length; i++){
                var fileName = getUploadPath(files[i]);
                gallery.val(gallery.val() + fileName + "|");
                var img = $('<img>').attr('src', pathToThumbs + fileName).appendTo('#previewImages');
            }
            var toUpload = gallery.val();
            gallery.val(toUpload.substr(0, toUpload.length - 1 ));
        }
    };
    window.open('/kcfinder/browse.php?type=files&dir=files/public',
        'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' +
            'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
});

$(document).ready(function() {
    $("a[rel=gallery]").fancybox({
        'transitionIn'		: 'none',
        'transitionOut'		: 'none',
        'titlePosition' 	: 'over',
        'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
            return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    });
});