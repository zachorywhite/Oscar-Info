$(document).ready(function(){
    
    $("#table").hide();
    
    $("#submit").click(function(){
    
        // read entire list
        if(!$('#category-dropdown').val() && !$('#value').val() && !$('#value2').val()){
            $("#table tbody > tr").remove();
            $("#table").show();
            
            fetch('http://oscarinfo-com.stackstaging.com/api/movie/read.php')
            .then(response =>{
                return response.json();
            })
            .then(data=>{
                data.forEach(movie =>{
                    
                    var tr = $('<tr/>');
                    $(tr).append("<td>" + movie["year"] + "</td>")
                    $(tr).append("<td>" + movie["category"] + "</td>")
                    $(tr).append("<td>" + movie["winner"] + "</td>")
                    $(tr).append("<td>" + movie["entity"] + "</td>")
                    $('#table').append(tr);
                    
                })
            })
            .catch(err =>{
                console.error("error");
            })
        }

        // 1 year + no category
        if(!$('#category-dropdown').val() && $('#value').val() && !$('#value2').val()){
            $("#table tbody > tr").remove();
            $("#table").show();
            
            fetch('http://oscarinfo-com.stackstaging.com/api/movie/read_year.php?year='+ $('#value').val())
            .then(response =>{
                return response.json();
            })
            .then(data=>{
                data.forEach(movie =>{

                    var tr = $('<tr/>');
                    $(tr).append("<td>" + movie["year"] + "</td>")
                    $(tr).append("<td>" + movie["category"] + "</td>")
                    $(tr).append("<td>" + movie["winner"] + "</td>")
                    $(tr).append("<td>" + movie["entity"] + "</td>")
                    $('#table').append(tr);

                })
            })
            .catch(err =>{
                console.error("error");
            })
        }
        
        // 1 category + 1 year
        if($('#category-dropdown').val() && $('#value').val() && !$('#value2').val()){
            $("#table tbody > tr").remove();
            $("#table").show();
            
            fetch('http://oscarinfo-com.stackstaging.com/api/movie/read_yearcat.php?year='+ $('#value').val() +"&category=" + $('#category-dropdown').val())
            .then(response =>{
                return response.json();
            })
            .then(data=>{
                data.forEach(movie =>{
                    
                    var tr = $('<tr/>');
                    $(tr).append("<td>" + movie["year"] + "</td>")
                    $(tr).append("<td>" + movie["category"] + "</td>")
                    $(tr).append("<td>" + movie["winner"] + "</td>")
                    $(tr).append("<td>" + movie["entity"] + "</td>")
                    $('#table').append(tr);
                    
                })
            })
            .catch(err =>{
                console.error("error");
            })
        }
        
        // 0 category + multiple year
        if(!$('#category-dropdown').val() && $('#value').val() && $('#value2').val()){
            $("#table tbody > tr").remove();
            $("#table").show();

            fetch('http://oscarinfo-com.stackstaging.com/api/movie/read_multiyear.php?fyear='+ $('#value').val() + '&lyear=' + $('#value2').val())
            .then(response =>{
                return response.json();
            })
            .then(data=>{
                data.forEach(movie =>{
                    console.log(movie)

                    var tr = $('<tr/>');
                    $(tr).append("<td>" + movie["year"] + "</td>")
                    $(tr).append("<td>" + movie["category"] + "</td>")
                    $(tr).append("<td>" + movie["winner"] + "</td>")
                    $(tr).append("<td>" + movie["entity"] + "</td>")
                    $('#table').append(tr);

                })
            })
            .catch(err =>{
                alert("Error");
            })
        }    
        
        // 1 category + multiple years
        if($('#category-dropdown').val() && $('#value').val() && $('#value2').val()){
            $("#table tbody > tr").remove();
            $("#table").show();

            fetch('http://oscarinfo-com.stackstaging.com/api/movie/read_multiyearCat.php?fyear='+ $('#value').val() + '&lyear=' + $('#value2').val() + '&category=' + $('#category-dropdown').val())
            .then(response =>{
                return response.json();
            })
            .then(data=>{
                data.forEach(movie =>{
                    console.log(movie)

                    var tr = $('<tr/>');
                    $(tr).append("<td>" + movie["year"] + "</td>")
                    $(tr).append("<td>" + movie["category"] + "</td>")
                    $(tr).append("<td>" + movie["winner"] + "</td>")
                    $(tr).append("<td>" + movie["entity"] + "</td>")
                    $('#table').append(tr);

                })
            })
            .catch(err =>{
                alert("Error");
            })
        }  
    });

    // on year select
    $("#value").change(function(){
        $("#value2").load("dropdowns/yearDD2.php?year="+ $("#value").val());

        $("#category-dropdown").load("dropdowns/dd.php?year="+ $("#value").val());
    });
    
    // on second year select
    $("#value2").change(function(){
        $("#category-dropdown").load("dropdowns/multidd.php?fyear="+ $("#value").val() + "&lyear=" + $("#value2").val());   
    });
    
    // load year dropdown
    $("#value").load("dropdowns/yearDD.php");
}) 