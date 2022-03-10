<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div>
       <div id="wrapper">
         <div id="content">
         <a id="anchor3" href="#">X</a>
           <h3>Be a Member To Have Discount</h3><br>
           <label for="USERNAME">USERNAME:</label><br>
             <input type="text" id="input-1" ><br>
             <label for="PASSWORD">PASSWORD:</label><br>
             <input type="password" id="input-2" ><br>
            <a id="anchor1" href="#">Forget Password?</a><br>
             <button id="button" >Log in</button><br>
             <p>Not a member?<a id="anchor2" href="#">sign up</a></p>
        </div>
       </div>
     
    </div>
        <div id="main">
            <h1>TRAVEL WITH US</h1>
        <select name="start_from" id="start_from">
            <option value="Start From" selected="selected" disabled="disabled">Start From</option>
            <option value="Lucknow">Lucknow</option>
            <option value="Kanpur">Kanpur</option>
            <option value="Delhi">Delhi</option>
            <option value="Mumbai">Mumbai</option>
        </select>
        <select name="Reach To" id="to_reach">
            <option value="Reach To" selected="selected" disabled="disabled">Reach To</option>
            <option value="Saharanpur">Saharanpur</option>
        </select>
        <input type="date" id="date">
        <select name="type_of_bus" id="type_of_bus">
            <option value="Bus Type" selected="selected" disabled="disabled" >Bus Type</option>
            <option value="luxury">luxury</option>
            <option value="deluxe">deluxe</option>
        </select>
        <button type="submit" id="book" >PROCEED</button>
        </div>
        <div id="display" >
            <div id="data" ></div>
        </div>
        <div id="table" ></div>
</body>
</html>
<script>
    var book_array = [];
$(document).ready( function() {
    $('#display').hide()
    $('#anchor3').on('click' , function() {
        $('#wrapper').hide()
    })
    $('#book').on('click' , function() {
        $('#display').show()
        $('#table').hide()
        display();
    })
})
var fname ,lname ,age ,gender,number,email ;
function book() {

        var start = document.getElementById('start_from').value;
        var reach = document.getElementById('to_reach').value;
        var date = document.getElementById('date').value; 
        var type = document.getElementById('type_of_bus').value;

        fname = document.getElementById('input1').value;
        lname = document.getElementById('input2').value;
        age = document.getElementById('input3').value;
        gender = $("input:radio[name=gender]:checked").val();
        city = document.getElementById('input4').value;
        number = document.getElementById('input5').value;
        email = document.getElementById('input6').value;

        $.ajax({
            url: 'post.php',
            type: 'post',
            datatype: 'json',
            data: {
                action: 'book',
                start: start,
                reach: reach,
                date: date,
                type: type
            },
            success: function(data){
                book_array = JSON.parse(data); 
                show_data(book_array);
                   
            }
        })
    }
    
    function display() {
    var html = ''
     html += '<h2>Add some personal info</h2>'
     html += '<input type="text" class="input" id="input1" placeholder="Name">'
     html += '<input type="text" class="input" id="input2" placeholder="Last Name"><br>'
     html += '<input type="text" class="input" id="input3" placeholder="Age"><br>'
     html += '<input type="radio" id="male" name="gender" value="male">'
     html += '<label id="label1">Male</label>'
     html += '<input type="radio" id="female" name="gender" value="female">'
     html += '<label id="label2">Female</label>'
     html += '<input type="text" class="input" id="input4" placeholder="City"><br>'
     html += '<input type="text" class="input" id="input5" placeholder="Phone no"><br>'
     html += '<input type="text" class="input" id="input6" placeholder="Email"><br>'
     html += '<button type="submit" id="div_button" onclick="book()" >Book Now</button>'

    document.getElementById('data').innerHTML = html;
}
function info() {
    $.ajax({
            url: 'post.php',
            type: 'post',
            datatype: 'json',
            data: {
                action: 'details',
                fname: fname,
                lname: lname,
                age: age,
                gender: gender,
                city: city,
                number: number,
                email: email
            },
            success: function(data){
               details_array = JSON.parse(data); 
               show_details(details_array);
                
            }
        })
}
function show_data(array){
    $('#table').show()
    $('#display').hide()
       alert('JOURNEY BOOKED')
       html = '<table><tr><th>START</th><th>REACH</th><th>DATE</th><th>TYPE</th><th>DETAILS</th></tr>'
           html += '<tr><td>'+array[0]+'</td><td>'+array[1]+'</td><td>'+array[2]+'</td><td>'+array[3]+'</td><td><button type="submit" id="info" onclick="info()" >More Info</button></td></tr>'
       html += '</table>'

       document.getElementById('table').innerHTML = html;
}
function show_details(array) {
    html = '<table>'
    html += '<tr><td>START</td><td>'+book_array[0]+'</td></tr>'
    html += '<tr><td>REACH</td><td>'+book_array[1]+'</td></tr>'
    html += '<tr><td>DATE</td><td>'+book_array[2]+'</td></tr>'
    html += '<tr><td>BUS TYPE</td><td>'+book_array[3]+'</td></tr>'
    html += '<tr><td>NAME</td><td>'+array[0]+'</td></tr>'
    html += '<tr><td>AGE</td><td>'+array[2]+'</td></tr>'
    html += '<tr><td>GENDER</td><td>'+array[3]+'</td></tr>'
    html += '<tr><td>CITY</td><td>'+array[4]+'</td></tr>'
    html += '<tr><td>NUMBER</td><td>'+array[5]+'</td></tr>'
    html += '<tr><td>EMAIL</td><td>'+array[6]+'</td></tr>'
    html += '<tr><td><button type="submit" id="go_back" onclick="go_back()">GO BACK</button></td></tr>'

    html += '</table>'
    $('#wrapper').show()
    document.getElementById('wrapper').innerHTML = html;
}
function go_back() {
    $('#wrapper').hide()
}
   
</script>