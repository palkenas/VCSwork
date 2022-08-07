 <?php
 include './index/php'
 ?>
 
 <div class="container">
     <div id="scroll" class="table-responsive">
         <table id="table" class="table table-striped table-transparent">
             <thead>
                 <tr>
                     <th scope="col">Lietuviškas pavadinimas</th>
                     <th scope="col">Lotyniškas pavadinimas</th>
                     <th scope="col">Daugiametis/Vienmetis</th>
                     <th scope="col">Maksimalus amžius</th>
                     <th scope="col">Maksimalus aukštis</th>
                     <th scope="col">Redaguoti</th>
                     <th scope="col">Ištrinti</th>
                 </tr>
             </thead>
             <tbody>
                 <?php foreach ($plants as $plant) { ?>
                     <tr>
                         <td><?= $plant->namelt ?></td>
                         <td><?= $plant->namelat ?></td>
                         <td><?= $plant->isperennial ? "augalas daugiametis" : "augalas vienmetis" ?></td>
                         <td><?= $plant->age . ' metai(-ų)' ?></td>
                         <td><?= $plant->height . ' m' ?></td>
                         <td>
                             <form action="" method="post">
                                 <input type="hidden" name="id" value="<?= $plant->id ?>">
                                 <button id="edit" class="btn btn-outline-warning" type="submit" name="edit">Redaguoti</button>
                             </form>
                         </td>
                         <td>
                             <form action="" method="post">
                                 <input type="hidden" name="id" value="<?= $plant->id ?>">
                                 <button id="delete" class="btn btn-outline-danger" type="submit" name="destroy">Ištrinti</button>
                             </form>
                         </td>
                     </tr>
                 <?php } ?>
             </tbody>
         </table>
     </div>
     </body>

     </html>