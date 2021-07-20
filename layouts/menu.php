<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a class="navbar-brand" href="<?=URLBASE?>">
            <img src="<?=URLBASE?>/assets/imagens/logo.png">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=URLBASE?>">
                        <div class="iconavbar"><span class="material-icons">home</span></div>
                        <div class="titleitemnav">Home </div>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=URLBASE?>">
                        <div class="iconavbar"><span class="material-icons">timeline</span></div>
                        <div class="titleitemnav">Dashboard </div>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=URLBASE?>devedores">
                    <div class="iconavbar"><span class="material-icons">account_circle</span></div>
                        <div class="titleitemnav">Devedores </div>
                    </a>
                </li> 
            </ul>
        </div>
    </div>
</nav>