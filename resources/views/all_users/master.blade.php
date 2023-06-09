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
    if (selectedValue !== 'All') {
      Array.from(tableBody.rows).forEach((row) => {
        const cellValue = row.cells[columnIndex].textContent;
        if (!cellValue.includes(selectedValue)) {
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
</script>
</body>
</html>