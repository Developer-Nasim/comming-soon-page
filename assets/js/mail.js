 
const sendd = document.querySelector('button'); 
 
    $(sendd).on('click', function(e){
        e.preventDefault();
        var nam = document.querySelector('#name').value;
        var eml = document.querySelector('#email').value; 
        var names       = document.querySelector('#name');
        var form       = document.querySelector('form');
        var emails      = document.querySelector('#email');
        var messages    = document.querySelector('#msg');
        if (nam == "") {
            console.log('sorry');
            $(form).addClass('required'); 
            return false;
        }else if (eml == "") {
            $(form).addClass('required'); 
            return false;
        } else{  
            $.ajax({
                type: 'POST',
                url: 'phpmailer/mail.php',
                cache: false,
                data: {name: nam,email: eml},
                beforeSend: function () {
                    $(sendd).html('Sending...')
                    $(sendd).addClass('sending');
                },
                success: function (data) {
                console.log(data);
                $(names).val('');
                $(emails).val('');
                $(sendd).html('Bedankt!');
                $(sendd).removeClass('sending');
                $(sendd).addClass('sent');
                $(sendd).prop('disabled', true); 
                $(form).removeClass('required');
                }
            }) 
        }
    







    })
 







 