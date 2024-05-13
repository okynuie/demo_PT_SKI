<table id="inputs-container">
    <thead>
        <tr>
            <th>Input 1</th>
            <th>Input 2</th>
            <th>Input 3</th>
            <th>Input 4</th>
            <th>Input 5</th>
            <th>Input 6</th>
        </tr>
    </thead>
    <tbody>
        <tr class="input-group">
            <td><input type="text" class="input1"></td>
            <td><input type="text" class="input2"></td>
            <td><input type="text" class="input3"></td>
            <td><input type="text" class="input4"></td>
            <td><input type="text" class="input5" readonly></td>
            <td><input type="text" class="input6" readonly></td>
        </tr>
    </tbody>
</table>
<button id="add-row">Add Row</button>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add event listener to the dynamically added input fields
        $(document).on('input', '.input-group input', function() {
            calculateValues($(this).closest('.input-group'));
        });

        // Function to calculate the values of input 5 and input 6 based on input 2, input 3, input 4, and input 5
        function calculateValues(inputGroup) {
        var input2 = parseFloat(inputGroup.find('.input2').val());
        var input3 = parseFloat(inputGroup.find('.input3').val());
        var input4 = parseFloat(inputGroup.find('.input4').val());
        var input5 = inputGroup.find('.input5');
        var input6 = inputGroup.find('.input6');

            // Calculate value for input 5 by adding input 2 and input 3
            var value5 = isNaN(input2) || isNaN(input3) ? '' : input2 + input3;
            input5.val(value5);

            // Calculate value for input 6 by multiplying input 4 and input 5
            var value6 = isNaN(input4) || isNaN(value5) ? '' : input4 * value5;
            input6.val(value6);
        }

        // Function to add more input fields dynamically
        $('#add-row').on('click', function() {
            var newRow = '<tr class="input-group">' +
                            '<td><input type="text" class="input1"></td>' +
                            '<td><input type="text" class="input2"></td>' +
                            '<td><input type="text" class="input3"></td>' +
                            '<td><input type="text" class="input4"></td>' +
                            '<td><input type="text" class="input5" readonly></td>' +
                            '<td><input type="text" class="input6" readonly></td>' +
                        '</tr>';

            $('#inputs-container tbody').append(newRow);
        });
    });
</script> -->
