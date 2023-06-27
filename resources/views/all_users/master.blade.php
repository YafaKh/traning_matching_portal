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
    
{{-- Bootstrap JS CDN --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
{{-- jquery CDN --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

@yield('navbar')
@yield('sub_navbar')
@yield('content')
{{-- filter code --}}
<script>
function filterTable() {
  // Create an object to store selected values for each column
  const selectedValues = {};

  // Iterate over the dropdowns and store the selected values by column index
  dropdowns.forEach((dropdown) => {
    const columnIndex = dropdown.getAttribute('data-column');
    const selectedValue = dropdown.value;

    selectedValues[columnIndex] = selectedValue;
  });

  // Show all rows by default
  Array.from(tableBody.rows).forEach((row) => {
    row.style.display = '';
  });

  // Filter rows based on selected values
  Object.entries(selectedValues).forEach(([columnIndex, selectedValue]) => {
    if (selectedValue != 'All') {
      Array.from(tableBody.rows).forEach((row) => {
        const cellValue = row.cells[columnIndex].textContent;
        if (cellValue.trim() !== selectedValue.trim()) {
          row.style.display = 'none';
        }
      });
    }
  });
}

// Get references to the dropdown lists
const dropdowns = document.querySelectorAll('.filter-dropdown');

// Get reference to the table body
const tableBody = document.querySelector('#table-body');

// Add event listeners to the dropdown lists
dropdowns.forEach((dropdown) => {
  dropdown.addEventListener('change', filterTable);
});
//check all checkeboxes in the table
function check_all_check_boxes(check_all_id, table_id) {
    const check_all = document.querySelector(`#${check_all_id}`);
    const checkboxes = document.querySelectorAll(`#${table_id} input[type="checkbox"]`);

    check_all.addEventListener('change', () => {
        checkboxes.forEach(checkbox => {
            checkbox.checked = check_all.checked;
        });
    });
}
</script>
<script>
$(document).ready(function(){  
        $('#search').keyup(function(){  
          tableSearch($(this).val());  
        });  
        function tableSearch(value){  
            $('#table tbody tr').each(function(){  
                  var found = 'false';  
                  $(this).each(function(){  
                      if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                      {  
                            found = 'true';  
                      }  
                  });  
                  if(found == 'true')  
                  {  
                      $(this).show();  
                  }  
                  else  
                  {  
                      $(this).hide();  
                  }  
            });  
        }  
  });  
</script>
</body>
</html>