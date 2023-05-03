$(document).ready(function() {
    // Listen for changes to the search input field
    $('#search').on('keyup', function() {
        // Get the search term from the input field
        var searchTerm = $(this).val();

        // Send an AJAX request to the server to retrieve the search results
        $.ajax({
            url: '/search',
            method: 'POST',
            data: { search: searchTerm },
            success: function(response) {
                // Update the input value with the search results
                $('#search').val(response);
            }
        });
    });
});
