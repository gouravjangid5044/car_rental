$(document).ready(function() {
    $('.editTotalPeople').on('click', function () {
        var totalPeopleSpan = $(this).prev();
        var totalPeople = totalPeopleSpan.text();

        totalPeopleSpan.empty();

        var input = $('<input type="text">').val(totalPeople);
        totalPeopleSpan.append(input);
        input.focus();

        input.on('blur', function () {
            var updatedTotalPeople = input.val();

            totalPeopleSpan.empty();
            totalPeopleSpan.text(updatedTotalPeople);

            var row = $(this).closest('.row');
            var id = row.data('id');

            $.ajax({
                type: "POST",
                url: "update.php",
                data: {id: id, field: "totalPeople", value: updatedTotalPeople}
            });
        });
    });
},
    $('.editName').on('click', function () {
        var nameSpan = $(this).prev();
        var name = nameSpan.text();

        nameSpan.empty();

        var input = $('<input type="text">').val(name);
        nameSpan.append(input);
        input.focus();

        input.on('blur', function () {
            var updatedName = input.val();

            nameSpan.empty();
            nameSpan.text(updatedName);

            var row = $(this).closest('.row');
            var id = row.data('id');

            $.ajax({
                type: "POST",
                url: "update.php",
                data: {id: id, field: "name", value: updatedName}
            });
        });
    }),

    $('.editBMW').on('click', function () {
  var bmwSpan = $(this).prev();
  var bmw = bmwSpan.text();

  bmwSpan.empty();

  var select = $('<select>');
  select.append($("<option>").attr('value', 'BMW').text('BMW'));
  select.append($("<option>").attr('value', 'Audi').text('Audi'));
  select.val(bmw);
  bmwSpan.append(select);
  select.focus();

  select.on('blur', function () {
    bmwSpan.empty();
    bmwSpan.text(select.val());
    $('.editBMW').show();
  });

  select.on('change', function () {
    var id = $(this).closest('.row').data('id');
    var field = "BMW";
    var value = select.val();

    $.ajax({
      type: 'POST',
      url: 'update.php',
      data: { id: id, field: field, value: value },
      success: function (response) {
        console.log(response);
      }
    });
  });

  $('.editBMW').hide();
}),

$('.editAudi').on('click', function() {
    var AudiSpan = $(this).prev();
    var Audi = AudiSpan.text();

    AudiSpan.empty();

    var select = $('<select>');
    select.append($("<option>").attr('value', 'Audi').text('Audi'));
    select.append($("<option>").attr('value', 'Audi A3').text('Audi A3'));
    select.append($("<option>").attr('value', 'Audi A4').text('Audi A4'));
    select.append($("<option>").attr('value', 'Audi A5').text('Audi A5'));

    select.val(Audi);
    AudiSpan.append(select);
    select.focus();

    select.on('change', function() {
        var dataId = $(this).closest('.row').data('id');
        var fieldClass = $(this).closest('p').find('span').attr('class');
        var updatedName = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: { id: dataId, field: fieldClass, name: updatedName },
            success: function(response) {
                console.log(response);
            }
        });
    });
}));