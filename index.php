<?php
   $name = isset($_POST['name']) ? $_POST['name'] : "terminaldz";
   $avatarType = isset($_POST['avatar']) ? $_POST['avatar'] : "adventurer-neutral";
   $avatar_url = "https://api.dicebear.com/6.x/" . $avatarType. "/png?seed=" . urlencode($name);
   

   // Function to save and download the image
function saveImage() {
    $num = rand(99999, 9999999999);
    $imageData = file_get_contents($_POST['avatar']);
    $fileName = "Dicebear_Generate_" .$num. ".png";
    file_put_contents($fileName, $imageData);
 
    // Download the image
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $fileName);
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fileName));
    readfile($fileName);
    exit;
 }
 
 if (isset($_POST['save_image'])) {
    saveImage();
 }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <title>Dicebear Generate</title>
      <style>
         .imageavatars{
         width: 150px !important;
         height: 150px !important;
         }
      </style>
   </head>
   <body>
      <div class="container mt-5">
         <div class="col-md-6 offset-md-3 mb-3">
            <form method="POST" action="">
               <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?php echo $name; ?>" required>
               </div>
               <div class="form-group">
                  <label for="avatar">Avatar Type</label>
                  <select class="form-control" name="avatar">
                     <option value="adventurer" <?php echo ($avatarType === 'adventurer') ? 'selected' : ''; ?>>Adventurer</option>
                     <option value="adventurer-neutral" <?php echo ($avatarType === 'adventurer-neutral') ? 'selected' : ''; ?>>Adventurer Neutral</option>
                     <option value="avataaars" <?php echo ($avatarType === 'avataaars') ? 'selected' : ''; ?>>Avataaars</option>
                     <option value="avataaars-neutral" <?php echo ($avatarType === 'avataaars-neutral') ? 'selected' : ''; ?>>Avataaars Neutral</option>
                     <option value="big-ears" <?php echo ($avatarType === 'big-ears') ? 'selected' : ''; ?>>Big Ears</option>
                     <option value="big-ears-neutral" <?php echo ($avatarType === 'big-ears-neutral') ? 'selected' : ''; ?>>Big Ears Neutral</option>
                     <option value="big-smile" <?php echo ($avatarType === 'big-smile') ? 'selected' : ''; ?>>Big Smile</option>
                     <option value="bottts" <?php echo ($avatarType === 'bottts') ? 'selected' : ''; ?>>Bottts</option>
                     <option value="bottts-neutral" <?php echo ($avatarType === 'bottts-neutral') ? 'selected' : ''; ?>>Bottts Neutral</option>
                     <option value="croodles" <?php echo ($avatarType === 'croodles') ? 'selected' : ''; ?>>Croodles</option>
                     <option value="croodles-neutral" <?php echo ($avatarType === 'croodles-neutral') ? 'selected' : ''; ?>>Croodles Neutral</option>
                     <option value="fun-emoji" <?php echo ($avatarType === 'fun-emoji') ? 'selected' : ''; ?>>Fun Emoji</option>
                     <option value="icons" <?php echo ($avatarType === 'icons') ? 'selected' : ''; ?>>Icons</option>
                     <option value="identicon" <?php echo ($avatarType === 'identicon') ? 'selected' : ''; ?>>Identicon</option>
                     <option value="initials" <?php echo ($avatarType === 'initials') ? 'selected' : ''; ?>>Initials</option>
                     <option value="lorelei" <?php echo ($avatarType === 'lorelei') ? 'selected' : ''; ?>>Lorelei</option>
                     <option value="lorelei-neutral" <?php echo ($avatarType === 'lorelei-neutral') ? 'selected' : ''; ?>>Lorelei Neutral</option>
                     <option value="micah" <?php echo ($avatarType === 'micah') ? 'selected' : ''; ?>>Micah</option>
                     <option value="miniavs" <?php echo ($avatarType === 'miniavs') ? 'selected' : ''; ?>>Miniavs</option>
                     <option value="notionists" <?php echo ($avatarType === 'notionists') ? 'selected' : ''; ?>>Notionists</option>
                     <option value="notionists-neutral" <?php echo ($avatarType === 'notionists-neutral') ? 'selected' : ''; ?>>Notionists Neutral</option>
                     <option value="open-peeps" <?php echo ($avatarType === 'open-peeps') ? 'selected' : ''; ?>>Open Peeps</option>
                     <option value="personas" <?php echo ($avatarType === 'personas') ? 'selected' : ''; ?>>Personas</option>
                     <option value="pixel-art" <?php echo ($avatarType === 'pixel-art') ? 'selected' : ''; ?>>Pixel Art</option>
                     <option value="pixel-art-neutral" <?php echo ($avatarType === 'pixel-art-neutral') ? 'selected' : ''; ?>>Pixel Art Neutral</option>
                     <option value="shapes" <?php echo ($avatarType === 'shapes') ? 'selected' : ''; ?>>Shapes</option>
                     <option value="thumbs" <?php echo ($avatarType === 'thumbs') ? 'selected' : ''; ?>>Thumbs</option>
                  </select>
               </div>
               <button type="submit" class="btn btn-primary mt-2">Generate</button>
            </form>
         </div>
         <div class="row">
            <div class="col-md-12 text-center">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title">Dicebear</h4>
                  </div>
                  <div class="card-body">
                     <div class="mt-3">
                        <img src="<?php echo $avatar_url; ?>" alt="Avatar" class="img-fluid img-thumbnail imageavatars">
                     </div>
                     <div class="mt-3">
                        <button class="btn btn-secondary" onclick="copyURL()">Copy URL</button>
                        <span id="copyAlert" class="ml-2" style="color: green;"></span>
                     </div>
                     <div class="mt-3">
                     <form method="POST" action="">
                        <input type="hidden" name="avatar" value="<?php echo $avatar_url; ?>">
                        <button type="submit" name="save_image" class="btn btn-secondary">Save Image</button>
                     </form>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      <script>
         function copyURL() {
           var copyText = "<?php echo $avatar_url; ?>";
           navigator.clipboard.writeText(copyText).then(function() {
             var copyAlert = document.getElementById("copyAlert");
             copyAlert.textContent = "Copied successfully!";
             copyAlert.style.display = "inline";
           }, function() {
             // Error handling if copy fails
             var copyAlert = document.getElementById("copyAlert");
             copyAlert.textContent = "Error!";
             copyAlert.style.display = "inline";
           });
         }
      </script>
   </body>
</html>