<form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?action=title';?>"> 

  <label class="mb-2 mr-sm-2" for="new-title">Add a new title :</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="new-title" placeholder="Enter new title" name="new-title">
  
  <button type="submit" class="btn btn-secondary mb-2">Add</button>

</form>

<?php 
  if (isset($titleErr))
  {
    echo "<div class=\"alert alert-danger alert-dismissible\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    {$titleErr}
    </div>";
  }
 ?>