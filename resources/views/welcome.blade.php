<!doctype html>
<head>
<script type="text/javascript">
    function hide(){
        if(document.getElementById('category_id').value > 3){
            document.getElementById('hidden').style.display = 'none';
        }
        else{
            document.getElementById('hidden').style.display = 'inline';
        }
    }
</script>
</head>

<body>
<form action="{{ URL::to('/user_created') }}" method="post">
    {{ csrf_field() }}
    Category:
    <select name="category_id" id="category_id" onchange="hide()">
        <option value="1">Super User</option>
        <option value="2">Customer</option>
        <option value="3">Sales Stuff</option>
        <option value="4">Supplier</option>
        <option value="5">Factory</option>
    </select><br><br>
    Name:
    <input type="text" name="name"><br><br>
    <div class="hidden" id="hidden">
        Last name:
        <input type="text" name="lastname"><br><br>
        E-mail:
        <input type="text" name="email"><br><br>
        Telefon:
        <input type="text" name="telefon"><br><br>
    </div>
    Username:
    <input type="text" name="username"><br><br>
    Password:
    <input type="text" name="password"><br><br>
    <input type="submit" value="submit">
</form>
</body>
</html>
