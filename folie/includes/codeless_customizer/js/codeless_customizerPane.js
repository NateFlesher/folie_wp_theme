( function( $ ) {
  
  
    wp.customize.bind( 'ready', function () {
       
        $.each(newvars, function(nr, newVar){
            
            $.each(newVar, function(n, newV){
                wp.customize.control( newV.current, function( control ) {
                    var setting = wp.customize( newV.setting );
                    
                    if(_.isObject(newV.value)){
                        var bool = false;
                        $.each(newV.value, function(n, newValue){
                            if(newValue === setting.get())
                                bool = true;
                        });
                        control.active.set( bool );
                    }else
                        control.active.set( newV.value === setting.get() );
                     
                    setting.bind( function( value ) {
                        if(_.isObject(newV.value)){
                            var bool = false;
                            $.each(newV.value, function(n, newValue){
                                if(newValue === value)
                                    bool = true;
                            });
                            control.active.set( bool );
                        }else
                            control.active.set( newV.value === value );
                    } );

                } ); 
            })
           
            
        });
        
      
    } );
    //wp.customize.Menus.data.settingTransport = 'postMessage';
    
} )( jQuery );