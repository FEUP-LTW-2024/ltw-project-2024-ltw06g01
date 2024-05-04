<?php
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header.php");
    include_once("../class/listings.php");
?>
    <?php
        print_header();
        if (isset($_SESSION['message']))
{
    echo "<div class='valid'>" . $_SESSION['message'] .  "</div>";
}
unset($_SESSION['message']);
        ?>
        <h1>Filtros de Produtos</h1>
        <div class="filter">

        <form id = "filter_form" method="POST">
            <div class="filter-section">
                <label for="brand">Marca:</label>
                <br>
                <select id="brand" name="brand">
                <option value="0"></option>
                <?php
                    $db = new PDO('sqlite:../database/database.db');
                    $stmt = $db->query('SELECT IDbrand, brand FROM BRAND');
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $brandId = $row['IdBrand']; 
                        $brandName = $row['Brand'];
                    
                        echo "<option value='$brandId'>" . $brandName . "</option>";
                    }
                ?>
                </select>
            </div>

            <div class="filter-section">
                <label for="size">Tamanho:</label>
                <br>
                <select id="size" name="size">
                <option value="0"></option>
                <?php
                    $stmt = $db->query('SELECT IdSize, Size FROM SIZE');
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $SizeId = $row['IdSize']; 
                        $SizeName = $row['Size'];
                        echo "<option value='$SizeId'>" . $SizeName . "</option>";
                    }
                ?>
                </select>
            </div>

            <div class="filter-section">
                <label for="color">Cor:</label>
                <br>
                <select id="color" name="color">
                <option value="0"></option>
                <?php
                    $stmt = $db->query('SELECT IdColour, Colour FROM COLOUR');
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $ColorId = $row['IdColour']; 
                        $ColorName = $row['Colour'];
                        echo "<option value='$ColorId'>" . $ColorName . "</option>";
                    }
                    ?>
                    </select>
            </div>

            <div class="filter-section">
                <label for="state">Estado:</label>
                <br>
                <select id="state" name="state">
                <option value="0"></option>
                <?php
                    $stmt = $db->query('SELECT IDstate, STATE FROM STATE');
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $stateId = $row['IdState']; 
                        $stateName = $row['State'];
                        echo "<option value='$stateId'>" . $stateName . "</option>";
                    }
                ?>
                    </select>
            </div>

            <div class="filter-section">
                <label for="gender">Gênero:</label>
                <br>
                <select id="gender" name="gender">
                <option value="0"></option>
                <?php
                    $stmt = $db->query('SELECT IDGender, Gender FROM GENDER');
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $genderId = $row['IdGender']; 
                        $genderName = $row['Gender'];
                        echo "<option value='$genderId'>" . $genderName . "</option>";
                    }
                ?>
                </select>
            </div>

            <div class="filter-section">
                <label for="type">Tipo:</label>
                <br>
                <select id="type" name="type">
                    <option value="0"></option>
                    <?php
                        $stmt = $db->query('SELECT IdType, Type FROM TYPE');
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $TypeId = $row['IdType']; 
                            $TypeName = $row['Type'];
                            echo "<option value='$TypeId'>" . $TypeName . "</option>";
                        }
                    ?>
                    </select>
            </div>
            <div class="filter-section">
                <button type="submit">Aplicar Filtros</button>
            </div>
        </form>
        </div>
        <div id="products-container">
            <h2>Produtos Filtrados</h2>
            </div>
    
       <?php
       print_filtred_listings();
       print_footer()?>
