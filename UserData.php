<?php
        if((isset($ArrayUser)==0)&&(isset($_SESSION["UserData"])==0))
        {
            $ArrayUser = Array(
                Array("782dd5249e6dfe9a887c44e4370b7564","6839d672141795d0959700017e3cdec4","Sara"),
                Array("16ba038ec0ed9f6326e73bb398b3bf29","353df421c4fc976e2637061d7a83f601","August"),
                Array("c2f970ce4f3884dd997e915bc9f11efc","c935d187f0b998ef720390f85014ed1e","March"));
            $_SESSION["UserData"] =$ArrayUser;

        }


?>
