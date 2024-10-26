<?php  $title ="TestNav";  ?>

<?php ob_start(); ?>

<h1>Active Button</h1>

<p>Highlight the active/current (pressed) button.</p>

<style>
    /* Style the buttons */
.btn {
    border: none;
    outline: none;
    padding: 10px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
    font-size: 18px;
  }
  
  /* Style the active class, and buttons on mouse-over */
  .active, .btn:hover {
    background-color: blue;
    color: white;
  }
  
</style>

<div id="myDIV">
  <button class="btn">1</button>
  <button class="btn active">2</button>
  <button class="btn">3</button>
  <button class="btn">4</button>
  <button class="btn">5</button>
</div>

<script>
    // Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}

</script>


<?php $content = ob_get_clean(); ?>

<?php include 'layout.php'?>