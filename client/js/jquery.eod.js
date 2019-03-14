// Load EOD search form if javascript is enabled.
$(document).ready(function () {
	$('#eodSearch').html('<form id="eodSearchForm" action="" onsubmit="eodSearch();return false;"><input type="text" name="lookfor" size="30" value=""><select name="type"><option value="AllFields">All Fields</option><option value="Title">Title</option><option value="Author">Author</option><option value="Subject">Subject</option><option value="CallNumber">System Number</option><option value="ISN">ISBN/ISSN</option><option value="tag">Tag</option></select><input type="submit" id="eodSearchSubmit" value="Find"></form><div id="eodSearchResults"></div>');
});

// Submit search form values to PHP script.
function eodSearch() {
	$('#eodSearchSubmit').attr('disabled', 'disabled');
	$.php('http://localhost/server/search.php', $('form#eodSearchForm').serialize());
	return false;
}