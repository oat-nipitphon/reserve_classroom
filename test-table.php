<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables with AJAX</title>
    <!-- Include DataTables CSS and JS files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
</head>
<body>

<table id="dataTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
    </thead>
</table>

<script>
$(document).ready(function() {
    // Initialize DataTables with AJAX
    $('#dataTable').DataTable({
        "ajax": {
            "url": "user-test-sql-select.php",
            "type": "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "full_name" },
            { "data": "tel" },
            { "data": "code_number" }
        ]
    });
});
</script>

</body>
</html>