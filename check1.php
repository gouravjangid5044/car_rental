<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      
</head>
<body>
<div class="row" data-id="1">
  <p>Total People: <span class="totalPeople">Sedan</span>
    <button class="editTotalPeople">Edit</button>
  </p>
  <p>Type of Car: <span class="typeOfCar">BMW</span>
    <button class="editTypeOfCar">Edit</button>
  </p>
</div>

<!-- <script>
  const rows = document.querySelectorAll('.row');
  const cars = ['Sedan', 'BMW', 'Mercedes', 'Audi'];

  rows.forEach(row => {
    const editTypeOfCarBtn = row.querySelector('.editTypeOfCar');
    const typeOfCarSpan = row.querySelector('.typeOfCar');

    editTypeOfCarBtn.addEventListener('click', function() {
      const select = document.createElement('select');
      cars.forEach(car => {
        const option = document.createElement('option');
        option.value = car;
        option.innerHTML = car;
        select.appendChild(option);
      });

      typeOfCarSpan.innerHTML = '';
      typeOfCarSpan.appendChild(select);
      select.focus();
    });

    typeOfCarSpan.addEventListener('change', function() {
      const selectedValue = this.querySelector('select').value;
      typeOfCarSpan.innerHTML = selectedValue;
      
      // Pass the selected value to PHP here
      // ...
    });
  });
</script> -->
<script>
  const rows = document.querySelectorAll('.row');
  const cars = ['Sedan', 'BMW', 'Mercedes', 'Audi'];

  rows.forEach(row => {
    const editTotalPeopleBtn = row.querySelector('.editTotalPeople');
    const totalPeopleSpan = row.querySelector('.totalPeople');
    const editTypeOfCarBtn = row.querySelector('.editTypeOfCar');
    const typeOfCarSpan = row.querySelector('.typeOfCar');

    editTotalPeopleBtn.addEventListener('click', function() {
      const input = document.createElement('input');
      input.value = totalPeopleSpan.innerHTML;
      totalPeopleSpan.innerHTML = '';
      totalPeopleSpan.appendChild(input);
      input.focus();
    });

    totalPeopleSpan.addEventListener('keyup', function(event) {
      if (event.key === 'Enter') {
        totalPeopleSpan.innerHTML = this.querySelector('input').value;
        
        // Pass the entered value to PHP here
        // ...
      }
    });

    editTypeOfCarBtn.addEventListener('click', function() {
      const select = document.createElement('select');
      cars.forEach(car => {
        const option = document.createElement('option');
        option.value = car;
        option.innerHTML = car;
        select.appendChild(option);
      });

      typeOfCarSpan.innerHTML = '';
      typeOfCarSpan.appendChild(select);
      select.focus();
    });

    typeOfCarSpan.addEventListener('change', function() {
      const selectedValue = this.querySelector('select').value;
      typeOfCarSpan.innerHTML = selectedValue;
      
      // Pass the selected value to PHP here
      // ...
      $.post("check1.php", { carType: selectedValue }, function(result) {
    console.log("Data: " + result); });
    });
  });


  const typeOfCarSpan = document.querySelector('.typeOfCar');
  const editTypeOfCarButton = document.querySelector('.editTypeOfCar');

  editTypeOfCarButton.addEventListener('click', function() {
    const currentText = typeOfCarSpan.innerHTML;

    typeOfCarSpan.innerHTML = `
      <select>
        <option value="Sedan">Sedan</option>
        <option value="BMW">BMW</option>
      </select>
    `;

    const select = typeOfCarSpan.querySelector('select');
    select.value = currentText;
    select.focus();

    typeOfCarSpan.addEventListener('change', function() {
      const selectedValue = this.querySelector('select').value;
      typeOfCarSpan.innerHTML = selectedValue;
      
      const parentRow = this.closest('.row');
      const className = parentRow.className;
      const dataId = parentRow.getAttribute('data-id');

      $.post("update-car-type.php", { carType: selectedValue, className: className, dataId: dataId }, function(result) {
        console.log("Data: " + result);
      });
    });
  });
</script>


<?php
  $carType = $_POST['carType'];

  // Update the database or perform other operations with the passed value
  // ...

  echo "Car Type updated successfully: " . $carType;
?>


</body>
</html>