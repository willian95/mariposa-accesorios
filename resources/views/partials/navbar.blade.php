<!-- menu para pc -->

<div class="container d-none d-lg-block">
    <div class="row py-4">
        <div class="col-lg-4">
            <img src="img/the-hanger.webp" alt="">
        </div>
        <div class="col-lg-5">

            <div class="header_search_input_wrapper" style="display: flex;">
                <input type="text" class="header_search_input no-border-input searchInput" placeholder="Búsqueda" onclick="search()">
                <i class="fas fa-search mt-3"></i>
            </div>

        </div>
        <div class="col-lg-3 pt-3 pr-1">
            <a href="{{ url('cart') }}" id="cart-icon">
                <p class="text-right">
                    <i class="fas fa-shopping-bag" style="font-size: 25px;"></i>
                </p>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto order-0">
                        <li class="nav-item navbar-spacing">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown navbar-spacing">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorías
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Categoría 1</a></li>
                                <li><a class="dropdown-item" href="#">Categoría 2</a></li>
                            </ul>
                        </li>
                        <li class="nav-item navbar-spacing">
                            <a class="nav-link active" aria-current="page" href="#">Link 1</a>
                        </li>
                        <li class="nav-item navbar-spacing">
                            <a class="nav-link active" aria-current="page" href="#">Link 2</a>
                        </li>
                    </ul>
                </div>
        
            </nav>
        </div>
    </div>
        
</div>

<!-- menu para pc -->

<!-- menu para móviles -->

<nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none" >
    
    <img src="img/alternative_logo.png" alt="" style="width: 48px; margin-left: 16px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto order-0">
            <li class="nav-item navbar-spacing">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item dropdown navbar-spacing">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorías
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Categoría 1</a></li>
                    <li><a class="dropdown-item" href="#">Categoría 2</a></li>
                </ul>
            </li>
            <li class="nav-item navbar-spacing">
                <a class="nav-link active" aria-current="page" href="#">Link 1</a>
            </li>
            <li class="nav-item navbar-spacing">
                <a class="nav-link active" aria-current="page" href="#">Link 2</a>
            </li>
        </ul>
    </div>

</nav>

<!-- menu para móviles -->