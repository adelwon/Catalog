<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <title>Catalog</title>
</head>
<body>
<div class="container">
    <h3 class="text-center mt-5">All products</h3>
    <div class="table-responsive">
        <table id="catalog_data" class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Name product</td>
                <td>Category</td>
                <td>Price</td>
                <td>Short description</td>
            </tr>
            </thead>
            <tbody id="data">
            </tbody>
        </table>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#catalog_data').DataTable();
    });
</script>
<script>
    //call ajax
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "data.php";
    var asynchronous = true;

    ajax.open(method, url, asynchronous);
    //sending ajax request
    ajax.send();

    //receiving response from data.php
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //converting JSON back to array
            var data = JSON.parse(this.responseText);
            console.log(data); //for debugging

            //html value for <tbody>
            var html = "";
            //looping through the data
            for (var i = 0; i < data.length; i++) {
                var name_product = data[i].name_product;
                var name = data[i].name;
                var price = data[i].price;
                var short_description = data[i].short_description;

                //storing in html
                html += "<tr>";
                html += "<td>" + name_product + "</td>";
                html += "<td>" + name + "</td>";
                html += "<td>" + price + "</td>";
                html += "<td>" + short_description + "</td>";
                html += "</tr>";

                //replacing the <tbody> of <table>
                document.getElementById("data").innerHTML = html;
            }
        }
    }
</script>
</html>
