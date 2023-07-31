<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
      
</head>
<body>
  
    <div id="card">
    <div class="row" data-id="1">
    <p>Total People: <span class="totalPeople">Sedan</span>
      <button class="editTotalPeople">
          <!-- <svg width="13" height="13" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"><path d="M 229 615C 229 615 382 766 382 766C 382 766 356 792 356 792C 351 798 344 800 338 802C 338 802 210 828 210 828C 186 832 163 810 169 785C 169 785 195 659 195 659C 195 652 199 646 203 641C 203 641 229 615 229 615M 713 137C 713 137 865 288 865 288C 865 288 432 716 432 716C 432 716 279 565 279 565C 279 565 713 137 713 137M 839 25C 848 25 858 29 865 36C 865 36 967 137 967 137C 980 150 980 173 967 187C 967 187 915 237 915 237C 915 237 763 86 763 86C 763 86 815 36 815 36C 821 29 830 25 839 25C 839 25 839 25 839 25M 150 13C 150 13 650 13 650 13C 664 12 676 19 683 31C 690 43 690 57 683 69C 676 81 664 88 650 88C 650 88 150 88 150 88C 138 88 121 95 108 108C 95 121 88 138 88 150C 88 150 88 850 88 850C 88 862 95 879 108 892C 121 905 138 912 150 912C 150 912 850 912 850 912C 862 912 879 905 892 892C 905 879 912 862 912 850C 912 850 912 350 912 350C 912 336 919 324 931 317C 943 310 957 310 969 317C 981 324 988 336 987 350C 987 350 987 850 987 850C 987 887 970 920 945 945C 921 970 888 987 850 987C 850 987 150 987 150 987C 113 987 79 970 55 945C 30 921 13 887 13 850C 13 850 13 150 13 150C 13 113 30 79 55 55C 79 30 113 13 150 13C 150 13 150 13 150 13"/></svg> -->
          <img width="14px" src="https://img.icons8.com/cute-clipart/64/null/pencil.png"/>
        
      </button>
    </p>
    <p>Name: <span class="name">Bolero</span>
      <button class="editName">Edit</button>
    </p>
  </div>
  <div class="row" data-id="2">
    <p>Total People: <span class="totalPeople">Sedan</span>
      <button class="editTotalPeople">Edit</button>
    </p>
    <p>Name: <span class="name">Bolero</span>
      <button class="editName">Edit</button>
    </p>
  </div>
        </div>   
     <script>
        document.querySelectorAll('.editTotalPeople').forEach(function(button) {
  button.addEventListener('click', function() {
    let row = button.closest('.row');
    makeEditable(row, 'totalPeople');
  });
});

document.querySelectorAll('.editName').forEach(function(button) {
  button.addEventListener('click', function() {
    let row = button.closest('.row');
    makeEditable(row, 'name');
  });
});

function makeEditable(row, field) {
  let element = row.querySelector('.' + field);
  let input = document.createElement('input');
  input.value = element.innerHTML;
  input.addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
      updateField(row, field, input.value);
      element.innerHTML = input.value;
    }
  });
  element.innerHTML = '';
  element.appendChild(input);
  input.focus();
}

function updateField(row, field, value) {
  let id = row.dataset.id;

  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'check.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      console.log('Success:', xhr.responseText);
    //   document.getElementById(field).innerHTML = xhr.responseText;
    }
  };
  xhr.send(`id=${id}&field=${field}&value=${value}`);
}
     </script>

<?php
if (isset($_POST['id']) && isset($_POST['field']) && isset($_POST['value'])) {
  $id = $_POST['id'];
  $field = $_POST['field'];
  $value = $_POST['value'];

echo $id."  ".$field."  ".$value;
}
?>
<?php
echo md5("gourav1234567890)(*&^%$#@!");

?>