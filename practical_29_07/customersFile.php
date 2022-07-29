<head>
    <?php include("header.php") ?>
</head>

<body>
    <form method="post">
        <input type="file" name="filename">
        <button class="btn">Read</button>
    </form>
    <div class="container">
        <?php
        if (isset($_POST["filename"])) :
            $filename = $_POST["filename"];
            $file = fopen($filename, "r");
            if ($file == false) {
                echo ("<h2 class='err'>File can't be opened'</h2>");
                exit();
            }
            //We start with the header
            $csvContentLineArr = fgetcsv($file, filesize($filename), ";");
            if (!$csvContentLineArr) //file is empty
                exit();
            echo "<b>";
            echo "<div class='row'>";
            foreach ($csvContentLineArr as $fieldname) :
                echo "<div class='col'>";
                echo $fieldname;
                echo "</div>";
            endforeach;

            echo "</div>";
            echo "</b>";

            //Go through the content of the file
            while ($csvContentLineArr = fgetcsv($file, filesize($filename), ";")) :
                echo "<div class='row'>";
                foreach ($csvContentLineArr as $fieldvalue) :
                    echo "<div class='col'>";
                    echo $fieldvalue;
                    echo "</div>";
                endforeach;
                echo "</div>";
            endwhile;
            fclose($file);
        endif;
        ?>
    </div>
</body>