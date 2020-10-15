<header>
<div class="container-fluid bg-info" id="header">
    <?php 
    
    //require_once("function.php");
        //otvara php
        //ako je user logovan krije druge za prijavi i prikazuje ime i preise i status
        if (login())
        {
            $sql="SELECT * FROM users WHERE id='{$_SESSION['id']}'";
            $res=$db->query($sql);
            $row=$db->fetch_object($res);
            if($_SESSION['user_status']=="Administrator")
            {//ovde otvara of ifa
             //zatvara php
             ?>
                <div class="btn-group profil">
                <button type="button" class="btn btn-succes profil-text dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php  echo "{$_SESSION['user_name']} ({$_SESSION['user_status']});"?>
                </button>
                <div class="dropdown-menu dropdown-menu-left profil-link">
                        <button class="dropdown-item" type="button"><a href="category.php">Upravljanje kategorijama </a></button>
                        <button class="dropdown-item" type="button"><a href="products.php">Upravljanje proizvodima</a></button>
                        <button class="dropdown-item" type="button"><a href="logs.php">Logovi</a></button>
                        <button class="dropdown-item" type="button"><a href="logIn.php?logoff">Odjavite se</a></button>
                </div>
                </div>
            <?php //otvara php
            }//ovde zatvara zagrade
            elseif($_SESSION['user_status']=="Product")
            {//otvara zagrade od elseifa
                //zatvara php
            ?>
                <div class="btn-group profil">
                    <button type="button" class="btn btn-success profil-text dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo "{$_SESSION['user_name']} ({$_SESSION['user_status']})"; ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left profil-link">
                        <button class="dropdown-item" type="button"><a href="products.php">Upravljanje proizvodima</a></button>
                        <button class="dropdown-item" type="button"><a href="logIn.php?logoff">Odjavite se</a></button>
                    </div>
                </div>
            <?php //otvara php
            }//zatvara zagrade
            elseif($_SESSION['user_status']=="Category")
            { //otvara zagrade od elseif
            //zatvara php
            ?>
              <div class="btn-group profil">
                    <button type="button" class="btn btn-success profil-text dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo "{$_SESSION['user_name']} ({$_SESSION['user_status']})"; ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left profil-link">
                        <button class="dropdown-item" type="button"><a href="category.php">Upravljanje kategorijama</a></button>
                        <button class="dropdown-item" type="button"><a href="logIn.php?logoff">Odjavite se</a></button>
                    </div>
                </div>
                <?php //otvara php
            }//zatvara
            else
            {
                //zatvara php
            ?> 
                <div class="btn-group profil">
                    <button type="button" class="btn btn-success profil-text dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo "{$_SESSION['user_name']} "; ?> 
                    </button>
                    <div class="dropdown-menu dropdown-menu-left profil-link">
                        <button class="dropdown-item" type="button"><a href="logIn.php?logoff">Odjavite se</a></button>
                    </div>
                </div>
                <?php
                }
                ?>
            <?php
             }
            else
            {
               ?>
                <button class='btn btn-outline-light' data-toggle='modal' data-target='#signinPage'>Prijava</button>
            <?php
            }
            ?>
                <button class="btn btn-outline-light profil-text index"><a href="index.php">Pocetna</a></button>
    
    
</div>
<!-- Log in page content-->
    <div class="container-fluid bg-info" id="header">
    
    </div>
    <div class="modal fade" id="signinPage">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="model-header text-center">
                    <h4 class="modal-title text-center w-100 font-weight-bold">Prijava</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close"> &times;</button>
                </div>
                <form action="#">
                <div class="modal-body mx-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email addresa</label>
                    <input type="email" class="form-control"  id="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Lozinka</label>
                    <input type="password" class="form-control"  id="password">
                </div>
                </form>
                <div id="error">
                    
                </div>
            </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a href="#" class="btn btn-success btn-block" id="logIn">Ulogujte se</a>
                </form>
                </div>
            </div>
        </div>
    
    </div>
</header>