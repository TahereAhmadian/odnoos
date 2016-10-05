
    function retrive ( tag ) {
        $.ajax({    //create an ajax request to load_page.php
            type: "GET",
            url: "api.php",
            data: "data=" + tag,
            dataType: "html",   //expect html to be returned
            success: function(response){
                $("#"+tag).html(response);
                //alert(response);
            }

        });
    }
    retrive('guild');
    retrive('state');
//********************************************************
    $( document ).on("change", ".guild", function(){
        var selectedguild = $(".guild option:selected").val();
        //alert(selectedguild);
        $.ajax({

            type: "POST",

            url: "loadstuff.php",

            data: { guild : selectedguild }

        }).done(function(data){

            $("#stuff").html(data);

        });
    });
//*********************************************************
    //**************** load city - on change the states
    $( document ).on("change", ".state", function(){
        var selectedState = $(".state option:selected").val();
        $.ajax({

            type: "POST",

            url: "loadcity.php",

            data: { state : selectedState }

        }).done(function(data){

            $("#city").html(data);
            $("#reagion").html("");

        });
    });


//************************************************************
    $( document ).on("change", ".city", function(){
        var selectedcity = $(".city option:selected").val();
        $.ajax({

            type: "POST",

            url: "loadreagion.php",

            data: { city : selectedcity }

        }).done(function(data){

            $("#reagion").html(data);
            comboloading();

            $( "#combobox" ).combobox();


        });
    });
//***********************************************************


    function register_business ( data  , tag , index ) {
        $.ajax({    //create an ajax request to load_page.php
            type: "POST",
            url: "register_open.php",
            data: "data=" + data +"&tag="+tag,
            dataType: "html",   //expect html to be returned
            success: function(response){
                //$("#"+tag).html(response);
                alert(response);
                $('#'+index).remove();
            }

        });
        // alert(tag);
    }
