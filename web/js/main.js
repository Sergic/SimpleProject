var survey = {
    init: function(){
        survey.bindButtons();
        survey.timer.init();
    },
    bindButtons: function(){
        $('.container').on('click', '[data-save]', function(){
            var dataName = $(this).attr('data-save');
            var form = $('#form-data');
            if(form.is(".form-horizontal")){
                $.ajax({
                    type: "POST",
                    url: form.attr("action"),
                    data: form.serialize(), // serializes the form's elements.
                    beforeSend: function( xhr ) {
                        $('.form-group.has-error').find('.help-block').remove();
                        $('.form-group').removeClass('has-error');
                    },
                    success: function(data) {
                        if (data.success == 1){
                            $('#html-block').empty().append(data.html);
                            if (data.timer != undefined && !data.timer){
                                $().countdown();
                            }
                        }
                        else if (data.errors != undefined){
                            var fields = data.errors;
                            for(var field in fields){

                                $('#'+dataName+'_'+field+'_control_group').addClass('has-error');
                                $('#'+dataName+'_'+field+'_control_group').find('#'+dataName+'_'+field).after('<span class="help-block">'+fields[field]+'</span>');
                            }
                        }
                         // show response from the php script. (use the developer toolbar console, firefox firebug or chrome inspector console)
                    }
                });
            }

            return false;
        });
    },
    timer: {
        start: 360000,
        stop: null,
        init: function(){
            if (!survey.timer.stop){
                $('#site-timer').countup({ start: survey.timer.start });
            }
        }
    }
};

(function($){
    var timerJs = null;
    $.fn.countup = function(opt){
        var options = $.extend({
            callback	: function(){},
            start		: 360000
        },opt);

        var element = this;
        var counter = options.start;

        (function tick(){
            counter = ((counter - 100));
            updateStatus(element, counter);
            if (counter <= 0) {
                timerEnd();
                return;
            }
            timerJs = setTimeout(tick, 100);
        })();

        function updateStatus(elem, count){
            if(count<0) count = 0;
            $(elem).empty().text((count/1000).toFixed(1));
        }

        function timerEnd(){
            $().countdown();
            alert('Time out');
        }
    };
    $.fn.countdown = function(){
        window.clearTimeout(timerJs);
    }
})($);