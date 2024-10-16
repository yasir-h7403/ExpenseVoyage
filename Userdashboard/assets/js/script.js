
//Add Category validation

$(document).ready(function () { 

    $("#category_name").keyup(function () {
        let uName = $(this).val();
        let uNameRE = /^(?=(?:.*[a-zA-Z]){3,})[a-zA-Z\s]*$/;
        if (!uNameRE.test(uName)) {
            $(this).css('border', '1px solid red');
            $(this).next().show('small').text("Allow only A-Z a-z and must contain at least 3 characters").css('color', 'red');
            return false;
        } else {
            $(this).css('border', '1px solid green');
            $(this).next().hide('small');
        }
    });

    $("#categoryform").submit(function (e) {
        let isFormValid = true;

        $("#category_name").keyup();

        if ($("#category_name").next('small').is(':visible')) {
            isFormValid = false;
        }

        if (!isFormValid) {
            e.preventDefault();
            alert("Please correct the highlighted errors before submitting the form.");
        }
    });
});

// Add Expense validation


$(document).ready(function () { 

    $("#expense_amount").keyup(function () {
        let uAmount = $(this).val();
        let uAmountRE = /^(?=(?:.*\d){3,})[\d\s]*/;
        if (!uAmountRE.test(uAmount)) {
            $(this).css('border', '1px solid red');
            $(this).next().show('small').text("Add Expense At least 100").css('color', 'red');
            return false;
        } else {
            $(this).css('border', '1px solid green');
            $(this).next().hide('small');
        }
    });
    

    $("#expense_description").keyup(function () {
        let uDes = $(this).val().replace(/\s/g, '');
        let uDesRE = /^.{10,}$/;
        if (!uDesRE.test(uDes)) {
            $(this).css('border', '1px solid red');
            $(this).next().show('small').text("Description must be at least 10 characters long").css('color', 'red');
            return false;
        } else {
            $(this).css('border', '1px solid green');
            $(this).next().hide('small');
        }
    });

    $("#expenseform").submit(function (e) {
        let isFormValid = true;

        $("#expense_amount").keyup();
        $("#expense_description").keyup();

        if ($("#category_name").next('small').is(':visible'),
            $("#expense_description").next('small').is(':visible')
        ) {
            isFormValid = false;
        }

        if (!isFormValid) {
            e.preventDefault();
            alert("Please correct the highlighted errors before submitting the form.");
        }
    });
});

//Add Trip Validation


$(document).ready(function () { 

    $("#trip_name").keyup(function () {
        let uName = $(this).val();
        let uNameRE = /^(?=(?:.*[a-zA-Z]){3,})[a-zA-Z\s]*$/;
        if (!uNameRE.test(uName)) {
            $(this).css('border', '1px solid red');
            $(this).next().show('small').text("Allow only A-Z a-z and must contain at least 3 characters").css('color', 'red');
            return false;
        } else {
            $(this).css('border', '1px solid green');
            $(this).next().hide('small');
        }
    });

    $("#trip_destination").keyup(function () {
        let uDes = $(this).val().replace(/\s/g, '');
        let uDesRE = /^.{3,}$/;
        if (!uDesRE.test(uDes)) {
            $(this).css('border', '1px solid red');
            $(this).next().show('small').text("Enter at least 3 characters").css('color', 'red');
            return false;
        } else {
            $(this).css('border', '1px solid green');
            $(this).next().hide('small');
        }
    });
    $("#trip_budget").keyup(function () {
        let uAmount = $(this).val();
        let uAmountRE = /^(?=(?:.*\d){3,})[\d\s]*/;
        if (!uAmountRE.test(uAmount)) {
            $(this).css('border', '1px solid red');
            $(this).next().show('small').text("Set Budget At least 100").css('color', 'red');
            return false;
        } else {
            $(this).css('border', '1px solid green');
            $(this).next().hide('small');
        }
    });



    $("#tripform").submit(function (e) {
        let isFormValid = true;

        $("#trip_name").keyup();
        $("#trip_destination").keyup();
        $("#trip_budget").keyup();

        if ($("#trip_name").next('small').is(':visible'),
            $("#trip_destination").next('small').is(':visible'),
            $("#trip_budget").next('small').is(':visible')
        ) {
            isFormValid = false;
        }


        if (!isFormValid) {
            e.preventDefault();
            alert("Please correct the highlighted errors before submitting the form.");
        }
    });
});


//Add Itinerary validation

$(document).ready(function () { 

    $("#itinerary_activity").keyup(function () {
        let uName = $(this).val();
        let uNameRE = /^(?=(?:.*[a-zA-Z]){3,})[a-zA-Z\s]*$/;
        if (!uNameRE.test(uName)) {
            $(this).css('border', '1px solid red');
            $(this).next().show('small').text("Allow only A-Z a-z and must contain at least 3 characters").css('color', 'red');
            return false;
        } else {
            $(this).css('border', '1px solid green');
            $(this).next().hide('small');
        }
    });

    $("#itinerary_description").keyup(function () {
        let uDes = $(this).val().replace(/\s/g, '');
        let uDesRE = /^.{10,}$/;
        if (!uDesRE.test(uDes)) {
            $(this).css('border', '1px solid red');
            $(this).next().show('small').text("Description must be at least 10 characters long").css('color', 'red');
            return false;
        } else {
            $(this).css('border', '1px solid green');
            $(this).next().hide('small');
        }
    });


    $("#itineraries").submit(function (e) {
        let isFormValid = true;

        $("#itinerary_activity").keyup();
        $("#itinerary_description").keyup();

        if ($("#itinerary_activity").next('small').is(':visible'),
            $("#itinerary_description").next('small').is(':visible')
        ) {
            isFormValid = false;
        }

        if (!isFormValid) {
            e.preventDefault();
            alert("Please correct the highlighted errors before submitting the form.");
        }
    });
});