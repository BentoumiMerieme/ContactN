<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>  Modifie a Contacts </title>

<style>
    body 
    {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: relative;
        flex-direction: column;
    }

    h1 
    {
        color: #4caf50;
        text-align: center;
        margin-bottom: 20px;
        font-size: 2em;
    }

    .container
    {
        box-sizing: border-box;
        border-radius: 10px;
        background-color: #ffffff;
        padding: 30px;
        width: 100%;
        max-width: 500px;
        margin: 0 relative;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    form
    {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    label
    {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    input, textarea, select
    {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1em;
    }

    #button
    {
        background: url('<?php echo e(asset('img/modifie.svg')); ?>') no-repeat 150px center;
        background-color: #4caf50;
        color: #000;
        padding: 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1.2em;
        transition: background-color 0.3s;
    }

    #button:hover 
    {
        background-color: #45a049;
    }

    .error 
    {
        color: #ff0000;
        margin-bottom: 10px;
    }
    @media(max-width: 700px)
    {
        #button 
        {
            background: url('<?php echo e(asset('img/modifie.svg')); ?>') no-repeat 120px center;
            background-color: #4caf50;
            color: #000;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s;
        }
        
    }
</style>
</head>

<body>

    <div>
        <h1>Formulaire de Contact</h1>
    </div>

    <div>
        <?php if($errors->any()): ?>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <?php echo e($error); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>
    </div>

    <div class="container">

        <form id="contactForm" method="post" action="<?php echo e(route('naltis_contacts.update',['naltis_contacts' => $contacts])); ?>">
            <?php echo csrf_field(); ?> 
            <?php echo method_field('put'); ?> 
                <div>
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" placeholder="Nom " value="<?php echo e($contacts -> nom); ?>" required>
                </div>

                <div>
                    <label for="prenom">Prenom:</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo e($contacts -> prenom); ?>" required>
                </div>

                <div>
                    <label for="email"><img width="15" height="15" src="<?php echo e(asset('img/envelope.png')); ?>" alt=""/> Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email" value="<?php echo e($contacts -> email); ?>" required>
                </div>

                <div>
                    <label for="tel"><img width="13" height="13" src="<?php echo e(asset('img/phone-solid.svg')); ?>" alt=""/> Tel:</label>
                    <input type="tel" id="tel" name="tel" placeholder="Tel" value="<?php echo e($contacts -> tel); ?>" required>
                </div>

                <div>
                    <label for="tel2"><img width="13" height="13" src="<?php echo e(asset('img/phone-solid.svg')); ?>" alt=""/> Tel 2:</label>
                    <input type="tel" id="tel2" name="tel2" placeholder="Deuxieme tel" value="<?php echo e($contacts -> tel2); ?>">
                </div>
    
                <!-- <div>
                    <label for="groupe"><img width="15" height="15" src="<?php echo e(asset('img/groupe-user.png')); ?>" alt=""/> Groupe:</label>
                    <select id="lookupComboBox">
                        <option  id="groupe" name="groupe" value="<?php echo e($contacts -> groupe); ?>">Select un groupe</option> -->

     <!-- // Fetch data from the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "naltis_contacts";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the database
    $sql = "SELECT id, nom FROM naltis_contacts";
    $result = $conn->query($sql);

    // Populate options
    while ($row = $result->fetch_assoc()) 
    {
        echo "<option value='" . $row["id"] . "'>" . $row["nom"] . "</option>";
    }

    // Close the connection
    $conn->close();
?> -->

                        <!-- </select>
                </div>  
                  -->
                <div>
                    <label for="address"><img width="15" height="15" src="<?php echo e(asset('img/home.svg')); ?>" alt=""/> Address:</label>
                        <textarea id="address" name="address" rows="4" placeholder="Address"  required><?php echo e($contacts ->address); ?></textarea>

                </div>

                <div>
                    <input  id="button" type="submit" onclick="validateForm()" value="Modifie">  
                </div>
        </form>
    </div>
<script>
    function validateForm() 
    {
        var nom = document.getElementById('nom').value;
        var email = document.getElementById('email').value;
        var tel = document.getElementById('tel').value;
        var address = document.getElementById('address').value;

        var errorElement = document.getElementById('error-message');
            errorElement.innerHTML = "";

            if (!nom || !email || !tel || !address) 
            {
                errorElement.innerHTML = "Veuillez remplir tous les champs requis.";
                return;
            }
            alert('Formulaire soumis avec succès!');
    }
</script>
   
</body>
</html>

<?php /**PATH C:\xampp\htdocs\naltis_contacts\resources\views/naltis_contacts/edit.blade.php ENDPATH**/ ?>