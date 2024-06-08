$(document).ready(function() {
    function sumRow() {
        
        $('tr').each(function() {
            
            var boys = parseFloat($(this).find('.boys').val()) || 0;
            var girls = parseFloat($(this).find('.girls').val()) || 0;
            var total = boys + girls;
            console.log(total);
            $(this).find('.total').text(total);
        });
    }

    function sumColumn() {
        var totalBoys = 0;
        var totalGirls = 0;
        var grandTotal = 0;

        $('.boys').each(function() {
            totalBoys += parseFloat($(this).val()) || 0;
        });

        $('.girls').each(function() {
            totalGirls += parseFloat($(this).val()) || 0;
        });

        $('.total').each(function() {
            grandTotal += parseFloat($(this).text()) || 0;
        });

        $('.grand-total-boys').val(totalBoys);
        $('.grand-total-girls').val(totalGirls);
        $('.grand-total').val(grandTotal);
    }

    $('input').on('input', function() {
        
        sumRow();
        sumColumn();
    });


    sumRow();
    sumColumn();
});
