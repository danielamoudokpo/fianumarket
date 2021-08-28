    function loader(cont, data, active) {

        $(cont).append("<div style='vertical-align: middle;margin-top:-10%;'>" +
            "<center></center></div>");
    
    
        $(cont).load(data);
        $('li').removeClass('active');
        $(active).addClass('active');
    
    };
    