

    $(document).on('click', "a.regionmenu", function() {
        region_id = $(this).attr('regionid');

        $.ajax({
            url: 'refreshparkscreen.php',
            type: 'GET',
            data: 'region_id=' + region_id,
            success: function(data) {
                $('.statemenu').html(data);
                $('a.selectedstatemenu').first().trigger('click');
            },
            error: function(e) {
                console.log(e.message);
            }
        });
    });

    $(document).on('click', "a.selectedstatemenu", function() {
        state_id = $(this).attr('stateid');
    
        $.ajax({
            url: 'refreshparkscreen.php',
            type: 'GET',
            data: 'state_id=' + state_id,
            success: function(data) {
                $('#listparks').html(data);
            },
            error: function(e) {
                console.log(e.message);
            }
        });

    });


    $(document).on('click', "a.parkdetail", function() {
        park_id = $(this).attr('parkid');
    
        $.ajax({
            url: 'refreshparkscreen.php',
            type: 'GET',
            data: 'park_id=' + park_id,
            success: function(data) {
                $('#listparks').html(data);
            },
            error: function(e) {
                console.log(e.message);
            }
        });
    });

    $('.regionmenu').on('click','li', function(){
        $(this).addClass('active').siblings().removeClass('active');
     });

     $('.statemenu').on('click','li', function(){
        $(this).addClass('active').siblings().removeClass('active');
     });
    


