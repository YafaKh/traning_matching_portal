// evaluate student - by trainer
function calculateAvg() {
    var rangeInputs = document.querySelectorAll('input[type="range"]');
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var counterCantJudge =0;
checkboxes.forEach(function(checkbox, index) {
  if (checkbox.checked) {
    counterCantJudge++;
    console.log('checked');
  }
});
    var sum = 0;
    var avg =0; 
    
    rangeInputs.forEach(function(input) {
      sum += parseInt(input.value);
      avg=100*sum/(5*(12-counterCantJudge));
    });

    return avg;
  }
 
  //when click on button it will be shown in input element
  var submitButton = document.getElementById('sumBtn');
  submitButton.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form submission for demonstration purposes

    var totalavg = calculateAvg();
    
    // Display the sum in the input:text element
    var resultElement = document.getElementById('avg');
    var resultElementHidden = document.getElementById('hiddenavg');

    resultElement.value = totalavg;
    resultElementHidden.value = totalavg;

  });
