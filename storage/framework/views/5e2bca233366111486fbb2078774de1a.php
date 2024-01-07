<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Data Page</title>
<style>
    body 
    {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: normal;
        justify-content: center;
        min-height: 100vh;
        flex-direction: row-reverse;
    }

    .container 
    {
        margin:0;
        box-sizing: border-box;
        border-radius: 10px;
        background-color: #fff;
        padding: 30px;
        width: 90%; 
        /* max-width: relative; */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    h1
    {
        color: #4caf50;
        text-align: center;
        margin-bottom: 20px;
        font-size: 2em;
    }

    table
    {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        overflow-x: auto; /* Enable horizontal scrolling on small screens */
    }

    th, td 
    {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
        white-space: nowrap; /* Prevent text wrapping in cells */
    }

    th
    {
        background-color: #f2f2f2;
        font-weight: bold; 
    }

    input:not(.imput_image)
    {
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        padding: 5px;
        font-size: 1em;
        transition: background-color 0.3s;
        margin-top: 20px;  
    }

    .imput_image
    {      
        width: 30%;
    }

    #order
    {
        max-width: relative;
        border-radius: 1px;
    }

    #searchInput
    {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: none ;
        box-sizing: border-box;
    }

    tr:nth-of-type(odd) 
    { 
        background: #f2f2f2; 
    }

    button 
    {
        background-color: transparent;
        border: none;
        color: blue; /* or any other color */
        text-decoration: underline;
        cursor: pointer;
    }

    #inpajout
    {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: none ;
        box-sizing: border-box;
    }
        
/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
    @media only screen and (max-width: 760px),(min-device-width: 768px) and (max-device-width: 1024px) 
    {
        table td
        {
            display: flex;
        }
  
        table td::before 
        {
            content: attr(label);
            font-weight: bold;
            width: 120px;
            min-width: 120px;
        }

	    /* Force table to not be like tables anymore */
	    table, thead, tbody, th, td, tr 
        { 
		    display: block; 
	    }
	
	    /* Hide table headers (but not display: none;, for accessibility) */
	    thead tr
        { 
		    position: absolute;
		    top: -9999px;
		    left: -9999px;
	    }
	
	    tr 
        { 
            border: 1px solid #ccc;
        }
	
	    td 
        { 
		/* Behave  like a "row" */
		    border: none;
		    border-bottom: 1px solid #eee; 
		    position: relative;
		    padding-left: 50%; 
	    }
	
	    td:before 
        { 
		/* Now like a table header */
		    position: absolute;
		/* Top/left values mimic padding */
		    top: 13px;
		    left: 8px;
		    width: 45%; 
		    padding-right: 10px; 
		    white-space: nowrap;
	    }
	
	    /*Label the data*/
        td:nth-of-type(1):before { content: "nom";}
	    td:nth-of-type(2):before { content: "nom"; }
	    td:nth-of-type(3):before { content: "prenom"; }
	    td:nth-of-type(4):before { content: "email"; }
	    td:nth-of-type(5):before { content: "tel"; }
	    td:nth-of-type(6):before { content: "tel2"; }
	    td:nth-of-type(7):before { content: "id_groupe"; }
	    td:nth-of-type(8):before { content: "address"; }
	    td:nth-of-type(9):before { content: "edit"; }

    }
    #table1
    {
        background-color:#fff;
    }
      /* styles.css */
    #scrollToBottom 
    {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px;
        background-color: #4caf50;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
   
</style>
</head>

<body>  
    <div class="container">
        <div>  
            <div>
                <h1> Liste Naltis Contacts</h1> 
            </div>
                <?php echo csrf_field(); ?>
            <div>
                <?php if(session()->has('success')): ?>
                    <div>
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <table id="table1">
                <tr>
                    <td>
                        <div>
                            <input type="text" id="searchInput" placeholder="Recherche...">
                        </div>
                    </td>
                    <td>
                        <form method="post" action="<?php echo e(route('naltis_contacts.add')); ?>"> 
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('get'); ?>
                            <div>
                                <input class="imput_image" type="image" src="<?php echo e(asset('img/add-user.svg')); ?>" alt="Ajouter" >
                            </div>   
                        </form>
                    </td>
                </tr>
            </table>
        </div>  
      
        <table>
            <tr>
                <th id="order"> Pos.
                </th>

                <th id="nameHeader">  
                    <img width="13" height="13" src="<?php echo e(asset('img/user-solid.svg')); ?>" alt=""/> Nom
                </th>

                <th id="prenomHeader">
                    <img width="13" height="13" src="<?php echo e(asset('img/user-solid.svg')); ?>" alt=""/> Prenom
                </th>

                <th>                  
                    <img width="15" height="15" src="<?php echo e(asset('img/envelope.png')); ?>" alt=""/> Email
                </th>

                <th>
                    <img width="13" height="13" src="<?php echo e(asset('img/phone-solid.svg')); ?>" alt=""/> Tel
                </th>

                <th>
                    <img width="13" height="13" src="<?php echo e(asset('img/phone-solid.svg')); ?>" alt=""/> Tel2
                </th>

                <!-- <th>
                    <img width="15" height="15" src="<?php echo e(asset('img/groupe-user.png')); ?>" alt=""/> groupe
                </th> -->

                <th>
                    <img width="15" height="15" src="<?php echo e(asset('img/home.svg')); ?>" alt=""/> Address
                </th>

                <th>
                    <img width="17" height="17" src="<?php echo e(asset('img/modifie.png')); ?>" alt=""/> Modifier
                </th>
                <th>
                    <img width="17" height="17" src="<?php echo e(asset('img/supprime.png')); ?>" alt=""/>Supprimer
                </th>
            </tr>                 
            <?php
                $i=1; 
            ?>
            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contactt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
            <tr class="table-row">        
                <th id="order"><?php echo e($i); ?></th>
                <td><?php echo e($contactt -> nom); ?></td>
                <td><?php echo e($contactt -> prenom); ?></td>
                <td><?php echo e($contactt -> email); ?></td>
                <td><?php echo e($contactt -> tel); ?></td>
                <td><?php echo e($contactt -> tel2); ?></td>
                <!-- <td><?php echo e($contactt -> groupe); ?></td> -->
                <td><?php echo e($contactt -> address); ?></td>
                <td>
                    <form method="get" action="<?php echo e(route('naltis_contacts.edit', ['naltis_contacts' => $contactt])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('get'); ?>
                            <input class="imput_image" type="image" src="<?php echo e(asset('img/modifie.svg')); ?>" alt="modifie">
                    </form> 
                </td>
                <td>
                    <form method="post" action="<?php echo e(route('naltis_contacts.destroy', ['naltis_contacts' => $contactt])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                            <input class="imput_image" type="image" src="<?php echo e(asset('img/supprime.svg')); ?>" alt="Supprimer" >
                    </form>
                </td>
            </tr> 
            <?php 
                $i++;
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
        </table>   
        <button id="scrollToBottom"><img width="17" height="17" src="<?php echo e(asset('img/arrow-down-solid.svg')); ?>" alt=""/></button>
        
    </div>
   
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var searchInput = document.getElementById("searchInput");

        searchInput.addEventListener("input", function () {
            var filter = searchInput.value.toLowerCase();
            var rows = document.getElementsByClassName("table-row");

            for (var i = 0; i < rows.length; i++) {
                var text = rows[i].innerText.toLowerCase();
                rows[i].style.display = text.includes(filter) ? "" : "none";
            }
        });
    });
    document.getElementById('scrollToBottom').addEventListener('click', function() {
        window.scrollTo({
        top: document.body.scrollHeight,
        behavior: 'smooth'
        });
    });

</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\naltis_contacts\resources\views/naltis_contacts/liste.blade.php ENDPATH**/ ?>