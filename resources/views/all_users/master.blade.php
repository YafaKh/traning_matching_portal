<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Portal</title>
    {{--body font--}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    {{-- Bootstrap CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    {{-- Bootstrap ICONS CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- our custom style sheet --}}
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">

</head>
<body class="bg-sand"> 
    @yield('navbar')
    @yield('sub_navbar')
    @yield('content')
    
{{-- Bootstrap JS CDN --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
{{-- jquery CDN --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
{{-- filter code --}}
<script>
        function filterTable(filterID, tableID, col) {
        var filterVal = $('#' + filterID).val();

        // Loop through each row in the table
        $('#' + tableID + ' tbody tr').each(function() {
            var row = $(this);
            var data = row.find('td:eq(' + col + ')').text();

            // Filter based on selected values
            if( dataMatch = filterVal === "All" || filterVal === data){
                row.show();
            } else {
                row.hide();
            }
        });
    }
</script>
{{-- select all code --}}
<script>
    const checkAll = document.querySelector('#checkAll');
    const checkboxes = document.querySelectorAll('#table .table-checkbox');

    checkAll.addEventListener('change', () => {
    checkboxes.forEach(checkbox => {
        checkbox.checked = checkAll.checked;
    });
    });
</script>
</body>
</html>