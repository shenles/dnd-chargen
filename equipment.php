<!DOCTYPE html>
<html lang="en">
   <head>
   <title>D&D Database</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
   <link rel="stylesheet" type="text/css" href="./style.css"> 
   </head>
    
   <body>
   
   <h1>D&D 5e Equipment</h1>
 
   <!-- bootstrap navbar --> 
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
         <a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item">
         <a class="nav-link" href="addchar.php">Create New Character</a></li>
        <li class="nav-item">
         <a class="nav-link" href="viewchars.php">View Saved Characters</a></li>
        <li class="nav-item">
         <a class="nav-link" href="classes.php">Classes</a></li>
        <li class="nav-item">
         <a class="nav-link" href="races.php">Races</a></li>
        <li class="nav-item">
         <a class="nav-link" href="backgrounds.php">Backgrounds</a></li>
        <li class="nav-item active">
         <a class="nav-link" href="equipment.php">Equipment</a></li>
        <li class="nav-item">
         <a class="nav-link" href="spells.php">Spells</a></li>  
      </ul>
    </div>   
   </nav>

   <div class="homepage-info">
     <h4>Filter results</h4>
     <p></p>
     By category:
     <form class="filterform" id="equipbytype" method="post" action="equipment.php">
        <input type="radio" id="simpleweapon" name="equiptype" value="simple">
        <label for="simpleweapon">simple weapons</label>

        <input type="radio" id="martialweapon" name="equiptype" value="martial">
        <label for="martialweapon">martial weapons</label>

        <input type="radio" id="meleeweapon" name="equiptype" value="melee">
        <label for="meleeweapon">melee weapons</label>

        <input type="radio" id="rangedweapon" name="equiptype" value="ranged">
        <label for="rangedweapon">ranged weapons</label>

        <input type="radio" id="allweapons" name="equiptype" value="weapon">
        <label for="allweapons">all weapons</label>
        <p></p>

        <input type="radio" id="lightarmor" name="equiptype" value="light">
        <label for="lightarmor">light armor</label>

        <input type="radio" id="medarmor" name="equiptype" value="medium">
        <label for="medarmor">medium armor</label>

        <input type="radio" id="allarmor" name="equiptype" value="armor">
        <label for="allarmor">all armor</label>
        <p></p>

        <input type="radio" id="otherequip" name="equiptype" value="other">
        <label for="otherequip">other equipment</label>

     <input type="submit" id="submitfilterequip" value="Filter by category" />
     </form>

   </div>

   <br />
   <div class="entitytable" id="equipresults">
     <table>
       <tr>
            <th>Spell</th>
            <th>Level</th>
            <th>School</th> 
            <th>Casting time</th>
            <th>Range</th>
            <th>Components</th>
            <th>Materials</th>
            <th>Classes</th>
            <th>Duration</th>
            <th>Ritual</th>
       </tr>

     </table>
   </div>

   <script>

       $(document).ready(function(){
           $('[data-toggle="tooltip"]').tooltip( {delay: 0} );
       });
   
   </script>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   </body>
</html>
