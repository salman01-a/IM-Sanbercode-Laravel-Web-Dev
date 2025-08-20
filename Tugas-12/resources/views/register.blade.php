<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Form</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <form action="/daftar" method="POST">
        @csrf
        <h3>Sign Up Form</h3>
        <label for="">First name:</label> <br/>
        <input type="text" name="firstName"> <br/>

        <label>Last name:</label> <br/>
        <input type="text" name="lastName"> <br/>

        <label for="">Gender</label> <br>
        <input type="radio" name="gender">Male <br/>
        <input type="radio" name="gender">Female <br/>
        <input type="radio" name="gender">Other <br/>

        <label>Nationality:</label> <br/>
        <select name="nationality" id="">
            <option value="indonesia">indonesia</option>
            <option value="malaysia">malaysia</option>
            <option value="bekasi">bekasi</option>
        </select> <br>
        <label>Language Spoken</label> <br/>
        <input type="checkbox"> Bahasa Indonesia <br> 
        <input type="checkbox"> English <br>
        <input type="checkbox"> Other <br>

        <label>Bio:</label> <br/>    
        <textarea name="" id=""></textarea><br/>
        
        <input type="submit" value="Sign Up">
    </form>

</body>
</html>