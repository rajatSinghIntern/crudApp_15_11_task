$(document).ready(function() {
    // Function to fetch and display data
    function fetchData() {
        $.ajax({
            url: 'http://localhost/crudApp_pramod_15_11/routes/read.php',
            type: 'GET',
            success: function(data) {
                $('#dataTable').empty();
                data.forEach(function(item) {
                    $('#dataTable').append('<tr><td>' + item.id + '</td><td>' + item.username + '</td><td>' + item.email + '</td><td>' + item.password + '</td><td>' + item.fav_supe + '</td><td><button class="editButton" data-id="' + item.id + '">Edit</button> <button class="deleteButton" data-id="' + item.id + '">Delete</button></td></tr>');
                });
            }
        });
    }

    // Fetch and display data on page load
    fetchData();

    // Function to handle form submission
$('#dataForm').on('submit', function(e) {
e.preventDefault();

var id = $('#id').val();
var username = $('#username').val();
var email = $('#email').val();
var pass = $('#pass').val();
var fav_supe = $('#fav_supe').val();

if (id) {
// If ID exists, update the existing data
$.ajax({
    url: 'http://localhost/crudApp_pramod_15_11/routes/update.php',
    type: 'POST',
    data: {
        id: id,
        username: username,
        email: email,
        pass: pass,
        fav_supe: fav_supe
    },
    contentType: 'application/x-www-form-urlencoded',
    success: function() {
        $('#id').val('');
        $('#username').val('');
        $('#email').val('');
        $('#pass').val('');
        $('#fav_supe').val('');
        fetchData();
    }
});
} else {
// If ID does not exist, create new data
$.ajax({
    url: 'http://localhost/crudApp_pramod_15_11/routes/create.php',
    type: 'POST',
    data: {
        id: id,
        username: username,
        email: email,
        pass: pass,
        fav_supe: fav_supe
    },
    success: function() {
        $('#id').val('');
        $('#username').val('');
        $('#email').val('');
        $('#pass').val('');
        $('#fav_supe').val('');
        fetchData();
    }
});
}
});

    // Function to handle click event of edit button
    $(document).on('click', '.editButton', function() {
        var id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/crudApp_pramod_15_11/routes/read.php?id=' + id,
            type: 'GET',
            success: function(data) {
                $('#id').val(data.id);
                $('#username').val(data.username);
                $('#email').val(data.email);
                $('#pass').val(data.password);
                $('#fav_supe').val(data.fav_supe);
            }
        });
    });

    // Function to handle click event of delete button
    $(document).on('click', '.deleteButton', function() {
        var id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/crudApp_pramod_15_11/routes/delete.php?id=' + id,
            type: 'POST',
            success: function() {
                fetchData();
            }
        });
    });
});