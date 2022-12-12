<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="/assets/libs/bootsrap-datatables/bootsrap-datatables.css" rel="stylesheet" type="text/css" >
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="/assets/images/PertaminaEP.png" width="100" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-10">
                <select class="form-select" name="name_id" id="name_id">
                    <option value="">-- All --</option>
                    <option value="HoldingRegister2.1.">HoldingRegister2.1.</option>
                    <option value="HoldingRegister2.2.">HoldingRegister2.2.</option>
                    <option value="HoldingRegister2.3.">HoldingRegister2.3.</option>
                    <option value="HoldingRegister2.4.">HoldingRegister2.4.</option>
                    <option value="HoldingRegister2.5.">HoldingRegister2.5.</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary" id="btn_filter">Filter</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table" id="tableHDA">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>View</th>
                        <th>TimeStamp</th>
                        <th>Quaility</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="/assets/libs/jquery/jquery.js"></script>
<script src="/assets/libs/bootsrap-datatables/bootsrap-datatables.js"></script>
<script>
	$(document).ready(function() {
        filter();
    });

    function filter(idx = 0) {
        var url = '{{ route("get.data.hda", ":idx") }}';
        url = url.replace(':idx', idx);
        $('#tableHDA').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: true,
            ajax: url,
            columns: [
                {data: "itemId", name: "itemId"},
                {data: "ItemCurrentValue", name: "ItemCurrentValue"},
                {data: "ItemTimeStamp", name: "ItemTimeStamp"},
                {data: "ItemQuality", name: "ItemQuality"},
            ]
        });
    }

    $('#btn_filter').on('click', function() {
        var idx = $('#name_id').val();
        $('#tableHDA').DataTable().destroy();
        filter(idx);
    });
</script>

<div class="container">
    
</div>

</html>