//***********************************************************

    function disableform () {
        if ($(this).is(':checked')) {
            $('#postme').removeAttr('disabled');
        } else {
            $('#postme').attr('disabled', 'disabled');
        }
    }
    $('#justMarket').click(function () {
            if ($(this).is(':checked')) {
                $('#postme').removeAttr('disabled');
            } else {
                $('#postme').attr('disabled', 'disabled');
            }
        }
    );
    disableform ();


    // statestic banner***************************************

    function statestic ( tag , id ) {
        $.ajax({    //create an ajax request to load_page.php
            type: "GET",
            url: "statestic.php",
            data: "data=" + tag +"&id="+id,
            dataType: "html",   //expect html to be returned
            success: function(response){
                $("#"+tag).html(response);
            }

        });
    }
    // end

    /*******************************************/
    $( document ).on("change", "#combobox",  function() {
        comboloading();

        $( "#combobox" ).combobox();

    } );
    function comboloading () {
        $.widget( "custom.combobox", {
            _create: function() {
                this.wrapper = $( "<span>" )
                    .addClass( "custom-combobox" )
                    .insertAfter( this.element );

                this.element.hide();
                this._createAutocomplete();
                this._createShowAllButton();
            },

            _createAutocomplete: function() {
                var selected = this.element.children( ":selected" ),
                    value = selected.val() ? selected.text() : "";

                this.input = $( "<input>" )
                    .appendTo( this.wrapper )
                    .val( value )
                    .attr( "title", "" )
                    .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-right" )
                    .autocomplete({
                        delay: 0,
                        minLength: 0,
                        source: $.proxy( this, "_source" )
                    })
                    .tooltip({
                        classes: {
                            "ui-tooltip": "ui-state-highlight"
                        }
                    });

                this._on( this.input, {
                    autocompleteselect: function( event, ui ) {
                        ui.item.option.selected = true;
                        this._trigger( "select", event, {
                            item: ui.item.option
                        });
                    },

                    autocompletechange: "_removeIfInvalid"
                });
            },

            _createShowAllButton: function() {
                var input = this.input,
                    wasOpen = false;

                $( "<a>" )
                    .attr( "tabIndex", -1 )
                    .attr( "title", "Show All Items" )
                    .tooltip()
                    .appendTo( this.wrapper )
                    .button({
                        icons: {
                            primary: "ui-icon-triangle-1-s"
                        },
                        text: false
                    })
                    .removeClass( "ui-corner-all" )
                    .addClass( "custom-combobox-toggle ui-corner-left" )
                    .on( "mousedown", function() {
                        wasOpen = input.autocomplete( "widget" ).is( ":visible" );
                    })
                    .on( "click", function() {
                        input.trigger( "focus" );

                        // Close if already visible
                        if ( wasOpen ) {
                            return;
                        }

                        // Pass empty string as value to search for, displaying all results
                        input.autocomplete( "search", "" );
                    });
            },

            _source: function( request, response ) {
                var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                response( this.element.children( "option" ).map(function() {
                    var text = $( this ).text();
                    if ( this.value && ( !request.term || matcher.test(text) ) )
                        return {
                            label: text,
                            value: text,
                            option: this
                        };
                }) );
            },

            _removeIfInvalid: function( event, ui ) {

                // Selected an item, nothing to do
                if ( ui.item ) {
                    return;
                }

                // Search for a match (case-insensitive)
                var value = this.input.val(),
                    valueLowerCase = value.toLowerCase(),
                    valid = false;
                this.element.children( "option" ).each(function() {
                    if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                        this.selected = valid = true;
                        return false;
                    }
                });

                // Found a match, nothing to do
                if ( valid ) {
                    return;
                }

                // Remove invalid value
                this.input
                    .val( "" )
                    .attr( "title", value + " didn't match any item" )
                    .tooltip( "open" );
                this.element.val( "" );
                this._delay(function() {
                    this.input.tooltip( "close" ).attr( "title", "" );
                }, 2500 );
                this.input.autocomplete( "instance" ).term = "";
            },

            _destroy: function() {
                this.wrapper.remove();
                this.element.show();
            }
        });

    }

    /*********************** searchable tables ***********************/



    $("#search").on("keyup", function(e) {
        var value = $(this).val();

        $("table tr").each(function(index) {
            if (index !== 0) {

                $row = $(this);


                var idR0 = $row.find("td:eq(0)").text();
                var idR1 = $row.find("td:eq(1)").text();
                var idR2 = $row.find("td:eq(2)").text();
                var idR3 = $row.find("td:eq(3)").text();
                var idR4 = $row.find("td:eq(4)").text();
                var idR5 = $row.find("td:eq(5)").text();
                var idR6 = $row.find("td:eq(6)").text();
                var idR7 = $row.find("td:eq(7)").text();
                var idR8 = $row.find("td:eq(8)").text();
                var idR9 = $row.find("td:eq(9)").text();
                var idR10 = $row.find("td:eq(10)").text();
                if ( idR1.indexOf(value) == -1  && idR0.indexOf(value) == -1 && idR2.indexOf(value) == -1  &&
                    idR3.indexOf(value) == -1  && idR4.indexOf(value) == -1 && idR5.indexOf(value) == -1  &&
                    idR6.indexOf(value) == -1  && idR7.indexOf(value) == -1 && idR8.indexOf(value) == -1 && idR9.indexOf(value) == -1 && idR10.indexOf(value) == -1 ) {
                    $row.hide();
                }

                else {
                    $row.show();
                }


            }
        });
    });


    /********************************************************************************************/
    /********************************************************************************************/
    /********************************       Organization    *************************************/
    /********************************************************************************************/
    /********************************************************************************************/


    function retrive_org_api ( tag ) {
        $.ajax({    //create an ajax request to load_page.php
            type: "GET",
            url: "org_api.php",
            data: "data=" + tag,
            dataType: "html",   //expect html to be returned
            success: function(response){
                $("#"+tag).html(response);
                //alert(response);
            }

        });
    }
    retrive_org_api('org_state');

    /***************************************************/
    $( document ).on("change", ".org_state", function(){
        var selectedState = $(".org_state option:selected").val();
        $.ajax({

            type: "POST",

            url: "load_Org_city.php",

            data: { state : selectedState }

        }).done(function(data){

            $("#org_city").html(data);

        });
    });