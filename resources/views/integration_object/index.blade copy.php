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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
            <table class="table table-bordered border-primary">
                <form action="/integration_object" method="get">
                <tr>
                    <th width="100px">
                        ID
                    </th>
                </tr>
                <tr>
                    <th width="100px">
                        <button name="name_1" type="submit" class="btn btn-primary mt-4" value="{{isset($_GET['name_1']) ? $_GET['name_1'] : ''}}">HoldingRegister2.1.</button>
                    </th>
                </tr>
                <tr>
                    <th width="100px">
                        <button name="name_2" type="submit" class="btn btn-primary mt-4" value="{{isset($_GET['name_2']) ? $_GET['name_2'] : ''}}">HoldingRegister2.2.</button>
                    </th>
                </tr>
                <tr>
                    <th width="100px">
                        <button name="name_3" type="submit" class="btn btn-primary mt-4" value="{{isset($_GET['name_3']) ? $_GET['name_3'] : ''}}">HoldingRegister2.3.</button>
                    </th>
                </tr>
                <tr>
                    <th width="100px">
                        <button name="name_4" type="submit" class="btn btn-primary mt-4" value="{{isset($_GET['name_4']) ? $_GET['name_4'] : ''}}">HoldingRegister2.4.</button>
                    </th>
                </tr>
                <tr>
                    <th width="100px">
                        <button name="name_5" type="submit" class="btn btn-primary mt-4" value="{{isset($_GET['name_5']) ? $_GET['name_5'] : ''}}">HoldingRegister2.5.</button>
                    </th>
                </tr>
            </table>
            </form>
            </div>

            <div class="col-md-9">
                <!-- <table class="table table-bordered border-primary">
                    <tr>
                    <tr>
                        <th>ID</th>
                        <th>View</th>
                        <th>TimeStamp</th>
                        <th>Quaility</th>
                    </tr>
                    </tr>
                    @foreach ($integration_object as $io)
                    @php
                        $id = explode('"."', $io->ItemID);
                        $codeName = explode(':', $id[2]);
                        $quality = explode(',', substr($io->ItemQuality, 10));
                    @endphp
                    <tr>
                        <td>{{$codeName[3]}}</td>
                        <td>{{$io->ItemCurrentValue}}</td>
                        <td>{{$io->ItemTimeStamp}}</td>
                        <td>{{$quality[0]}}</td>
                    </tr>
                    @endforeach
                </table> -->
                <table class="table table-bordered border-primary" id="tableHDA">
                    <tr>
                        <th>ID</th>
                        <th>View</th>
                        <th>TimeStamp</th>
                        <th>Quaility</th>
                    </tr>
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

    function filter() {
        var url = '{{ route("get.data.hda") }}';
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
</script>
</html>