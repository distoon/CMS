<form action="user/post" method="post">
    @csrf
    <label >username</label>
    <input type="text" name="username">
    <label >first name</label>
    <input type="text" name="first_name">
    <button type="submit">Submit</button>
</form>