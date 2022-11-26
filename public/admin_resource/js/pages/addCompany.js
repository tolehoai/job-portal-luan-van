$(document).ready(function () {
    //Select2
    $("#countrySelect").select2();
    $("#officeSelect").select2({
        placeholder: "Chọn thành phố có văn phòng"
    });
    //End Select2

    //CKEDITOR
    ClassicEditor
        .create(document.querySelector('#companyDesc'))
        .catch(error => {
            console.error(error);
        });
    //End CKEDITOR
    //CKEDITOR
    ClassicEditor
        .create(document.querySelector('#companyOverview'))
        .catch(error => {
            console.error(error);
        });
    //End CKEDITOR

    //Timepicker
    $('#startTimeWork').mdtimepicker({

        // time format
        timeFormat: 'hh:mm:ss.000',

        // format of the input value
        format: 'hh:mm tt',

        // readonly mode
        readOnly: false,

        // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
        hourPadding: false,

        // theme of the timepicker
        // 'red', 'purple', 'indigo', 'teal', 'green', 'dark'
        theme: 'blue',

    });
    $('#startTimeWork').mdtimepicker().on('timechanged', function (e) {
        console.log(e.value);
        console.log(e.time);
    });

    //End work time
    $('#endTimeWork').mdtimepicker({

        // time format
        timeFormat: 'hh:mm:ss.000',

        // format of the input value
        format: 'hh:mm tt',

        // readonly mode
        readOnly: false,

        // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
        hourPadding: true,

        // theme of the timepicker
        // 'red', 'purple', 'indigo', 'teal', 'green', 'dark'
        theme: 'blue',

    });
    $('#endTimeWork').mdtimepicker().on('timechanged', function (e) {
        console.log(e.value);
        console.log(e.time);
    });
    //End timepicker

    //Image upload review


});
