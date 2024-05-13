<form id="myForm" action="<?= base_url('transaksi/testInput'); ?>" method="post">
    <div id="inputs2">
        <div class="input-group">
            <input type="text" name="test" placeholder="test">
            <input type="text" name="test2" placeholder="test2">
        </div>
    </div>
    <div id="inputs">
        <div class="input-group">
            <input type="text" name="users[][username]" placeholder="Username">
            <input type="email" name="users[][email]" placeholder="Email">
        </div>
    </div>
    <button type="button" onclick="addInput()">Add More</button>
    <br>
    <input type="submit" value="Submit">
</form>

<script>
    function addInput() {
        var container = document.getElementById("inputs");
        var div = document.createElement("div");
        div.innerHTML = '<div class="input-group"><input type="text" name="users[][username]" placeholder="Username"><input type="email" name="users[][email]" placeholder="Email"></div>';
        container.appendChild(div);
    }
</script>
