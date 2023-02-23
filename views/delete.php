<?php
    if(isset($_POST['id'])) {
        // tatjib data
        $existEmployer = new EmployesController();
        $existEmployer->deleteEmploye();
    }    
?>